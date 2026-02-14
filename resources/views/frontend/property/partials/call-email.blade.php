<div class="d-flex gap-2">
{{--    <a href="javascript:void(0)" onclick="showForRegister('call',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"--}}
{{--       class="o_land_primary_btn small_btn radius_5px flex-fill">Call</a>--}}

{{--    <a href="javascript:void(0)" onclick="showForRegister('email',@if(Auth::check()) 'logged' @else 'notlogged' @endif )"--}}
{{--       class="o_land_primary_btn small_btn radius_5px flex-fill">--}}
{{--        {{ _trans('landlord.Reserve') }}--}}
{{--    </a>--}}
    <a href="javascript:void(0)" onclick="bookViewingHandler('{{ @$item['id'] }}')" data-bs-toggle="modal"
       data-bs-target="#bookAViewing"  class="o_land_primary_btn2 small_btn radius_5px flex-fill">
        {{ _trans('Book a Viewing') }}
    </a>
</div>

