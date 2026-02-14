<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\PaymentReportResouces;
use App\Http\Resources\Api\v1\TenantReportResouces;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Property\Property;
use App\Models\Tenant;
use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use ApiReturnFormatTrait;

    public function tenantReport(Request $request)
    {
        $authUser = Auth::user();
        $data = OrderDetail::with('property', 'advertisement', 'order')
            ->when($request->filled('tenant_id'), function ($query) use ($request) {
                $query->whereHas('order', function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                });
            })
            ->when($request->input('property_id'), function ($query) use ($request) {
                $query->where('property_id', $request->input('property_id'));
            })->whereHas('property', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id);
            })->latest()
            ->paginate(10);

        $reports = new  TenantReportResouces($data);

        return $this->responseWithSuccess('Tenant Report', $reports, 200);
    }

    public function paymentReport(Request $request)
    {
        $data = Payment::query()
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

        $report = new PaymentReportResouces($data);

        return $this->responseWithSuccess('Payment Report', $report, 200);
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
        $data['users'] = User::select('id', 'name')->where('role_id', 4)->latest()->get();
        $data['properties'] = Property::select('id', 'name')->latest()->get();

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
