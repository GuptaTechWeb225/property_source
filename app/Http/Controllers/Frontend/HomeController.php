<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ApprovalStatus;
use App\Enums\DealType;
use App\Enums\PropertyType;
use App\Enums\Status;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\About;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Partner;
use App\Models\HowItWork;
use App\Models\BlogReview;
use App\Models\HeroSection;
use App\Models\Testimonial;
use App\Traits\SendMessage;
use App\Utils\Utils;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyReview;

class HomeController extends Controller
{

    public function propertyMapping($properties)
    {

        return $properties->map(function ($advertise) {
            $property = $advertise->property;
            return [
                'id' => $property->id,
                'advertise_id' => $advertise->id,
                'name' => $property->name,
                'slug' => $property->slug,
                'address' => @$property->location->country->name ?? '-',
                'bedrooms' => $property->bedroom,
                'bathrooms' => $property->bathroom,
                'size' => $property->size,
                'booking_amount' => priceFormat($advertise->booking_amount),
                'price' => $this->getPrice($advertise),
                'discount_amount' => $property->discount_type == 'fixed' ? priceFormat($property->discount_amount) : $property->discount_amount . '%',
                'discount_type' => $property->discount_type,
                'rent_type' => $advertise->rent_type == 1 ? 'Monthly' : null,
                'image' => @apiAssetPath($property->defaultImage->path),
                'details_url' => route('properties.details', ['slug' => $property->slug, 'advertise_id' => $advertise->id]),
                'type' => $property->type,
                'vacant' => $property->vacant == 1 ? 'Vacant' : 'Occupied',
                'flat_no' => $property->flat_no,
                'completion' => $property->completion == 1 ? 'Ready' : 'Under Construction',
                'deal_type' => Utils::advertisementTypes()[$advertise->advertisement_type],
                'category' => @$property->category->name,
                'description' => $property->description,
                'addresses' => [
                    'id' => @$property->location->id,
                    'country' => @$property->location->country->name,
                    'division' => @$property->location->division->name,
                    'district' => @$property->location->district->name,
                    'upazila' => @$property->location->upazila->name,
                    'address' => @$property->location->address == "" ? 'no data' : @$property->location->address,
                ]
            ];
        });
    }

    public function getPrice($advertise)
    {
        $amount = 0;
        if ($advertise->advertisement_type == DealType::RENT) {
            $amount = $advertise->rent_amount;

        } elseif ($advertise->advertisement_type == DealType::SELL) {
            $amount = $advertise->sell_amount;
        } elseif ($advertise->advertisement_type == DealType::MORTGAGE) {
            $amount = $advertise->mortgage_amount;
        } elseif ($advertise->advertisement_type == DealType::LEASE) {
            $amount = $advertise->lease_amount;
        }

        return $amount;
    }

    public function index()
    {
        $data['title'] = 'Home';
        $hero_banners = HeroSection::with('image:id,path')->where('status', 1)->select('id', 'title', 'highlight_title_one', 'btn_one', 'image_id', 'status', 'description')->get();

//        $propertyQuery = Advertisement::query()
//            ->with('property')
//            ->where('approval_status', ApprovalStatus::APPROVED)
//            ->where('status', 1);

        $propertyQuery = Advertisement::with('property')
            ->where('status', 1)
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->whereDoesntHave('orders', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            });

        $allProperties = $propertyQuery->get();

        $data['sellProperties'] = $this->propertyMapping($allProperties->where('advertisement_type', DealType::SELL));
        $data['rentProperties'] = $this->propertyMapping($allProperties->where('advertisement_type', DealType::RENT));

        // Use filter method to get commercial properties
        $data['commertialProperties'] = $this->propertyMapping(
            $allProperties->filter(function ($property) {
                return $property->property->type === PropertyType::COMMERCIAL;
            })
        );


        $data['partners'] = Partner::where('status', 1)->limit(10)->get();;

        $data['how_it_works'] = HowItWork::where('status', 1)->get();

