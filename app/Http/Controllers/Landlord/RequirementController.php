<?php

namespace App\Http\Controllers\Landlord;

use App\Enums\ApprovalStatus;
use App\Enums\DealType;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Interfaces\OfferInterface;
use App\Interfaces\RequirementInterface;
use App\Models\Advertisement;
use App\Models\Property\PropertyCategory;
use App\Models\TimeSlot;
use App\Traits\CommonHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequirementController extends Controller
{
    use CommonHelperTrait;

    protected $requirementRepository;
    protected $offerRepository;

    public function __construct(RequirementInterface $requirementInterface, OfferInterface $offerInterface)
    {
        $this->requirementRepository = $requirementInterface;
        $this->offerRepository = $offerInterface;
    }

    public function index()
    {
        $data['title'] = _trans('common.requirements');
        $data['property_categories'] = PropertyCategory::select('id', 'name')->get();
        $data['requirement'] = $this->requirementRepository->getRequirement();
        return view('landlord.requirement.index')->with($data);
    }


    public function update(Request $request)
    {
        try {
            $reqirement = $this->requirementRepository->update($request);
            if ($reqirement) {
                return redirect()->back()->with('success', _trans('alert.Successfully updated'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', _trans('alert.Something went wrong'));
        }
    }

    public function view()
    {
        $data['title'] = _trans('common.Requirement Viewing');
        $data['properties'] = Advertisement::with('property')
            ->whereHas('property', function($query){
                $query->whereNot('user_id', auth()->id());
            })
        ->where('status', 1)
        ->where('approval_status', ApprovalStatus::APPROVED)
        ->whereDoesntHave('orders', function ($query) {
            $query->whereIn('status', ['pending', 'approved']);
        })->get();
        $data['time_slots'] = TimeSlot::select('id','start_time','end_time','status')->where('status', 'active')->get();
        return view('landlord.requirement.view')->with($data);
    }


    public function offer()
    {
        $data['title'] = _trans('common.Offers');
        $data['offers'] = $this->offerRepository->offerList();
        $data['properties'] = Advertisement::with(['property' => function($query){
            $query->whereNot('user_id', auth()->id());
        }])->where('approval_status', ApprovalStatus::APPROVED)
            ->get();
        return view('landlord.requirement.offers')->with($data);
    }


    public function offerStore(OfferRequest $request)
    {
        try {
            $this->offerRepository->store($request);
            return redirect()->back()->with('success', _trans('alert.Successfully added'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', _trans('alert.Something went wrong'));
        }
    }


    public function document(Request $request)
    {
        $data['title'] = _trans('common.Documents');
        $user = Auth::user();
        $proofId = @$user->proofId->path;

        if ($proofId){
            $data['proofId']['name'] =  $user->name.' ID.'.getFileExtension($proofId);
            $data['proofId']['file_extension'] =  getFileExtension($proofId);
            $data['proofId']['file_size'] =  getFileSize($proofId);
            $data['proofId']['file'] =  @globalAsset($proofId);
        }

        $proofAddress = @$user->proofAddress->path;
        if (!empty($proofAddress)){
            $data['proofAddress']['name'] =  $user->name.' Address Proof.'.getFileExtension($proofAddress);
            $data['proofAddress']['file_extension'] =  getFileExtension($proofAddress);
            $data['proofAddress']['file_size'] =  getFileSize($proofAddress);
            $data['proofAddress']['file'] = @globalAsset($proofAddress) ;
        }


        return view('landlord.requirement.documents')->with($data);
    }

    public function documentStore(Request $request)
    {
        try {
            $data['title'] = _trans('common.Documents');
            $user = Auth::user();

            if ($request->hasFile('proof_of_id')){
                $user->proof_of_id   = $this->UploadImageUpdate($request->proof_of_id,'backend/uploads/users', $user->proof_of_id);
                $user->save();
            }

            if ($request->hasFile('proof_of_address')){
                $user->proof_of_address   = $this->UploadImageUpdate($request->proof_of_address,'backend/uploads/users', $user->proof_of_address);
                $user->save();
            }

            return redirect()->back()->with('success', _trans('alert.document uploaded successfully'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', _trans('alert.Something went wrong'));
        }
    }


    public function getProperty(Request $request)
    {
        try {
            $advertisement = Advertisement::with('property')->find($request->advertisement_id);
            $response = [
                'property_id' => $advertisement->property_id,
                'price' => $this->getPrice($advertisement),
                'formatePrice' => priceFormat($this->getPrice($advertisement)),
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }


    public function getPrice($advertisement)
    {
        $amount = 0;
        if ($advertisement->advertisement_type == DealType::RENT) {
            $amount = $advertisement->rent_amount;
        } elseif ($advertisement->advertisement_type == DealType::SELL) {
            $amount = $advertisement->sell_amount;
        } elseif ($advertisement->advertisement_type == DealType::MORTGAGE) {
            $amount = $advertisement->mortgage_amount;
        } elseif ($advertisement->advertisement_type == DealType::LEASE) {
            $amount = $advertisement->lease_amount;
        }

        return $amount;
    }


}
