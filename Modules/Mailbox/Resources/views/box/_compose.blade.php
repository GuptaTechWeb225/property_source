<hr>
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.To') }}
        <span class="text-danger">*</span>
    </label>
    <select name="recipients[]" class="form-control ot-form-control ot_input select2" id="recipients" multiple required>
    </select>
</div>
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.CC') }}
    </label>
    <select name="cc[]" class="form-control ot-form-control ot_input select2" id="cc" multiple>
    </select>
</div>
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.Subject') }}
        <span class="text-danger">*</span>
    </label>
    <input name="subject" class="form-control ot-form-control ot_input" required>
</div>
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.Attachment') }}
    </label>
    <input type="file" name="attachments[]" class="form-control ot-form-control ot_input" multiple>
</div>
<div class="form-group mb-3">
    <label class="form-label">
        {{ _trans('common.Message') }}
        <span class="text-danger">*</span>
    </label>
    <textarea name="message" class="summernote" required></textarea>
</div>
<button class="d-flex align-items-center justify-content-center gap-2 crm_theme_btn mt-3 float-end">
    <span class="fs-6">{{ _trans('common.Send') }}</span>
    <i class="las la-paper-plane fs-5"></i>
</button>
