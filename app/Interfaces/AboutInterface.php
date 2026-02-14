<?php

namespace App\Interfaces;

use Illuminate\Http\Request;


interface AboutInterface
{

    public function get();

    public function index();

    public function update($request);

}
