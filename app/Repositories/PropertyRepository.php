<?php

namespace App\Repositories;

use App\Enums\PropertyStatus;
use App\Enums\Status;
use App\Models\Document;
use App\Models\Image;
use App\Models\Property\PropertyTenant;
use App\Models\PropertyDocument;
use App\Services\NotificationService;
use Illuminate\Support\Str;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PropertyInterface;
use App\Models\Property\PropertyGallery;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyLocation;
use App\Traits\CommonHelperTrait;

class PropertyRepository implements PropertyInterface{

    use CommonHelperTrait;

    private Property $model;
    private PropertyFacility $facility;
    protected $propertyDocument;
    protected $propertyStatus;

    public function __construct(Property $model, PropertyFacility $facility, PropertyDocument $propertyDocument, PropertyStatus $propertyStatus){
        $this->model = $model;
        $this->facility = $facility;
        $this->propertyDocument = $propertyDocument;
        $this->propertyStatus = $propertyStatus;
    }

    public function index($request){

        return Property::get();

    }

    public function list()
    {
       return $this->model->select('id','name')->where('status', Status::ACTIVE)->get();
    }

    public function status($request){

        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);

    }

    public function deletes($request){

        return $this->model->destroy((array)$request->ids);

    }

    public function getAll()
    {
        return Property::latest()->paginate(15);
    }

    public function getCreatedBy()
    {
        return Property::Where('user_id', Auth::id())->paginate(15);
    }

    // For Property Advertisement
    public function getActiveAll()
    {
        return Property::where('status', PropertyStatus::APPROVED)->latest()->get();
    }

    public function getActiveCreatedBy()
    {
        return Property::Where('user_id', Auth::id())
            ->where('status', PropertyStatus::APPROVED)
            ->get();
    }

    public function store($request)
    {
        try {
            $propertyStore                                       = new $this->model;
            $propertyStore->name                                 = $request->name;
            $propertyStore->slug                                 = Str::slug($request->name);
            $propertyStore->size                                 = $request->size_of_property;
            $propertyStore->bedroom                              = $request->bedroom;
            $propertyStore->bathroom                             = $request->bathroom;
            $propertyStore->rent_amount                          = $request->rent_amount;
            $propertyStore->flat_no                              = $request->flat_number;
            $propertyStore->type                                 = $request->property_type;
            $propertyStore->dining_combined                      = $request->has('drawing_dining_combined')?1:0;
            $propertyStore->vacant                               = $request->has('vacant')?'1':'0';
            $propertyStore->completion                           = $request->completion;
            $propertyStore->description                          = $request->Description;

             if($request->has('image')){
                $propertyStore->default_image                    = $this->UploadImageCreate($request->image, 'backend/uploads/properties');
             }
            $propertyStore->property_category_id                 = $request->property_category;
            $propertyStore->user_id                              = Auth::user()->id;
            $propertyStore->save();

            // Property Location
            $property_location = new PropertyLocation;
            $property_location->address = $request->address;
            $property_location->property_id = $propertyStore->id;
            $property_location->user_id = Auth::user()->id;
            $property_location->country_id = $request->country;
            $property_location->post_code = $request->post_code;
            $property_location->latitude = $request->country_id;
            $property_location->longitude = $request->longitude;
            $property_location->state_id = $request->state_id; // Assuming you have a state select field in your form
            $property_location->city_id = $request->city_id; // Assuming you have a city select field in your form

            $property_location->save();

            if($request->document){
                foreach ($request->document as $key => $doc){
                    $propertyDoc = new PropertyDocument();
                    $propertyDoc->property_id = $propertyStore->id;
                    $propertyDoc->title =  ucwords(str_replace('_',' ',$key));
                    $propertyDoc->attachment_id = $this->UploadImageCreate($doc, 'backend/uploads/properties/documents');
                    $propertyDoc->created_by = \auth()->id();
                    $propertyDoc->save();
                }
            }
            $user  = Auth::user();
            NotificationService::notify($user->id,$propertyStore->user_id,_trans('alert.A new property registed!'),$user->name.' has been added a new property');
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
                $propertyStore->completion                           = $request->completion;
                $propertyStore->description                          = $request->Description;
                if($request->has('image')){
                    $propertyStore->default_image                    = $this->UploadImageCreate($request->image, 'backend/uploads/properties')??33;
                }
                $propertyStore->property_category_id                 = $request->property_category;
                $propertyStore->user_id                              = Auth::user()->id;
                $propertyStore->save();

                if($request->document){
                    foreach ($request->document as $key => $doc){
                        $propertyDoc = new PropertyDocument();
                        $propertyDoc->property_id = $propertyStore->id;
                        $propertyDoc->title =  ucwords(str_replace('_',' ',$key));
                        $propertyDoc->attachment_id = $this->UploadImageCreate($doc, 'backend/uploads/properties')?? null;
                        $propertyDoc->created_by = \auth()->id();
                        $propertyDoc->save();
                    }
                }

                // Property Location
                $property_location                                   = PropertyLocation::where('property_id', $id)->first();
                $property_location->address                          = $request->address;
                $property_location->country_id                       = $request->country;
                $property_location->latitude                       = $request->latitude;
                $property_location->longitude                       = $request->longitude;
                if($request->state){

                    $property_location->state_id                        = $request->state;
                }
                if ($request->city) {

                    $property_location->city_id                        = $request->city;
                }


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
                return false;
            }

        }elseif($type == 'tenants'){

        }elseif($type == 'facility'){
            try {
                $property_facility                                    = new PropertyFacility();
                $property_facility->property_id                       = $id;
                $property_facility->property_facility_type_id         = $request->facility_type;
                $property_facility->content                           = $request->content;
                $property_facility->save();
                return true;
            } catch (\Throwable $th) {
                return false;
            }

        }elseif($type == 'floor_plan'){
            try {
                // if(!$request->has('image')){
                //     return back()->with('danger', _trans('alert.Image_is_required'));
                // }
                $property_gallery                                    = new PropertyGallery();
                $property_gallery->type                              = 'floor_plan';
                $property_gallery->title                             = $request->Title;
                $property_gallery->property_id                       = $id;
                $property_gallery->serial                            = $propertyStore->galleries->where('type','floor_plan')->count()+1;
                $property_gallery->image_id                          = $this->UploadImageCreate($request->image, 'backend/uploads/properties');
                $property_gallery->save();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }elseif($type == 'document'){
            $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg,pdf|max:2048'
            ]);

            try {
                $document                                    = new PropertyDocument();
                $document->title                             = $request->title;
                $document->property_id                       = $id;
                $document->attachment_id                     = $this->UploadImageCreate($request->file, 'backend/uploads/properties/documents');
                $document->created_by                        = \auth()->id() ;
                $document->save();
                return true;
            } catch (\Throwable $th) {
//                throw $th;
                return false;
            }
        }else{

        }

    }

    public function updateStatus($id, $status)
    {
        try {
            $user  = Auth::user();
            $property = $this->model->findOrFail($id);
            $property->status = $status;
            $property->save();
            NotificationService::notify($user->id,$property->user_id, 'Property '. $property->status,$property->name.' has been '.$property->status);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $property = $this->model->findOrFail($id);
            if ($property->status == PropertyStatus::APPROVED) {
                throw new \Exception('This property is already approved you can\'t delete');
            }
            PropertyTenant::where('property_id', $property->id)->delete();
            $document = PropertyDocument::where('property_id', $property->id)->first();
            if (!empty($document->attachment_id)){
                $this->UploadImageDelete($document->attachment_id);
            }
            $this->UploadImageDelete($property->default_image);

            $property->delete();

            $data['messages'] = 'Property Deleted Successfully';
            DB::commit();
            return $data;
        } catch (\Throwable $th) {
            DB::rollBack();
           throw $th;
        }
    }
    public function facilityDestroy($id)
    {
        try {
            $facility   = $this->facility->find($id);

            $facility->delete();
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
