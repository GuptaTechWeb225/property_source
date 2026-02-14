<?php

namespace App\Http\Controllers\Backend;

use App\Enums\PropertyStatus;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\PropertyDocument;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PropertyInterface;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Models\Property\PropertyTenant;
use Illuminate\Support\Facades\Storage;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyLocation;
use App\Models\Property\PropertyFacilityType;
use App\Http\Requests\Property\PropertyStoreRequest;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    private $property;
    private $permission;

    public function __construct(PropertyInterface $propertyInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->property = $propertyInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {
        $data['title'] = _trans('common.property');
        $data['property'] = (Auth::user()->role_id == 1) ? $this->property->getAll() : $this->property->getCreatedBy();
        return view('backend.property.index', compact('data'));
    }

    public function create()
    {


        $cacheKey = 'property_data'; // Define a cache key

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            // Retrieve data from cache
            $data = Cache::get($cacheKey);
        } else {
            // Fetch data from the database or perform expensive operation
            $data['title'] = _trans('common.create_property');
            $data['property_categories'] = PropertyCategory::all();
            $data['property_facilities'] = PropertyFacilityType::all();
            $data['property_categories'] = PropertyCategory::all();
            $data['countries'] = Country::all();
            $data['permissions'] = $this->permission->all();

            // Store the data in the cache
            Cache::put($cacheKey, $data, 60); // You can set an optional expiration time if needed
        }

        return view('backend.property.create', compact('data'));
    }


    public function store(PropertyStoreRequest $request)
    {
        $result = $this->property->store($request);
        if ($result) {
            return redirect()->route('properties.index')->with('success', _trans('alert.property_created_successfully'));
        }
        return redirect()->route('properties.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['property_categories'] = PropertyCategory::all();
        $data['property'] = $this->property->show($id);
        $data['title'] = _trans('common.properties');
        $data['permissions'] = $this->permission->all();
        return view('backend.property.edit', compact('data'));
    }

    public function update(Request $request, $id, $type)
    {
        $result = $this->property->update($request, $id, $type);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.Updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function updateStatus($id, $status)
    {
        try {
            if (!isSuperAdmin()) {
                return redirect()->back()->with('danger', _trans('alert.You are not eligible to update this'));
            }
            $result = $this->property->updateStatus($id, $status);
            if ($result) {
                return redirect()->back()->with('success', _trans('alert.Updated_successfully'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function delete($id)
    {
        try {
            $data = $this->property->destroy($id);
            $success[0] = $data['messages'];
            $success[1] = "Success";
            $success[2] = "Deleted";
            return response()->json($success);
        } catch (\Exception $e) {
            $success[0] = $e->getMessage();
            $success[1] = 'error';
            $success[2] = "oops";
            return response()->json($success);
        }
    }


    public function details($id)
    {
        $data['title'] = "Details";
        $data['property'] = Property::find($id);

        return view('backend.property.details', compact('data'));
    }
    public function detailsType($id, $type)
    {
        $data['title'] = "Details";
        $data['property'] = Property::find($id);
        $data['property_categories'] = PropertyCategory::all();
        $data['property_location'] = PropertyLocation::where('property_id', $id)->first();
        $data['state'] = State::where('country_id', $data['property']->location->country_id)->get();
        $data['city'] = City::where('state_id', $data['property']->location->state_id)->get();
        $data['countries'] = Country::all();

        switch ($type) {
            case 'basicInfo':
                $data['title'] = 'Basic Info';
                return view('backend.property.basicInfo', compact('data'));
                break;

            case 'gallery':
                $data['title'] = 'Gallery';
                $data['galleries'] = $data['property']->galleries->where('type', 'gallery');
                return view('backend.property.Gallery', compact('data'));
                break;
            case 'tenant':
                $data['title'] = 'Tenant';
                $data['tenants'] = PropertyTenant::where('property_id', $id)->whereDate('end_date', '>', now())->get();
                $tenants_old = PropertyTenant::where('property_id', $id)->whereDate('end_date', '<', now());
                if (request()->search) {
                    $tenants_old = $tenants_old->whereHas('user', function ($query) {
                        $query->where('name', 'LIKE', '%' . request()->search . '%');
                    });
                }
                if (request()->date_from && request()->date_to) {
                    $tenants_old = $tenants_old->whereBetween('end_date', [request()->date_from, request()->date_to]);
                }
                $data['tenants_old'] = $tenants_old->get();
                return view('backend.property.Tenant', compact('data'));
                break;

            case 'facility':
                $data['title'] = 'Facility';
                $data['property'] = Property::find($id);
                $data['facilities'] = PropertyFacility::where('property_id', $id)->get();
                $data['type'] = PropertyFacilityType::all();
                return view('backend.property.Facility', compact('data'));
                break;

            case 'floorPlan':
                $data['title'] = 'FloorPlan';
                $data['floorPlans'] = $data['property']->floorPlans->where('type', 'floor_plan');
                return view('backend.property.FloorPlan', compact('data'));
                break;

            case 'documents':
                $data['title'] = 'Property Documents';
                $data['documents'] = $data['property']->documents;
                return view('backend.property.documents', compact('data'));
                break;
        }
    }


    public function deleteImage($id)
    {
        $result = $this->property->deleteImage($id);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.image_deleted_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function facilityDelete($id)
    {
        $result = $this->property->facilityDestroy($id);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.Facility Delete Successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function getStates($countryId)
    {

        $states = State::where('country_id', $countryId)->get();

        return response()->json(['states' => $states]);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();

        return response()->json(['cities' => $cities]);
    }



    public function changeDocStatus(Request $request)
    {
        try {
            $document = PropertyDocument::find($request->id);

            if ($document) {
                $document->status = $request->status;
                $document->updated_by = auth()->id();
                $document->note = $request->status == 2 ? $request->note : '';
                $document->update();

                if ($request->status == 0) {
                    $title = _trans('alert.Document Pending');
                    $message = _trans('alert.Document Status Changes As Pending');
                } elseif ($request->status == 1) {
                    $title = _trans('alert.Document Approved');
                    $message = _trans('alert.Document Status Changes As Approved');
                } else {
                    $title = _trans('alert.Document Rejected');
                    $message = $document->note;
                }

                NotificationService::notify($document->property->user, $title, $message);

                if ($request->ajax()) {
                    return response()->json([
                        'status'    => true,
                        'message'   => _trans('alert.status_changes_successfully'),
                        'data'      => 'Updated'
                    ]);
                } else {
                    return redirect()->back()->with('success', _trans('alert.status_changes_successfully'));
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 0,
                'message'   => _trans('alert.Something went wrong'),
                'data'      => []
            ]);
        }
    }


    public function verifyProperty($id)
    {
        $data['property'] = $this->property->show($id);

        if(Auth::user()->role_id == 1 ||  ($data['property']->user_id == Auth::id() && is_null($data['property']->video_verification))){
            return view('backend.property.verify', $data);
        }elseif($data['property']->user_id == Auth::id() && $data['property']->video_verification){
            return redirect()->route('admin.properties.details', [$id, 'documents'])->with('warning', _trans('alert.Video Already Submitted'));
        }
        else{
            abort(403);
        }

    }


    public function uploadVideo(Request  $request, $id)
    {
        try {
            $property = $this->property->show($id);
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $fileName = Str::slug($property->name).rand(2,5).'_video_verification.'. $video->getClientOriginalExtension();

                // Store the video in the public/uploads/videos directory
                $video->move(public_path('uploads/videos'), $fileName);
                $property->video_verification = 'public/uploads/videos/'. $fileName;
                $property->save();
                return response()->json(['success' => true, 'message' => 'Video uploaded successfully']);
            }

            return response()->json(['success' => false, 'message' => 'No video file found']);
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


    public function verifyVideo($id , $status){

        $property = $this->property->show($id);
        if($property){
            $property->video_verification_status = $status;
            $property->save();
            return redirect()->back()->with('success', _trans('alert.status_changes_successfully'));
        }
    }
}
