<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function tenantReport(Request $request)
    {
        $authUser = auth()->user();

        $tenant =  Tenant::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD){
            $tenant->whereHas('orders.orderDetails.property', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        $data['tenants'] =$tenant->latest()->get();

        $property = Property::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD) {
            $property->where('user_id', $authUser->id);
        }
        $data['properties'] = $property->latest()->get();

        $data['title'] = _trans('landlord.Tenant Report');
        $data['reports'] = OrderDetail::query()
            ->when($request->input('tenant_id'), function ($query) use ($request) {
                $query->whereHas('order', function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                });
            })
            ->when($request->input('property_id'), function ($query) use ($request) {
                $query->where('property_id', $request->input('property_id'));
            })->latest()
            ->paginate(10);
        return view('backend.report.tenant_report')->with($data);
    }

    public function paymentReport(Request $request)
    {
        $authUser = auth()->user();

        $tenant =  Tenant::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD){
            $tenant->whereHas('orders.orderDetails.property', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        $data['tenants'] =$tenant->latest()->get();

        $property = Property::select('id', 'name');
         if ($authUser->role_id == Role::LANDLORD) {
             $property->where('user_id', $authUser->id);
        }
        $data['properties'] = $property->latest()->get();

        $data['title'] = _trans('landlord.Payment Report');
        $data['reports'] = Payment::query()
            ->when($request->input('property_id'), function ($query) use ($request) {
                $query->whereHas('orderDetail', function ($query) use ($request) {
                    $query->where('property_id', $request->input('property_id'));
                });
            })
            ->when($request->input('tenant_id'), function ($query) use ($request) {
                $query->whereHas('orderDetail', function ($query) use ($request) {
                    $query->whereHas('order', function ($query) use ($request) {
                        $query->where('tenant_id', $request->input('tenant_id'));
                    });
                });
            })
            ->with('orderDetail')
            ->paginate(10);
        return view('backend.report.payment_report')->with($data);
    }

    public function apartmentReport(Request $request)
    {
        $query = Property::latest();
        $data['title'] = _trans('landlord.Apartment');
        $data['property'] = $query->paginate(10);
        return view('backend.report.apartment_report')->with($data);
    }

    public function roomReport(Request $request)
    {
        $authUser = auth()->user();

        $tenant =  Tenant::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD){
            $tenant->whereHas('orders.orderDetails.property', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        $data['users'] =$tenant->latest()->get();

        $property = Property::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD) {
            $property->where('user_id', $authUser->id);
        }

        $data['properties'] = $property->latest()->get();


        $data['title'] = _trans('landlord.Room Report');

        $query = Property::query()
            ->where('property_category_id', 4)
            ->when($request->input('property_id'), function ($q) use ($request) {
                $q->where('id', $request->input('property_id'));
            })
            ->when($request->input('user_id'), function ($q) use ($request) {
                $q->where('user_id', $request->input('user_id'));
            });
        if ($request->filled('status')) {
            if ($request->input('status') == 'available') {
                $query->whereHas('advertisements', function ($q) {
                    $q->where(function ($q) {
                        $q->whereHas('orderDetail', function ($q) {
                            $q->where(function ($q) {
                                $q->where('status', 'rejected')
                                    ->orWhere('status', 'cancelled');
                            });
                        })->orWhereDoesntHave('orderDetail');
                    })->where(function ($q) {
                        $q->where('rent_start_date', '>', date('Y-m-d'))
                            ->orWhere('sell_start_date', '>', date('Y-m-d'));
                    });
                });
            }
            if ($request->input('status') == 'occupied') {
                $query->whereHas('orderDetail', function ($q) {
                    $q->where(function ($q) {
                        $q->where('status', 'pending')
                            ->orWhere('status', 'approved');
                    })->where('end_date', '>', date('Y-m-d'));
                });
            }
        }
        $data['reports'] = $query->paginate(10);
        return view('backend.report.available_room_report')->with($data);
    }


}
