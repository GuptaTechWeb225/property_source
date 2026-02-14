<?php

namespace Modules\Nestkeeper\Http\Controllers\Api;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\RequestProperty;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use App\Http\Resources\UserListResource;
use App\Models\Property\PropertyGallery;
use App\Http\Resources\GalleryCollection;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyLocation;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FloorPlanCollection;
use App\Http\Resources\PropertyShowResource;
use App\Models\Property\PropertyFacilityType;
use Modules\Nestkeeper\Http\Resources\WishListResource;
use Modules\Nestkeeper\Http\Resources\PropertyListResource;
use Modules\Nestkeeper\Http\Requests\Advertise\RentStoreRequest;
use Modules\Nestkeeper\Http\Requests\Advertise\SellStoreRequest;
use Modules\Nestkeeper\Http\Requests\Property\DeleteBookRequest;
use Modules\Nestkeeper\Http\Requests\Property\PropertyBookRequest;
use Modules\Nestkeeper\Http\Requests\Property\PropertyStoreRequest;

class PropertyController extends Controller
{
    use ApiReturnFormatTrait;
    use CommonHelperTrait;



    public function index(Request $request)
    {


        if ($request->ad_type) {
            //Use this for Listing
            $advertisement['rent']  = Advertisement::where('advertisement_type', 1)->orderBy('id', 'desc')->pluck('property_id')->toArray();

            //Use this for Listing
            $advertisement['buy']   = Advertisement::where('advertisement_type', 2)->orderBy('id', 'desc')->pluck('property_id')->toArray();
        } else {
            //Use this for home
            $advertisement['rent']  = Advertisement::where('advertisement_type', 1)->orderBy('id', 'desc')->take(5)->pluck('property_id')->toArray();

            //Use this for home
            $advertisement['buy']   = Advertisement::where('advertisement_type', 2)->orderBy('id', 'desc')->take(5)->pluck('property_id')->toArray();
        }

        // Query properties with status 1
        $properties["rent"] = Property::query()->where('status', 1)->whereIn('id', $advertisement['rent']);

        // Apply search filter if search parameter is provided
        if ($request->get('search')) {
            $properties["rent"] = $properties["rent"]->where('name', 'like', '%' . $request->search . '%');
        }

        // Apply type filter if type parameter is provided
        if ($request->get('property_type') && $request->get('property_type') > 0) {
            $properties["rent"] = $properties["rent"]->where('property_category_id', $request->property_type);
        }


        if ($request->location) {
            $properties["rent"] = $properties["rent"]
                ->whereHas('location', function ($query) use ($request) {
                    $query->where('address', $request->location);
                });
        }

        if (!empty($request->min_sft) && !empty($request->max_sft)) {
            $properties["rent"] = $properties["rent"]
                ->whereBetween('size', [$request->min_sft, $request->max_sft]);
        }

        if ($request->bedroom) {
            $properties["rent"] = $properties["rent"]->where('bedroom', $request->bedroom);
        }

        if ($request->bathroom) {
            $properties["rent"] = $properties["rent"]->where('bathroom', $request->bathroom);
        }

        if (!empty($request->min_price) && !empty($request->max_price)) {
            $properties["rent"] = $properties["rent"]
                ->whereHas('advertisements', function ($query) use ($request) {
                    $query->whereBetween('rent_amount', [$request->min_price, $request->max_price]);
                });
        }

        // Paginate the results with 10 items per page
        $properties["rent"] = $properties["rent"]->paginate(10);



        // Query properties with status 1
        $properties["buy"] = Property::query()->where('status', 1)->whereIn('id', $advertisement['buy']);

        // Apply search filter if search parameter is provided
        if ($request->get('search')) {
            $properties["buy"] = $properties["buy"]->where('name', 'like', '%' . $request->search . '%');
        }

        // Apply type filter if type parameter is provided
        if ($request->get('property_type') && $request->get('property_type') > 0) {
            $properties["buy"] = $properties["buy"]->where('property_category_id', $request->property_type);
        }

        if ($request->location) {
            $properties["buy"] = $properties["buy"]
                ->whereHas('location', function ($query) use ($request) {
                    $query->where('address', $request->location);
                });
        }

        if (!empty($request->min_sft) && !empty($request->max_sft)) {
            $properties["buy"] = $properties["buy"]
                ->whereBetween('size', [$request->min_sft, $request->max_sft]);
        }

        if ($request->bedroom) {
            $properties["buy"] = $properties["buy"]->where('bedroom', $request->bedroom);
        }

        if ($request->bathroom) {
            $properties["buy"] = $properties["buy"]->where('bathroom', $request->bathroom);
        }

        if (!empty($request->min_price) && !empty($request->max_price)) {
            $properties["buy"] = $properties["buy"]
                ->whereHas('advertisements', function ($query) use ($request) {
                    $query->whereBetween('sell_amount', [$request->min_price, $request->max_price]);
                });
        }

        // Paginate the results with 10 items per page
        $properties["buy"] = $properties["buy"]->paginate(10);

        $data['items']['rent']              = PropertyListResource::collection($properties["rent"]);
        $data['items']['buy']               = PropertyListResource::collection($properties["buy"]);


        // Return a successful response with the property list
        return $this->responseWithSuccess('Property List', $data, 200);
    }



