<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface BlogsInterface
{
    public function index();

    public function all();

    public function paginateData($limit);

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($id);
}
