<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Interfaces\AboutInterface;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class AboutController extends Controller
{
    protected $page_title;

    public function __construct(AboutInterface $AboutInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->page_title = $AboutInterface;
    }

    public function about()
    {
        $data['about'] = $this->page_title->get();

        return view('frontend.about', compact('data'));
    }

    public function index()
    {
        $data['title'] = "About Us";
        $data['aboutTitles'] = $this->page_title->index();
        return view('backend.about.about-title', compact('data'));
    }

    public function update(Request $request)
    {
        $result = $this->page_title->update($request);
        if ($result) {
            return redirect()->route('about.section-titles.index')->with('success', _trans('alert.about_updated_successfully'));
        }
        return redirect()->route('about.section-titles.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
}
