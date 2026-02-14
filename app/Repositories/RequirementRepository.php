<?php


namespace App\Repositories;


use App\Interfaces\RequirementInterface;
use App\Models\Requirement;
use Illuminate\Support\Facades\Auth;

class RequirementRepository implements RequirementInterface
{
    protected $model;
    public function __construct(Requirement $requirement)
    {
        $this->model =  $requirement;
    }

    public function index()
    {
        $user_id  =  Auth::id();
        return $this->model->where('user_id', $user_id)->first();
    }

    public function getRequirement()
    {
        $user_id  =  Auth::id();
        return $this->model->where('user_id', $user_id)->first();
    }


    public function show($id)
    {

    }

    public function store($request)
    {

    }

    public function update($request)
    {
        try {
            $user_id  =  Auth::id();
            $requirement  = $this->model->where('user_id', $user_id)->first();
            if ($requirement){
                $requirement->min_price = $request->min_price;
                $requirement->max_price = $request->max_price;
                $requirement->post_code = $request->post_code;
                $requirement->city = $request->city;
                $requirement->radius = $request->radius;
                $requirement->purpose = $request->purpose;
                $requirement->property_category_id = $request->property_category_id;
                $requirement->save();
            }else{
                $requirement = new Requirement();
                $requirement->user_id = $user_id;
                $requirement->min_price = $request->min_price;
                $requirement->max_price = $request->max_price;
                $requirement->post_code = $request->post_code;
                $requirement->city = $request->city;
                $requirement->radius = $request->radius;
                $requirement->purpose = $request->purpose;
                $requirement->property_category_id = $request->property_category_id;
                $requirement->save();
            }
            return true;
        }catch (\Exception $e) {
            throw  $e;
        }
    }

    public function destroy($id)
    {

    }
}
