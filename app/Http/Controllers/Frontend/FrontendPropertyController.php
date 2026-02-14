<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ApprovalStatus;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Property\PropertyCategory;
use App\Http\Resources\PropertyAdCollection;
use App\Http\Resources\PropertyFilteringResource;
use App\Http\Resources\AdvertisementFilteringResource;
use App\Models\Property\PropertyReview;

class FrontendPropertyController extends Controller
{
    protected $model, $advertisementModel, $title, $mainkey, $keyword, $paginateNumber, $viewPath;

    public function __construct(Property $model, Advertisement $advertisementModel)
    {
        $this->model = $model::query();
        $this->advertisementModel = $advertisementModel::query();
        $this->mainkey = 'property';
        $this->title = Str::plural($this->mainkey);
        $this->keyword = [];
        $this->paginateLimit = config('app.paginateLimit');
        $this->viewPath = 'frontend.' . $this->mainkey . '.index';
        // return view('frontend.property.index', compact('data'));
    }


    public function propertyCheck(Request $request)
    {
        $count = Order::where(function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('start_date', '>=', $request->start_date)
                    ->where('start_date', '<=', $request->end_date);
            })
                ->orWhere(function ($q) use ($request) {
                    $q->where('end_date', '>=', $request->start_date)
                        ->where('end_date', '<=', $request->end_date);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('start_date', '<=', $request->start_date)
                        ->where('end_date', '>=', $request->end_date);
                });
        })
            ->where('property_id', $request->property_id)
            ->where('status', 'approved')
            ->count();

        return response()->json(["status" => $count]);
    }

    public function index(Request $request)
    {
        $data['title'] = $this->title;
        $data['keyword'] = $this->keyword;

        $this->model = $this->model->paginate($this->paginateLimit);
        $data[Str::plural($this->mainkey)] = $this->model;
        return view($this->viewPath, compact('data'));
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

    // propertyFilters
    public function propertyFilters(Request $request)
    {
        // Log::alert($request->all());
        // return response()->json($request->all());
        try {
            $location = $request->input('location');
            $radius = $request->input('radius');

            $data['input'] = $request->all();
            $data['keyword'] = [];

            $lists = Advertisement::query()
                ->where('status', 1)
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->when($request->has('purpose') && $request->purpose != '', function ($q) use ($request, $data) {
                    $data['keyword'] = $this->updateArray($data['keyword'], $request->purpose);
                    foreach ($request->purpose as $p) {
                        $deal_type[] = $p == "RENT" ? 1 : 2;
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
            $data['property'] = PropertyFilteringResource::collection($list);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // propertyFilters
    public function getTrendingProperties(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q){
                    $q->where('is_trending', 1);
                })
                ->get();
            $data['property'] = PropertyFilteringResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // Buy Property
    public function getBuyProperties(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('advertisement_type', 2)
                ->where('status', 1)
                ->with('property')
                ->get();

            $data['property'] = PropertyFilteringResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // Rent Property
    public function getRentProperties(Request $request)
    {
        try {
            $lists = Advertisement::query()
                ->where('advertisement_type', 1)
                ->where('status', 1)
                ->with('property')
                ->get();

            $data['property'] = PropertyFilteringResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // Related Properties
    public function getRelatedProperties(Request $request)
    {
        try {
            $list = Property::where('status', 1)->inRandomOrder()->take(4)->get();
            $this->model = PropertyFilteringResource::collection($list);
            $data['properties'] = $this->model;
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // propertyCategories
    public function propertyCategories(Request $request)
    {
        try {
            $propertyCategories = PropertyCategory::where('status', 1)->get();
            $data['categories'] = $propertyCategories->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                ];
            });
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    // propertyDetails
    public function propertyDetails($id, $slug)
    {
        $data['property'] = Property::with('facilities')->where('id', $id)->first();
        $data['advertisements'] = Advertisement::where('status', 1)->where('property_id', $id)->get();


        if ($data['property'] == null) {
            return redirect()->route('home');
        }

        $data['details'] = [
            'id' => @$data['property']->id,
            'name' => @$data['property']->name,
            'image' => apiAssetPath(@$data['property']->defaultImage->path),
            'deal_type' => @$data['property']->deal_type == 1 ? 'Rent' : 'Sell',
            'type' => @$data['property']->type == 1 ? 'Commercial' : 'Residential',
            'completion' => @$data['property']->completion == 1 ? 'Completed' : 'Under Construction',
            'total_unit' => @$data['property']->total_unit,
            'total_occupied' => @$data['property']->total_occupied,
            'total_rent' => @$data['property']->total_rent,
            'total_sell' => @$data['property']->total_sell,
            'size' => @$data['property']->size,
            'dining_combined' => @$data['property']->dining_combined,
            'bedroom' => @$data['property']->bedroom,
            'bathroom' => @$data['property']->bathroom,
            'rent_amount' => @$data['property']->rent_amount,
            'flat_no' => @$data['property']->flat_no,
            'description' => @$data['property']->description,
        ];
        $data['address'] = [
            'id' => @$data['property']->location->id,
            'country' => @$data['property']->location->country->name,
            'latitude' => @$data['property']->location->latitude,
            'longitude' => @$data['property']->location->longitude,
            'address' => @$data['property']->location->address == "" ? 'no data' : @$data['property']->location->address,
        ];

        $data['galleries'] = @$data['property']->galleries->where('type', 'gallery')->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->title,
                'image' => globalAsset($item->image->path),
            ];
        });
        $data['floorPlans'] = @$data['property']->floorPlans->where('type', 'floor_plan')->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->title,
                'image' => globalAsset($item->image->path),
            ];
        });
//        $data['transactions'] = $data['property']->transactions->map(function ($data) {
//            return [
//                'id'            => @$data->id,
//                'property'      => @$data->property->name,
//                'app_date'      => @$data->date ? date('d M, Y', strtotime(@$data->date)) : null,
//                'attachment'    => \apiAssetPath(@$data->attachment),
//                'tenant'        => [
//                    'id'        => @$data->tenant->id,
//                    'name'      => @$data->tenant->user->name,
//                    'email'     => @$data->tenant->user->email,
//                    'phone'     => @$data->tenant->user->phone,
//                ],
//                'rental_agreement' => [
//                    'id'            => @$data->rental->id,
//                    'amount'        => @$data->rental->rent_amount,
//                    'start_date'    => @$data->rental->move_in,
//                    'end_date'      => @$data->rental->move_out,
//                    'note'          => @$data->rental->note,
//                ],
//                'amount'            => @$data->amount,
//                'type'              => @$data->type,
//                'date'              => @$data->date,
//                'note'              => @$data->note,
//
//                'payment_details' => [
//                    'payment_method' => @$data->payment_method,
//                    'cheque_number' => @$data->cheque_number,
//                    'bank_name' => @$data->bank_name,
//                    'bank_branch' => @$data->bank_branch,
//                    'bank_account_number' => @$data->bank_account_number,
//                    'bank_account_name' => @$data->bank_account_name,
//
//                    'online_payment_method' => @$data->online_payment_method,
//                    'online_payment_transaction_id' => @$data->online_payment_transaction_id,
//                    'online_payment_transaction_status' => @$data->online_payment_transaction_status,
//                    'payment_status' => @$data->payment_status,
//                ],
//                'invoice' => [
//                    'invoice_number' => @$data->invoice_number,
//                    'invoice_date' => @$data->invoice_date,
//                    'app_invoice_date' => @$data->invoice_date ? date('d M, Y', strtotime(@$data->invoice_date)) : null,
//                ],
//
//            ];
//        });
        $data['transactions'] = [];
        $data['rentals'] = $data['property']->rentals;

        $data['tenants'] = $data['property']->tenants->map(function ($data) {
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
        $data['facilities'] = $data['property']->facilities->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => @$item->type->name,
                'content' => @$item->content,
                'icon' => globalAsset(@$item->type->image->path),
            ];
        });
        $data['category'] = [
            'id' => $data['property']->category->id,
            'name' => $data['property']->category->name,
        ];
        $data['document'] = $data['property']->document;


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

        // Property Reviews End

        if ($data['property']) {
            $data['title'] = $data['property']->name;

            return view('frontend.property.details', compact('data'));
        } else {
            return redirect()->route('home');
        }
    }


    // getHotCategories
    public function getHotCategories()
    {
        $categories = PropertyCategory::where('status', 1)->latest()->take(3)->get();
        $data['categories'] = $categories->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'count' => $item->properties->count(),
            ];
        });
        return response()->json($data);
    }


    // getRecommendationForYou
    public function getRecommendationForYou()
    {
        try {
            $lists = Advertisement::query()
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q){
                    $q->where('is_recommended', 1);
                })
                ->limit(3)
                ->get();
            $data['property'] = PropertyFilteringResource::collection($lists);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
        $properties = Property::where('status', 1)->latest()->take(8)->get();
        $data['properties'] = $properties->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'image' => apiAssetPath($item->defaultImage->path),
                'deal_type' => $item->deal_type == 1 ? 'Rent' : 'Sell',
                'type' => $item->type == 1 ? 'Commercial' : 'Residential',
                'completion' => $item->completion == 1 ? 'Completed' : 'Under Construction',
                'total_unit' => $item->total_unit,
                'total_occupied' => $item->total_occupied,
                'total_rent' => $item->total_rent,
                'total_sell' => $item->total_sell,
                'size' => $item->size,
                'dining_combined' => $item->dining_combined,
                'bedroom' => $item->bedroom,
                'bathroom' => $item->bathroom,
                'rent_amount' => $item->rent_amount,
                'flat_no' => $item->flat_no,
                'description' => $item->description,
                'details_url' => url("property/" . $item->id . "/details" . "/" . $item->slug), //property/{id}/details/{slug}
            ];
        });

        return response()->json($data);
    }


    public function subscribe()
    {
        return redirect()->back()->with(['success' => 'Subscribe Success']);
    }
}
