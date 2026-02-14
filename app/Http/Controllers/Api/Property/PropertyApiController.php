<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use App\Models\Property\PropertyGallery;
use App\Http\Resources\GalleryCollection;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyLocation;
use Illuminate\Support\Facades\Validator; 
use App\Http\Resources\PropertyShowResource;
use App\Models\Property\PropertyFacilityType;
use App\Http\Resources\Api\v1\PropertyListResource;

class PropertyApiController extends Controller
{
    use ApiReturnFormatTrait;
    use CommonHelperTrait;


    public function index(Request $request)
    {
        try {
            $properties = Property::query()->where('user_id', 8)->orderByDesc('id');

            if ($request->get('search')) {
                $properties =  $properties->where('name', 'like', '%' . $request->search . '%');
            }
            $properties =  $properties->paginate(10);

            //statistics data
            $statistics = Auth::user()->properties;
            $data['statistics'] = [
                'total' => $statistics->count(),
                'vacant' => $statistics->where('vacant', 1)->count(),
                'occupied' => $statistics->where('vacant', 0)->count(),
            ];
            $total_properties = $statistics->count();
            $vacant = $statistics->where('vacant', 1)->count();
            $occupied = $total_properties - $vacant;


            $data['properties'] = PropertyListResource::collection($properties);

            return $this->responseWithSuccess('Property List', $data, 200);
        } catch (\Throwable $e) {
            return $this->responseExceptionError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function infoList()
    {
        $data['messages'] = 'Property Details (All tab list)';
        $data['items'] = ['basicInfo', 'tenant', 'gallery', 'facility', 'floorPlan', 'review', 'comments'];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }


    // create
    public function create()
    {
        $data['messages'] = 'Property Create';
        $data['deal_type'] = ['Rent', 'Sell'];
        $data['type'] = ['Residential', 'Commercial'];
        $data['completion'] = ['Completed', 'Under Construction'];
        $facilities = PropertyFacilityType::get();
        $data['facilities'] = $facilities->map(function ($type) {
            return [
                'id' => $type->id,
                'name' => $type->name,
                'image' => apiAssetPath($type->image->path),
            ];
        });

        // categories
        $categories = PropertyCategory::where('status', 1)->get();
        $data['categories'] = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
            ];
        });

