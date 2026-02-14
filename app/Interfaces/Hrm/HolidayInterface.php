<?php

namespace App\Interfaces\Hrm;

interface HolidayInterface
{
    public function index();

    public function all();

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($id);
}
