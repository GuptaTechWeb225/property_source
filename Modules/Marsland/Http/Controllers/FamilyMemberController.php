<?php

namespace Modules\Marsland\Http\Controllers;

use App\Models\Advertisement;
use App\Models\OrderDetail;
use App\Models\User;
use App\Services\NotificationService;
use App\Traits\CommonHelperTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Marsland\Entities\FamilyMember;

class FamilyMemberController extends Controller
{

    use CommonHelperTrait;

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $orderDetails = OrderDetail::with('advertisement')->findOrFail($id);
        $data['order_details_id'] = encrypt($id);
        $data['max_member'] = @$orderDetails->advertisement->max_member;
        $data['title'] = _trans('common.Add family members');
        return view('marsland::customer.order.member_form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $orderId = $request->input('order_details_id');
            $orderDetails = OrderDetail::with('property', 'advertisement')->findOrFail($orderId);
            $property = @$orderDetails->property;
            $tenant = auth()->user();
            $existingMembersCount = FamilyMember::count();
            $maxMembers = @$orderDetails->advertisement->max_member;
            $data = $request->except('_token');
            if ($request->hasFile('photo')) {
                $data['photo_id'] = $this->uploadImageCreate($request->photo, 'family-member');
            }

            if ($request->hasFile('document')) {
                $data['document_id'] = $this->uploadImageCreate($request->document, 'family-member');
            }

            $data['order_details_id'] = $orderDetails->id;
            $data['property_id'] = $orderDetails->property_id;
            $data['tenant_id'] = $tenant->id;
            if ($existingMembersCount >= $maxMembers) {
                $data['status'] = false;
                session()->flash('max_member_warning', 'You have reached the maximum allowed members. Further additions will not be restricted, but please be aware of the limit.');
            }

            $member = FamilyMember::create($data);

            NotificationService::notify($tenant->id, $property->user_id, "New Family Member Added by $tenant->name", "View Family Member Document " . '<a target="_blank" class="text-decoration-underline text-primary" href="' . @globalAsset($member->document->path) . '"> Click here.</a>');

            DB::commit();
            return redirect()->back()->with('success', _trans('alert.Successfully added!'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('danger', _trans('alert.Something went wrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $member = FamilyMember::findOrFail($id);
            $this->UploadImageDelete($member->photo_id);
            $this->UploadImageDelete($member->document_id);
            $member->delete();
            return redirect()->back()->with('success', _trans('alert.Successfully deleted!'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('danger', _trans('alert.Something went wrong'));
        }
    }


    public function generatePersonalCode()
    {
        do {
            $uniqueId = uniqid('', false);
            $digits = preg_replace('/[^0-9]/', '', $uniqueId);
            $generatedCode = substr($digits, 0, 6);
            $prefix = 'G-';
            $finalCode = $prefix . $generatedCode;
            $existingUser = FamilyMember::where('personal_code', $finalCode)->first();
        } while ($existingUser);

        return response()->json($finalCode, 200);
    }

}
