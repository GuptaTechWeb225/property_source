@props([
    'name' => '',
    'required' => false,
    'label' => '',
    'id' => uniqId(),
    'value' => '',
    'class' => '',
    'col' => 'col-md-6 mb-3',
])


<div class="{{ $col }}">
    <input type="hidden" name="{{ $name }}" value="0">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" @if ($value) checked @endif id="{{ $name }}">
        <label class="form-check-label" for="{{ $name }}">
            {{ _trans('common.'.$label) }} @if ($required)
                <span class="fillable">*</span>
            @endif
        </label>
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
