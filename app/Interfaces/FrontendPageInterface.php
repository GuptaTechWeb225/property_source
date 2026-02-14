<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface FrontendPageInterface
{

    public function all($request);

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function destroy($id);

    public function allCount();
}
