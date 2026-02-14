<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessModel\BusinessModelStoreRequest;
use App\Http\Requests\BusinessModel\BusinessModelUpdateRequest;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\BusinessModelInterface;

class BusinessModelController extends Controller
{
    private $businessModel;
    private $permission;

    function __construct(BusinessModelInterface $businessModelInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->businessModel   = $businessModelInterface;
    }

    public function index()
    {

        $data['business-models']  = $this->businessModel->getAll();
        $data['title']      = _trans('common.business_models');
        return view('backend.home-page.business-model.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.create_business_model');
        return view('backend.home-page.business-model.create', compact('data'));
    }

    public function store(BusinessModelStoreRequest $request)
    {

        $result = $this->businessModel->store($request);
        if ($result) {
            return redirect()->route('business-models.index')->with('success', _trans('alert.business_model_created_successfully'));
        }
        return redirect()->route('business-models.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['business-models']    = $this->businessModel->show($id);
        $data['title']       = _trans('common.businessModel');
        return view('backend.home-page.business-model.edit', compact('data'));
    }

    public function update(BusinessModelUpdateRequest $request, $id)
    {
        $result = $this->businessModel->update($request, $id);
        if ($result) {
            return redirect()->route('business-models.index')->with('success', _trans('alert.business_model_updated_successfully'));
        }
        return redirect()->route('business-models.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->businessModel->destroy($id)) :
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
