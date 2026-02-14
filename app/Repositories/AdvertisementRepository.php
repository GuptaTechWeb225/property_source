<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\PropertyStatus;
use App\Services\NotificationService;
use App\Services\PropertyStatusService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use App\Interfaces\BlogsInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use App\Models\Property\PropertyGallery;
use App\Models\Property\PropertyLocation;
use App\Interfaces\AdvertisementInterface;

class AdvertisementRepository implements AdvertisementInterface{

    use CommonHelperTrait;
    private Advertisement $model;

    protected $statusService;
    public function __construct(Advertisement $model, PropertyStatusService $propertyStatusService){
        $this->model = $model;
        $this->statusService = $propertyStatusService;
    }

    public function index($request){

        return Advertisement::all();

    }

    public function status($request){

        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);

    }

    public function deletes($request){

        return $this->model->destroy((array)$request->ids);

    }

    public function getAll()
    {
        return Advertisement::with('property')->latest()->paginate(15);
    }

    public function getCreatedBy()
    {
        return Advertisement::Where('user_id', Auth::id())->paginate(15);
    }

    public function getdByPropertyOwner()
    {
        return Advertisement::Where('user_id', Auth::id())->paginate(15);
    }

    public function store($request)
    {

        try {
            DB::beginTransaction();
            $propertyCreator     = Property::where('id',$request->property_id)->first()->user_id ?? null;
            $advertisementStore                                       = new $this->model;
            $advertisementStore->advertisement_type                   = $request->advertisement_type;
            $advertisementStore->user_id                              = Auth::id();
            $advertisementStore->property_id                          = $request->property_id;
            $advertisementStore->property_creator_id                  = @$propertyCreator;
            $advertisementStore->booking_amount                       = $request->booking_amount;
            $advertisementStore->rent_amount                          = $request->rent_amount;
            $advertisementStore->sell_amount                          = $request->sell_amount;
            $advertisementStore->rent_type                            = $request->rent_type;
            $advertisementStore->rent_start_date                      = $request->rent_start_date;
            $advertisementStore->sell_start_date                      = $request->sell_start_date;
            $advertisementStore->rent_end_date                        = $request->rent_end_date;
            $advertisementStore->terms_condition                      = $request->terms_condition;
            $advertisementStore->status                               = $request->status;
            $advertisementStore->negotiable                           = $request->negotiable;

            $advertisementStore->max_member                           = $request->max_member;

            $advertisementStore->mortgage_duration                    = $request->mortgage_duration;
            $advertisementStore->mortgage_amount                      = $request->mortgage_amount;

            $advertisementStore->lease_duration                        = $request->lease_duration;
            $advertisementStore->lease_amount                          = $request->lease_amount;
            $advertisementStore->caretaker_duration                    = $request->caretaker_duration;


            $advertisementStore->save();

            $this->statusService->updatePropertyStatus($advertisementStore->property_id,$advertisementStore,'available',true);
            $title = "Property Advertisement Created";
            $message = "Created an advertisement for your property. Potential tenants or buyers can now discover and inquire about your property. Make sure to provide detailed information and attractive visuals to attract the right audience.";
            NotificationService::notify(Auth::id(),$propertyCreator, $title, $message );
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }



    public function update($request, $id, $type)
    {
        $propertyStore                                       = $this->model->find($id);
        if($type == 'basicInfo'){
            try {
                $propertyStore->name                                 = $request->name;
                $propertyStore->size                                 = $request->size_of_property;
                $propertyStore->bedroom                              = $request->bedroom;
                $propertyStore->bathroom                             = $request->bathroom;
                $propertyStore->rent_amount                          = $request->rent_price;
                $propertyStore->flat_no                              = $request->Flat_Number;
                $propertyStore->type                                 = $request->property_type;
                $propertyStore->dining_combined                      = $request->has('drawing_dining_combined')?1:0;
                $propertyStore->vacant                               = $request->has('vacant')?'1':'0';
                $propertyStore->status                               = $request->status;
                $propertyStore->completion                           = $request->completion;
                $propertyStore->description                          = $request->Description;
                if($request->has('image')){
                    $propertyStore->default_image                    = $this->UploadImageCreate($request->image, 'backend/uploads/properties')??33;
                }
                $propertyStore->property_category_id                 = $request->property_category;
                $propertyStore->user_id                              = Auth::user()->id;
                $propertyStore->save();

                // Property Location
                $property_location                                   = PropertyLocation::where('property_id', $id)->first();
                $property_location->address                          = $request->address;
                $property_location->country_id                       = $request->country;
                $property_location->division_id                      = $request->division;
                $property_location->district_id                      = $request->district;
                $property_location->upazila_id                       = $request->upazila;
                $property_location->save();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }elseif($type == 'gallery'){
            try {
                $property_gallery                                    = new PropertyGallery();
                $property_gallery->type                              = 'gallery';
                $property_gallery->title                             = $request->Title;
                $property_gallery->property_id                       = $id;
                $property_gallery->serial                            = $propertyStore->galleries->where('type','gallery')->count()+1;
                $property_gallery->image_id                          = $this->UploadImageCreate($request->image, 'backend/uploads/properties');
                $property_gallery->save();
                return true;
            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }

        }elseif($type == 'tenants'){

        }elseif($type == 'facilities'){

        }elseif($type == 'floor_plan'){
            try {
                $property_gallery                                    = new PropertyGallery();
                $property_gallery->type                              = 'floor_plan';
                $property_gallery->title                             = $request->Title;
                $property_gallery->property_id                       = $id;
                $property_gallery->serial                            = $propertyStore->galleries->where('type','floor_plan')->count()+1;
                $property_gallery->image_id                          = $this->UploadImageCreate($request->image, 'backend/uploads/properties');
                $property_gallery->save();
                return true;
            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }
        }else{

        }

    }

    public function destroy($id)
    {
        try {
            $propertyDestroy   = $this->model->find($id);
            $propertyDestroy->propertyStatus()->update(['is_active' => false]);
            $propertyDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function approvalStatus($id, $type)
    {
        try {
            $AdvertisementApprove                       = $this->model->find($id);
            $AdvertisementApprove->approval_status      = ($type == 'approve') ? 1 : 3;
            $AdvertisementApprove->status               = ($type == 'approve') ? 1 : 0;
            $AdvertisementApprove->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function deleteImage($id){
        try {
            $this->UploadImageDelete($id);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
}
