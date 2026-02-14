<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Leadership\LeadershipStoreRequest;
use App\Http\Requests\Leadership\LeadershipUpdateRequest;
use App\Interfaces\LeadershipInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LeadershipController extends Controller
{
    private $leadership;

    function __construct(LeadershipInterface $leadershipInterface)
    {
        $this->leadership   = $leadershipInterface;
    }

    public function index()
    {

        $data['leaderships']  = $this->leadership->getAll();
        $data['title']      = _trans('common.leaderships');
        return view('backend.leaderships.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.create_leadership');
        return view('backend.leaderships.create', compact('data'));
    }

    public function store(LeadershipStoreRequest $request)
    {
        $result = $this->leadership->store($request);
        if ($result) {
            return redirect()->route('leaderships.index')->with('success', _trans('alert.leadership_created_successfully'));
        }
        return redirect()->route('leaderships.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['leadership']    = $this->leadership->show($id);
        $data['title']       = _trans('common.leaderships');
        return view('backend.leaderships.edit', compact('data'));
    }

    public function update(LeadershipUpdateRequest $request, $id)
    {
        $result = $this->leadership->update($request, $id);
        if ($result) {
            return redirect()->route('leaderships.index')->with('success', _trans('alert.leadership_updated_successfully'));
        }
        return redirect()->route('leaderships.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->leadership->destroy($id)) :
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