    public function autocompleteSearch(Request $request)
    {
        $properties = Property::where('status', 1);
        if ($request->search != '') {
            $properties =  $properties->where('name', 'like', '%' . $request->search . '%');
        } else {
            $properties =  $properties->latest();
        }

        $data['items'] =  $properties->take(5)->select('id', 'name')->get();

        // Return a successful response with the property list
        return $this->responseWithSuccess('Autocomplete search list', $data, 200);
    }




    public function infoList()
    {
        $data['messages']   = 'Property Details (All tab list)';
        $data['items']      = ['basicInfo', 'tenant', 'gallery', 'facility', 'floorPlan', 'review', 'comments'];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }


    // create
    public function create()
    {
        $data['messages']       = 'Property Create';
        $data['deal_type']      = ['Rent', 'Sell'];
        $data['type']           = ['Residential', 'Commercial'];
        $data['completion']     = ['Completed', 'Under Construction'];
        $facilities             = PropertyFacilityType::get();
        $data['facilities']     = $facilities->map(function ($type) {
            return [
                'id'        => $type->id,
                'name'      => $type->name,
                'image'     => apiAssetPath($type->image->path),
            ];
        });

        // categories
        $categories = PropertyCategory::where('status', 1)->get();
        $data['categories'] = $categories->map(function ($category) {
            return [
                'id'     => $category->id,
                'name'   => $category->name,
            ];
        });

        return $this->responseWithSuccess($data['messages'], $data, 200);
    }




