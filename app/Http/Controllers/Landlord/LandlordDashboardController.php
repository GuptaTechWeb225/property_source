<?php

namespace App\Http\Controllers\Landlord;

use App\Enums\DealType;
use App\Http\Controllers\Controller;
use App\Interfaces\RequirementInterface;
use App\Models\Advertisement;
use App\Models\FavouriteProperty;
use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Models\Tenant;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandlordDashboardController extends Controller
{

    protected $requirementRepository;

    public function __construct(RequirementInterface $requirementInterface)
    {
        $this->requirementRepository = $requirementInterface;
    }

    public function summary(Request $request)
    {
        $requirement = $this->requirementRepository->getRequirement();

        $latitude = 0;
        $longitude = 0;
        if ($requirement) {
            if (!empty(env('GOOGLE_MAPS_API_BASE_URL'))) {
                $apiKey = env('GOOGLE_MAPS_API_KEY');
                $client = new Client();
                $url = env('GOOGLE_MAPS_API_BASE_URL') . '?address=' . @$requirement->post_code . '+' . @$requirement->city . '+&key=' . $apiKey;
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);

                if ($data['status'] === 'OK') {
                    $coordinates = $data['results'][0]['geometry']['location'];
                    $latitude = $coordinates['lat'];
                    $longitude = $coordinates['lng'];
                }
            }
        }


        $user_id = Auth::id();
        $data['salesAdvertisement'] = Advertisement::with(['property' => function ($query) use ($user_id, $latitude, $longitude) {
            $query->where('user_id', '!=', $user_id);
        }])
            ->where('advertisement_type', DealType::SELL)
            ->latest('id')
            ->paginate(5);


        $data['letAdvertisement'] = Advertisement::with(['property' => function ($query) use ($user_id, $latitude, $longitude) {
            $query->where('user_id', '!=', $user_id);
        }])
            ->where('advertisement_type', DealType::RENT)
            ->latest('id')
            ->paginate(5);

        $data['favouriteProperties'] = FavouriteProperty::with('property', 'advertisement')
            ->latest('id')
            ->where('user_id', $user_id)
            ->paginate(6);

        return view('landlord.summary')->with($data);
    }


    public function finances(Request $request)
    {
        $data['tenants'] = Tenant::select('id', 'name')->latest()->get();
        $data['properties'] = Property::select('id', 'name')->latest()->get();
        $data['title'] = _trans('landlord.Rentals');
        $data['rentals'] = OrderDetail::with(['property', 'property.advertisement' => function ($query) {
            $query->where('advertisement_type', DealType::RENT);
        }, 'order'])
            ->whereHas('property', function ($query) {
                $query->whereNot('user_id', \auth()->id());
            })
            ->when($request->input('tenant_id'), function ($query) use ($request) {
                $query->whereHas('order', function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                });
            })
            ->when($request->input('property_id'), function ($query) use ($request) {
                $query->where('property_id', $request->input('property_id'));
            })
            ->when($request->input('payment_status'), function ($query) use ($request) {
                $query->where('payment_status', $request->input('payment_status'));
            })
            ->when($request->input('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->latest()
            ->paginate(10);
        return view('landlord.finances')->with($data);
    }


    public function maintenance(Request $request)
    {
        $data['tenants'] = Tenant::select('id', 'name')->latest()->get();
        $data['properties'] = Property::select('id', 'name')->latest()->get();
        $data['title'] = _trans('landlord.Rent & Tenant');
        $data['rentals'] = OrderDetail::with('property', 'order')
            ->when($request->input('tenant_id'), function ($query) use ($request) {
                $query->whereHas('order', function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                });
            })
            ->when($request->input('property_id'), function ($query) use ($request) {
                $query->where('property_id', $request->input('property_id'));
            })
            ->when($request->input('payment_status'), function ($query) use ($request) {
                $query->where('payment_status', $request->input('payment_status'));
            })
            ->when($request->input('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->latest()
            ->paginate(10);

        return view('landlord.maintenance')->with($data);
    }

    public function makeFavourite(Request $request)
    {
        $request->validate([
            'advertisement_id' => 'required',
            'property_id' => 'required',
        ]);
        try {
            $hasFavourite = FavouriteProperty::where('property_id', $request->property_id)
                ->where('user_id', \auth()->id())
                ->first();
            if ($hasFavourite) {
                $hasFavourite->delete();
                return response()->json(['message' => 'Success', 'status' => 200]);
            } else {
                $favourite = new FavouriteProperty();
                $favourite->advertisement_id = $request->advertisement_id;
                $favourite->property_id = $request->property_id;
                $favourite->user_id = Auth::id();
                $favourite->save();
                return response()->json(['message' => 'Success', 'status' => 200]);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function removeFavourite(Request $request)
    {
        try {
            $favourite = FavouriteProperty::find($request->id);
            $favourite->delete();
            return response()->json(['message' => 'Success', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}
