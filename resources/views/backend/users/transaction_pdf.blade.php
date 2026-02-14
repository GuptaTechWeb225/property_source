<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0">
    <div style=" ">
        <div style="background-color: #EBEBEB; padding: 20px; height: 100px;">
            <div style="float:left;">
                <img src="{{ asset('/images/landlogo.png') }}" alt="" width="200px">
            </div>

            <div style=" float:right  ">
                <h1 style="margin: 0; ">Invoice</h1>
                <p style="margin-top: 10px; font-size: 14px; ">Invoice #: {{$dataOne->invoice_number}}</p>
                <p style="margin-top: 10px; font-size: 14px; ">Invoice Date: {{$dataOne->date}}</p>
            </div>

        </div>

        <div style="margin-top: 20px; clear:both;">
            <table style="width: 100%; border-collapse: collapse; background: #F5F5F5; padding: 20px">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ddd;">SL.</th>
                        <th style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">Item Description
                        </th>
                        <th style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $transaction)
                    <tr>
                        <td style="text-align: left; padding: 8px; border-bottom: 1px solid #ddd;">{{ ++$key }}</td>
                        <td style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">{{ $transaction->type }}</td>
                        <td style="text-align: right; padding: 8px; border-bottom: 1px solid #ddd;">${{ $transaction->amount }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align: right; padding: 8px;">Subtotal</td>
                        <td style="text-align: right; padding: 8px;">${{ $totalAmount }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right; padding: 8px; font-weight: bold;">Total Amount</td>
                        <td style="text-align: right; padding: 8px; font-weight: bold;">${{ $totalAmount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