        $data['sliders'] = $hero_banners->map(function ($slider) {
            return [
                'id' => $slider->id,
                'title' => $slider->title,
                'highlight_title_one' => $slider->highlight_title_one,
                'btn_one' => $slider->btn_one,
                'imageURL' => globalAsset($slider->image->path),
                'description' => $slider->description,
            ];
        });


        $data['features'] = Feature::with('icon')->select('id', 'title', 'description', 'icon_id')->limit(3)->latest()->get();

        $data['testimonials'] = Testimonial::latest()
            ->select('id', 'name', 'designation', 'message', 'image_id', 'status')
            ->where('status', Status::ACTIVE)
            ->limit(5)
            ->get();

        return view('frontend.home', compact('data'));
    }

    public function orderTracking()
    {
        return view('frontend.order.order_tracking');
    }

    public function properties()
    {
        $data['title'] = 'Properties';
        $data['keyword'] = 'All';
        return view('frontend.property.index', compact('data'));
    }

    public function categoryWiseProperties($slug)
    {
        $category = PropertyCategory::where('slug', $slug)->first();
        $data['title'] = 'Properties of ' . $category->name;
        $data['keyword'] = $category->name;
        $data['category'] = $category;
        // $data['properties'] = $category->properties()->where('status',1)->get();
        $data['properties'] = Property::paginate(9);
        return view('frontend.property.index', compact('data'));
    }

    public function blogs()
    {
        $data['title'] = 'Blogs';
        $data['categories'] = BlogCategory::where('status', 1)->get();

        // Blogs Start
        $blogs = Blog::with('image:id,path')->where('status', 1)->select('id', 'title', 'content', 'image_id', 'created_at', 'category_id', 'slug')->orderBy('created_at', 'desc')->paginate(9);
        $data['blogs'] = $blogs->map(function ($blogs) {
            return [
                'id' => $blogs->id,
                'title' => $blogs->title,
                'content' => Str::limit($blogs->content, 100),
                'image' => $blogs->image->path,
                'created_at' => date('F d, Y', strtotime($blogs->created_at)),
                'category' => $blogs->category->title,
                'slug' => $blogs->slug,
            ];
        });
        // Blogs End

        // Recent Blogs Start
        $blogs = Blog::where('status', 1)->select('id', 'title', 'created_at', 'category_id', 'slug')->orderBy('created_at', 'desc')->paginate(3);
        $data['recent_blogs'] = $blogs->map(function ($blogs) {
            return [
                'id' => $blogs->id,
                'title' => str::limit($blogs->title, 30),
                'created_at' => date('F d, Y', strtotime($blogs->created_at)),
                'category' => $blogs->category->title,
                'slug' => $blogs->slug,
            ];
        });
        // Recent Blogs End


        return view('frontend.blog.index', compact('data'));
    }

    public function terms()
    {
        return view('frontend.terms_condition');
    }

    public function blogDetails($slug)
    {
        $data['title'] = 'Blog Details';
        $data['categories'] = BlogCategory::where('status', 1)->get();

        // Blog Details Start
        $blog = Blog::with('image:id,path')->where('slug', $slug)->select('id', 'title', 'content', 'image_id', 'created_at', 'category_id', 'slug', 'tags')->first();
        $data['blog_details'] = [
            'id' => $blog->id,
            'title' => $blog->title,
            'content' => $blog->content,
            'image' => $blog->image->path,
            'created_at' => date('F d, Y', strtotime($blog->created_at)),
            'category' => $blog->category->title,
            'slug' => $blog->slug,
            'tags' => $blog->tags,
        ];
        // Blog Details End

        // Recent Blogs Start
        $blogs = Blog::where('status', 1)->select('id', 'title', 'created_at', 'category_id', 'slug')->orderBy('created_at', 'desc')->paginate(3);
        $data['blogs'] = $blogs->map(function ($blogs) {
            return [
                'id' => $blogs->id,
                'title' => str::limit($blogs->title, 30),
                'created_at' => date('F d, Y', strtotime($blogs->created_at)),
                'category' => $blogs->category->title,
                'slug' => $blogs->slug,
            ];
        });
        // Recent Blogs End

        // Blog Reviews Start
        $data['blog_reviews'] = BlogReview::where('blog_id', $blog->id)->get();
        // Blog Reviews End

        return view('frontend.blog.details', compact('data'));
    }

    public function blogReview(Request $request, $blogId)
    {

        // Validate the input fields
        if (Auth::check()) {
            $validatedData = $request->validate([
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ]);
        }

        $blogReview = new BlogReview();

        if (Auth::check()) {
            // User is logged in, retrieve name and email from authenticated user
            $user = Auth::user();
            $blogReview->name = $user->name;
            $blogReview->email = $user->email;
        } else {
            // User is not logged in, use the values from the request
            $blogReview->name = $request->name;
            $blogReview->email = $request->email;
        }

        $blogReview->blog_id = $blogId; // Set the blog ID
        $blogReview->comments = $validatedData['comments'];
        $blogReview->ratings = $validatedData['ratings'];
        $blogReview->save();

        // Redirect or perform other actions after saving the review

        return redirect()->back()->with('success', 'Review posted successfully!');

    }

    public function faq()
    {
        $data['faqs'] = Faq::select('id', 'title', 'description', 'status', 'serial')->where('status', 'active')->orderBy('serial', 'asc')->get();
        return view('frontend.faq')->with($data);
    }

    public function error()
    {
        return view('frontend.error');
    }

    public function propertyDetails(Request $request)
    {
        try {
            $slug = $request->input('slug');
            $property = Property::with(['facilities', 'wishlist'])->where('slug', $slug)->first();
            $id = $property->id;
            $data['advertisement'] = Advertisement::find($request->input('advertise_id'));
            if ($property == null) {
                return redirect()->route('home');
            }
            $data['property'] = [
                'id' => @$property->id,
                'advertise_id' => @$data['advertisement']->id,
                'name' => @$property->name,
                'slug' => @$property->slug,
                'image' => globalAsset(@$property->defaultImage->path),
                'deal_type' => Utils::advertisementTypes()[$data['advertisement']->advertisement_type],
                'type' => @$property->type == 1 ? 'Commercial' : 'Residential',
                'completion' => @$property->completion == 1 ? 'Completed' : 'Under Construction',
                'total_unit' => @$property->total_unit,
                'total_occupied' => @$property->total_occupied,
                'total_rent' => @$property->total_rent,
                'total_sell' => @$property->total_sell,
                'size' => @$property->size,
                'dining_combined' => @$property->dining_combined,
                'bedroom' => @$property->bedroom,
                'bathroom' => @$property->bathroom,
                'rent_type' => @$data['advertisement']->rent_type == 1 ? 'Monthly' : null,
                'rent_amount' => $this->getPrice($data['advertisement']),
                'price' => $this->getPrice($data['advertisement']),
                'discount_amount' => $property->discount_amount,
                'discount_type' => $property->discount_type,
                'booking_amount' => @$data['advertisement']->booking_amount,
                'flat_no' => $property->flat_no,
                'description' => $property->description,
                'category' => @$property->category->name,
                'user_email' => @$property->user->email,
                'user_phone' => @$property->user->phone,
                'wishlist' => @$property->wishlist,
            ];
            $data['address'] = [
                'id' => @$property->location->id,
                'country' => @$property->location->country->name,
                'latitude' => @$property->location->latitude,
                'longitude' => @$property->location->longitude,
                'address' => @$property->location->address == "" ? 'no data' : @$property->location->address,
            ];

            $data['galleries'] = @$property->galleries->where('type', 'gallery')->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->title,
                    'image' => globalAsset($item->image->path),
                ];
            });
            $data['floorPlans'] = @$property->floorPlans->where('type', 'floor_plan')->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->title,
                    'image' => globalAsset($item->image->path),
                ];
            });
            $data['transactions'] = [];
            $data['rentals'] = $property->rentals;
            $data['user'] = $property->user;

            $data['tenants'] = $property->tenants->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'name' => @$data->user->name,
                    'email' => @$data->user->email,
                    'phone' => @$data->user->phone,
                    'photo' => @$data->user->image->path,
                    'created_at' => @$data->created_at,
                    'address' => @$data->user->state . ' | ' . $data->user->city . ' | ' . $data->user->zip_code,
                ];
            });
            $data['facilities'] = $property->facilities->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => @$item->type->name,
                    'content' => @$item->content,
                    'icon' => globalAsset(@$item->type->image->path),
                ];
            });
            $data['category'] = [
                'id' => @$property->category->id,
                'name' => @$property->category->name,
            ];
            $data['document'] = $property->documents;


            // Property Reviews Start
            $data['property_reviews'] = PropertyReview::where('property_id', $id)->get();
            $data['ratting'][1] = PropertyReview::where('property_id', $id)->where('ratings', 1)->count();
            $data['ratting'][1] = $data['ratting'][1] == 0 ? 0 : floor(($data['ratting'][1] / $data['property_reviews']->count()) * 100);

            $data['ratting'][2] = PropertyReview::where('property_id', $id)->where('ratings', 2)->count();
            $data['ratting'][2] = $data['ratting'][2] == 0 ? 0 : floor(($data['ratting'][2] / $data['property_reviews']->count()) * 100);

            $data['ratting'][3] = PropertyReview::where('property_id', $id)->where('ratings', 3)->count();
            $data['ratting'][3] = $data['ratting'][3] == 0 ? 0 : floor(($data['ratting'][3] / $data['property_reviews']->count()) * 100);

            $data['ratting'][4] = PropertyReview::where('property_id', $id)->where('ratings', 4)->count();
            $data['ratting'][4] = $data['ratting'][4] == 0 ? 0 : floor(($data['ratting'][4] / $data['property_reviews']->count()) * 100);

            $data['ratting'][5] = PropertyReview::where('property_id', $id)->where('ratings', 5)->count();
            $data['ratting'][5] = $data['ratting'][5] == 0 ? 0 : floor(($data['ratting'][5] / $data['property_reviews']->count()) * 100);

            $data['agvRating'] = PropertyReview::where('property_id', $id)->sum('ratings') == 0 ? 0 : floor(PropertyReview::where('property_id', $id)->sum('ratings') / $data['property_reviews']->count());
            return view('frontend.property.details')->with($data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }

    public function propertyReview(Request $request, $id)
    {

        // Validate the input fields
        if (Auth::check()) {
            $validatedData = $request->validate([
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ]);
        }

        $blogReview = new PropertyReview();

        if (Auth::check()) {
            // User is logged in, retrieve name and email from authenticated user
            $user = Auth::user();
            $blogReview->name = $user->name;
            $blogReview->email = $user->email;
        } else {
            // User is not logged in, use the values from the request
            $blogReview->name = $request->name;
            $blogReview->email = $request->email;
        }

        $blogReview->property_id = $id; // Set the blog ID
        $blogReview->comments = $validatedData['comments'];
        $blogReview->ratings = $validatedData['ratings'];
        $blogReview->save();

        // Redirect or perform other actions after saving the review

        return redirect()->back()->with('success', 'Review posted successfully!');

    }

    public function frontendDAshboard()
    {
        return view('frontend.frontend_dashboard');
    }

    public function privacy()
    {
        return view('frontend.privacy_policy');
    }

    public function uploadProperty(Request $request)
    {
        $auth = Auth::user();
        if (auth()->check()) {
            if ($auth->role_id != 4) {
                return redirect()->back()->with('warning', _trans('alert.Please log in as a Landlord'));
            }
        }
        return redirect()->route('login');
    }


    public function getProperties()
    {
        $properties = Advertisement::with('property:id,name')
            ->where('status', 1)
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->whereDoesntHave('orders', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            })->get()
            ->pluck('property');

        return response()->json($properties);
    }


    public function propertyOwnerForm(Request $request) {
        return view('frontend.property_owner_form');
    }
}
