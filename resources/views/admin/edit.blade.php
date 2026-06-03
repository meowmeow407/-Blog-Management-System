@extends('layouts.layout')

@section('title', 'Edit Blog - Chronicle Admin')

@section('content')
<div class="form-page-container">
    <div class="form-back-link">
        <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <h2>Edit Blog Post</h2>
            <p>Update content, category, or banner image for this post.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="dashboard-form">
            @csrf

            <div class="form-grid">
                <div class="form-field-group col-span-2">
                    <label for="title">Blog Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
                </div>

                <div class="form-field-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                        <option value="Admit Card" {{ old('category', $blog->category) == 'Admit Card' ? 'selected' : '' }}>Admit Card</option>
                        <option value="Result" {{ old('category', $blog->category) == 'Result' ? 'selected' : '' }}>Result</option>
                        <option value="Syllabus" {{ old('category', $blog->category) == 'Syllabus' ? 'selected' : '' }}>Syllabus</option>
                        <option value="Job Alerts" {{ old('category', $blog->category) == 'Job Alerts' ? 'selected' : '' }}>Job Alerts</option>
                        <option value="News" {{ old('category', $blog->category) == 'News' ? 'selected' : '' }}>News</option>
                    </select>
                </div>

                <div class="form-field-group">
                    <label for="image">Featured Image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="image" id="image" accept="image/*">
                        <span class="file-upload-help">Choose new file to replace current banner (optional)</span>
                    </div>
                </div>

                @if($blog->image_path)
                    <div class="form-field-group col-span-2 current-image-preview-wrapper">
                        <label>Current Banner Image</label>
                        <div class="edit-image-preview">
                            <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Current Banner" class="current-banner-preview">
                            <span class="image-preview-info">Stored at: <code>storage/{{ $blog->image_path }}</code></span>
                        </div>
                    </div>
                @endif

                <div class="form-field-group col-span-2">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="3" required>{{ old('short_description', $blog->short_description) }}</textarea>
                </div>

                <div class="form-field-group col-span-2">
                    <label for="content">Full Post Content</label>
                    <textarea name="content" id="content" rows="12" required>{{ old('content', $blog->content) }}</textarea>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
