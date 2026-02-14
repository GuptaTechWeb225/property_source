<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Property\CategoryWiseDocumentTemplate;

class AjaxController extends Controller
{
    public function fetchStates(Request $request)
    {
        if ($request->ajax()) {
            try {
                $states = State::query()
                    ->when($request->filled('country_id'), function ($query) use ($request) {
                        $query->where('country_id', $request->country_id);
                    })
                    ->orderBy('name','ASC')
                    ->get(['id', 'name']);

                return response()->json([
                    'status'    => 1,
                    'message'   => _trans('alert.Success'),
                    'data'      => $states
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status'    => 0,
                    'message'   => _trans('alert.Something went wrong'),
                    'data'      => []
                ]);
            }
        }

        return false;
    }

    public function fetchCities(Request $request)
    {
        if ($request->ajax()) {
            try {
                $cities = City::query()
                    ->when($request->filled('country_id'), function ($query) use ($request) {
                        $query->where('country_id', $request->country_id);
                    })
                    ->when($request->filled('state_id'), function ($query) use ($request) {
                        $query->where('state_id', $request->state_id);
                    })
                    ->orderBy('name','ASC')
                    ->get(['id', 'name']);

                return response()->json([
                    'status'    => 1,
                    'message'   => _trans('alert.Success'),
                    'data'      => $cities
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status'    => 0,
                    'message'   => _trans('alert.Something went wrong'),
                    'data'      => []
                ]);
            }
        }

        return false;
    }

    public function fetchCategoriesDoc(Request $request)
    {
        if ($request->ajax()) {
            try {
                $douments = CategoryWiseDocumentTemplate::where('category_id',$request->category_id)->where('active_status',1)->get();
                $document_fields = "";
                foreach ($douments as $document) {
                    if ($document->file_type == 'text') {
                        $document_fields .=
                            '<div class="col-lg-12 mb-3">
                            <label for="" class="form-label">
                            ' . $document->label . '
                                                <span class="fillable">'.($document->is_required == 1 ? '*' : '').'</span>
                                        </label>
                                <input type="text" class="form-control ot-input" name="doc['.$document->name.']['.$document->id.']" value="" placeholder="' . $document->placeholder . '" ' . ($document->is_required == 1 ? 'required' : '') . '>
                            </div>';
                    } elseif ($document->file_type == 'file') {
                        $document_fields .=
                            '<div class="col-lg-12 mb-3">
                            <label for="" class="form-label">
                            ' . $document->label . '
                                                <span class="fillable">'.($document->is_required == 1 ? '*' : '').'</span>
                                        </label>
                            <div class="custom-file-input ">
                                <label for="'. $document->name.'">
                                    <span type="button" class="file-browse-button">Choose File</span>
                                </label>
                                <input type="file" id="'.$document->name .'" name="doc['.$document->name.']['.$document->id.']" >
                            </div>

                            </div>';
                    } elseif ($document->file_type == 'textarea') {
                        $document_fields .=
                            '<div class="col-lg-12 mb-3">
                            <label for="" class="form-label">
                            ' . $document->label . '
                                                <span class="fillable">'.($document->is_required == 1 ? '*' : '').'</span>
                                        </label>
                                <textarea class="form-control ot-input" name="doc['.$document->name.']['.$document->id.']" placeholder="' . $document->placeholder . '" ' . ($document->is_required == 1 ? 'required' : '') . '></textarea>
                            </div>';
                    } elseif ($document->file_type == 'switch') {
                        $document_fields .=
                            '<div class="col-lg-12 mb-3 mt-2">
                                <div class="form-check form-switch form-switch-lg">
                                <label class="form-check-label" for="'.$document->name.'">
                                    '.$document->label.'
                                </label>
                                <input class="form-check-input" name="doc['.$document->name.']['.$document->id.']" value="1" type="checkbox" role="switch" id="'.$document->name.'">

                            </div>

                            </div>';
                    }
                    elseif ($document->file_type == 'datepicker') {
                        $document_fields .=
                            '<div class="col-lg-12 mb-3">
                            <label for="" class="form-label">
                            ' . $document->label . '
                                                <span class="fillable">'.($document->is_required == 1 ? '*' : '').'</span>
                                        </label>
                                <input type="date" class="form-control ot-input" name="doc['.$document->name.']['.$document->id.']" value="" placeholder="' . $document->placeholder . '" ' . ($document->is_required == 1 ? 'required' : '') . '>
                            </div>';
                    }
                }




                return response()->json([
                    'status'    => 1,
                    'message'   => _trans('alert.Success'),
                    'data'      => $document_fields
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status'    => 0,
                    'message'   => _trans('alert.Something went wrong'),
                    'data'      => []
                ]);
            }
        }

        return false;
    }









    // public function getStates(Request $request)
    // {
    //     $country_id = $request->country_id;
    //     $states = State::select('id', 'country_id', 'name')
    //     ->when($request->country_id, function ($query) use ($country_id) {
    //         $query->where('country_id', $country_id);
    //     })->get();
    //     return response()->json($states);
    // }
    // public function getCities(Request $request)
    // {
    //     $country_id = $request->country_id;
    //     $state_id = $request->state_id;
    //     $cities = City::select('id', 'country_id', 'name')
    //     ->when($country_id, function ($query) use ($country_id) {
    //         $query->where('country_id', $country_id);
    //     })->when($state_id, function ($query) use ($state_id) {
    //         $query->where('state_id', $state_id);
    //     })->get();
    //     return response()->json($cities);
    // }
}
