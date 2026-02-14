<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\Committee\CommitteeStoreRequest;
use App\Http\Requests\Committee\CommitteeUpdateRequest;


interface CommitteeInterface
{

    public function index(CommitteeStoreRequest $request);

    public function status(Request $request);

    public function deletes(CommitteeUpdateRequest $request);

    public function getAll();

    public function store($request);

    public function show($id);

    public function update($request, $id);


    public function destroy($id);
}
