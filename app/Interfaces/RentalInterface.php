<?php
namespace App\Interfaces;

use Illuminate\Http\Request;


Interface RentalInterface{

    public function index(Request $request);

    public function status(Request $request);

    public function deletes(Request $request);

    public function getAll();

    public function store( $request);

    public function show( $id);

    public function update($request, $id);

    public function destroy($id);

    public function rentalDetailsStore($id,$type,$request);

}

?>
