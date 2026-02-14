<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/invoice.css') }}">
    
</head>


<body>

<div class="position-relative">
    <div class="position-relative">
        <table>
            <tr>
                <td class="strong">
                    <div>
                        {{ env('APP_NAME') }}
                    </div>
                    <div class="invoice-text">{{ _trans('INVOICE') }} </div>
                    <div>
                        #1
                    </div>

                </td>

                <td class="position-relative">
                    <img class="full-logo  dark_logo" width="220px"
                         height="80px" src="{{ @globalAsset(setting('dark_logo'), '154x38.png') }}" alt="dark_logo">
                </td>
            </tr>

        </table>


    </div>

    <table class="width40">
        <tr>
            <td class="strong small gry-color">{{ _trans('project.To') }}:</td>
        </tr>
        <tr>
            <td class="gry-color small">{{ _trans('Name') }}:</td>
            <td>{{ @$data['order']->user->name }}</td>
        </tr>
        <tr>
            <td class="gry-color small">{{ _trans('Address') }}:</td>
            <td>{{ @$data['order']->user->state }} | {{ @$data['order']->user->city }}
                | {{ @$data['order']->user->zip_code }}</td>
        </tr>
        <tr>
            <td class="gry-color small">{{ _trans('Email') }}:</td>
            <td>{{ @$data['order']->user->email }}</td>
        </tr>
        <tr>
            <td class="gry-color small">{{ _trans('Phone') }}:</td>
            <td>{{ @$data['order']->user->phone }}</td>
        </tr>
    </table>


    <div class="margin-top-10">
        <table class="padding text-left small border-bottom">
            <thead>
            <tr class="gry-color">
                <th width="35%">{{ _trans('common.ID') }}</th>
                <th width="50%" class="text-left">{{ _trans('account.Project Name') }}</th>
                <th width="50%" class="text-left">{{ _trans('account.Category') }}</th>
                <th width="15%" class="text-right">{{ _trans('common.Total') }}</th>
            </tr>
            </thead>
            <tbody class="strong">
            @foreach($data['order']->orderDetails as $item)
                <tr>
                    <td width="20%">{{ $loop->iteration }}</td>
                    <td width="40%">{{ $item->property->name }}</td>
                    <td width="20%">{{ $item->property->category->name }}</td>
                    <td width="20%" class="text-right">{{ $item->total_amount }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="margin4rem">
        <table class="width40 marginLeftAuto text-right sm-padding small strong">
            <tbody>
            <tr>
                <th class="gry-color text-left">{{ _trans('landlord.Order ID:')}}</th>
                <td class="currency">{{ @$data['order']->invoice_no }}</td>
            </tr>
            <tr>
                <th class="gry-color text-left">{{ _trans('landlord.Order Date :')}}</th>
                <td class="currency">{{ @$data['order']->date }}</td>
            </tr>
            <tr>
                <th class="gry-color text-left">{{ _trans('landlord.Order Amount:')}}</th>
                <td class="currency">{{ @$data['order']->grand_total }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>
