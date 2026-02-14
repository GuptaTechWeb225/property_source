<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\CommitteeMember\StoreRequest;
use App\Http\Requests\CommitteeMember\UpdateRequest;


interface CommitteeMemberInterface
{

    public function index(StoreRequest $request);

    public function status(Request $request);

    public function deletes(UpdateRequest $request);

    public function getAll();

    public function store($request);

    public function show($id);

    public function update($request, $id);


    public function destroy($id);
}
