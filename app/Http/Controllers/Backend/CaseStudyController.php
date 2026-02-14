<?php

namespace App\Http\Controllers\Backend;

use App\Models\CaseStudy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\CaseStudyRequest;
use App\Repositories\CaseStudyRepository;

class CaseStudyController extends Controller
{
    private $case_studies;

    function __construct(CaseStudyRepository $case_study_repo)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->case_studies        = $case_study_repo;
    }


    public function index()
    {
        $data['title']       = _trans('common.case_studies');
        $data['case_studies']       = $this->case_studies->all();
        return view('backend.case_studies.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.create_case_studies');
        $data['case_studies']       = $this->case_studies->all();
        return view('backend.case_studies.create', compact('data'));
    }

    public function store(CaseStudyRequest $request)
    {

        $result = $this->case_studies->store($request);
        if ($result) {
            return redirect()->route('case_studies.index')->with('success', _trans('alert.case_study_created_successfully'));
        }
        return redirect()->route('case_studies.create')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['title']   = _trans('common.edit_case_study');
        $data['case_study']    = $this->case_studies->show($id);
        return view('backend.case_studies.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'title' => 'required',
           'content' => 'required',
        ]);

        $result = $this->case_studies->update($request, $id);
        if ($result) {
            return redirect()->route('case_studies.index')->with('success', _trans('alert.case_study_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->case_studies->destroy($id)):
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }
}
