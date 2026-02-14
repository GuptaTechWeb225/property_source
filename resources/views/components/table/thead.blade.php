@props([
    'serial' => true,
    'action' => true,
    'items' => array()
])
<thead class="thead">
<tr>
    @if($serial)
        <th class="serial">{{ _trans('common.SR No') }}</th>
    @endif
        @foreach($items ?? [] as $item)
            <th>{{ _trans('common.'.$item) }}</th>
        @endforeach
    @if($action)
        <th class="action">{{ _trans('common.Action') }}</th>
    @endif
</tr>
</thead>
