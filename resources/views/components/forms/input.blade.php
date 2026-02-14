@props([
    'name' => '',
    'required' => false,
    'browserRequired' => false,
    'label' => '',
    'id' => uniqId(),
    'placeholder' => '',
    'value' => '',
    'class' => '',
    'col' => 'col-md-6 mb-3',
    'type' => 'text',
    'inputsInline' => false,
    'parentDivId' => ''
])

@if($inputsInline)
    <div class="{{ $col }}" id="{{ $parentDivId }}">
        <div class="mb-3 row">
            <label for="{{ $id }}" class="col-sm-3 col-form-label">
                {{ _trans('landlord.' . $label) }}
                @if ($required)
                    <span class="fillable">*</span>
                @endif
            </label>
            <div class="col-sm-9">
                <input {{ $attributes }}
                    class="form-control {{ $class }} ot-input @error($name) is-invalid @enderror" name="{{ $name }}"
                    value="{{ @old($name) ?? $value }}"
                    id="{{ $id }}"
                       {{ $browserRequired ? 'required' : '' }}
                    placeholder="{{ !empty($placeholder) ? _trans("landlord.$placeholder")  : _trans("landlord.Enter $label") }}"
                    type="{{ $type }}"
                >
                @error($name)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
@else
    <div class="{{ $col }}" id="{{ $parentDivId }}">
        @if($label)
        <label for="{{ $id }}" class="form-label">
            {{ _trans('landlord.' . $label) }}
            @if ($required)
                <span class="fillable">*</span>
            @endif
        </label>
        @endif
        <input
            {{ $attributes }}
            class="form-control {{ $class }} ot-input @error($name) is-invalid @enderror" name="{{ $name }}"
            value="{{ @old($name) ?? $value }}"
            id="{{ $id }}"
            {{ $browserRequired ? 'required' : '' }}
            placeholder="{{ !empty($placeholder) ? $placeholder : _trans("landlord.Enter $label") }}"
            type="{{ $type }}"
        >
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
@endif

