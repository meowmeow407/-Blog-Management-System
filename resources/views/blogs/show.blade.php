@extends('layouts.layout')

@section('title', $blog->title . ' - Chronicle')

@section('content')
<div class="detail-page-container">
    <div class="back-link-wrapper">
        <a href="{{ route('blogs.index') }}" class="back-link"><i class="fa-solid fa-arrow-left-long"></i> Back to Blog list</a>
    </div>

    <div class="article-layout">
        <!-- Main Article Content -->
        <article class="article-main">
            <header class="article-header">
                <span class="article-badge category-{{ Str::slug($blog->category) }}">{{ $blog->category }}</span>
                <h1 class="article-title">{{ $blog->title }}</h1>
                <div class="article-meta">
                    <span class="meta-item"><i class="fa-regular fa-calendar-days"></i> Published on {{ $blog->created_at->format('F d, Y') }}</span>
                    <span class="meta-item"><i class="fa-regular fa-clock"></i> {{ max(1, ceil(str_word_count($blog->content) / 200)) }} min read</span>
                </div>
            </header>

            <div class="article-image-container">
                @if($blog->image_path)
                    <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="article-image">
                @else
                    <div class="article-image-placeholder category-{{ Str::slug($blog->category) }}">
                        <i class="fa-solid fa-feather-pointed"></i>
                    </div>
                @endif
            </div>

            <div class="article-content font-serif">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </article>

        <!-- Sidebar Recent Posts -->
        <aside class="article-sidebar">
            <div class="sidebar-widget">
                <h3>Recent Updates</h3>
                <div class="recent-posts-list">
                    @forelse($recentBlogs as $recent)
                        <a href="{{ route('blogs.show', $recent->slug) }}" class="recent-post-item">
                            <div class="recent-img-wrapper">
                                @if($recent->image_path)
                                    <img src="{{ asset('storage/' . $recent->image_path) }}" alt="{{ $recent->title }}">
                                @else
                                    <div class="recent-placeholder category-{{ Str::slug($recent->category) }}">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="recent-info">
                                <span class="recent-tag">{{ $recent->category }}</span>
                                <h4 class="recent-title">{{ Str::limit($recent->title, 50) }}</h4>
                                <span class="recent-date">{{ $recent->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @empty
                        <p class="empty-sidebar">No other recent posts found.</p>
                    @endforelse
                </div>
            </div>
            
            <div class="sidebar-widget promo-widget">
                <h3>Need Instant Alerts?</h3>
                <p>Register with Chronicle Admin dashboard to publish your own notices and admit card announcements immediately.</p>
                <a href="{{ route('login') }}" class="btn-promo">Open Admin Panel</a>
            </div>
        </aside>
    </div>
</div>
@endsection
