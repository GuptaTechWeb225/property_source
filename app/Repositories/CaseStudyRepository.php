<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use App\Interfaces\BlogsInterface;
use Illuminate\Support\Facades\File;
use App\Interfaces\CaseStudyInterface;
use App\Models\CaseStudy;
use Illuminate\Support\Facades\Artisan;
use function Nette\Utils\data;


class CaseStudyRepository implements CaseStudyInterface{

    use CommonHelperTrait;

    private $case_studies;

    public function __construct(CaseStudy $case_studies)
    {
        $this->case_studies = $case_studies;
    }


    public function all()
    {
        return $this->case_studies->latest('id')->paginate(10);
    }

    public function store($request)
    {
        try {
            $case_study               = new $this->case_studies;
            $case_study->title        = $request->title;
            $case_study->content      = $request->content;
            $case_study->image_id     = $this->UploadImageCreate($request->image, 'backend/uploads/case_studies');
            $case_study->slug         = str::slug($request->title);
            $case_study->status       = $request->status;
            $case_study->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id){
        return $this->case_studies->find($id);
    }

    public function update($request,$id){
        try {
            $case_study               = $this->case_studies->findOrfail($id);
            $case_study->title        = $request->title;
            $case_study->content      = $request->content;
            $case_study->image_id     = $this->UploadImageUpdate($request->image, 'backend/uploads/case_studies', $case_study->image_id);
            $case_study->slug         = str::slug($request->title);
            $case_study->status       = $request->status;
            $case_study->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $Destroy   = $this->case_studies->find($id);
            $Destroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}