        return $this->responseWithSuccess($data['messages'], $data, 200);
    }


    public function details($id, $type = null)
    {
        $properties = Property::where('id', $id)->get();

        try {
            switch ($type) {
                case 'basicInfo':
                    $data['title'] = 'Basic Info';
                    $data['property'] = PropertyShowResource::collection($properties);
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'gallery':
                    $data['title'] = 'Gallery of the property';
                    $galleries = $properties->galleries->where('type', 'gallery');

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
                    if ($current_tenant) {
                        $data['current_tenant'] = [
                            'id' => $current_tenant->id,
                            'name' => @$current_tenant->user->name,
                            'present_address' => @$current_tenant->user->present_address,
                            'properties_name' => @$current_tenant->property->name,
                            'image' => apiAssetPath(@$current_tenant->user->image->path),
                            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                            'rating' => '4',
                        ];
                    } else {
                        $data['current_tenant'] = [];
                    }

                    $previous_tenants = PropertyTenant::where('property_id', $id)->where('status', 0)->get();
                    if ($previous_tenants) {
                        $data['previous_tenants'] = $previous_tenants->map(function ($tenant) {
                            return [
                                'id' => $tenant->id,
                                'name' => @$tenant->user->name,
                                'image' => apiAssetPath(@$tenant->user->image->path),
                                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                                'rating' => '4.5',
                            ];
                        });
                    } else {
                        $data['previous_tenants'] = [];
                    }

                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'facility':
                    $data['title'] = 'Facility of the property';
                    $facilities = PropertyFacility::where('property_id', $properties->id)->get();
                    $data['facilities'] = $facilities->map(function ($facility) {
                        return [
                            'id' => $facility->id,
                            'name' => $facility->type->name,
                            'content' => $facility->content,
                            'image' => apiAssetPath($facility->image->path),
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


                    $images = $properties->galleries->where('type', 'gallery');

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
            throw $th;
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



            $data['title'] = 'Tenant';
            $current_tenant = PropertyTenant::where('property_id', $id)->where('status', 1)->get();

            if ($current_tenant) {
                $data['current_tenant'] = $current_tenant->map(function($tenant){
                    return [
                        'id' => $tenant->user_id,
                        'name' => @$tenant->user->name,
                        'present_address' => @$tenant->user->present_address,
                        'properties_name' => @$tenant->property->name,
                        'image' => apiAssetPath(@$tenant->user->image->path),
                        'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                        'rating' => '4',
                    ];
                });

            } else {
                $data['current_tenant'] = "";
            }

            $previous_tenants = PropertyTenant::where('property_id', $id)->where('status', 0)->get();
            if ($previous_tenants) {
                $data['previous_tenants'] = $previous_tenants->map(function ($tenant) {
                    return [
                        'id' => $tenant->id,
                        'name' => @$tenant->user->name,
                        'image' => apiAssetPath(@$tenant->user->image->path),
                        'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
                        'rating' => '4.5',
                    ];
                });
            } else {
                $data['previous_tenants'] = "";
            }
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
            return true;
        }

        $data['messages'] = 'Property List';

        return response()->json($data, 200);
    }


    // store
    public function store(Request $request)
    {


        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'property_category_id' => 'required',
            'default_image' => 'required',
            'address' => 'required',
            'country_id' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->responseWithError($validator->errors(), 422);
        }

        try {

            $property = new Property();
            $property->name = $request->name;
            $property->slug = Str::slug($request->name) . '-' . Str::random(5);

            if ($request->type == "Residential") {
                $property->type = 2;
            } else {
                $property->type = 1;
            }
            $property->user_id = Auth::user()->id;
            $property->property_category_id = $request->property_category_id;
            $property->default_image = $this->UploadImageCreate($request->default_image, 'backend/uploads/properties');
            $property->save();

            // PropertyLocation
            $pLocation = new PropertyLocation();
            $pLocation->property_id = $property->id;
            $pLocation->user_id     = Auth::user()->id;
            $pLocation->address     = $request->address;
            $pLocation->country_id  = $request->country_id;
            if ($request->division_id) {
                $pLocation->state_id = $request->division_id;
            }
            if ($request->district_id) {
                $pLocation->city_id = $request->division_id;
            }
            $pLocation->post_code   = $request->post_code;
            $pLocation->save();

            $data['messages'] = 'Property Added Successfully';
            return $this->responseWithSuccess($data['messages'], 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // edit

    public function edit($id)
    {

        try {

            $data['title'] = 'Basic Info Edit';

            $property = Property::find($id);
            $data['type'] = ['Residential', 'Commercial'];
            $data['completion'] = ['Completed', 'Under Construction'];
            $data['property'] = [
                'id'            => $property->id,
                'size'          => $property->size,
                'rent_amount'   => $property->rent_amount,
                'bedroom'       => $property->bedroom,
                'bathroom'      => $property->bathroom,
                'flat_no'       => $property->flat_no,
                'type'          => $property->type == 1 ? 'Commercial' : 'Residential',
                'completion'    => $property->completion == 1 ? 'Under Completed' : 'Construction',
                'description'   => $property->description,
            ];
            return $this->responseWithSuccess($data['title'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // update

    public function update(Request $request, $id)
    {
        try {
            $property = Property::find($id);
            if ($request->size != null) {
                $property->size         = $request->size;
            }

            if ($request->rent_amount != null) {
                $property->rent_amount  = $request->rent_amount;
            }

            if ($request->bedroom != null) {
                $property->bedroom      = $request->bedroom;
            }

            if ($request->bathroom != null) {
                $property->bathroom     = $request->bathroom;
            }

            if ($request->flat_no != null) {
                $property->flat_no      = $request->flat_no;
            }

            if ($request->type != null) {
                $property->type         = $request->type == 'Commercial' ? 1 : 2;
            }

            if ($request->completion != null) {
                $property->completion   = $request->completion == 'Under Construction' ? 1 : 2;
            }

            if ($request->description != null) {
                $property->description  = $request->description;
            }
            if ($request->deal_type != null) {
                $property->deal_type   = $request->deal_type == 'Rent' ? 1 : 2;
            }

            $property->save();

            $data['title'] = 'Basic Info Updated Successfully';
            return $this->responseWithSuccess($data['title'], 200);
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
            $propertyFacilityIds =$request->property_facility_type_id;
            $contentArray = $request->input('content');

            // Validate if both arrays have the same number of elements
            if (count($propertyFacilityIds) !== count($contentArray)) {
                return $this->responseExceptionError('Invalid request data', [], 400);
            }

            foreach ($propertyFacilityIds as $key => $facilityId) {
                $dataToUpdate = [
                    'property_id' => $id,
                    'property_facility_type_id' => $facilityId,
                ];

                $data = [
                    'content' => $contentArray[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Use updateOrInsert to update existing records or insert new ones
                PropertyFacility::updateOrInsert($dataToUpdate, $data);
            }

            return $this->responseWithSuccess('Facilities updated successfully', 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

}
