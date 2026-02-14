<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface AccountCategoryInterface
{
    public function index();

    public function all();

    public function roleBaseList();

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($id);
}
