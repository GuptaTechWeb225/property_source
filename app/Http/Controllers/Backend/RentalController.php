<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Interfaces\RentalInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;

class RentalController extends Controller
{

    private $rental;
    private $permission;

    function __construct(RentalInterface $userInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->rental       = $userInterface;
        $this->permission = $permissionInterface;
    }

    public function index(Request $request)
    {
        $data['tenants'] = Tenant::select('id','name')->latest()->get();
        $data['properties'] = Property::select('id','name')->latest()->get();
        $data['title'] = _trans('landlord.Rentals');
        $data['rentals'] = OrderDetail::query()
            ->when($request->input('tenant_id'), function ($query) use ($request){
                $query->whereHas('order', function ($query) use ($request){
                    $query->where('tenant_id',$request->input('tenant_id'));
                });
            })
            ->when($request->input('property_id'), function ($query) use ($request){
                $query->where('property_id', $request->input('property_id'));
            })
            ->when($request->input('payment_status'), function($query) use($request){
                $query->where('payment_status', $request->input('payment_status'));
            })
            ->when($request->input('status'), function($query) use($request){
                $query->where('status', $request->input('status'));
            })
            ->latest()
            ->paginate(10);
        return view('backend.rental.index')->with($data);
    }

    public function profile()
    {
        $data['title'] = _trans('common.users');

        return view('backend.users.profile', compact('data'));
    }
}
