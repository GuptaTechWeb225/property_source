<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ @base_settings('company_name') }} - {{ _trans('common.Mailbox Print') }}</title>
    <link rel="stylesheet" href="{{ asset('vendors/') }}/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="table-responsive mt-4">
        <h6 class="mb-2">{{ @base_settings('company_name') }} - {{ _trans('common.Mailbox Print') }}</h6>
        <table class="table table-bordered border-primary">
            <thead class="thead">
                <tr class="text-center">
                    <th>{{ _trans('common.Sender') }}</th>
                    <th>{{ _trans('common.Subject') }}</th>
                    <th>{{ _trans('common.Date') }}</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($items as $key => $item)
                    <tr>
                        <td width="10%" class="cursor-pointer">
                            <div class="d-flex align-items-center gap-2">
                                <b class="text-dark">{{ $item->createdByUser->name ?? '' }}</b>
                            </div>
                        </td>
                        <td width="65%" class="cursor-pointer">
                            <a class="text-decoration-none text-dark" href="{{ $item->status != 'draft' && $item->status != 'trash' ? route('email.box.show', $item->id) : '#' }}"
                                class="{{ $item->is_read == 0 ? 'fw-bold' : '' }}">{!! $item->childrens_count != 0 ? '<i class="las la-reply"></i>' : '' !!}
                                {{ Str::limit($item->subject, 200, '...') }}
                                @if ($item->childrens_count > 0)
                                    ({{ $item->childrens_count ?? '' }})
                                @endif
                            </a>
                        </td>
                        <td width="25%" class="text-end cursor-pointer">
                            {{ date('d-m-Y', strtotime($item->created_at)) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>
</html>
