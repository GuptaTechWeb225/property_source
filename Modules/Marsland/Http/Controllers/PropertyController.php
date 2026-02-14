<?php

namespace Modules\Marsland\Http\Controllers;

use App\Enums\ApprovalStatus;
use App\Enums\DealType;
use App\Http\Resources\PropertyAdCollection;
use App\Models\Advertisement;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyReview;
use App\Models\Tenant;
use App\Models\Wishlist;
use App\Traits\CommonHelperTrait;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Marsland\Entities\FamilyMember;
use Modules\Marsland\Entities\TenantAsset;
use Modules\Marsland\Transformers\PropertyFilterResource;
use PHPUnit\Exception;

class PropertyController extends Controller
{

    use CommonHelperTrait;


    protected $model;
    protected $advertisementModel;

    public function __construct(Property $model, Advertisement $advertisementModel)
    {
        $this->model = $model::query();
        $this->advertisementModel = $advertisementModel::query();

    }

    public function properties(Request $request)
    {
        $data['categories'] = PropertyCategory::where('status', 1)->get();

        if ($request->type == 'Tenant') {
            $tenants = Tenant::with('image')->select('id', 'name', 'phone', 'personal_code', 'image_id')->where('role_id', 5)
                ->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('personal_code', 'like', '%' . $request->keyword . '%')
                        ->orWhere('address', 'like', '%' . $request->keyword . '%');
                })->get();

            $familyTenant = FamilyMember::with('image')->select('id', 'name', 'phone', 'personal_code', 'photo_id')
                ->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('personal_code', 'like', '%' . $request->keyword . '%');
                })->get();

            $familyTenantIds = $familyTenant->pluck('tenant_id');
            $tenantIds = $tenants->pluck('id');

            $allTenantIds = $tenantIds->merge($familyTenantIds);

            $orderIds = Order::query()
                ->when(count($allTenantIds), function ($query) use ($allTenantIds) {
                    $query->whereIn('tenant_id', $allTenantIds);
                })
                ->pluck('id');

            $orders = OrderDetail::with('order', 'order.tenant:id,name,email,phone,personal_code', 'property:id,name,default_image,property_category_id')
                ->when(count($orderIds), function ($query) use ($orderIds) {
                    $query->whereIn('order_id', $orderIds);
                })
//                ->whereHas('property', function ($query) use ($request) {
//                    $query->where('name', 'like', "%$request->keyword%");
//                })
                ->get();

            $data['properties'] = $orders->pluck('property');
//            $data['tenants'] = $tenants->merge($familyTenant);
            $data['tenants'] = $orders->pluck('order.tenant');

