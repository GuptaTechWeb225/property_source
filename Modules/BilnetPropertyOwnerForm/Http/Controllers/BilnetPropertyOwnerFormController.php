<?php

namespace Modules\BilnetPropertyOwnerForm\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\BilnetPropertyOwnerForm\Entities\TemporaryPropertyOwner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Modules\BilnetPropertyOwnerForm\Entities\OtpVerification;
use Modules\BilnetPropertyOwnerForm\Entities\PropertyOwnerForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\BilnetPropertyOwnerForm\Services\OTPService;
use Yoeunes\Toastr\Facades\Toastr;

class BilnetPropertyOwnerFormController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('bilnetpropertyownerform::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function createTemporaryOwner(Request $request)
    {
        // Ensure the request is an AJAX call
        if (!$request->ajax()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid request type. Only AJAX requests are allowed.',
            ], 400);
        }

        $request['token'] = $this->generateUniqueToken(12);

        $data = $request->all();
        $rules = TemporaryPropertyOwner::$rules;

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Create the TemporaryPropertyOwner record
            $temporaryPropertyOwner = TemporaryPropertyOwner::create([
                'token' => $data['token'] ?? null,
                'phone' => $data['phone'] ?? null,
                'email' => $data['email'] ?? null,
                'last_updated_slide_no' => $data['last_updated_slide_no'],
                'last_completed_slide_no' => $data['last_completed_slide_no'],
                'is_completed' => false,
            ]);

            // Add key-value pairs to PropertyOwnerForm for slider_1
            $items = $request->get('items');
            $sliderOne = $items['slider_1'];
            $sliderTwo = $items['slider_2'];


            foreach ($sliderOne as $key => $value) {
                PropertyOwnerForm::create([
                    'property_owner_id' => $temporaryPropertyOwner->id,
                    'key' => $key,
                    'value' => $value,
                    'slide_no' => 1,
                ]);
            }

            // Add key-value pairs to PropertyOwnerForm for slider_2

            $errors = [];

            foreach ($sliderTwo as $key => $value) {
                $filteredField = current(array_filter($this->validationFields, function ($item) use ($key) {
                    return $item['item_field'] === $key;
                }));

                if ($filteredField) {
                    $otpErrors = $this->otpService->validateOtp(
                        $sliderTwo[$filteredField['item_field']],
                        $sliderTwo[$filteredField['otp_field']],
                        $key
                    );

                    if ($otpErrors) {
                        $errors[$key] = $otpErrors['errors']->all();
                    }
                }

                PropertyOwnerForm::create([
                    'property_owner_id' => $temporaryPropertyOwner->id,
                    'key' => $key,
                    'value' => $value,
                    'slide_no' => 2,
                ]);
            }

            if (!empty($errors)) {
                DB::rollBack();
                return Response::json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $errors, // Errors grouped by field
                ], 422); // Use an appropriate status code
            }

            DB::commit();

            return Response::json([
                'success' => true,
                'message' => 'Temporary property owner and key-value pairs created successfully.',
                'data' => $temporaryPropertyOwner,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return Response::json([
                'success' => false,
                'message' => 'An error occurred while creating the temporary property owner.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getTemporaryFormData($form_token, $slide_no)
    {
        try {
            $owner = TemporaryPropertyOwner::where('token', $form_token)->first();

            if ($owner) {
                $formData = PropertyOwnerForm::where('property_owner_id',  $owner->id)->where('slide_no', $slide_no)->get();

                return Response::json([
                    'success' => true,
                    'message' => 'Temporary property owner and key-value pairs created successfully.',
                    'data' => [
                        'items' => $formData,
                        'owner' => $owner
                    ],
                ], 200);
            }


            return Response::json([
                'success' => true,
                'message' => 'Temporary property owner and key-value pairs created successfully.',
                'data' => [],
            ], 200);
        } catch (\Exception $e) {

            return Response::json([
                'success' => false,
                'message' => 'An error occurred while creating the temporary property owner.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function updateFormData($token, $slide_no, Request $request)
    {
        try {
            $formOwner = TemporaryPropertyOwner::where('token', $token)->first();

            if (!$formOwner) {
                return Response::json([
                    'success' => false,
                    'message' => 'No form owner found!',
                    'error' => "Not found!",
                ], 404);
            }

            DB::beginTransaction();

            if ($slide_no > $formOwner->last_completed_slide_no) {
                $formOwner['last_updated_slide_no'] = $slide_no;
                $formOwner['last_completed_slide_no'] = $slide_no;
            } else {
                $formOwner['last_updated_slide_no'] = $slide_no;
            }


            $items = $request->get('items');
            $errors = []; // Initialize an empty array to collect errors

            foreach ($items as $key => $value) {
                $filteredField = current(array_filter($this->validationFields, function ($item) use ($key) {
                    return $item['item_field'] === $key;
                }));

                if ($filteredField && !empty($value)) {
                    $otpErrors = $this->otpService->validateOtp(
                        $items[$filteredField['item_field']],
                        $items[$filteredField['otp_field']],
                        $key
                    );

                    if ($otpErrors) {
                        $errors[$key] = $otpErrors['errors']->all();
                    }
                }

                // Create or update the record
                PropertyOwnerForm::updateOrCreate(
                    [
                        'property_owner_id' => $formOwner->id,
                        'slide_no' => $slide_no,
                        'key' => $key,
                    ],
                    [
                        'value' => $value, // Update the value if the record exists
                    ]
                );
            }

            // Check for errors after processing all items
            if (!empty($errors)) {
                DB::rollBack();
                return Response::json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $errors, // Return errors grouped by field keys
                ], 422); // Use appropriate status code
            }

            // Save the form owner and commit the transaction
            $formOwner->save();

            DB::commit();


            return Response::json([
                'success' => true,
                'message' => 'Key value pairs for temporary owner updated successfully.',
                'data' => $formOwner,
            ], 202);
        } catch (\Exception $e) {
            DB::rollBack();

            return Response::json([
                'success' => false,
                'message' => 'An error occurred while updating the temporary property owner form data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Fetch the form data for a specific slide and return the corresponding view.
     *
     * @param int $slide_no
     * @param TemporaryPropertyOwner|null $owner
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    private function fetchSlideData($slide_no, $owner, $user)
    {
        if (!$owner) {
            Toastr::error(_trans('response.Property Owner form not found'), 'Error');
            return redirect()->back();
        }

        $formData = PropertyOwnerForm::where('property_owner_id', $owner->id)
            ->where('slide_no', $slide_no)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item['key'] => $item['value']];
            });

        $slides = [
            1 => ['view' => 'slide_1_personal_details', 'title' => 'Personal Details'],
            2 => ['view' => 'slide_2_contact_address', 'title' => 'Contact Address'],
            3 => ['view' => 'slide_3_occuption', 'title' => 'Occupation'],
            4 => ['view' => 'slide_4_biometric_capture', 'title' => 'Biometric Capture'],
            5 => ['view' => 'slide_5_company_details', 'title' => 'Company Details'],
            6 => ['view' => 'slide_6_asset_property', 'title' => 'Property Asset Information'],
            7 => ['view' => 'slide_7_form_of_land', 'title' => 'Land Details'],
            8 => ['view' => 'slide_8_party_a_witness', 'title' => 'Indenture Details (a)'],
            9 => ['view' => 'slide_9_party_b_witness', 'title' => 'Indenture Details (b)'],
            10 => ['view' => 'slide_10_deponent_details', 'title' => 'Deponent Details'],
            11 => ['view' => 'slide_11_land_title_concurrenc_details', 'title' => 'Land Title Concurrence Details (optional)'],
            12 => ['view' => 'slide_12_yellow_card_details', 'title' => 'Yellow Card Details (optional)'],
            13 => ['view' => 'slide_13_building_permit_details', 'title' => 'Building Permit Details'],
            14 => ['view' => 'slide_14_building_plan_details', 'title' => 'Building Plan Details'],
            15 => ['view' => 'slide_15_building_plan_details_continue', 'title' => 'Building Plan Details (continued)'],
            16 => ['view' => 'slide_16_room_space_registration', 'title' => 'Room Space Registration'],
            17 => ['view' => 'slide_17_house_space_purpose_registration', 'title' => 'House Space Purpose Registration'],
            18 => ['view' => 'slide_18_facility_registration', 'title' => 'Facility Registration Form'],
            19 => ['view' => 'slide_19_rent_property_control_form', 'title' => 'Rent & Property Control Tenant Online Form'],
            20 => ['view' => 'slide_20_work_information', 'title' => 'Work Information'],
            21 => ['view' => 'slide_21_inhabitant_details', 'title' => 'Inhabitant Details'],
        ];

        if (!isset($slides[$slide_no])) {
            Toastr::error(_trans('response.Invalid slide number'), 'Error');
            return redirect()->back();
        }

        $slide = $slides[$slide_no];

        return view("bilnetpropertyownerform::preview_steps.{$slide['view']}", [
            'data' => $formData,
            'user' => $user,
            'title' => $slide['title']
        ]);
    }

    /**
     * Store a newly created resource in storage for authenticated user.
     *
     * @param int $slide_no
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getMyFormData($slide_no)
    {
        try {
            $phone = auth()->user()->phone;
            $owner = TemporaryPropertyOwner::where('phone', $phone)->first();
            return $this->fetchSlideData($slide_no, $owner, auth()->user());
        } catch (\Throwable $e) {
            Toastr::error(_trans('response.Something went wrong.'), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage for a specific user.
     *
     * @param int $user_id
     * @param int $slide_no
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getPropertyOwnerFormData($user_id, $slide_no)
    {
        try {
            $user = User::where('id', $user_id)->first();
            $owner = TemporaryPropertyOwner::where('phone', $user->phone)->first();
            return $this->fetchSlideData($slide_no, $owner, $user);
        } catch (\Throwable $e) {
            Toastr::error(_trans('response.Something went wrong.'), 'Error');
            return redirect()->back();
        }
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bilnetpropertyownerform::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function retriveProgress(Request $request)
    {
        try {
            $retrive_via = $request->retrive_via ?? null;
            $identifier = $request->identifier ?? null;

            $query = TemporaryPropertyOwner::query();

            if ($retrive_via === 'token') {
                $query->where('token', $identifier);
            } elseif ($retrive_via === 'email') {
                $query->where('email', $identifier);
            } elseif ($retrive_via === 'phone') {
                $query->where('phone', $identifier);
            }

            $query->where('is_completed', false);

            $owner = $query->first();

            if ($owner) {
                $formData = PropertyOwnerForm::where('property_owner_id',  $owner->id)->where('slide_no', $owner->last_completed_slide_no)->get();;

                return Response::json([
                    'success' => true,
                    'message' => 'Temporary property owner and key-value pairs created successfully.',
                    'data' => [
                        'owner' => $owner,
                        'slide_data' => $formData,
                    ],
                ], 200);
            }


            return Response::json([
                'success' => false,
                'message' => 'Temporary property owner and key-value pairs created successfully.',
                'data' => null,
            ], 404);
        } catch (\Exception $e) {

            return Response::json([
                'success' => false,
                'message' => 'An error occurred while creating the temporary property owner.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function formSubmit(Request $request)
    {
        try {
            $formOwner = TemporaryPropertyOwner::where('token', $request->token)->first();


            if (!$formOwner) {
                return Response::json([
                    'success' => false,
                    'message' => 'No form owner found!',
                    'error' => "Not found!",
                ], 404);
            }

            DB::beginTransaction();

            $formOwner['is_completed'] =  1;
            $formOwner->save();


            $formData = PropertyOwnerForm::where('property_owner_id', $formOwner->id)
                ->get()
                ->pluck('value', 'key')
                ->toArray();


            $userData = [
                'email' => $formOwner['email'],
                'phone' => $formOwner['phone'],
                'password' => Hash::make(@$formData['password']),
                'name' => @$formData['first_name'] . ' ' . @$formData['last_name'],
                'date_of_birth' => @$formData['dob'],
                'role_id' => 4,
                'alt_phone' => @$formOwner['phone'],
                'address' => 'malibagh 13b',
                'country_id' => rand(1, 9),
                'state_id' => rand(1, 9),
                'city_id' => rand(1, 9),
                'zip_code' => '213',
                'nationality' => 'Bangladeshi',
                'blood_group' => 'A+',
                'occupation' => 'Business Man',
                'nid' => '6465325235',
                'social_security_number' => '4135325235',
                'passport' => 'eb4153525235',
                'tax_certificate' => 3,
                'property_count' => 3,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'date_of_birth' => '2022-09-07',
                'join_date' => '2023-09-07',
                'institution' => @$formData['company_name'],
                'designation_id' => 6,
                'permissions' => [
                    'property_read',
                    'property_create',
                    'property_update',
                    'property_delete',
                    'profile_read',
                    'profile_update',
                ],
            ];

            // Create the user
            $user = User::create($userData);

            Auth::login($user);

            $itemPhoneEmailFields = array_column($this->validationFields, 'item_field');

            $filteredPhoneEmailValues = array_values(array_filter($formData, function ($key) use ($itemPhoneEmailFields) {
                return in_array($key, $itemPhoneEmailFields);
            }, ARRAY_FILTER_USE_KEY));


            OtpVerification::whereIn('identifier', $filteredPhoneEmailValues)->delete();

            DB::commit();

            return Response::json([
                'success' => true,
                'message' => 'Form submitted successfully..',
                'data' => $formOwner,
                'redirect_url' =>  route('dashboard'),
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            return Response::json([
                'success' => false,
                'message' => 'An error occurred while updating the temporary property owner form data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function upload(Request $request)
    {
        if ($request->has('images')) {
            $request->validate([
                'images.*' => 'required|mimes:jpeg,png,jpg,gif,webp,pdf,doc,docx,txt|max:2048', // Validate images and other files
            ]);

            $paths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/blinet_property_form', 'public');
                $paths[] = [
                    'original_path' => $path,
                    'path' => asset('storage/' . $path),
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Images uploaded successfully!',
                'paths' => $paths, // Return array of paths and original paths
            ]);
        } else {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,webp,pdf,doc,docx,txt|max:2048', // Validate the single image
            ]);

            $path = $request->file('image')->store('uploads/blinet_property_form', 'public');

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully!',
                'original_path' => $path,
                'path' => asset('storage/' . $path),
            ]);
        }
    }

    protected function generateUniqueToken($limit)
    {
        // Generate the initial slug
        $token = generateUniqueString($limit);

        // Check if the slug already exists in the News table
        while (TemporaryPropertyOwner::where('token', $token)->exists()) {
            $token = generateUniqueString($limit);
        }

        // Return the unique slug
        return $token;
    }


    protected $validationFields = [
        [
            'item_field' => 'phone',
            'type' => 'phone',
            'otp_field' => 'otp'
        ],
        [
            'item_field' => 'email',
            'type' => 'email',
            'otp_field' => 'email_otp'
        ],
        [
            'item_field' => 'rep_phone_a',
            'type' => 'phone',
            'otp_field' => 'rep_phone_a_otp'
        ],
        [
            'item_field' => 'rep_email_a',
            'type' => 'email',
            'otp_field' => 'rep_email_a_otp'
        ],
        [
            'item_field' => 'rep_witness_phone_a',
            'type' => 'phone',
            'otp_field' => 'rep_witness_phone_a_otp'
        ],
        [
            'item_field' => 'rep_witness_email_a',
            'type' => 'email',
            'otp_field' => 'rep_witness_email_a_otp'
        ],
        [
            'item_field' => 'rep_phone_b',
            'type' => 'phone',
            'otp_field' => 'rep_phone_b_otp'
        ],
        [
            'item_field' => 'rep_email_b',
            'type' => 'email',
            'otp_field' => 'rep_email_b_otp'
        ],
        [
            'item_field' => 'rep_witness_phone_b',
            'type' => 'phone',
            'otp_field' => 'rep_witness_phone_b_otp'
        ],
        [
            'item_field' => 'rep_witness_email_b',
            'type' => 'email',
            'otp_field' => 'rep_witness_email_b_otp'
        ],
        [
            'item_field' => 'deponent_phone',
            'type' => 'phone',
            'otp_field' => 'deponent_phone_otp'
        ],
        [
            'item_field' => 'deponent_email',
            'type' => 'email',
            'otp_field' => 'deponent_email_otp'
        ],
        [
            'item_field' => 'solicior_phone',
            'type' => 'phone',
            'otp_field' => 'solicior_phone_otp'
        ],
        [
            'item_field' => 'solicitor_email',
            'type' => 'email',
            'otp_field' => 'solicitor_email_otp'
        ],
        [
            'item_field' => 'architech_phone',
            'type' => 'phone',
            'otp_field' => 'architech_phone_otp'
        ],
        [
            'item_field' => 'architech_email',
            'type' => 'email',
            'otp_field' => 'architech_email_otp'
        ],
        [
            'item_field' => 'network_carrier_phone',
            'type' => 'phone',
            'otp_field' => 'network_carrier_phone_otp'
        ],
        [
            'item_field' => 'inhabitant_phone',
            'type' => 'phone',
            'otp_field' => 'inhabitant_phone_otp'
        ],
        [
            'item_field' => 'inhabitant_email',
            'type' => 'email',
            'otp_field' => 'inhabitant_email_otp'
        ],
    ];
}
