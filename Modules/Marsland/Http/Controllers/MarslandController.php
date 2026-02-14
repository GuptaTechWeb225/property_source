<?php

namespace Modules\Marsland\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Interfaces\LeadershipInterface;
use App\Interfaces\TestimonialInterface;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\CaseStudy;
use App\Models\City;
use App\Models\Contact;
use App\Models\HeroSection;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\State;
use App\Models\Tenant;
use App\Services\NotificationService;
use App\Traits\SendMessage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Marsland\Entities\FamilyMember;

class MarslandController extends Controller
{
    use SendMessage;

    public function index()
    {
        $data['config'] = About::first();
        $hero_banners = HeroSection::with('image:id,path')->where('status', 1)->select('id', 'title', 'highlight_title_one', 'btn_one', 'image_id', 'status')->get();
        $data['sliders'] = $hero_banners->map(function ($slider) {
            return [
                'id' => $slider->id,
                'title' => $slider->title,
                'highlight_title_one' => $slider->highlight_title_one,
                'btn_one' => $slider->btn_one,
                'imageURL' => globalAsset($slider->image->path),
            ];
        });
        $propertyCategories = PropertyCategory::with('properties','image','icon')
            ->select('id', 'name', 'image_id', 'slug','icon_class')
            ->where('status', 'active')
            ->get();
        $data['categories'] = $propertyCategories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'image' => globalAsset(@$category->image->path),
                'icon' => $category->icon_class,
                'properties' => count($category->properties) ?? 0,
            ];
        });

        $data['feature_categories'] = PropertyCategory::where('is_featured', 1)->limit(3)->get();

        $data['partners'] = Partner::where('status', 1)->limit(10)->get();

        return view('marsland::home')->with($data);
    }

    public function aboutUs()
    {
        $data['content'] = About::first();
        return view('marsland::pages.about')->with($data);
    }

    public function blogs(Request $request)
    {
        $data['categories'] = BlogCategory::where('status', 1)->get();

        $data['blogs'] = Blog::select('id', 'title', 'content', 'image_id', 'created_at', 'category_id', 'slug')
            ->with('image:id,path')
            ->when($request->has('category'), function ($q) use ($request) {
                $q->where('category_id', $request->input('category'));
            })
            ->when($request->has('tag'), function ($q) use($request){
                $q->where('tags', 'LIKE',"%$request->tag%");
            })
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('marsland::pages.blogs')->with($data);
    }


    public function blogDetails(Request $request, $slug)
    {
        $data['latest_blogs'] = Blog::latest('created_at')->take(5)->get();
        $data['blog'] = Blog::with('case_study:id,title,slug')->where('slug', $slug)
            ->first();
        return view('marsland::pages.blog_details')->with($data);
    }


    public function caseStudytails(Request $request, $slug)
    {
        $data['latest_blogs'] = Blog::latest('created_at')->take(5)->get();
        $data['case_study'] = CaseStudy::where('slug', $slug)->firstOrFail();
        return view('marsland::pages.case_study_details')->with($data);
    }

    public function privacyPolicy()
    {
        return view('marsland::pages.privacy_policy');
    }

    public function faqs()
    {
        return view('marsland::pages.faq');
    }

    public function termsCondition()
    {
        return view('marsland::pages.terms_condition');
    }

    public function getCities(Request $request)
    {
        $cities = City::where('country_id', $request->input('country_id'))->get();
        return response()->json($cities,200);
    }

    public function uploadProperty(Request $request)
    {
        $auth = Auth::user();
        if (auth()->check()){
            if ($auth->role_id != 4){
                return redirect()->back()->with('warning', _trans('alert.Please log in as a Landlord'));
            }
        }
        return redirect()->route('login');
    }


    public function verifyVisitor(Request $request)
    {
        try {
            $phoneNumber = decrypt($request->pn);
            $personalCode = $request->code;

            $tenant = Tenant::where('personal_code', $personalCode)->first();
            if (!$tenant) {
                $tenant = FamilyMember::where('personal_code', $personalCode)->first();
            }
            $otpCode = rand(111111, 999999);
            $hasOtpCode = Cache::get("visitorFor{$tenant->id}");
            if (empty($hasOtpCode)){
                Cache::put("visitorFor{$tenant->id}", $otpCode);
            }

            $message  = "{$hasOtpCode} is your One time password (OTP) for Visitor access";
            Log::info($message);

            $this->sendMessage($message, $phoneNumber);

            NotificationService::notify(null, $tenant->id, 'Visitor Notification', 'Someone searched your profile');
            return view('marsland::pages.visitor_verification', ['tenant_id' => $tenant->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function verifyVisitorProcess(Request $request)
    {
        try {
            $request->validate([
                'otp_code' => 'required', // Validate OTP code input
                'tenant_id' => 'required',
            ]);

            $tenant = Tenant::findOrFail($request->tenant_id);
            if (!$tenant){
                $tenant = FamilyMember::findOrFail($request->tenant_id);
            }

            $otpCode = Cache::get("visitorFor{$tenant->id}");

            if ($request->otp_code == $otpCode) {
                return redirect()->route('tenantPublicProfile', ['id' => encrypt($tenant->id)]);
            } else {
                return redirect()->back()->with('error', __('alert.Verification failed'));
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', __('alert.Something went wrong'));
        }
    }


    public function tenantPublicProfile($id)
    {
        try {
            $tenant_id = decrypt($id);
            $tenant = Tenant::findOrFail($tenant_id);
            if (!$tenant){
                $tenant = FamilyMember::findOrFail($tenant_id);
            }
            $otpCode = Cache::get("visitorFor{$tenant->id}");
            if (!$otpCode){
                return redirect()->back()->with('error', _trans('common.The page has been expired'));
            }
            return view('marsland::pages.tenant_details', ['tenant' => $tenant]);
        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', _trans('common.Something went wrong'));
        }
    }
}
