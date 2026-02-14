<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Interfaces\HeroSectionInterface;
use App\Http\Requests\HeroSection\HeroSectionStoreRequest;
use App\Http\Requests\HeroSection\HeroSectionUpdateRequest;

class HeroSectionController extends Controller
{
    private $heroSection;
    private $permission;

    function __construct(HeroSectionInterface $heroSectionInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->heroSection   = $heroSectionInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {
        $data['heroSection']  = $this->heroSection->getAll();

        $data['title']      = _trans('common.hero_section');
        return view('backend.home-page.hero-section.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.hero_section');
        $data['permissions'] = $this->permission->all();
        return view('backend.home-page.hero-section.create', compact('data'));
    }

    public function store(HeroSectionStoreRequest $request)
    {
        $result = $this->heroSection->store($request);
        if ($result) {
            return redirect()->route('hero-sections.index')->with('success', _trans('alert.hero_section_created_successfully'));
        }
        return redirect()->route('hero-sections.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['heroSection']    = $this->heroSection->show($id);
        $data['title']       = _trans('common.hero_section');
        $data['permissions'] = $this->permission->all();
        return view('backend.home-page.hero-section.edit', compact('data'));
    }

    public function update(HeroSectionUpdateRequest $request, $id)
    {
        $result = $this->heroSection->update($request, $id);
        if ($result) {
            return redirect()->route('hero-sections.index')->with('success', _trans('alert.hero_section_updated_successfully'));
        }
        return redirect()->route('hero-sections.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->heroSection->destroy($id)) :
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
