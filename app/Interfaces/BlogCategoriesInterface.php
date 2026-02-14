<?php

namespace App\Interfaces;

interface BlogCategoriesInterface
{
    public function all();

    public function paginateData($limit);

    public function activeAll();

    public function getAll();

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($id);
}
