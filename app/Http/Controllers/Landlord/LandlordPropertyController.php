<?php

namespace App\Http\Controllers\Landlord;

use App\Enums\ApprovalStatus;
use App\Enums\DealType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\PropertyStoreRequest;
use App\Interfaces\OfferInterface;
use App\Interfaces\PermissionInterface;
use App\Interfaces\PropertyInterface;
use App\Models\Advertisement;
use App\Models\Appointment;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\PropertyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LandlordPropertyController extends Controller
{

    private $property;
    private $permission;
    private $offer;

    public function __construct(PropertyInterface $propertyInterface, PermissionInterface $permissionInterface, OfferInterface $offerInterface)
    {
        $this->property = $propertyInterface;
        $this->permission = $permissionInterface;
        $this->offer = $offerInterface;
    }


    public function index(Request $request)
    {
        $data['title'] = _trans('common.property');
        $data['properties'] = Property::where('user_id', auth()->id())
            ->whereDoesntHave('advertisement')
            ->get();
        $data['letProperties'] = Advertisement::with(['property' => function ($query) {
            $query->where('user_id', auth()->id());
        }])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->where('advertisement_type', DealType::RENT)
            ->paginate(6)
            ->through(function ($advertisement) {
                $property = $advertisement->property;
                $property->advertisement_type = $advertisement->advertisement_type;
                return $property;
            });

        $data['selProperties'] = Advertisement::with(['property' => function ($query) {
            $query->where('user_id', auth()->id());
        }])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->where('advertisement_type', DealType::SELL)
            ->paginate(6)
            ->through(function ($advertisement) {
                $property = $advertisement->property;
                $property->advertisement_type = $advertisement->advertisement_type;
                return $property;
            });

        return view('landlord.property.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('common.create_property');
        $data['property_categories'] = PropertyCategory::all();
        $data['countries'] = Country::all();
        return view('landlord.property.create')->with($data);
    }


    public function store(PropertyStoreRequest $request)
    {
        $result = $this->property->store($request);
        if ($result) {
            return redirect()->route('landlord.property.index')->with('success', _trans('alert.property_created_successfully'));
        }
        return redirect()->route('landlord.property.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function edit($id)
    {
        $data['title'] = _trans('common.create_property');
        $data['property_categories'] = PropertyCategory::all();
        $data['property'] = $this->property->show($id);
        $data['countries'] = Country::all();
        return view('landlord.property.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        $result = $this->property->update($request, $id, $type = 'basicInfo');
        if ($result) {
            return redirect()->route('landlord.property.index')->with('success', _trans('alert.Updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->property->destroy($id)) {
            return redirect()->route('landlord.property.index')->with('success', _trans('alert.Deleted_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function views(Request $request)
    {
        $data['title'] = _trans('common.Property Viewing');
        $data['appointments'] = Appointment::select('id', 'name', 'type', 'email', 'phone', 'property_id', 'time_slot_id', 'date', 'status')
            ->with('property', 'timeSlot')
            ->where('type', 'book_viewing')
            ->paginate(6);
        return view('landlord.property.views')->with($data);
    }


    public function offer(Request $request)
    {
        $data['title'] = _trans('common.Requirement Viewing');
        $data['offers'] = $this->offer->offerPaginate($request);
        return view('landlord.property.offers')->with($data);
    }

    public function offerStatusUpdate(Request $request, $id)
    {
        try {
            $offer = $this->offer->find($id);
            $offer->status = $request->status;
            $offer->save();
            return redirect()->back()->with('success', _trans('alert.Updated_successfully'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }



    public function document(Request $request)
    {
        $data['title'] = _trans('common.Property Documents');
        $data['properties'] = Property::with('documents')
            ->where('user_id', \auth()->id())
            ->whereHas('documents')
            ->get();
        return view('landlord.property.documents')->with($data);
    }


}
