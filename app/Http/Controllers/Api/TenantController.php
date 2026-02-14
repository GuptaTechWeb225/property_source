<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Rental;
use App\Models\Account;
use App\Models\Document;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Property\Transaction;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property\PropertyTenant;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TenantListPaginateResource;

class TenantController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;


    protected $tenant;
    public function __construct(PropertyTenant $tenant)
    {
        $this->tenant = $tenant::query();
    }
    public function index(Request $request)
    {
        // "property_id" => 7
        // "user_id" => 1
        // "landowner_id" => 7
        // "rental_id" => 1
        try {
            $tenants = PropertyTenant::where('landowner_id', Auth::user()->id);

            $data['statistics'] = [
                'total' => $tenants->count(),
                'active' => $tenants->where('status', 1)->count(),
                'inactive' => $tenants->where('status', 0)->count(),
            ];
            $tenantList = PropertyTenant::latest()->where('landowner_id', Auth::user()->id);
            $tenantUserIds = $tenantList->pluck('user_id');
            if ($request->has('search') && $request->search != null) {
                $users = User::where('name', 'LIKE', '%' . $request->search . '%')->where('role_id', 5)->whereIn('id', $tenantUserIds)->pluck('id');
                $tenantList = $tenantList->whereIn('user_id', $users);
            }
            $tenantList = $tenantList->paginate(10);

            $data['items'] = new TenantListPaginateResource($tenantList);
            $data['messages'] = 'Tenant List With Pagination';

            return $this->responseWithSuccess($data['messages'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    public function infoList()
    {
        $data['messages'] = 'Tenant Details (All tab list)';
        $data['items'] = ['basicInfo', 'document', 'emergencyContact', 'account', 'agreement', 'transactionHistory'];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    // All Details
    public function detailsList($id, $type = null)
    {
        try {
            $tenant = PropertyTenant::where('user_id', $id)->where('landowner_id', Auth::user()->id)->first();

            if (!$tenant) {
                return $this->responseWithError('Tenant Not Found', 404);
            }

            $tenantDocuments = Document::where('user_id', $id)->get();
            $tenantEmergency = EmergencyContact::where('property_tenant_id', $tenant->id)->get();
            $tenantAccount = BankAccount::where('user_id', $tenant->user_id)->first();

            $tenantTransaction = Transaction::where('property_tenant_id', $tenant->id)->get();
            $tenantAgreement = $tenant->rental;

            $data['basicInfo'] = [
                'id' => @$tenant->user->id,
                'name' => @$tenant->user->name,
                'email' => @$tenant->user->email,
                'phone' => @$tenant->user->phone,
                'occupation' => @$tenant->user->occupation,
                'join_date' => @$tenant->user->join_date,
                'institution' => @$tenant->user->institution,
                'nid' => @$tenant->user->nid,
                'passport' => @$tenant->user->passport,
                // 'designation' => @$tenant->user->designation->title,
                'present_address' => @$tenant->user->present_address,
                'nationality' => @$tenant->user->nationality,
                'image' =>  apiAssetPath(@$tenant->user->image->path),
            ];

            $data['document'] = $tenantDocuments->map(function ($data) {
                $filename = $data->filename;

                // Initializing size to a default value
                $sizeInMB = "2.5 MB";

                // Checking if the file exists
                if (file_exists($data->attachment->path)) {
                    // Calculating the size of the file
                    $size = filesize($data->attachment->path);
                    $sizeInMB = round($size / (1024 * 1024), 2) . " MB";
                }

                // Get the file format/extension
                $extension = pathinfo($data->attachment->path, PATHINFO_EXTENSION);

                // Define an associative array mapping file extensions to icons
                $iconMap = [
                    'pdf' => 'pdf.png',
                    'doc' => 'doc.png',
                    'docx' => 'doc.png',
                    'xls' => 'xls.png',
                    'xlsx' => 'xls.png',
                    // Add more file extensions and corresponding icons as needed
                ];

                // Set a default icon if the extension is not found in the mapping
                $defaultIcon = 'default.png';

                // Determine the icon based on the file format/extension
                $icon = isset($iconMap[$extension]) ? $iconMap[$extension] : $defaultIcon;

                return [
                    'id' => @$data->id,
                    'filename' => $filename,
                    'date' => @$data->created_at->format('Y-m-d'),
                    'icon' => url('assets/documents/' . $icon),
                    'attachment_type' => @$data->attachment_type,
                    'size' => $sizeInMB,
                    'file' => apiAssetPath(@$data->attachment->path)
                ];
            });

            $data['emergencyContact'] = $tenantEmergency->map(function ($data) {

                return [

                    'id' => @$data->id,
                    'name' => @$data->name,
                    'relation' => @$data->relation,
                    'phone' => @$data->phone,
                    'email' => @$data->email,
                    'type' => @$data->type,
                    'occupied' => @$data->occupied,
                    'image' => apiAssetPath(@$data->image->path),

                ];
            });
            if ($tenantAccount) {
                $data['accounts'] =  [
                    'id' => @$tenantAccount->id,
                    'name' => @$tenantAccount->name,
                    'branch' => @$tenantAccount->branch,
                    'account_number' => @$tenantAccount->account_number,
                    'account_name' => @$tenantAccount->account_name,

                ];
            } else {
                $data['accounts'] =  [];
            }



            $data['tenantTransaction'] = $tenantTransaction->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'property' => @$data->property->name,
                    'amount' => @$data->amount,
                    'type' => @$data->type,
                    // 'bank_name' => @$data->bank_name,
                    'date' => @$data->date,
                    'attachment_count' => @$data->count(),
                    'attachment_file' => apiAssetPath($data->attachment->path),

                ];
            });
            $data['agreement'] = [
                'id' => @$tenantAgreement->id,
                'property' => @$tenantAgreement->property->name,
                'move_in' => @$tenantAgreement->move_in,
                'move_out' => @$tenantAgreement->move_out,
                'rent_amount' => (string)@$tenantAgreement->rent_amount,
                'rent_type' => @$tenantAgreement->rent_type,
                'reminder_date' => @$tenantAgreement->reminder_date,
                'note' => @$tenantAgreement->note,
                'advance_amount' => (string)@$tenantAgreement->advance_amount,
            ];

            $data['messages'] = 'Tenants Details';
            return $this->responseWithSuccess($data['messages'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseWithError($th, 500);
        }
    }

    // store method
    public function store(Request $request)
    {

        $data = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required',
            'property_id' => 'required',
            'move_in' => 'required|date',
            'move_out' => 'required|date',
            'advance_amount' => 'required',
            'rent_amount' => 'required',
            'rent_type' => 'required',
            'document' => 'sometimes',
        ]);

        // if api validation failed
        if ($data->fails()) {
            return response()->json([
                'errors' => $data->errors(),
                'messages' => [
                    'name' => 'Name is required and max 255 characters',
                    'email' => 'Email is required and must be unique',
                    'phone' => 'Phone is required',
                    'property_id' => 'Property id is required',
                    'move_in' => 'Move in date is required - When a tenant starts living in the property like YYYY-MM-DD',
                    'move_out' => 'Move out date is required - When a tenant stops living in the property like YYYY-MM-DD',
                    'advance_amount' => 'Advance amount is required and can be double',
                    'rent_amount' => 'Rent amount is required and can be double',
                    'rent_type' => 'Rent type is required and can be "monthly" or "yearly"',
                    'document' => 'Document is required and can be pdf, doc, docx, jpg, png, jpeg',
                ],
                'sample' => [
                    "name" => "Created Tenant " . rand(1, 100),
                    "email" => "CreatedTenant" . rand(1, 100) . "@gmail.com",
                    "phone" => "01700000000" . rand(1, 100),
                    "property_id" => "1",
                    "move_in" => "2020-01-01",
                    "move_out" => "2020-01-01",
                    "advance_amount" => "1000",
                    "rent_amount" => "1000",
                    "rent_type" => "monthly",
                    "document" => "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf",

                ],
            ], 422);
        }

        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            $data['updated_by'] = auth()->user()->id;

            // create user table
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'role_id' => 5, // tenant role id
                'image_id' => $this->UploadImageCreate($request->image_id, 'backend/uploads/tenants'),

            ]);

            // create tenant table
            $landloard = Property::where('id', $data['property_id'])->first()->user_id;
            $tenant = new PropertyTenant();
            $tenant->user_id = $user->id;
            $tenant->property_id = $data['property_id'];
            if ($request->hasFile('document')) {
                $tenant->document_id = $this->UploadImageCreate($request->document, 'uploads/property/' . $data['property_id'] . '/documents');
            } else {
                $tenant->document_id = 1;
            }
            $tenant->landowner_id = $landloard;
            $tenant->start_date = $data['move_in'];
            $tenant->end_date = $data['move_out'];
            $tenant->default_image = 3;
            $tenant->save();

            // create rental table
            $rental = new Rental();
            $rental->move_in = $data['move_in'];
            $rental->move_out = $data['move_out'];
            $rental->advance_amount = $data['advance_amount'];
            $rental->rent_amount = $data['rent_amount'];
            $rental->rent_type = $data['rent_type'];
            $rental->property_tenant_id = $tenant->id;
            $rental->property_id = $data['property_id'];
            $rental->save();

            $tenant->rental_id = $rental->id;
            $tenant->save();

            DB::commit();

            $response['user'] = $user;
            $response['tenant'] = $tenant;
            $response['rental'] = $rental;
            return $this->responseWithSuccess('Tenant Created Successfully', $response, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->responseWithError($th->getMessage(), 500);
        }

        return response()->json([
            'success' => 'Tenant Created Successfully',
        ], 200);

        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        $tenant = PropertyTenant::create($data);

        $data['messages'] = 'Tenant Created Successfully';
        return $this->responseWithSuccess($data['messages'], $tenant, 200);
    }

    // create
    public function create()
    {
        $properties = Property::where('status', 1)->where('user_id', Auth::user()->id)->select('id', 'name')->get();
        $data['properties'] = $properties->map(function ($data) {
            return [
                'id' => @$data->id,
                'name' => @$data->name,
            ];
        });
        $data['messages'] = 'Tenant Create Sample Response';
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    // edit

    public function edit($id, $slug)
    {
        try {
            $tenant = PropertyTenant::where('id', $id)->where('landowner_id', Auth::user()->id)->first();

            if (!$tenant) {
                return $this->responseWithError('Tenant Not Found', 404);
            }

            if ($slug == 'basicinfo') {
                $data['title'] = 'Basic Info Edit';
                $data['property'] = [
                    'id' => @$tenant->user->id,
                    'name' => @$tenant->user->name,
                    'email' => @$tenant->user->email,
                    'phone' => @$tenant->user->phone,
                    'occupation' => @$tenant->user->occupation,
                    'join_date' => @$tenant->user->join_date,
                    'institution' => @$tenant->user->institution,
                    'nid' => @$tenant->user->nid,
                    'passport' => @$tenant->user->passport,
                    // 'designation' => @$tenant->user->designation->title,
                    'present_address' => @$tenant->user->present_address,
                    'nationality' => @$tenant->user->nationality,
                    'designation' => @$tenant->user->designation,
                ];
            }


            $data['messages'] = 'Tenants Details';
            return $this->responseWithSuccess($data['messages'], $data, 200);
        } catch (\Throwable $th) {
            return $this->responseWithError($th, 500);
        }
    }

    // update

    public function update(Request $request, $id, $slug)
    {
        try {
            $tenant = PropertyTenant::where('user_id', $id)->where('landowner_id', Auth::user()->id)->first();
            $tenantAccount = BankAccount::where('user_id', $tenant->user_id)->first();



            if (!$tenant) {
                return $this->responseWithError('Tenant Not Found', 404);
            }
            if ($slug == 'basicinfo') {
                if ($request->has('name') && $request->get('name') != null) {
                    $tenant->user->name = $request->input('name');
                }
                if ($request->has('email') && $request->get('email') != null) {
                    $tenant->user->email = $request->input('email');
                }
                if ($request->has('phone') && $request->get('phone') != null) {
                    $tenant->user->phone = $request->input('phone');
                }
                if ($request->has('occupation') && $request->get('occupation') != null) {
                    $tenant->user->occupation = $request->input('occupation');
                }
                if ($request->has('join_date') && $request->get('join_date') != null) {
                    $tenant->user->join_date = $request->input('join_date');
                }
                if ($request->has('institution') && $request->get('institution') != null) {
                    $tenant->user->institution = $request->input('institution');
                }
                if ($request->has('nid') && $request->get('nid') != null) {
                    $tenant->user->nid = $request->input('nid');
                }
                if ($request->has('passport') && $request->get('passport') != null) {
                    $tenant->user->passport = $request->input('passport');
                }

                if ($request->has('present_address') && $request->get('present_address') != null) {
                    $tenant->user->present_address = $request->input('present_address');
                }
                if ($request->has('nationality') && $request->get('nationality') != null) {
                    $tenant->user->nationality = $request->input('nationality');
                }


                $tenant->user->save();


                $data['messages'] = 'Basic Info Updated Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'documents') {
                $documentDetailsUpdate                       = new Document;
                $documentDetailsUpdate->size = $request->attachment_id->getSize() / 1024;
                $documentDetailsUpdate->attachment_id = $this->UploadImageCreate($request->attachment_id, 'uploads/documents');
                $documentDetailsUpdate->filename = $request->attachment_id->getClientOriginalName();
                $documentDetailsUpdate->user_id = $tenant->user->id;
                $documentDetailsUpdate->save();
                $data['messages'] = 'Documents Updated Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'emergency') {

                $emergencyDetailsUpdate                       = new EmergencyContact;
                $emergencyDetailsUpdate->name                 = $request->name;
                $emergencyDetailsUpdate->occupied             = $request->occupied;
                $emergencyDetailsUpdate->relation             = $request->relation;
                $emergencyDetailsUpdate->email                = $request->email;
                $emergencyDetailsUpdate->phone                = $request->phone;
                $emergencyDetailsUpdate->property_tenant_id   = $tenant->id;
                $emergencyDetailsUpdate->image_id             = $this->UploadImageUpdate($request->image_id, 'backend/uploads/users', $emergencyDetailsUpdate->image_id);
                $emergencyDetailsUpdate->save();
                $data['messages'] = 'Emergency Contact Updated Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'accounts') {

                if ($tenantAccount != "") {

                    $existingAccount = BankAccount::find($tenantAccount->id);
                    if ($existingAccount) {


                        // Account exists, update the account details
                        $existingAccount->account_name = $request->input('account_name');
                        $existingAccount->name = $request->input('name');
                        $existingAccount->branch = $request->input('branch');
                        $existingAccount->user_id = $tenant->user->id;
                        $existingAccount->save();

                        $data['messages'] = 'Account Updated Successfully';
                    }
                } else {
                    $newAccount = new BankAccount();
                    $newAccount->account_number = $request->input('account_number');
                    $newAccount->account_name = $request->input('account_name');
                    $newAccount->name = $request->input('name');
                    $newAccount->branch = $request->input('branch');
                    $newAccount->user_id = $tenant->user->id;
                    $newAccount->save();


                    $data['messages'] = 'New Account Created Successfully';
                }
                return $this->responseWithSuccess($data['messages'], [], 200);
            }
            if ($slug == 'agreement') {


                $rentalmodel                               = new Rental();
                $rentalDetailsUpdate                       = $rentalmodel->find($tenant->rental->id);
                if ($request->has('move_in') && $request->get('move_in') != null) {
                    $rentalDetailsUpdate->move_in              = $request->move_in;
                }
                if ($request->has('move_out') && $request->get('move_out') != null) {
                    $rentalDetailsUpdate->move_out             = $request->move_out;
                }
                if ($request->has('rent_amount') && $request->get('rent_amount') != null) {
                    $rentalDetailsUpdate->rent_amount             = $request->rent_amount;
                }
                if ($request->has('rent_type') && $request->get('rent_type') != null) {
                    $rentalDetailsUpdate->rent_type             = $request->rent_type;
                }
                if ($request->has('reminder_date') && $request->get('reminder_date') != null) {
                    $rentalDetailsUpdate->reminder_date             = $request->reminder_date;
                }
                if ($request->has('advance_amount') && $request->get('advance_amount') != null) {
                    $rentalDetailsUpdate->advance_amount             = $request->advance_amount;
                }
                if ($request->has('note') && $request->get('note') != null) {
                    $rentalDetailsUpdate->note             = $request->note;
                }
                $rentalDetailsUpdate->property_tenant_id   = $tenant->id;
                $rentalDetailsUpdate->property_id          = $tenant->property->id;
                $rentalDetailsUpdate->save();

                $data['messages'] = 'Agreement Updated Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'transactions') {
                $transactionDetailsUpdate                       = new Transaction();
                $transactionDetailsUpdate->attachment_id      = $this->UploadImageCreate($request->attachment_id, 'uploads/transactions');
                $transactionDetailsUpdate->property_id        = $tenant->property->id;
                $transactionDetailsUpdate->property_tenant_id  = $tenant->id;
                $transactionDetailsUpdate->rental_id  = $tenant->rental->id;;
                $transactionDetailsUpdate->type  = $request->type;
                $transactionDetailsUpdate->created_by  = Auth::user()->id;
                $transactionDetailsUpdate->updated_by  = Auth::user()->id;
                $transactionDetailsUpdate->payment_method  = $request->payment_method;
                $transactionDetailsUpdate->date  = $request->date;
                $transactionDetailsUpdate->amount  = $request->amount;
                $transactionDetailsUpdate->bank_name  = $request->amount;
                $transactionDetailsUpdate->note  = $request->note;
                $transactionDetailsUpdate->save();
            }
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    public function delete($id, $slug)
    {
        try {
            if ($slug == 'documents') {
                Document::whereId($id)->delete();
                $data['messages'] = 'Document Deleted Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'emergency') {
                EmergencyContact::whereId($id)->delete();
                $data['messages'] = 'Emergency Contact Deleted Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
            if ($slug == 'accounts') {
                BankAccount::whereId($id)->delete();
                $data['messages'] = 'Account Deleted Successfully';
                return $this->responseWithSuccess($data['messages'], $data, 200);
            }
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    
}
