@props([
    'name' => '',
    'required' => false,
    'label' => '',
    'id' => uniqid(),
    'button_title' => 'Choose File',
    'value' => '',
    'class' => '',
    'col' => 'col-md-6 mb-3',
    'file_id' => 'placeholder',
    'accept' => 'image/*',
    'inputsInline' => false,
])

@if($inputsInline)
    <div class="{{ $col }}">
        <div class="mb-3 row">
            <label for="" class="col-sm-3 col-form-label">
                {{ _trans('landlord.' . $label) }}
                @if ($required)
                    <span class="fillable">*</span>
                @endif
            </label>
            <div class="col-sm-9">
                <div class="custom-file-input {{ $class }}">
                    <label for="{{ $name.'_file' }}">
                        <span type="button" class="file-browse-button">{{ $button_title }}</span>
                    </label>
                    <input type="file" id="{{ $name.'_file' }}" name="{{ $name }}" accept="{{ $accept }}">
                </div>
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
        <label for="" class="form-label">
            {{ _trans('landlord.' . $label) }}
            @if ($required)
                <span class="fillable">*</span>
            @endif
        </label>
        <div class="custom-file-input {{ $class }}">
            <label for="{{ $name.'_file' }}">
                <span type="button" class="btn ot-btn-primary">{{ $button_title }}</span>
            </label>
            <input type="file" id="{{ $name.'_file' }}" name="{{ $name }}" accept="{{ $accept }}">
        </div>
        @error($name)
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
@endif
