<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;


interface LeadershipInterface
{

    public function index($request);

    public function getList();

    public function status($request);

    public function deletes($request);

    public function getAll();

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function destroy($id);
}
