<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CityInterface
{

    public function index(Request $request);

    public function status(Request $request);

    public function deletes(Request $request);

    public function getAll(Request $request);

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function destroy($id);

    public function getCountriesWithStates();
}