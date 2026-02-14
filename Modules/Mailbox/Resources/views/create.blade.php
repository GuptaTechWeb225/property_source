@extends('backend.master')
@section('title', $title)

@section('content')
    {!! breadcrumb([
        'title' => $title,
        route('dashboard') => _trans('common.Dashboard'),
        '#' => $title,
    ]) !!}
    <div class="table-content table-basic">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mailboxes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="form-check form-check-inline cursor-pointer">
                            <input class="form-check-input cursor-pointer" type="radio" name="source" id="project" value="project" required onchange="toggleSource(this)">
                            <label class="form-check-label cursor-pointer" for="project">{{ _trans('common.Project') }}</label>
                        </div>
                        <div class="form-check form-check-inline cursor-pointer">
                            <input class="form-check-input cursor-pointer" type="radio" name="source" id="task" value="task" required onchange="toggleSource(this)">
                            <label class="form-check-label cursor-pointer" for="task">{{ _trans('common.Task') }}</label>
                        </div>
                        <div class="form-check form-check-inline cursor-pointer">
                            <input class="form-check-input cursor-pointer" type="radio" name="source" id="lead" value="lead" required onchange="toggleSource(this)">
                            <label class="form-check-label cursor-pointer" for="lead">{{ _trans('common.Lead') }}</label>
                        </div>

                        <div class="form-check form-check-inline cursor-pointer">
                            <input class="form-check-input cursor-pointer" type="radio" name="source" id="invoice" value="invoice" required onchange="toggleSource(this)">
                            <label class="form-check-label cursor-pointer" for="invoice">{{ _trans('common.Invoice') }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 d-none" id="projectField">
                        <label class="form-label">
                            {{ _trans('common.Project') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <select 
                            name="project_id" 
                            class="form-control ot-form-control ot_input select2"
                            id="projects"
                            selected-id="{{ old('project_id') }}"
                        >
                        </select>
                    </div>
                    <div class="form-group mb-3 d-none" id="taskField">
                        <label class="form-label">
                            {{ _trans('common.Task') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <select 
                            name="task_id" 
                            class="form-control ot-form-control ot_input select2"
                            id="tasks"
                            selected-id="{{ old('task_id') }}"
                        >
                        </select>
                    </div>
                    <div class="form-group mb-3 d-none" id="leadField">
                        <label class="form-label">
                            {{ _trans('common.Lead') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <select 
                            name="lead_id" 
                            class="form-control ot-form-control ot_input select2"
                            id="leads"
                            selected-id="{{ old('lead_id') }}"
                        >
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Recipients') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <select 
                            name="recipients[]" 
                            class="form-control ot-form-control ot_input select2"
                            id="recipients"
                            multiple
                            required
                        >
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.CC') }} 
                        </label>
                        <select 
                            name="cc[]" 
                            class="form-control ot-form-control ot_input select2"
                            id="cc"
                            multiple
                        >
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Subject') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            name="subject" 
                            class="form-control ot-form-control ot_input"
                            required
                        >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Attachment') }} 
                        </label>
                        <input 
                            type="file" 
                            name="attachments[]"
                            class="form-control ot-form-control ot_input"
                            multiple
                        >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Message') }} 
                            <span class="text-danger">*</span>
                        </label>
                        <textarea 
                            name="message" 
                            class="summernote"
                            required
                        ></textarea>
                    </div>
                    <button class="d-flex align-items-center justify-content-center gap-2 crm_theme_btn mt-3 float-end">
                        <span class="fs-6">{{ _trans('common.Send') }}</span>
                        <i class="las la-paper-plane fs-5"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
    <script>
        const fetchProjects = async () => {
            $('#projects').html(`<option>{{ _trans('common.Fetching') }}</option>`);

            const url = `{{ url('project.fetch-projects') }}`;
            const selected_id = $('#projects').attr('selected-id');

            await $.ajax({
                url,
                method: "GET",
                success: function (response) {
                    if (response?.length) {
                        $('#projects').empty();
                        $('#projects').append(`<option></option>`);
                        
                        response.map(project => {
                            $('#projects').append(`
                                <option 
                                    value="${project.id}" 
                                    ${project.id == selected_id ? 'selected' : ''}
                                >
                                    ${project.name} (${project?.client?.name})
                                </option>
                            `);
                        });
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });
        }

        
        const fetchTasks = async () => {
            $('#tasks').html(`<option>{{ _trans('common.Fetching') }}</option>`);
            const url = `{{ url('task.fetch-tasks') }}`;
            const selected_id = $('#tasks').attr('selected-id');
            await $.ajax({
                url,
                method: "GET",
                success: function (response) {
                    if (response?.length) {
                        $('#tasks').empty();
                        $('#tasks').append(`<option></option>`);
                        
                        response.map(task => {
                            $('#tasks').append(`
                                <option 
                                    value="${task.id}" 
                                    ${task.id == selected_id ? 'selected' : ''}
                                >
                                    ${task.name} (${task?.client?.name})
                                </option>
                            `);
                        });
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });
        }

        
        const fetchLeads = async () => {
            $('#leads').html(`<option>{{ _trans('common.Fetching') }}</option>`);
            const url = `{{ url('lead.fetch-leads') }}`;
            const selected_id = $('#leads').attr('selected-id');
            await $.ajax({
                url,
                method: "GET",
                success: function (response) {
                    if (response?.length) {
                        $('#leads').empty();
                        $('#leads').append(`<option></option>`);
                        
                        response.map(lead => {
                            $('#leads').append(`
                                <option 
                                    value="${lead.id}" 
                                    ${lead.id == selected_id ? 'selected' : ''}
                                >
                                    ${lead.name} — ${lead.title}
                                </option>
                            `);
                        });
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });
        }

        const fetchUserEmails = async () => {
            $('#recipients').html(`<option>{{ _trans('common.Fetching') }}</option>`);
            $('#cc').html(`<option>{{ _trans('common.Fetching') }}</option>`);
            const url = `{{ url('user.fetch-user-emails') }}`;

            await $.ajax({
                url,
                method: "GET",
                success: function (response) {

                    if (response?.length) {
                        $('#recipients').empty();
                        $('#recipients').append(`<option></option>`);
                        
                        response.map(email => {
                            $('#recipients').append(`
                                <option value="${email}">${email}</option>
                            `);
                        });

                        
                        $('#cc').empty();
                        $('#cc').append(`<option></option>`);
                        
                        response.map(email => {
                            $('#cc').append(`
                                <option value="${email}">${email}</option>
                            `);
                        });
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });
        }

        const toggleSource = (obj) => {
            $('#projectField').addClass('d-none');
            $('#taskField').addClass('d-none');
            $('#leadField').addClass('d-none');

            $('#projects').prop('required', false);
            $('#tasks').prop('required', false);
            $('#leads').prop('required', false);

            $('#projects').val('');
            $('#tasks').val('');
            $('#leads').val('');

            if ($(obj).prop("checked") && $(obj).val() == 'project') {
                $('#projectField').removeClass('d-none');
                $('#projects').prop('required', true);
            } else if (!$(obj).prop("checked") && $(obj).val() == 'project') {
                $('#projectField').addClass('d-none');
            } else if ($(obj).prop("checked") && $(obj).val() == 'task') {
                $('#taskField').removeClass('d-none');
                $('#tasks').prop('required', true);
            } else if (!$(obj).prop("checked") && $(obj).val() == 'task') {
                $('#taskField').addClass('d-none');
            } else if ($(obj).prop("checked") && $(obj).val() == 'lead') {
                $('#leadField').removeClass('d-none');
                $('#leads').prop('required', true);
            } else if (!$(obj).prop("checked") && $(obj).val() == 'lead') {
                $('#leadField').addClass('d-none');
            }
            $('.select2').select2();
        }

        $(document).ready(function () {
            fetchUserEmails();
            fetchProjects();
            fetchTasks();
            fetchLeads();
            $('.summernote').summernote({
                tabsize: 2,
                height: 500
            });
        })
    </script>
@endsection