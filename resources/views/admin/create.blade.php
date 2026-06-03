@extends('layouts.layout')

@section('title', 'Create Blog - Chronicle Admin')

@section('content')
<div class="form-page-container">
    <div class="form-back-link">
        <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <h2>Create New Blog</h2>
            <p>Publish updates, notifications, or announcements to the public feed.</p>
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

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="dashboard-form">
            @csrf

            <div class="form-grid">
                <div class="form-field-group col-span-2">
                    <label for="title">Blog Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. UPSC Civil Services Exam Admit Card 2026 Out" required>
                </div>

                <div class="form-field-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="Admit Card" {{ old('category') == 'Admit Card' ? 'selected' : '' }}>Admit Card</option>
                        <option value="Result" {{ old('category') == 'Result' ? 'selected' : '' }}>Result</option>
                        <option value="Syllabus" {{ old('category') == 'Syllabus' ? 'selected' : '' }}>Syllabus</option>
                        <option value="Job Alerts" {{ old('category') == 'Job Alerts' ? 'selected' : '' }}>Job Alerts</option>
                        <option value="News" {{ old('category') == 'News' ? 'selected' : '' }}>News</option>
                    </select>
                </div>

                <div class="form-field-group">
                    <label for="image">Featured Image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="image" id="image" accept="image/*">
                        <span class="file-upload-help">JPG, PNG, GIF up to 2MB (optional)</span>
                    </div>
                </div>

                <div class="form-field-group col-span-2">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="3" placeholder="Provide a brief summary of the blog post. This is shown on the grid cards." required>{{ old('short_description') }}</textarea>
                </div>

                <div class="form-field-group col-span-2">
                    <label for="content">Full Post Content</label>
                    <textarea name="content" id="content" rows="12" placeholder="Write the main body content of the blog..." required>{{ old('content') }}</textarea>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Publish Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
