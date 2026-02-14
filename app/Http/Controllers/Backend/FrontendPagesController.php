<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Interfaces\FrontendPageInterface;
use App\Http\Requests\Frontend\FrontnedPageStoreRequst;
use App\Http\Requests\Frontend\FrontnedPageUpdateRequst;

class FrontendPagesController extends Controller
{
    private $page;
    private $permission;

    function __construct(FrontendPageInterface $page, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->page   = $page;
        $this->permission = $permissionInterface;
    }


    public function index(Request $request){

        $data['pages']  = $this->page->all($request);
        $data['pt']  = _trans('common.all_pages');
        return view('backend.frontend_pages.index', compact('data'));
    }

    public function create(){
        $data['pt']  = _trans('common.create_pages');
        $data['all_pages']  = $this->page->allParent();
        $data['all_pages_count']  = count($data['all_pages']);
        return view('backend.frontend_pages.create',compact('data'));
    }

    public function store(FrontnedPageStoreRequst $request){
           $save =  $this->page->store($request);
           if($save){
            return redirect()->route('frontend_pages.index')->with('success', _trans('alert.page_category_created_successfully'));
        }
        return redirect()->route('frontend_pages.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id){

        $data['page']  = $this->page->show($id);
        $data['pt']  = _trans('common.edit_pages');
        $data['all_pages']  = $this->page->allParent()->where('id','!=',$id);
        $data['all_pages_count']  = count($data['all_pages']);
        return view('backend.frontend_pages.create',compact('data'));
    }

    public function update(FrontnedPageUpdateRequst $request){
        $update =  $this->page->update($request,$request->id);

        if($update){
         return redirect()->route('frontend_pages.index')->with('success', _trans('alert.page_category_created_successfully'));
     }
     return redirect()->route('frontend_pages.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id){
        if ($this->page->destroy($id)) :
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
