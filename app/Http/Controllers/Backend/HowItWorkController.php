<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\HowItWorkInterface;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\HowItWork\HowItWorkUpdateRequest;
use App\Http\Requests\HowItWork\HowItWorkStoreRequest;

class HowItWorkController extends Controller
{
    private $howItWork;
    private $permission;

    function __construct(HowItWorkInterface $howItWorkInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->howItWork   = $howItWorkInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {
        $data['howItWorks']  = $this->howItWork->getAll();

        $data['title']      = _trans('common.how_it_works');
        return view('backend.how-it-works.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.how_it_works');
        $data['permissions'] = $this->permission->all();
        return view('backend.how-it-works.create', compact('data'));
    }

    public function store(HowItWorkStoreRequest $request)
    {
        $result = $this->howItWork->store($request);
        if ($result) {
            return redirect()->route('how-it-works.index')->with('success', _trans('alert.how_it_works_created_successfully'));
        }
        return redirect()->route('how-it-works.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['howItWork']    = $this->howItWork->show($id);
        $data['title']       = _trans('common.how_it_works');
        $data['permissions'] = $this->permission->all();
        return view('backend.how-it-works.edit', compact('data'));
    }

    public function update(HowItWorkUpdateRequest $request, $id)
    {
        $result = $this->howItWork->update($request, $id);
        if ($result) {
            return redirect()->route('how-it-works.index')->with('success', _trans('alert.how_it_works_updated_successfully'));
        }
        return redirect()->route('how-it-works.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->howItWork->destroy($id)) :
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