    public function details($id, $type = null)
    {
        $properties = Property::where('id', $id)->get();
        $property   = Property::where('id', $id)->first();
        try {

            switch ($type) {
                case 'basicInfo':
                    $data['title'] = 'Basic Info';
                    $data['property'] = PropertyShowResource::collection($properties);
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'gallery':
                    $data['title'] = 'Gallery of the property';
                    $galleries = $property->galleries->where('type', 'gallery');

                    $data['gallery'] = $galleries->map(function ($gallery) {
                        return [
                            'id' => $gallery->id,
                            'title' => $gallery->title,
                            'path' => apiAssetPath($gallery->image->path),
                            'original_path' => $gallery->image->path,
                        ];
                    });
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;
                case 'tenant':
                    $data['title'] = 'Tenant';
                    $current_tenant = PropertyTenant::where('property_id', $id)->where('status', 1)->first();
                    $data['current_tenant'] = [
                        'id' => $current_tenant->id,
                        'name' => @$current_tenant->user->name,
                        'present_address' => @$current_tenant->user->present_address,
                        'properties_name' => @$current_tenant->property->name,
                        'image' => apiAssetPath(@$current_tenant->user->image->path),
                        'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                        'rating' => '4',
                    ];
                    $previous_tenants = PropertyTenant::where('property_id', $id)->where('status', 0)->get();
                    $data['previous_tenants'] = $previous_tenants->map(function ($tenant) {
                        return [
                            'id' => $tenant->id,
                            'name' => @$tenant->user->name,
                            'image' => apiAssetPath(@$tenant->user->image->path),
                            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                            'rating' => '4.5',
                        ];
                    });
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'facility':
                    $data['title'] = 'Facility of the property';
                    $facilities = PropertyFacility::where('property_id', $property->id)->get();
                    $data['facilities'] = $facilities->map(function ($facility) {
                        return [
                            'id' => $facility->id,
                            'name' => $facility->type->name,
                            'content' => $facility->content,
                            'image' => apiAssetPath(@$facility->image->path),
                        ];
                    });
                    $types = PropertyFacilityType::get();
                    $data['types'] = $types->map(function ($type) {
                        return [
                            'id' => $type->id,
                            'name' => $type->name,
                            'icon' => $type->icon,
                        ];
                    });

                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'floorPlan':
                    $data['title'] = 'FloorPlan';
                    $planS =  Property::find($id)->floorPlans->where('type', 'floor_plan');
                    // $floorPlans = $property->floorPlans->where('type', 'floor_plan');
                    $data['floor_plans'] = $planS->map(function ($plan) {
                        return [
                            'id' => $plan->id,
                            'title' => $plan->title,
                            'path' => apiAssetPath($plan->image->path),
                            'original_path' => $plan->image->path,
                        ];
                    });


                    $images = $property->galleries->where('type', 'gallery');

                    $data['gallery'] = $images->map(function ($Image) {
                        return [
                            'id' => $Image->id,
                            'title' => $Image->title,
                            'path' => apiAssetPath($Image->image->path),
                            'original_path' => $Image->image->path,
                        ];
                    });


                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;
            }
        } catch (\Throwable $th) {
            return false;
        }

        $data['messages'] = 'Property List';

        return response()->json($data, 200);
    }

    public function detailsList($id, $type = null)
    {
        $property = Property::find($id);
        $properties = Property::where('id', $id)->get();

        try {

            $data['title'] = 'Basic Info';
            $data['property'] = PropertyShowResource::collection($properties);
            $current_tenant = PropertyTenant::where('status', 1)->first();
        
            $facilities = PropertyFacility::where('property_id', $property->id)->get();
            $data['facilities'] = $facilities->map(function ($facility) {
                return [
                    'id' => $facility->id,
                    'name' => $facility->type->name,
                    'content' => $facility->content,
                    'image' => apiAssetPath($facility->type->image->path),
                ];
            });


            $galleriesList = $property->galleries->where('type', 'gallery');
            $data['gallery'] = GalleryCollection::collection($galleriesList);

            $floorPlans = $property->floorPlans->where('type', 'floor_plan');
            $data['floor_plans'] = GalleryCollection::collection($floorPlans);



            $images = $property->galleries->where('type', 'gallery');

            $data['gallery'] = $images->map(function ($Image) {
                return [
                    'id' => $Image->id,
                    'title' => $Image->title,
                    'path' => apiAssetPath($Image->image->path),
                    'original_path' => $Image->image->path,
                ];
            });

            return $this->responseWithSuccess($data['title'], $data, 200);
        } catch (\Throwable $th) {
            return false;
        }

        $data['messages'] = 'Property List';

        return response()->json($data, 200);
    }


