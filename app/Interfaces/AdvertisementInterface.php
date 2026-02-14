<?php

namespace App\Interfaces;

use Illuminate\Http\Request;


interface AdvertisementInterface
{

    public function index(Request $request);

    public function status(Request $request);

    public function deletes(Request $request);

    public function getAll();

    public function getCreatedBy();

    public function getdByPropertyOwner();

    public function store( $request);

    public function show( $id);

    public function update($request, $id, $type);

    public function destroy($id);

    public function deleteImage($id);

    public function approvalStatus($id, $type);

}
