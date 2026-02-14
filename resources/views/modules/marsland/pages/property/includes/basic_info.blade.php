<div class="product-details-card mt-4">
    <div class="product-details-card_header">
        <h4 class="text-20 font-400 m-0 text-capitalize">{{ _trans('landlord.Basic Info') }} </h4>
    </div>
    <div class="product-details-card_body">
        <div class="table-responsive">
            <table class="table product-table style5 mb-0">
                <thead>
                <tr>
                    <th class="text-14 font-600 text-primary" scope="col">{{ _trans('landlord.SL') }}
                    </th>
                    <th class="text-14 font-600 text-primary border-start-0 border-end-0" scope="col">{{ _trans('landlord.Title') }}</th>
                    <th class="text-14 font-600 text-primary border-start-0 border-end-0" scope="col">{{ _trans('landlord.Content') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.01') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Size') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ @$property['size'] }} {{ _trans('landlord.SqFt') }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.02') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Beds') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ @$property['bedroom'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.03') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Bath') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ @$property['bathroom'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.04') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Rent') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ priceFormat($property['amount']) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.05') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Type') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ $property['type'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('number.06') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ _trans('landlord.Completion') }}</span>
                    </td>
                    <td>
                        <span class="text-14 font-500 text-paragraph">{{ $property['completion'] }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
