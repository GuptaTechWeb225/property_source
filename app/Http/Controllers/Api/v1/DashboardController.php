<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\PropertyListResource;
use App\Http\Resources\TransactionPaginateCollection;
use App\Http\Resources\UserListResource;
use App\Models\Account;
use App\Models\Property\Property;
use App\Models\Property\Transaction;
use App\Traits\ApiReturnFormatTrait;
use App\Utils\Utils;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    use ApiReturnFormatTrait;

    public function index()
    {
        $properties = Auth::user()->properties;
        $total_properties = $properties->count();
        $vacant = $properties->where('vacant', 1)->count();
        $occupied = $total_properties - $vacant;
        $transactions = Transaction::paginate(3);


        return response()->json([
            'user' => UserListResource::collection([Auth::user()]),
            'properties' => PropertyListResource::collection(Auth::user()->properties)->take(3),
            'transactions' => new TransactionPaginateCollection($transactions),
            'total_properties' => $total_properties,
            'total_occupied' => $occupied,

            'vacant' => $vacant
        ]);
    }


    public function landlordDashboard()
    {
        try {
            $user = Auth::user();
            $data['total_properties'] = Property::where('user_id', $user->id)->count();
            $data['total_vacant'] = Property::where('user_id', $user->id)->where('vacant', 1)->count();
            $data['total_occupied'] = $occupied = $data['total_properties'] - $data['total_vacant'];

            $properties = Property::query()
                ->latest()
                ->where('user_id', $user->id)
                ->take(5)->get();

            $data['properties'] = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'name' => $property->name,
                    'image' => @apiAssetPath($property->defaultImage->path),
                    'deal_type' => @Utils::advertisementTypes()[$property->deal_type],
                    'type' => $property->type == 1 ? 'Commercial' : 'Residential',
                    'completion' => $property->completion == 1 ? 'Completed' : 'Under Construction',
                    'status' => $property->status,
                ];
            });

            $account = Account::where('user_id', $user->id)->pluck('id');
            $data['transactions'] = Transaction::query()
                ->select('id','account_id','date','type','reference_no','payment_method','amount')
                ->whereIn('account_id', $account)
                ->latest()
                ->take(5)
                ->get();

            return $this->successResponse('Landlord Dashboard', $data);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
