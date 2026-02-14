<?php


namespace App\Interfaces;


interface OfferInterface
{
    public function offerList();
    public function offerPaginate($request);
    public function store($request);
    public function find($id);
}