    // store
    public function store(PropertyStoreRequest $request)
    {


        try {
            // in DB 1 = Rent, 2 = Sell
            if ($request->deal_type == 1) {
                $deal_type = 1;
            } else if ($request->deal_type == 0) {
                $deal_type = 2;
            }

            // in DB 5 = flat, 6 = Land
            if ($request->property_category_id == 0) {
                $property_category_id = 5;
            } else if ($request->property_category_id == 1) {
                $property_category_id = 6;
            }

            $property               = new Property();
            $property->name         = $request->name ?? '';
            $property->slug         = Str::slug($request->name) ?? '';
            $property->deal_type    = $deal_type;
            $property->size         = $request->size;
            $property->bedroom      = $request->bedroom;
            $property->bathroom     = $request->bathroom;


            $property->user_id = Auth::user()->id;
            $property->property_category_id = $property_category_id;
            if ($request->file('default_image')) {
                $property->default_image = $this->UploadImageCreate($request->default_image, 'backend/uploads/properties');
            }

            $property->save();

            // PropertyLocation
            $pLocation = new PropertyLocation();
            $pLocation->property_id = $property->id;
            $pLocation->user_id     = Auth::user()->id;
            $pLocation->address     = $request->address;
            $pLocation->save();

            $data['messages'] = 'Property Added Successfully';
            return $this->responseWithSuccess($data['messages'], 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // galleryStore

    public function galleryFloorplanStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'title' => 'required',
                'image_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->responseWithError($validator->errors(), 422);
            }

            $gallery = new PropertyGallery();
            $gallery->property_id = $request->property_id;
            $gallery->title = $request->title;
            $gallery->type = $request->type;
            $gallery->image_id = $this->UploadImageCreate($request->image_id, 'backend/uploads/properties/' . $request->type);
            $gallery->save();

            $data['title'] = $request->type . ' added successfully';
            return $this->responseWithSuccess($data['title'], 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // facilityEdit

    public function facilityEdit($id)
    {
        try {
            $data['title'] = 'Facility Edit';
            $types = PropertyFacilityType::all();
            $data['facility_types'] = $types->map(function ($type) {
                return [
                    'id' => $type->id,
                    'name' => $type->name,
                ];
            });

            $propertyFacalities = PropertyFacility::where('property_id', $id)->get();
            $data['propertyFacilities'] = $propertyFacalities->map(function ($facility) {
                return [
                    'id' => $facility->id,
                    'property_facility_type_id' => $facility->property_facility_type_id,
                    'facility_name' => $facility->type->name,
                    'content' => $facility->content,
                ];
            });

            return $this->responseWithSuccess($data['title'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // facilityUpdate

    public function facilityUpdate(Request $request, $id)
    {
        try {
            $propertyFacilityIds = $request->property_facility_type_id;
            $propertyFacilityIds = [1, 2, 3];
            $request['content'] = ['Yes', 'Yes1', 'Yes2'];
            foreach ($propertyFacilityIds as $key => $facilityId) {
                $facility = PropertyFacility::where('property_id', $id)->where('property_facility_type_id', $facilityId)->first();
                if (!$facility) {
                    $facility = new PropertyFacility();
                }
                $facility->property_facility_type_id = $facilityId;
                $facility->content = $request->content[$key];
                $facility->save();
            }

            $data['title'] = 'Facility Updated Successfully';
            return $this->responseWithSuccess($data['title'], 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }


    public function myProperty(Request $request)
    {

        try {
            if ($request->type == 'pending') {
                $userPropertyAdvertisement  = Advertisement::where(['approval_status' => 2, 'property_creator_id' => auth()->user()->id])->pluck('property_id')->toArray();
                $property = Property::whereIn('id', $userPropertyAdvertisement)->paginate(10);


                $data['items'] = $property->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'name' => $data->name,
                        'bedroom' => $data->bedroom,
                        'bathroom' => $data->bathroom,
                        'size' => $data->size,
                        'image'    => apiAssetPath(@$data->defaultImage->path),
                        'location' => @$data->location->address,

                    ];
                });
            } else if ($request->type == 'listed') {
                $userPropertyAdvertisement  = Advertisement::where(['approval_status' => 1, 'property_creator_id' => auth()->user()->id])->pluck('property_id')->toArray();

                $property = Property::whereIn('id', $userPropertyAdvertisement)->paginate(10);


                $data['items'] = $property->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'name' => $data->name,
                        'bedroom' => $data->bedroom,
                        'bathroom' => $data->bathroom,
                        'size' => $data->size,
                        'image'    => apiAssetPath(@$data->defaultImage->path),
                        'location' => @$data->location->address,

                    ];
                });
            }

            return $this->responseWithSuccess('List found', $data, 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }



    public function wishlistStore(Request $request)
    {
        try {
            $checkExists = Wishlist::where(['user_id' => $request->user_id, 'property_id' => $request->property_id, 'advertisement_type' => $request->advertisement_type])->first();
            if ($checkExists) {
                $checkExists->delete();
                $data['messages'] = 'Property deleted successfully from wishlist!!';
                return $this->responseWithSuccess($data['messages']);
            }

            $target = new Wishlist();
            $target->user_id                = $request->user_id;
            $target->property_id            = $request->property_id;
            $target->advertisement_type     = $request->advertisement_type;

            $target->save();
            $data['messages'] = 'Wishlist Added Successfully';
            return $this->responseWithSuccess($data['messages'], $target);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }


    public function wishlists()
    {
        try {
            $wishListPrperties = Wishlist::where(['user_id' => auth()->user()->id])->get();

            $rentArr = [];
            $sellArr = [];
            if ($wishListPrperties->isNotEmpty()) {
                foreach ($wishListPrperties as $wishListArr) {
                    if ($wishListArr->advertisement_type == 1) {
                        $rentArr[] = $wishListArr->property_id;
                    }
                    if ($wishListArr->advertisement_type == 2) {
                        $sellArr[] = $wishListArr->property_id;
                    }
                }
            }


            $properties['rent'] = Advertisement::with(['property:id,name,bedroom,bathroom,size'])
                ->select('id', 'property_id', 'property_creator_id', 'advertisement_type', 'rent_amount')
                ->whereIn('property_id', $rentArr)
                ->where('advertisement_type', 1)
                ->get();


            $properties['sell'] = Advertisement::with(['property:id,name,bedroom,bathroom,size'])
                ->select('id', 'property_id', 'property_creator_id', 'advertisement_type', 'sell_amount')
                ->whereIn('property_id', $sellArr)
                ->where('advertisement_type', 2)
                ->get();


            $data['items']['rent'] = $properties['rent']->map(function ($data) {
                return [
                    'property_id' => @$data->property->id,
                    'name' => @$data->property->name,
                    'bedroom' => @$data->property->bedroom,
                    'bathroom' => @$data->property->bathroom,
                    'size' => @$data->property->size,
                    'image'    => apiAssetPath(@$data->property->defaultImage->path),
                    'location' => @$data->property->location->address,
                    'advertisement_type' => @$data->advertisement_type,
                    'rent_amount' => @$data->rent_amount,
                ];
            });

            $data['items']['sell'] = $properties['sell']->map(function ($data) {
                return [
                    'property_id' => @$data->property->id,
                    'name' => @$data->property->name,
                    'bedroom' => @$data->property->bedroom,
                    'bathroom' => @$data->property->bathroom,
                    'size' => @$data->property->size,
                    'image'    => apiAssetPath(@$data->property->defaultImage->path),
                    'location' => @$data->property->location->address,
                    'advertisement_type' => @$data->advertisement_type,
                    'sell_amount' => @$data->sell_amount,
                ];
            });

            $data['messages'] = 'Data found Successfully';
            return $this->responseWithSuccess($data['messages'], $data);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }



    public function storeAdvertisementsRent(RentStoreRequest $request)
    {

        try {
            $advertisementStore                                       = new Advertisement();
            $advertisementStore->advertisement_type                   = $request->advertisement_type;
            $advertisementStore->user_id                              = Auth::user()->id;
            $advertisementStore->property_id                          = $request->property_id;
            $advertisementStore->property_creator_id                  = Auth::user()->id;
            $advertisementStore->booking_amount                       = $request->booking_amount;
            $advertisementStore->rent_amount                          = $request->rent_amount;
            $advertisementStore->rent_type                            = $request->rent_type;
            $advertisementStore->rent_start_date                      = $request->rent_start_date;
            $advertisementStore->rent_end_date                        = $request->rent_end_date;
            $advertisementStore->status                               = $request->status;
            $advertisementStore->negotiable                           = $request->negotiable;
            $advertisementStore->save();

            $data['messages'] = 'Advertisement Rent Added Successfully';
            return $this->responseWithSuccess($data['messages'], $data);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }
    public function storeAdvertisementsSell(SellStoreRequest $request)
    {

        try {
            $advertisementStore                                       = new Advertisement();
            $advertisementStore->advertisement_type                   = $request->advertisement_type;
            $advertisementStore->user_id                              = Auth()->user()->id;
            $advertisementStore->property_id                          = $request->property_id;
            $advertisementStore->property_creator_id                  = Auth()->user()->id;
            $advertisementStore->booking_amount                       = $request->booking_amount;
            $advertisementStore->sell_amount                          = $request->sell_amount;
            $advertisementStore->sell_start_date                      = $request->sell_start_date;
            $advertisementStore->status                               = $request->status;
            $advertisementStore->negotiable                           = $request->negotiable;
            $advertisementStore->save();

            $data['messages'] = 'Advertisement Sell Added Successfully';
            return $this->responseWithSuccess($data['messages'], $data);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }


    public function createAdvertisements()
    {

        try {

            $data['advertisement_type']  = ['1' => "Rent", '2' => "Sell"];
            $data['property_list']       = Property::where('user_id', auth()->user()->id)->select('id','name')->get();

            $data['messages'] = 'Data list';
            return $this->responseWithSuccess($data['messages'], $data);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    public function getRequestPropery()
    {
        try {

            $rentArr       = RequestProperty::where('user_id', auth()->user()->id)->where('advertisement_type', 1)->pluck('property_id')->toArray();
            $sellArr       = RequestProperty::where('user_id', auth()->user()->id)->where('advertisement_type', 2)->pluck('property_id')->toArray();


            $property['rent'] = Property::whereIn('id', $rentArr)->get();
            $property['sell'] = Property::whereIn('id', $sellArr)->get();


            $rentArr = [];
            foreach($property['rent'] as $rent){
                $rentArr[] = [
                    'id'        => $rent->id,
                    'name'      => $rent->name,
                    'image'     => apiAssetPath(@$rent->defaultImage->path),
                    'location'  => @$rent->location->address,
                    'ad_type'   => 'rent',
                ];

            }



            $sellArr = [];
            foreach($property['sell'] as $sell){
                $sellArr[] = [
                    'id'            => $sell->id,
                    'name'          => $sell->name,
                    'image'         => apiAssetPath(@$sell->defaultImage->path),
                    'location'      => @$sell->location->address,
                    'ad_type'       => 'sell',
                ];
            }

            $finalData['items'] = array_merge($rentArr,$sellArr);

            $data['messages'] = 'Data list';
            return $this->responseWithSuccess($data['messages'], $finalData);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    public function requestProperyStore(PropertyBookRequest $request)
    {

        try {
            $checkExists = RequestProperty::where(['user_id' => $request->user_id, 'property_id' => $request->property_id, 'advertisement_type' => $request->advertisement_type])->first();
            if ($checkExists) {
                $data['messages'] = 'You have already booked to visit this property!!';
                return $this->responseWithSuccess($data['messages']);
            }

            $target                         = new RequestProperty();
            $target->user_id                = $request->user_id;
            $target->property_id            = $request->property_id;
            $target->advertisement_type     = $request->advertisement_type;
            $target->visit_date             = $request->visit_date;

            $target->save();
            $data['messages'] = 'Request Property Added Successfully';
            return $this->responseWithSuccess($data['messages'], $target);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }



    public function deleteRequestPropery(DeleteBookRequest $request)
    {
        try {
            $checkExists = RequestProperty::where(['user_id' => $request->user_id, 'property_id' => $request->property_id, 'advertisement_type' => $request->advertisement_type])->first();
            if ($checkExists) {
                $checkExists->delete();
                $data['messages'] = 'Request Property deleted Successfully!!';
                return $this->responseWithSuccess($data['messages']);
            }


            $data['messages'] = 'Request Property does not deleted Successfully!!';
            return $this->responseWithSuccess($data['messages']);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }
}
