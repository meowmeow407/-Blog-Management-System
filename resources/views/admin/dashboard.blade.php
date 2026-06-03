@extends('layouts.layout')

@section('title', 'Admin Dashboard - Chronicle')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <div>
            <h2>Dashboard</h2>
            <p>Welcome, Admin! Manage your blog listings here.</p>
        </div>
        <a href="{{ route('admin.create') }}" class="btn-add-blog"><i class="fa-solid fa-plus"></i> Create New Blog</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Published Date</th>
                        <th class="actions-header">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td class="table-img-cell">
                                @if($blog->image_path)
                                    <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="table-thumbnail">
                                @else
                                    <div class="table-thumbnail-placeholder category-{{ Str::slug($blog->category) }}">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="table-title-cell">
                                <span class="table-title-text">{{ $blog->title }}</span>
                                <span class="table-subtitle">{{ Str::limit($blog->short_description, 80) }}</span>
                            </td>
                            <td>
                                <span class="table-badge category-{{ Str::slug($blog->category) }}">{{ $blog->category }}</span>
                            </td>
                            <td class="table-date-cell">
                                {{ $blog->created_at->format('M d, Y') }}
                            </td>
                            <td class="table-actions-cell">
                                <div class="action-buttons-group">
                                    <a href="{{ route('blogs.show', $blog->slug) }}" class="btn-action btn-view" title="View Public Post" target="_blank">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.edit', $blog->id) }}" class="btn-action btn-edit" title="Edit Post">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');" class="inline-delete-form">
                                        @csrf
                                        <button type="submit" class="btn-action btn-delete" title="Delete Post">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="table-empty-state">
                                <i class="fa-solid fa-folder-open"></i>
                                <p>No blogs published yet. Get started by writing a new one!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dashboard-pagination">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
