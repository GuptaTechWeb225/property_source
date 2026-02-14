<?php

namespace App\Repositories;

use App\Enums\Status;
use Carbon\Carbon;
use App\Models\Testimonial;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\TestimonialInterface;
//use Your Model

/**
 * Class TestimonialRepository.
 */
class TestimonialRepository implements TestimonialInterface
{
    use CommonHelperTrait;
    private Testimonial $model;

    public function __construct(Testimonial $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return Testimonial::all();
    }

    public function getList()
    {
        return $this->model->query()
            ->select('id','name','designation','message','image_id','status')
            ->where('status', Status::ACTIVE)
            ->get();
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
        return Testimonial::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $testimonialStore                  = new $this->model;
            $testimonialStore->name            = $request->name;
            $testimonialStore->designation     = $request->designation;
            $testimonialStore->message         = $request->message;
            $testimonialStore->status          = $request->status;
            $testimonialStore->image_id        = $this->UploadImageCreate($request->image, 'backend/uploads/testimonials');
            $testimonialStore->save();
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
            $testimonialUpdate                       = $this->model->findOrfail($id);
            $testimonialUpdate->name                 = $request->name;
            $testimonialUpdate->designation          = $request->designation;
            $testimonialUpdate->message              = $request->message;
            $testimonialUpdate->status               = $request->status;
            $testimonialUpdate->image_id             = $this->UploadImageUpdate($request->image, 'backend/uploads/testimonials', $testimonialUpdate->image_id);
            $testimonialUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $testimonialDestroy   = $this->model->find($id);
            $this->UploadImageDelete($testimonialDestroy->image_id); // delete image & record
            $testimonialDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
