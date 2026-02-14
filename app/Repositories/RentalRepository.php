<?php

namespace App\Repositories;

use App\Models\Rental;
use App\Traits\CommonHelperTrait;
use App\Interfaces\RentalInterface;

class RentalRepository implements RentalInterface{
    use CommonHelperTrait;
    private Rental $model;

    public function __construct(Rental $model){
        $this->model = $model;
    }

    public function index($request){

        return Rental::all();

    }

    public function status($request){

        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);

    }

    public function deletes($request){

        return $this->model->destroy((array)$request->ids);

    }

    public function getAll()
    {
        return Rental::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $propertyStore                       = new $this->model;
            $propertyStore->name                 = $request->name;
            $propertyStore->email                = $request->email;
            $propertyStore->phone                = $request->phone;
            $propertyStore->permanent_address    = $request->permanent_address;
            $propertyStore->city                 = $request->city;
            $propertyStore->state                = $request->state;
            $propertyStore->zip_code             = $request->zip_code;
            $propertyStore->occupation           = $request->occupation;
            $propertyStore->designation          = $request->designation;
            $propertyStore->nid                  = $request->nid;
            $propertyStore->passport             = $request->passport;
            $propertyStore->status               = $request->status;
            $propertyStore->image_id             = $this->UploadImageCreate($request->image, 'backend/uploads/properties');
            $propertyStore->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }


    public function update($request, $id)
    {
        try {
            $propertyUpdate                       = new $this->model;
            $propertyUpdate->name                 = $request->name;
            $propertyUpdate->email                = $request->email;
            $propertyUpdate->phone                = $request->phone;
            $propertyUpdate->permanent_address    = $request->permanent_address;
            $propertyUpdate->city                 = $request->city;
            $propertyUpdate->state                = $request->state;
            $propertyUpdate->zip_code             = $request->zip_code;
            $propertyUpdate->occupation           = $request->occupation;
            $propertyUpdate->designation          = $request->designation;
            $propertyUpdate->nid                  = $request->nid;
            $propertyUpdate->passport             = $request->passport;
            $propertyUpdate->status               = $request->status;
            $propertyUpdate->image_id             = $this->UploadImageUpdate($request->image, 'backend/uploads/properties',$propertyUpdate->image_id);
            $propertyUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $propertyDestroy   = $this->model->find($id);
            $this->UploadImageDelete($propertyDestroy->image_id); // delete image & record
            $propertyDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function rentalDetailsStore($request, $id, $type){
        try {
            $rentalDetailsUpdate                       = $this->model->findOrfail($id);
            $rentalDetailsUpdate->property->name       = $request->name;
            $rentalDetailsUpdate->move_in              = $request->move_in;
            $rentalDetailsUpdate->move_out             = $request->move_out;
            $rentalDetailsUpdate->rent_amount          = $request->rent_amount;
            $rentalDetailsUpdate->rent_type            = $request->rent_type;
            $rentalDetailsUpdate->rent_for             = $request->rent_for;
            $rentalDetailsUpdate->reminder_date        = $request->reminder_date;
            $rentalDetailsUpdate->note                 = $request->note;

            $rentalDetailsUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

}
?>
