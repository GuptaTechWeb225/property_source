 <input type="hidden" id="change_lang_url" value="{{ route('language.ajaxLangChange') }}">
 <select name="language" id="language_with_flag" class="form-select ot-input mb-3 language-change"
     aria-label="Default select example">
     @foreach ($data['languages'] as $row)
         <option data-icon="{{ $row->icon_class }}" value="{{ $row->code }}"
             {{ $row->code == userLocal() ? 'selected' : '' }}>
             {{ $row->name }}
            </option>
     @endforeach
 </select>
