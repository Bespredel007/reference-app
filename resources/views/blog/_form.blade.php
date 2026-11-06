@csrf
<div class="blog-form-group">
    <label for="title">Заголовок *</label>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $blog->title ?? '') }}"
        class="blog-form-input"
    >
    @error('title')
    <p class="error-msg">{{ $message }}</p>
    @enderror
</div>

<div class="blog-form-group">
    <label for="category_id">Категорія</label>
    <select id="category_id" name="category_id" class="blog-form-input">
        <option value="">- Без категорії -</option>
        @foreach ($categories as $id => $name)
            <option
                value="{{ $id }}"
                @selected(old('category_id', $blog->category_id ?? '') == $id)
            >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <p class="error-msg">{{ $message }}</p>
    @enderror
</div>

<div class="blog-form-group">
    <label for="description">Короткий опис</label>
    <textarea id="description" name="description" rows="3" class="blog-form-input">{{ old('description', $blog->description ?? '') }}</textarea>
    @error('description')
    <p class="error-msg">{{ $message }}</p>
    @enderror
</div>

<div class="blog-form-group">
    <label for="text">Повний текст</label>
    <textarea id="text" name="text" rows="6" class="blog-form-input">{{ old('text', $blog->text ?? '') }}</textarea>
    @error('text')
    <p class="error-msg">{{ $message }}</p>
    @enderror
</div>
