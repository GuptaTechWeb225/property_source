<?php
namespace App\Interfaces;

use Illuminate\Http\Request;


Interface PropertyInterface{

    public function index(Request $request);

    public function status(Request $request);

    public function deletes(Request $request);

    public function getAll();

    public function getCreatedBy();

    public function store( $request);

    public function show( $id);

    public function update($request, $id, $type);
    public function updateStatus($id, $status);

    public function destroy($id);

    public function deleteImage($id);

    public function facilityDestroy($id);

    public function getActiveCreatedBy();

    public function getActiveAll();

}

?>
