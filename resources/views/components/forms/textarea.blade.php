@props([
    'name' => '',
    'required' => false,
    'label' => '',
    'id' => uniqId(),
    'placeholder' => '',
    'value' => '',
    'class' => '',
    'col' => 'col-md-12 mb-3',
    'rows' =>'5',
    'inputsInline' => false,
])

@if($inputsInline)
    <div class="{{ $col }}">
        <div class="mb-3 row align-items-center">
            <label for="{{ $id }}" class="col-sm-3 col-form-label">
                {{ _trans('landlord.' . $label) }}
                @if ($required)
                    <span class="fillable">*</span>
                @endif
            </label>
            <div class="col-sm-9">
                <textarea rows="{{ $rows }}" class="form-control {{ $class }} @error($name) is-invalid @enderror"
                      name="{{ $name }}" id="{{ $id }}">
                    {!! $value !!}
                </textarea>
                @error($name)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
@else
    <div class="{{ $col }}">
        <label for="{{ $id }}" class="form-label">
            {{ _trans('landlord.' . $label) }}
            @if ($required)
                <span class="fillable">*</span>
            @endif
        </label>

        <textarea rows="{{ $rows }}" class="form-control mt-0 {{ $class }} @error($name) is-invalid @enderror"
                  name="{{ $name }}" id="{{ $id }}">
        {!! old($name) ?? $value !!}
    </textarea>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
@endif
