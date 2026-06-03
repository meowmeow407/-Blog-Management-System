@extends('layouts.layout')

@section('title', 'Chronicle - Discover Latest Insights')

@section('content')
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Discover Latest Insights</h1>
        <p class="hero-subtitle">Stay updated with the latest Admit Cards, Results, Syllabus, and Job Alerts.</p>
    </div>
</section>

<div class="blog-container-layout">
    <!-- Filter Sidebar -->
    <aside class="filter-sidebar">
        <div class="sidebar-header">
            <h3><i class="fa-solid fa-sliders"></i> Filter & Search</h3>
            <button id="reset-filters" class="btn-reset" title="Reset all filters"><i class="fa-solid fa-rotate-left"></i></button>
        </div>
        


        <div class="filter-group">
            <label><i class="fa-solid fa-tags"></i> Category</label>
            <div class="category-filter-list">
                <button type="button" class="category-pill active" data-category="">All Categories</button>
                @foreach($categories as $category)
                    <button type="button" class="category-pill" data-category="{{ $category }}">{{ $category }}</button>
                @endforeach
            </div>
        </div>

        <div class="filter-group">
            <label for="date-input"><i class="fa-regular fa-calendar"></i> Publish Date</label>
            <input type="date" id="date-input">
        </div>
    </aside>

    <!-- Main Content Area -->
    <section class="blog-main-list">
        <div class="list-header">
            <div class="results-count" id="results-count-text">
                Showing all recent updates
            </div>
            <div class="loading-overlay" id="global-loading" style="display: none;">
                <div class="spinner-spinner"></div>
            </div>
        </div>

        <!-- Dynamic Content Wrapper -->
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

    // Trigger filter update
    function updateFilters(page = 1) {
        const search = $('#global-search-input').val();
        const date = $('#date-input').val();
        
        // Show loading state
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
                // Update HTML content
                $('#blog-list-wrapper').html(response);
                
                // Update results counter text
                updateCounterText(search, date);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", error);
            },
            complete: function() {
                // Hide loading states
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
            // Format date locally
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

    // Category pill click handler
    $('.category-pill').on('click', function() {
        $('.category-pill').removeClass('active');
        $(this).addClass('active');
        activeCategory = $(this).data('category');
        updateFilters();
    });

    // Search input change handler with Debounce to prevent server flooding
    $('#global-search-input').on('keyup input', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
            updateFilters();
        }, 400); // Wait 400ms after user stops typing
    });

    // Date change handler
    $('#date-input').on('change', function() {
        updateFilters();
    });

    // Reset filters handler
    $('#reset-filters').on('click', function() {
        $('#global-search-input').val('');
        $('#date-input').val('');
        $('.category-pill').removeClass('active');
        $('.category-pill[data-category=""]').addClass('active');
        activeCategory = '';
        updateFilters();
    });

    // Handle AJAX Pagination clicks dynamically
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        // Parse the page number from the URL
        const page = new URLSearchParams(url.split('?')[1]).get('page');
        
        updateFilters(page);
        
        // Smooth scroll to top of list container
        $('html, body').animate({
            scrollTop: $('.blog-main-list').offset().top - 100
        }, 400);
    });

    // If pre-filled on load (e.g. redirected from other page with ?search=X)
    if ($('#global-search-input').val()) {
        updateFilters();
    }
});
</script>
@endsection
