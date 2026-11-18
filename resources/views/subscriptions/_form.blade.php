<div class="form-group mb-3">
    <label for="tags" class="form-label text-orange">Включені послуги / Теги:</label>
    <select name="tags[]" id="tags" class="form-control select2" multiple>
        @foreach($tags as $id => $name)
            <option value="{{ $id }}" {{ in_array($id, old('tags', $selected ?? [])) ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>
