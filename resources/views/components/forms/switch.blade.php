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
    <div class="form-check form-switch form-switch-lg">
        <input class="form-check-input" name="{{ $name }}" value="1"
            @if ($value) checked @endif type="checkbox" role="switch" id="{{ $name }}">
        <label class="form-check-label" for="{{ $name }}">
            {{ $label }}
        </label>
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
