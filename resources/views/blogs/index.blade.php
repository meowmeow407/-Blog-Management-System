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

@section('scripts')
<script>
$(document).ready(function() {
    let activeCategory = '';
    let searchTimer = null;

    function updateFilters(page = 1) {
        const search = $('#global-search-input').val();
        const date = $('#date-input').val();
        
        $('#global-loading').fadeIn(200);
        $('#global-search-loading').show();

        $.ajax({
            url: "{{ route('blogs.filter') }}",
            type: "GET",
            data: {
                search: search,
                category: activeCategory,
                date: date,
                page: page
            },
            success: function(response) {
                $('#blog-list-wrapper').html(response);
                updateCounterText(search, date);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", error);
            },
            complete: function() {
                $('#global-loading').fadeOut(200);
                $('#global-search-loading').hide();
            }
        });
    }

    function updateCounterText(search, date) {
        let text = 'Showing ';
        let filters = [];
        
        if (activeCategory) {
            filters.push(`Category: <strong>${activeCategory}</strong>`);
        }
        if (search) {
            filters.push(`Keyword: <strong>"${search}"</strong>`);
        }
        if (date) {
            const dateObj = new Date(date);
            const formattedDate = dateObj.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
            filters.push(`Date: <strong>${formattedDate}</strong>`);
        }

        if (filters.length > 0) {
            text += 'results for ' + filters.join(' and ');
        } else {
            text += 'all recent updates';
        }

        $('#results-count-text').html(text);
    }

    $('.category-pill').on('click', function() {
        $('.category-pill').removeClass('active');
        $(this).addClass('active');
        activeCategory = $(this).data('category');
        updateFilters();
    });

    $('#global-search-input').on('keyup input', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
            updateFilters();
        }, 400);
    });

    $('#date-input').on('change', function() {
        updateFilters();
    });

    $('#reset-filters').on('click', function() {
        $('#global-search-input').val('');
        $('#date-input').val('');
        $('.category-pill').removeClass('active');
        $('.category-pill[data-category=""]').addClass('active');
        activeCategory = '';
        updateFilters();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        const page = new URLSearchParams(url.split('?')[1]).get('page');
        updateFilters(page);
        $('html, body').animate({
            scrollTop: $('.blog-main-list').offset().top - 100
        }, 400);
    });

    if ($('#global-search-input').val()) {
        updateFilters();
    }
});
</script>
@endsection