@extends('admin.layout.app')

@section('title', 'Edit Blog')

@section('content')
    <h1>Edit Blog</h1>
    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug }}" required>
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" id="excerpt" class="form-control" required>{{ $blog->excerpt }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $blog->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="featured_image">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control">
            @if($blog->featured_image)
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '' }}">
        </div>

        {{-- <div class="form-group">
            <label for="author_id">Author</label>
            <select name="author_id" id="author_id" class="form-control" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $blog->meta_title }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea name="meta_description" id="meta_description" class="form-control">{{ $blog->meta_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <select name="meta_keywords" id="meta_keywords" class="form-control" required>
                <option value="noindex,nofollow" {{ $blog->meta_keywords == 'noindex,nofollow' ? 'selected' : '' }}>noindex,nofollow</option>
                <option value="index,nofollow" {{ $blog->meta_keywords == 'index,nofollow' ? 'selected' : '' }}>index,nofollow</option>
                <option value="noindex,follow" {{ $blog->meta_keywords == 'noindex,follow' ? 'selected' : '' }}>noindex,follow</option>
                <option value="follow,index" {{ $blog->meta_keywords == 'follow,index' ? 'selected' : '' }}>follow,index</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection