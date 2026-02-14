<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\FeatureInterface;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\Feature\FeatureStoreRequest;
use App\Http\Requests\Feature\FeatureUpdateRequest;

class FeatureController extends Controller
{
    private $feature;
    private $permission;

    function __construct(FeatureInterface $featureInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->feature   = $featureInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {
        $data['feature']  = $this->feature->getAll();

        $data['title']      = _trans('common.feature');
        return view('backend.feature.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.feature');
        $data['permissions'] = $this->permission->all();
        return view('backend.feature.create', compact('data'));
    }

    public function store(FeatureStoreRequest $request)
    {
        $result = $this->feature->store($request);
        if ($result) {
            return redirect()->route('features.index')->with('success', _trans('alert.feature_created_successfully'));
        }
        return redirect()->route('features.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['feature']    = $this->feature->show($id);
        $data['title']       = _trans('common.feature');
        $data['permissions'] = $this->permission->all();
        return view('backend.feature.edit', compact('data'));
    }

    public function update(FeatureUpdateRequest $request, $id)
    {
        $result = $this->feature->update($request, $id);
        if ($result) {
            return redirect()->route('features.index')->with('success', _trans('alert.feature_updated_successfully'));
        }
        return redirect()->route('features.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->feature->destroy($id)) :
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
