@extends('layouts.app')

@section('content')
    <div class="tags-container">
        <div class="tags-card">
            <div class="tags-header mb-3">
                <span class="tags-subtitle">Мітки: {{ $blog->title }}</span>
                <h2 class="tags-title">Оберіть мітки запису</h2>
            </div>

            <form action="{{ route('blog.tags.store', $blog) }}" method="POST">
                @csrf
                <div class="duallist-wrapper mb-4">
                    <select name="filters[]" id="duallist" multiple>
                        @foreach($filters as $id => $name)
                            <option value="{{ $id }}" {{ in_array($id, $selected) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-orange">Зберегти мітки</button>
                </div>
            </form>
        </div>
    </div>
@endsection
