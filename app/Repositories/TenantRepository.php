<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Order;
use App\Models\Tenant;
use App\Traits\CommonHelperTrait;
use App\Interfaces\TenantInterface;
use Illuminate\Support\Facades\Hash;

class TenantRepository implements TenantInterface
{
    use CommonHelperTrait;

    protected $model;
    protected $role_id = 5;

    public function __construct(Tenant $model)
    {
        $this->model = $model;
    }


    public function model()
    {
        return $this->model;
    }

    public function index($request)
    {

        return $this->model->get();

    }

    public function getPaginateData($request)
    {
        $limit = $request->input('limit', 10);
        return $this->model->when($request->name, function () use ($request) {
            return $this->model->where('name', 'like', '%' . $request->name . '%');
        })->latest()->paginate($limit);
    }

    public function status($request)
    {

        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);

    }

    public function deletes($request)
    {

        return $this->model->destroy((array)$request->ids);

    }

    public function getAll()
    {
//        $orders = Order::
        return $this->model->where('role_id', $this->role_id)->latest()->paginate(10);
    }

    public function store($request)
    {
        try {
            $tenant = new Tenant();
            $tenant->role_id = $this->role_id;
            $tenant->name = $request->name;
            $tenant->email = $request->email;
            $tenant->phone = $request->phone;
            $tenant->password = Hash::make($request->password);
            $tenant->confirm_password = Hash::make($request->password_confirmation);
            $tenant->country_id = $request->country_id;
            $tenant->state_id = $request->state_id;
            $tenant->city_id = $request->city_id;
            $tenant->zip_code = $request->zip_code;
            $tenant->address = $request->address;
            $tenant->created_by = auth()->id() ?? null;

            if ($request->has('image')) {
                $tenant->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/tenant');
            }

            $tenant->save();
            return true;
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }


    public function update($request, $id)
    {
        try {
            $tenant = $this->model->find($id);
            $tenant->role_id = $this->role_id;
            $tenant->name = $request->name;
            $tenant->email = $request->email;
            $tenant->phone = $request->phone;
            $tenant->alt_phone = $request->alt_phone;
            $tenant->institution = $request->institution;
            $tenant->occupation = $request->occupation;
            $tenant->designation_id = $request->designation_id;
            $tenant->date_of_birth = $request->date_of_birth;
            $tenant->gender = $request->gender;
            $tenant->blood_group = $request->blood_group;
            $tenant->nationality = $request->nationality;
            $tenant->nid = $request->nid;
            $tenant->passport = $request->passport;
            $tenant->join_date = $request->join_date;

            $tenant->country_id = $request->country_id;
            $tenant->state_id = $request->state_id;
            $tenant->city_id = $request->city_id;
            $tenant->zip_code = $request->zip_code;
            $tenant->address = $request->address;

            $tenant->per_country_id = $request->per_country_id;
            $tenant->per_state_id = $request->per_state_id;
            $tenant->per_city_id = $request->per_city_id;
            $tenant->per_zip_code = $request->per_zip_code;
            $tenant->per_address = $request->per_address;

            $tenant->status = $request->input('status', 1);

            $tenant->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/tenant', $tenant->image_id);
            $tenant->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $tenant = $this->model->find($id);
//            $this->UploadImageDelete($tenant->image_id); // delete image & record
            $tenant->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
