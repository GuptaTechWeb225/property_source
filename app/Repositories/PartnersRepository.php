<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use App\Interfaces\PartnersInterface;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class PartnersRepository implements PartnersInterface{

    use CommonHelperTrait;
    private $partners;

    public function __construct(Partner $partners)
    {
        $this->partners         = $partners;
    }

    public function index()
    {
        $Partners = Partner::paginate(10);
        return $Partners;

    }

    public function store($request)
    {
        try {
            $partnerStore               = new $this->partners;
            $partnerStore->name         = $request->name;
            $partnerStore->image_id     = $this->UploadImageCreate($request->image, 'backend/uploads/partners');
            $partnerStore->status       = $request->status;
            $partnerStore->save();
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id){
        return $this->partners->find($id);
    }

    public function update($request,$id){
        try {
            $partnerUpdate                         = $this->partners->findOrfail($id);
            $partnerUpdate->name                   = $request->name;
            $partnerUpdate->image_id               = $this->UploadImageUpdate($request->image, 'backend/uploads/partner', $partnerUpdate->image_id);
            $partnerUpdate->status                 = $request->status;
            $partnerUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $partnerDestroy   = $this->partners->find($id);
            $partnerDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}