//            if ($orders) {
//                $
//                $data['data'] = $orders->flatMap(function ($order) {
//                    $propertyData['orderDetails'] = $order->orderDetails;
//                    $propertyData['properties'] = $order->orderDetails->pluck('property');
//                    return $propertyData;
//                });
//            }
            return view('marsland::pages.tenant_property')->with($data);
        }

        return view('marsland::pages.property.properties')->with($data);
    }

    public function updateArray($array, $newArray, $str = "")
    {
        foreach ($newArray as $c) {
            if ($str != "") {
                $c = $c . " " . $str;
            }
            array_push($array, $c);
        }
        return $array;
    }


    public function filterProperties(Request $request)
    {
        try {
            $data['input'] = $request->all();
            $data['keyword'] = [];

            $lists = Advertisement::query()
                ->where('status', 1)
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->when($request->has('purpose') && $request->purpose != '', function ($q) use ($request, $data) {
                    $data['keyword'] = $this->updateArray($data['keyword'], $request->purpose);
                    foreach ($request->purpose as $p) {
                        $deal_type[] = $p;
                    }
                    $q->whereIn('advertisement_type', $deal_type);
                })
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })->with('property')
                ->whereHas('property', function ($q) use ($request, $data) {
                    if ($request->has('search') && $request->search != '') {
                        array_push($data['keyword'], $request->search);
                        $q->where('name', 'like', '%' . $request->search . '%');
                    }
                    if ($request->input('filters') == 'is_trending') {
                        array_push($data['keyword'], ['trending']);
                        $q->where('is_trending', 1);
                    }

                    if ($request->input('filters') == 'is_recommended') {
                        array_push($data['keyword'], 'recommended');
                        $q->where('is_recommended', 1);
                    }

                    if ($request->input('filters') == 'discounted') {
                        array_push($data['keyword'], 'discount_amount');
                        $q->where('discount_amount', '>', 0);
                    }

                    if ($request->has('categories') && $request->categories != '') {
                        $inputCategories = PropertyCategory::whereIn('id', $request->categories)->pluck('name');
                        $data['keyword'] = $this->updateArray($data['keyword'], $inputCategories);
                        $q->whereIn('property_category_id', $request->categories);
                    }
                    if ($request->has('beds') && $request->beds != '') {
                        $data['keyword'] = $this->updateArray($data['keyword'], $request->beds, "beds");
                        $q->whereIn('bedroom', $request->beds);
                    }
                    if ($request->has('baths') && $request->baths != '') {
                        $data['keyword'] = $this->updateArray($data['keyword'], $request->baths, "baths");
                        $q->whereIn('bathroom', $request->baths);
                    }

                    if ($request->has('sqfts') && $request->sqfts != '') {
                        $data['keyword'] = $this->updateArray($data['keyword'], $request->sqfts, "sqft");
                        $min = null;
                        $max = null;

                        foreach ($request->sqfts as $value) {
                            $sizes = explode('-', $value);
                            $tempMin = min($sizes);
                            $tempMax = max($sizes);

                            if ($min === null || $tempMin < $min) {
                                $min = $tempMin;
                            }
                            if ($max === null || $tempMax > $max) {
                                $max = $tempMax;
                            }
                        }
                        $data['sizes'] = [$min, $max];
                        $q->whereIn('size', [$min, $max]);
                    }
                });

            $data['count'] = $lists->count() > 1 ? $lists->count() . " results" : $lists->count() . " result";
            $list = $lists->take(18)->get();
            $data['property'] = PropertyFilterResource::collection($list);
            return response()->json($data);
        } catch (\Exception $exception) {
            return response()->json($th->getMessage());
        }
    }


    public function propertyDetail(Request $request, $slug)
    {
        try {
            $property = Property::with(['facilities', 'wishlist','documents'])->where('slug', $slug)->first();
            $id = $property->id;
            $data['advertisement'] = Advertisement::find($request->input('advertise_id'));
            if ($property == null) {
                return redirect()->route('home');
            }
            $wishlist = Wishlist::select('id', 'property_id', 'user_id')
                ->where('user_id', \auth()->id())
                ->where('property_id', $id)
                ->get();

            $data['property'] = [
                'id' => @$property->id,
                'name' => @$property->name,
                'image' => globalAsset(@$property->defaultImage->path),
                'deal_type' => @Utils::advertisementTypes()[$data['advertisement']->advertisement_type],
                'type' => @$property->type == 1 ? 'Commercial' : 'Residential',
                'completion' => @$property->completion == 1 ? 'Completed' : 'Under Construction',
                'total_unit' => @$property->total_unit,
                'total_occupied' => @$property->total_occupied,
                'total_rent' => @$property->total_rent,
                'total_sell' => @$property->total_sell,
                'size' => @$property->size,
                'dining_combined' => @$property->dining_combined,
                'bedroom' => @$property->bedroom,
                'bathroom' => @$property->bathroom,
                'rent_type' => @$data['advertisement']->rent_type == 1 ? 'Monthly' : null,
                'amount' => $this->getPropertyPrice($data['advertisement']),
                'discount_amount' => $property->discount_amount,
                'discount_type' => $property->discount_type,
                'booking_amount' => @$data['advertisement']->booking_amount,
                'flat_no' => $property->flat_no,
                'description' => $property->description,
                'category' => @$property->category->name,
                'user_email' => @$property->user->email,
                'user_phone' => @$property->user->phone,
                'wishlist' => $wishlist
            ];
            $data['address'] = [
                'id' => @$property->location->id,
                'country' => @$property->location->country->name,
                'latitude' => @$property->location->latitude,
                'longitude' => @$property->location->longitude,
                'address' => @$property->location->address == "" ? 'no data' : @$property->location->address,
            ];

            $data['galleries'] = @$property->galleries->where('type', 'gallery')->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->title,
                    'image' => globalAsset($item->image->path),
                ];
            });
            $data['floorPlans'] = @$property->floorPlans->where('type', 'floor_plan')->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->title,
                    'image' => globalAsset($item->image->path),
                ];
            });
            $data['transactions'] = [];
            $data['rentals'] = $property->rentals;
            $data['user'] = $property->user;

            $data['tenants'] = $property->tenants->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'name' => @$data->user->name,
                    'email' => @$data->user->email,
                    'phone' => @$data->user->phone,
                    'photo' => @$data->user->image->path,
                    'created_at' => @$data->created_at,
                    'address' => @$data->user->state . ' | ' . $data->user->city . ' | ' . $data->user->zip_code,
                ];
            });
            $data['facilities'] = $property->facilities->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => @$item->type->name,
                    'content' => @$item->content,
                    'icon' => globalAsset(@$item->type->image->path),
                ];
            });
            $data['category'] = [
                'id' => @$property->category->id,
                'name' => @$property->category->name,
            ];
            $data['document'] = @$property->documents;


            // Property Reviews Start
            $data['property_reviews'] = PropertyReview::where('property_id', $id)->get();
            $data['ratting'][1] = PropertyReview::where('property_id', $id)->where('ratings', 1)->count();
            $data['ratting'][1] = $data['ratting'][1] == 0 ? 0 : floor(($data['ratting'][1] / $data['property_reviews']->count()) * 100);

            $data['ratting'][2] = PropertyReview::where('property_id', $id)->where('ratings', 2)->count();
            $data['ratting'][2] = $data['ratting'][2] == 0 ? 0 : floor(($data['ratting'][2] / $data['property_reviews']->count()) * 100);

            $data['ratting'][3] = PropertyReview::where('property_id', $id)->where('ratings', 3)->count();
            $data['ratting'][3] = $data['ratting'][3] == 0 ? 0 : floor(($data['ratting'][3] / $data['property_reviews']->count()) * 100);

            $data['ratting'][4] = PropertyReview::where('property_id', $id)->where('ratings', 4)->count();
            $data['ratting'][4] = $data['ratting'][4] == 0 ? 0 : floor(($data['ratting'][4] / $data['property_reviews']->count()) * 100);

            $data['ratting'][5] = PropertyReview::where('property_id', $id)->where('ratings', 5)->count();
            $data['ratting'][5] = $data['ratting'][5] == 0 ? 0 : floor(($data['ratting'][5] / $data['property_reviews']->count()) * 100);

            $data['agvRating'] = PropertyReview::where('property_id', $id)->sum('ratings') == 0 ? 0 : floor(PropertyReview::where('property_id', $id)->sum('ratings') / $data['property_reviews']->count());

            return view('marsland::pages.property.property_details')->with($data);

        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }


    protected function getPropertyPrice($ad)
    {
        $amount = 0;
        if ($ad->advertisement_type == DealType::RENT) {
            $amount = $ad->rent_amount;
        } elseif ($ad->advertisement_type == DealType::SELL) {
            $amount = $ad->sell_amount;
        } elseif ($ad->advertisement_type == DealType::MORTGAGE) {
            $amount = $ad->mortgage_amount;
        } elseif ($ad->advertisement_type == DealType::LEASE) {
            $amount = $ad->lease_amount;
        }
        return $amount;
    }


    public function fiveProperties()
    {
        $properties = Property::latest('created_at')->limit(5)->get();
        return response()->json($properties);
    }


    public function trendingProperty(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('status', 1)
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q) {
                    $q->where('is_trending', 1);
                })
                ->limit(3)
                ->get();
            $data['property'] = PropertyFilterResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function buyProperty(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('advertisement_type', 2)
                ->where('status', 1)
                ->with('property')
                ->limit(8)
                ->get();

            $data['property'] = PropertyFilterResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function rentProperty(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->where('advertisement_type', 1)
                ->with('property')
                ->limit(4)
                ->get();

            $data['property'] = PropertyFilterResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function discountedProperty(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q) {
                    $q->where('discount_amount', '>', 0);
                })
                ->limit(8)
                ->get();
            $data['property'] = PropertyFilterResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function recommendationProperty(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q) {
                    $q->where('is_recommended', 1);
                })
                ->limit(4)
                ->get();
            $data['property'] = PropertyFilterResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


    public function propertyReview(Request $request)
    {
        if (Auth::check()) {
            $validatedData = $request->validate([
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ], [
                'comments.required' => _trans('common.Comment field is required'),
                'ratings.required' => _trans('common.Ratings field is required'),
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'comments' => 'required',
                'ratings' => 'required|numeric|min:1|max:5',
            ]);
        }
        try {
            $review = new PropertyReview();

            if (Auth::check()) {
                $user = Auth::user();
                $review->name = $user->name;
                $review->email = $user->email;
            } else {
                $review->name = $request->name;
                $review->email = $request->email;
            }

            $review->property_id = $request->property_id; // Set the blog ID
            $review->comments = $validatedData['comments'];
            $review->ratings = $validatedData['ratings'];
            $review->save();

            return redirect()->back()->with('success', _trans('landlord.Review posted successfully!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


}
