<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PropertyInterface;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Interfaces\AdvertisementInterface;
use App\Http\Requests\Advertisement\AdvertisementStoreRequest;

class AdvertisementController extends Controller
{
    private $advertisement;
    private $permission;
    private $property;

    public function __construct(AdvertisementInterface $advertisementInterface, PermissionInterface $permissionInterface, PropertyInterface $propertyInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->advertisement = $advertisementInterface;
        $this->permission = $permissionInterface;
        $this->property = $propertyInterface;
    }
    public function index()
    {
        $data['title'] = _trans('landlord.Advertisement');
        $data['property'] = (Auth::user()->role_id == 1) ? $this->advertisement->getAll() : $this->advertisement->getdByPropertyOwner();
        return view('backend.advertisement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = _trans('landlord.Create Advertisement');
        $data['properties'] = (Auth::user()->role_id == 1) ? $this->property->getActiveAll() : $this->property->getActiveCreatedBy();
        $data['permissions'] = $this->permission->all();
        return view('backend.advertisement.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementStoreRequest $request)
    {
        $result = $this->advertisement->store($request);
        if ($result) {
            return redirect()->route('advertisements.index')->with('success', _trans('alert.advertisement_created_successfully'));
        }
        return redirect()->route('advertisements.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->advertisement->destroy($id)) :
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

    public function approvalStatus($id, $type)
    {
        $result = $this->advertisement->approvalStatus($id, $type);
        if ($result) {
            return redirect()->route('advertisements.index')->with('success', _trans('alert.advertisement_status_changes_successfully'));
        }
        return redirect()->route('advertisements.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
}
