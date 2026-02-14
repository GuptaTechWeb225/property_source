<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\TestimonialInterface;
use App\Http\Requests\Testimonial\TestimonialUpdateRequest;
use App\Http\Requests\Testimonial\TestimonialStoreRequest;

class TestimonialController extends Controller
{
    private $testimonial;
    private $permission;

    function __construct(TestimonialInterface $testimonialInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->testimonial   = $testimonialInterface;
    }

    public function index()
    {

        $data['testimonials']  = $this->testimonial->getAll();
        $data['title']      = _trans('common.testimonials');
        return view('backend.testimonials.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.create_testimonial');
        return view('backend.testimonials.create', compact('data'));
    }

    public function store(TestimonialStoreRequest $request)
    {
        $result = $this->testimonial->store($request);
        if ($result) {
            return redirect()->route('testimonials.index')->with('success', _trans('alert.testimonial_created_successfully'));
        }
        return redirect()->route('testimonials.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['testimonial']    = $this->testimonial->show($id);
        $data['title']       = _trans('common.testimonials');
        return view('backend.testimonials.edit', compact('data'));
    }

    public function update(TestimonialUpdateRequest $request, $id)
    {
        $result = $this->testimonial->update($request, $id);
        if ($result) {
            return redirect()->route('testimonials.index')->with('success', _trans('alert.testimonial_updated_successfully'));
        }
        return redirect()->route('testimonials.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->testimonial->destroy($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }
}
