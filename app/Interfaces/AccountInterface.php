<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;


interface AccountInterface
{

    public function index();

    public function getAll();

    public function store($request);

    public function show($id);

    public function update($request, $id);


    public function destroy($id);
}
