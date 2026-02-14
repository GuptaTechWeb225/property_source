@props([
    'name' => '',
    'required' => false,
    'browserRequired' => false,
    'label' => '',
    'showLabel' => true,
    'id' => uniqId(),
    'value' => '',
    'class' => '',
    'col' => 'col-md-6 mb-3',
    'inputsInline' => false,
])

@if($inputsInline)
    <div class="{{ $col }}">
        <div class="mb-3 row align-items-center">
            @if($showLabel)
                <label for="{{ $id }}" class="col-sm-3 col-form-label">
                    {{ _trans('landlord.' . $label) }}
                    @if ($required)
                        <span class="fillable">*</span>
                    @endif
                </label>
            @endif
            <div class="col-sm-9">
                <select {{ $browserRequired ? 'required' : '' }} {{ $attributes->merge(['class' => "nice-select niceSelect bordered_style wide  $class" ]) }}
                        name="{{ $name }}" id="{{ $id }}">
                    {{ $slot }}
                </select>

                @error($name)
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
@else
    <div class="{{ $col }}">
        @if($showLabel)
            <label for="{{ $id }}" class="form-label">
                {{ _trans('landlord.' . $label) }}
                @if ($required)
                    <span class="fillable">*</span>
                @endif
            </label>
        @endif
        <select {{ $browserRequired ? 'required' : '' }} {{ $attributes->merge(['class' => "nice-select niceSelect bordered_style wide  $class" ]) }}
                name="{{ $name }}" id="{{ $id }}">
                <option value="">Select {{$label}}</option>
            {{ $slot }}
        </select>

        @error($name)
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
@endif
