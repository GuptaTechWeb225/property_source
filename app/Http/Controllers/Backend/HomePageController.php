<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageRequest;
use App\Interfaces\HomePageInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomePageController extends Controller
{
    protected $page_title;

    public function __construct(HomePageInterface $homePageInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->page_title = $homePageInterface;
    }

    public function index()
    {
        $data['title'] = "Page Titles";
        $data['hometitles'] = $this->page_title->index();
        return view('backend.home-page.section_title', compact('data'));
    }

    public function update(HomePageRequest $request)
    {
        $result = $this->page_title->update($request);
        if ($result) {
            return redirect()->route('home.section-titles.index')->with('success', _trans('alert.pagetitle_updated_successfully'));
        }
        return redirect()->route('home.section-titles.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
}
