@props([
    'property_id' => null,
    'advertise_id' => null,
    'amount' => 0,
])
<div class="d-flex gap-2">
    <form action="{{ route('cart.addtocart') }}" method="post">
        @csrf
        <input type="hidden" name="property_id" value="{{ @$property_id }}">
        <input type="hidden" name="advertisement_id" value="{{ @$advertise_id }}">
        <input type="hidden" name="amount" value="{{ @$amount }}">
        <button type="submit" class="o_land_primary_btn small_btn radius_5px flex-fill">{{ _trans('landlord.Reserve') }}</button>
    </form>
    <a href="javascript:void(0)" onclick="bookViewingHandler('{{ @$property_id }}')" data-bs-toggle="modal"
       data-bs-target="#bookAViewing"  class="o_land_primary_btn2 small_btn radius_5px flex-fill">
        {{ _trans('Book a Viewing') }}
    </a>
</div>
