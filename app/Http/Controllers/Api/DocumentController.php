<?php

namespace App\Http\Controllers\Api;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use App\Http\Resources\DocumentPaginateCollection;

class DocumentController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;
    public function index(Request $request)
    {
        $data = [];
        $data['messages'] = _trans('common.Document List');

        $documents = Document::query()->orderByDesc('created_at');
        if ($request->has('property')) {
            $documents = $documents->where('attachment_table', 'properties');
            $documents = $documents->where('attachment_table_id', $request->property);
        }
        if ($request->has('tenant')) {
            $documents = $documents->where('attachment_table', 'tenants');
            $documents = $documents->where('attachment_table_id', $request->tenant);
        }
        if ($request->has('attachment_type')) {
            $documents = $documents->where('attachment_type', $request->attachment_type);
        }

        $documents = $documents->paginate(10);

        $data['items'] = new DocumentPaginateCollection($documents);
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function assets()
    {

        $data = [];
        $data['messages'] = _trans('common.Document Asset List');
        $data['items'] = [
            'attachment_type' => [
                'normal' => _trans('common.Normal'),
                'agreement' => _trans('common.Agreement'),
                'contract' => _trans('common.Contract'),
                'invoice' => _trans('common.Invoice'),
                'receipt' => _trans('common.Receipt'),
                'complain' => _trans('common.Complain'),
            ],
            'attachment_table' => [
                'properties' => _trans('common.Property'),
                'tenants' => _trans('common.Tenant'),
                'landlord' => _trans('common.Landlord'),
                'users' => _trans('common.User'),
            ],
            'tenant_list' => PropertyTenant::where('landowner_id', Auth::user()->id)->get()->map(function ($item) {
                return [
                    'id' => @$item->id,
                    'name' => @$item->user->name,
                ];
            }),
            'property_list' => Property::where('user_id', Auth::user()->id)->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                ];
            }),
        ];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'attachment_table' => 'required',
        //     'attachment_table_id' => 'required',
        //     'attachment_type' => 'required',
        //     'attachment' => 'required|file',
        // ]);

        try {
            $document = new Document();

            // $document->attachment_table = Str::lower($request->attachment_table);
            // $document->attachment_table_id = $request->attachment_table_id;
            // $document->attachment_type = Str::lower($request->attachment_type);

            if ($request->has('attachment')) {
                $attachment = $request->file('attachment');

                // Get the original file name before upload
                $filename = $attachment->getClientOriginalName();

                $attachmentPath = $attachment->store('uploads/documents');

                $document->attachment_id = $this->UploadImageCreate($attachment, $attachmentPath);

                // Use the original filename for the database entry
                $document->filename = $filename;

                // Calculating the size of the file
                $size = $attachment->getSize();
                $sizeInMB = round($size / (1024 * 1024), 2) . " MB";
                $document->size = $sizeInMB;
            }

            $document->user_id = Auth::user()->id;
            $document->save();

            return $this->responseWithSuccess('Created Successfully', [], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
