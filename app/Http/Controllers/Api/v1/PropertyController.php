<?php

namespace App\Http\Controllers\Api\v1;

use App\Enums\ApprovalStatus;
use App\Enums\DealType;
use App\Enums\PropertyStatus;
use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\CategoryProepertyListResource;
use App\Http\Resources\Api\v1\PropertiesResource;
use App\Http\Resources\Api\v1\PropertyListResource;
use App\Http\Resources\GalleryCollection;
use App\Http\Resources\Api\v1\PropertyShowResource;
use App\Models\Advertisement;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyFacilityType;
use App\Models\Property\PropertyGallery;
use App\Models\Property\PropertyLocation;
use App\Models\Property\PropertyReview;
use App\Models\Property\PropertyTenant;
use App\Models\PropertyDocument;
use App\Models\Wishlist;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\CommonHelperTrait;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    use ApiReturnFormatTrait;
    use CommonHelperTrait;


    public function propertyList()
    {
        $authUser = auth()->user();
        $query = Property::select('id', 'name');
        if ($authUser->role_id == Role::LANDLORD){
            $query = $query->where('user_id', $authUser->id);
        }
        $properties = $query->get();
        return $this->successResponse('Property List', $properties, 200);
    }

    public function index(Request $request)
    {
        try {
            $keyword = $request->input('search');
            $limit = $request->input('limit', 10);
            $properties = Property::query()
                ->where('user_id', auth()->id())
                ->when($keyword, function ($q) use ($keyword, $request) {
                    $q->where('name', 'LIKE', "%{$keyword}%");
                })
                ->orderByDesc('id')
                ->paginate($limit);
            //statistics data
            $statistics = Auth::user()->properties;
            $data['statistics'] = [
                'total' => $statistics->count(),
                'vacant' => $statistics->where('vacant', 1)->count(),
                'occupied' => $statistics->where('vacant', 0)->count(),
            ];

            $data['properties'] = new PropertyListResource($properties);

            return $this->responseWithSuccess('Property List', $data, 200);
        } catch (\Throwable $e) {
            return $this->responseExceptionError($e->getMessage(), $e->getTrace(), 500);
        }
    }


    public function infoList()
    {
        $data['messages'] = 'Property Details (All tab list)';
        $data['items'] = ['basicInfo', 'tenant', 'gallery', 'facility', 'floorPlan', 'review', 'comments'];
        return $this->successResponse($data['messages'], $data, 200);
    }


    // create
    public function create()
    {
        $data['messages'] = 'Property Create';
        $data['deal_type'] = Utils::advertisementTypes();
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
        try {
            $properties = Property::findOrFail($id);
            switch ($type) {
                case 'basicInfo':
                    $data['title'] = 'Basic Info';
                    $data['property'] = new PropertyShowResource($properties);
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;

                case 'gallery':
                    $data['title'] = 'Gallery of the property';
                    $galleries = $properties->galleries->where('type', 'gallery');
                    $data['gallery'] = $galleries->map(function ($gallery) {
                        return [
                            'id' => $gallery->id,
                            'title' => $gallery->title,
                            'path' => @apiAssetPath($gallery->image->path),
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
                    $planS = Property::findOrFail($id)->floorPlans->where('type', 'floor_plan');
                    $data['floor_plans'] = $planS->map(function ($plan) {
                        return [
                            'id' => $plan->id,
                            'title' => $plan->title,
                            'path' => apiAssetPath($plan->image->path),
                            'original_path' => $plan->image->path,
                        ];
                    });
                    return $this->responseWithSuccess($data['title'], $data, 200);
                    break;
            }
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }

        $data['messages'] = 'Property List';

        return response()->json($data, 200);
    }

    public function detailsList($id, $type = null)
    {
        try {
            $property = Property::findOrFail($id);

            $data['title'] = 'Basic Info';
            $data['property'] = new PropertyShowResource($property);

            $data['title'] = 'Tenant';
            $current_tenant = PropertyTenant::where('property_id', $id)->where('status', 1)->get();

            if ($current_tenant) {
                $data['current_tenant'] = $current_tenant->map(function ($tenant) {
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

            return $this->responseWithSuccess($data['title'], $data, 200);

        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
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
            DB::beginTransaction();

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

            if ($request->hasFile('default_image')) {
                $property->default_image = $this->UploadImageCreate($request->default_image, 'backend/uploads/properties');
            }

            $property->save();

            // Property Document
            if ($request->hasFile('property_deed')) {
                $newDoc = new PropertyDocument();
                $newDoc->property_id = $property->id;
                $newDoc->title =  'Property Deed Document';
                $newDoc->attachment_id = $this->UploadImageCreate($request->property_deed, 'backend/uploads/documents');
                $newDoc->created_by = \auth()->id();
                $newDoc->save();
            }

            // PropertyLocation
            $pLocation = new PropertyLocation();
            $pLocation->property_id = $property->id;
            $pLocation->user_id = Auth::user()->id;
            $pLocation->address = $request->address;
            $pLocation->country_id = $request->country_id;
            if ($request->status_id) {
                $pLocation->state_id = $request->status_id;
            }

            if ($request->city_id) {
                $pLocation->city_id = $request->city_id;
            }

            $pLocation->post_code = $request->post_code;
            $pLocation->save();

            DB::commit();

            $data['messages'] = 'Property Added Successfully';
            return $this->responseWithSuccess($data['messages'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
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
                'id' => $property->id,
                'size' => $property->size,
                'rent_amount' => $property->rent_amount,
                'bedroom' => $property->bedroom,
                'bathroom' => $property->bathroom,
                'flat_no' => $property->flat_no,
                'type' => $property->type == 1 ? 'Commercial' : 'Residential',
                'completion' => $property->completion == 1 ? 'Under Completed' : 'Construction',
                'description' => $property->description,
            ];
            return $this->responseWithSuccess($data['title'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // update

    public function update(Request $request, $id)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'country_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseWithError($validator->errors(), 422);
        }
        try {
            $property = Property::findOrFail($id);
            $property->name = $request->name;
            $property->slug = Str::slug($request->name) . '-' . Str::random(5);

            $property->type = $request->type;

            $property->property_category_id = $request->property_category_id;
            if ($request->hasFile('default_image')){
                $property->default_image = $this->UploadImageCreate($request->default_image, 'backend/uploads/properties');
            }

            $property->save();

            // PropertyLocation
            $pLocation = PropertyLocation::where('property_id', $property->id)->first();
            $pLocation->property_id = $property->id;
            $pLocation->user_id = Auth::user()->id;
            $pLocation->address = $request->address;
            $pLocation->country_id = $request->country_id;
            if ($request->division_id) {
                $pLocation->state_id = $request->division_id;
            }
            if ($request->district_id) {
                $pLocation->city_id = $request->division_id;
            }
            $pLocation->post_code = $request->post_code;
            $pLocation->save();

            $data['messages'] = 'Property Updated Successfully';
            return $this->successResponse($data['messages'], 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    public function updateBasicInfo(Request $request, $id)
    {
        try {
            $propertyStore                 = Property::findOrFail($id);
            $propertyStore->name           = $request->name;
            $propertyStore->size           = $request->size;
            $propertyStore->bedroom        = $request->bedroom;
            $propertyStore->bathroom       = $request->bathroom;
            $propertyStore->rent_amount    = $request->rent_amount;
            $propertyStore->flat_no        = $request->flat_no;
            $propertyStore->type           = $request->type;
            $propertyStore->completion     = $request->completion;
            $propertyStore->description    = $request->description;
            $propertyStore->save();

            return $this->successResponse('updated successfully');
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }


    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $property = Property::findOrFail($request->id);
            if ($property->status == PropertyStatus::APPROVED) {
                throw new \Exception('This property is already approved you can\'t delete');
            }
            PropertyTenant::where('property_id', $property->id)->delete();
            $document = PropertyDocument::where('property_id', $property->id)->first();
            $this->UploadImageDelete($document->attachment_id);
            $this->UploadImageDelete($property->default_image);
            $property->delete();

            $data['messages'] = 'Property Deleted Successfully';
            DB::commit();
            return $this->successResponse($data['messages'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }


    // Add Gallery
    public function addGallery(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'title' => 'required',
                'image' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $gallery = new PropertyGallery();
            $gallery->property_id = $request->property_id;
            $gallery->title = $request->title;

            if ($request->hasFile('image')) {
                $gallery->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/properties/gallery');
            }

            $gallery->save();

            return $this->successResponse('Successfully Added', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }


    // Delete Gallary
    public function deleteGallery($id)
    {
        try {
            $gallery = PropertyGallery::findOrFail($id);
            $this->UploadImageDelete($gallery->image_id);
            $gallery->delete();
            return $this->successResponse('Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    // Add facilities
    public function addFacility(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'property_facility_type_id' => 'required|unique:property_facilities,property_facility_type_id,NULL,id,property_id,'.$request->property_id,
                'value' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $facility = new PropertyFacility();
            $facility->property_id = $request->property_id;
            $facility->property_facility_type_id = $request->property_facility_type_id;
            $facility->content = $request->value;

            $facility->save();

            return $this->successResponse('Successfully Added', 200);

        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    //Update facility
    public function updateFacility(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'property_facility_type_id' => 'required|unique:property_facilities,property_facility_type_id,'.$id.',id,property_id,'.$request->property_id,
                'value' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $facility = PropertyFacility::findOrFail($id);
            $facility->property_id = $request->property_id;
            $facility->property_facility_type_id = $request->property_facility_type_id;
            $facility->content = $request->value;

            $facility->save();

            return $this->successResponse('Successfully Updated', 200);

        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    //Delete facility
    public function deleteFacility($id)
    {
        try {
            $facility = PropertyFacility::findOrFail($id);
            $facility->delete();
            return $this->successResponse('Successfully Deleted', 200);
        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // Add Floorplan
    public function addFloorplan(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'title' => 'required',
                'image' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $gallery = new PropertyGallery();
            $gallery->property_id = $request->property_id;
            $gallery->title = $request->title;
            $gallery->type = "floor_plan";

            if ($request->hasFile('image')) {
                $gallery->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/properties/gallery');
            }

            $gallery->save();

            return $this->successResponse('Successfully Added', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    // Delete Floorplan
    public function deleteFloorplan($id)
    {
        try {
            $gallery = PropertyGallery::findOrFail($id);
            $this->UploadImageDelete($gallery->image_id);
            $gallery->delete();
            return $this->successResponse('Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    // Add Document
    public function addDocument(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
                'title' => 'required',
                'file' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $document                                    = new PropertyDocument();
            $document->title                             = $request->title;
            $document->property_id                       = $request->property_id;
            $document->created_by                        = \auth()->id() ;

            if ($request->hasFile('file')) {
                $document->attachment_id = $this->UploadImageCreate($request->file, 'backend/uploads/properties/documents');
            }

            $document->save();

            return $this->successResponse('Successfully Added', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    // Delete Document
    public function deleteDocument($id)
    {
        try {
            $document = PropertyDocument::findOrFail($id);
            $this->UploadImageDelete($document->attachment_id);
            $document->delete();
            return $this->successResponse('Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }



    public
    function categoryWiseProperties(Request $request)
    {
        try {
            // Trendings properties
            $property['trending_properties'] = Advertisement::query()
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


            // Recommendation properties
            $property['recommended_properties'] = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q) {
                    $q->where('is_recommended', 1);
                })
                ->get();

            $property['discounted_properties'] = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->whereDoesntHave('orders', function ($query) {
                    $query->whereIn('status', ['pending', 'approved']);
                })
                ->with('property')
                ->whereHas('property', function ($q) {
                    $q->where('discount_amount', '>', 0);
                })
                ->get();

            $property['rent_properties'] = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('status', 1)
                ->where('advertisement_type', 1)
                ->with('property')
                ->get();

            $property['buy_properties'] = Advertisement::query()
                ->where('approval_status', ApprovalStatus::APPROVED)
                ->where('advertisement_type', 2)
                ->where('status', 1)
                ->with('property')
                ->get();

            $responseData = CategoryProepertyListResource::collection($property);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public
    function propertySearchField()
    {
        try {
            $categories = PropertyCategory::select('id', 'name')->get();

            $sqfts = [];
            for ($i = 1; $i <= 7; $i++) {
                $sqfts[] = $i * 1000 . '-' . $i * 1000 + 1000;
            }

            $baths = [];
            for ($i = 1; $i < 7; $i++) {
                $baths[] = $i >= 2 ? "$i Baths" : "$i Bath";
            }

            $beds = [];
            for ($i = 1; $i < 7; $i++) {
                $beds[] = $i >= 2 ? "$i Beds" : "$i Bed";
            }


            $data['baths'] = $baths;
            $data['beds'] = $beds;
            $data['categories'] = $categories;
            $data['purpose'] = Utils::advertisementTypes();
            $data['sqfts'] = $sqfts;

            $data['filters'] = [
                'is_trending' => 'Trending Property',
                'is_recommended' => 'Recommanded Property',
                'discounted' => 'Discounted Property',
            ];

            return $this->successResponse('success', $data);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public
    function properties(Request $request)
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
                    if ($request->has('categories') && !empty($request->input('categories'))) {
                        $inputCategories = PropertyCategory::whereIn('id', $request->categories)->pluck('name');
                        $data['keyword'] = $this->updateArray($data['keyword'], $inputCategories);
                        $q->whereIn('property_category_id', $request->categories);
                    }
                    if ($request->has('beds') && !empty($request->beds)) {
                        $data['keyword'] = $this->updateArray($data['keyword'], $request->beds, "beds");
                        $q->whereIn('bedroom', $request->beds);
                    }
                    if ($request->has('baths') && !empty($request->baths)) {
                        $data['keyword'] = $this->updateArray($data['keyword'], $request->baths, "baths");
                        $q->whereIn('bathroom', $request->baths);
                    }

                    if ($request->has('sqfts') && !empty($request->sqfts)) {
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

            $responseData = PropertiesResource::collection($list);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public
    function updateArray($array, $newArray, $str = "")
    {
        foreach ($newArray as $c) {
            if ($str != "") {
                $c = $c . " " . $str;
            }
            array_push($array, $c);
        }
        return $array;
    }


    public
    function propertyDetails(Request $request, $slug)
    {
        try {
            $property = Property::with(['facilities'])->where('slug', $slug)->first();
            if (!$property) {
                throw new \Exception('Property not found',404);
            }
            $id = $property->id;
            $data['advertisement'] = Advertisement::find($request->input('advertise_id'));
            if ($property == null) {
                abort(404);
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
                'wishlist' => $wishlist ? true : false,
                'owner' => [
                    'id' => @$property->user->id,
                    'name' => @$property->user->name,
                    'email' => @$property->user->email,
                    'phone' => @$property->user->phone,
                ]
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
                    'id' => @$item->id,
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

            $data['user'] = [
                'id' => @$property->user->id,
                'name' => @$property->user->name,
                'email' => @$property->user->email,
                'phone' => @$property->user->phone,
            ];

            $data['tenants'] = $property->tenants->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'name' => @$data->user->name,
                    'email' => @$data->user->email,
                    'phone' => @$data->user->phone,
                    'photo' => @apiAssetPath($data->user->image->path),
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
            $data['document'] = $property->document;


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

            return $this->successResponse('success', $data);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getLine(), 500);
        }
    }

    protected
    function getPropertyPrice($ad)
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


// Wishlist

    public
    function wishlistAdd(Request $request)
    {
        try {
            $propertyId = $request->input('property_id', null);

            $property = Property::find($propertyId);

            if (!$property) {
                throw new \Exception('alert.Invalid property id');
            }

            $wishlist = Wishlist::where('user_id', Auth::id())->where('property_id', $propertyId)->first();

            if ($wishlist) {
                $wishlist->delete();
                return $this->successResponse(_trans('alert.Removed from wishlist.'));
            }

            $wishlist = new Wishlist();

            $wishlist->user_id = Auth::id();
            $wishlist->property_id = $propertyId;
            $wishlist->save();

            return $this->successResponse(_trans('alert.Successfully added into Wishlist'));
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public
    function wishlistDelete($id)
    {
        try {
            $wishlist = Wishlist::query()->find($id);
            if (!$wishlist) {
                throw new \Exception('Wishlist not found');
            }

            $wishlist->delete();

            return $this->successResponse(_trans('alert.Removed from wishlist.'));
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

}
