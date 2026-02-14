<div class="product-details-card mt-4">
    <div class="product-details-card_header">
        <h4 class="text-20 font-400 m-0 text-capitalize">{{ _trans('landlord.facilities')  }}</h4>
    </div>
    <div class="product-details-card_body">
        <div class="table-responsive">
            <table class="table product-table style5 mb-0">
                <thead>
                <tr>
                    <th class="text-14 font-600 text-primary" scope="col">{{ _trans('landlord.SL')  }}
                    </th>
                    <th class="text-14 font-600 text-primary border-start-0 border-end-0" scope="col">{{ _trans('landlord.Title')  }}</th>
                    <th class="text-14 font-600 text-primary border-start-0 border-end-0" scope="col">{{ _trans('landlord.Content')  }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($facilities as $facility)
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ $facility['name'] }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ $facility['content'] }}</span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
