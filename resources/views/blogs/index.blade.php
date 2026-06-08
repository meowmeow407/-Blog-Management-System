@extends('layouts.layout')

@section('title', 'Chronicle - Discover Latest Insights')

@section('content')
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Discover Latest Insights</h1>
        <p class="hero-subtitle">Stay updated with the latest Admit Cards, Results, Syllabus, and Job Alerts.</p>
    </div>
</section>

<div class="blog-container-layout horizontal-layout-active">
    
    <div class="category-filter-wrapper-top">
        <div class="filter-header-inline">
            <h3><i class="fa-solid fa-sliders"></i> Filter by Category</h3>
            <div class="right-filter-actions">
                <div class="inline-date-group">
                    <label for="date-input"><i class="fa-regular fa-calendar"></i></label>
                    <input type="date" id="date-input">
                </div>
                <button id="reset-filters" class="btn-reset" title="Reset all filters"><i class="fa-solid fa-rotate-right"></i></button>
            </div>
        </div>
        
        <div class="category-filter-list-horizontal">
            <button type="button" class="category-pill active" data-category="">All Categories</button>
            @foreach($categories as $category)
                @php
                    // Map names to specific custom classes for clean colors matching your badges
                    $customClass = match($category) {
                        'Admit Card' => 'pill-admit',
                        'Result' => 'pill-result',
                        'Syllabus' => 'pill-syllabus',
                        'Job Alerts' => 'pill-job',
                        default => 'pill-generic'
                    };
                @endphp
                <button type="button" class="category-pill {{ $customClass }}" data-category="{{ $category }}">{{ $category }}</button>
            @endforeach
        </div>
    </div>

    <section class="blog-main-list">
        <div class="list-header">
            <div class="results-count" id="results-count-text">
                Showing all recent updates
            </div>
            <div class="loading-overlay" id="global-loading" style="display: none;">
                <div class="spinner-spinner"></div>
            </div>
        </div>

        <div id="blog-list-wrapper">
            @include('blogs._list')
        </div>
    </section>
</div>
@endsection

{{-- Keep all your original @section('scripts') exactly as they are without modifying a single line --}}