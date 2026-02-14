@csrf
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.Subject') }}
        <span class="text-danger">*</span>
    </label>
    <input name="title" class="form-control ot-form-control ot_input" value="{{ old('title', $item->title) }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>

<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.Description') }}
    </label>
    <textarea name="description" class="summernote">{{ old('description', $item->description) }}</textarea>
</div>
@if (@$item->id == '')
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_public" id="markAsPublic">
        <label class="form-check-label" for="markAsPublic">
            {{ _trans('common.Mark as public') }}
        </label>
        <span id="message" class="text-warning hide">&nbsp;&nbsp;<i class="las la-exclamation-triangle"></i>
            {{ _trans('common.You can\'t make this template as private again.') }}</span>
    </div>
@endif
<button class="d-flex align-items-center justify-content-center gap-2 crm_theme_btn mt-3 float-end">
    <span class="fs-6">{{ $buttonText }}</span>
    <i class="las la-save fs-5"></i>
</button>
