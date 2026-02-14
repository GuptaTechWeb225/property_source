<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content data">
        <div class="modal-header modal-header-image text-center">
            <h5 class="modal-title text-white">CSV</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="las la-times" aria-hidden="true"></i>
            </button>
        </div>
        <form action="{{ route('email.box.export') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="form-label">{{ _trans('common.Mailbox') }}</label>
                        @include('mailbox::box._static_array')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group text-right pt-3 d-flex justify-content-end">
                    <button type="submit" class="crm_theme_btn pull-right">{{ _trans('common.Export') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
