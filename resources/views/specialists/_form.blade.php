<div class="form-group">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $specialist->name ?? '') }}">
    @error('name') <span class="error-text">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="specialty">Спеціальність:</label>
    <input type="text" id="specialty" name="specialty" class="form-input" value="{{ old('specialty', $specialist->specialty ?? '') }}">
    @error('specialty') <span class="error-text">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="experience">Досвід (років):</label>
    <input type="number" id="experience" name="experience" class="form-input" value="{{ old('experience', $specialist->experience ?? 0) }}">
    @error('experience') <span class="error-text">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" class="form-input" value="{{ old('phone', $specialist->phone ?? '') }}">
    @error('phone') <span class="error-text">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="price">Ціна (грн):</label>
    <input type="number" id="price" name="price" class="form-input" value="{{ old('price', $specialist->price ?? 0) }}">
    @error('price') <span class="error-text">{{ $message }}</span> @enderror
</div>
