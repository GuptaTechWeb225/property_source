<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\PartnersInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PartnersController extends Controller
{
    private $partners;

    function __construct(PartnersInterface $PartnersInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->partners       = $PartnersInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']          = "Partners";
        $data['partners']       = $this->partners->index();
        return view('backend.home-page.partners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = _trans('common.partners_create');
        $data['partners'] = [];
        return view('backend.home-page.partners.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->partners->store($request);
        if ($result) {
            return redirect()->route('home.partners.index')->with('success', _trans('alert.partner_created_successfully'));
        }
        return redirect()->route('home.partners.create')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']   = _trans('common.edit_Partner');
        $data['partner']    = $this->partners->show($id);

        return view('backend.home-page.partners.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->partners->update($request, $id);
        if ($result) {
            return redirect()->route('home.partners.index')->with('success', _trans('alert.partner_updated_successfully'));
        }
        return redirect()->route('home.partners.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->partners->destroy($id)) :
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

