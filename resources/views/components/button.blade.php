@props([
'title' => 'Submit',
'icon' => 'fa-solid fa-save',
'posistion' => 'text-end',
'variant' => 'primary',
'class' => 'mt-24',
'iconEnable' => true,
])
<div class="col-md-12">
    <div class="{{ $posistion }}">
        <button class="btn btn-lg ot-btn-{{ $variant }} {{ $class }}">
            @if($iconEnable)
                <span><i class="{{ $icon }}"></i></span>
            @endif
            {{ _trans('landlord.' . $title) }}</button>
    </div>
</div>
