<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Interfaces\PermissionInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LandlordController extends Controller
{

    private $user;

    function __construct(UserInterface $userInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->user       = $userInterface;
    }

    public function index(Request $request)
    {
        $data['title'] = _trans('landlord.Landlord');
        $data['landlords'] = $this->user->landlords($request);
        return view('backend.landlord.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('landlord.Landlord');
        return view('backend.landlord.create')->with($data);
    }


    public function store(UserStoreRequest $request)
    {
        $result = $this->user->store($request);
        if ($result) {
            return redirect()->route('landlord.index')->with('success', _trans('alert.landlord_created_successfully'));
        }
        return redirect()->back()->with('danger',  _trans('alert.something_went_wrong_please_try_again'));
    }


    public function show($id)
    {
        $data['title']       = _trans('common.Landlord Show');
        $data['landlord']        = $this->user->show($id);
        $data['documents']        = Document::with('attachment')->where('user_id', $id)->get();
        return view('backend.landlord.show')->with($data);
    }


    public function edit($id)
    {
        $data['title']       = _trans('common.Landlord Edit');
        $data['landlord']        = $this->user->show($id);
        return view('backend.landlord.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        $result = $this->user->update($request, $id);
        if ($result) {
            return redirect()->route('landlord.index')->with('success', _trans('alert.landlord_updated_successfully'));
        }
        return redirect()->route('landlord.index')->with('danger',  _trans('alert.something_went_wrong_please_try_again'));
    }


    public function destroy($id)
    {
        if ($this->user->destroy($id)) :
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
