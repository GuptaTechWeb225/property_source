<select name="sourceable_type" class="form-control" id="sourceable_type">
    <option value="all_emails">{{ _trans('common.All') }}</option>
    {{-- @foreach ($mailboxTypesArray as $typeKey => $typeName)
        <option value="{{ $typeKey }}">{{ $typeName }}</option>
    @endforeach --}}
</select>