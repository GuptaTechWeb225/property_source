<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface IncomeInterface
{
    public function index();

    public function all();

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($id);
}
