@if($blogs->isEmpty())
    <div class="empty-state">
        <div class="empty-icon"><i class="fa-solid fa-folder-open"></i></div>
        <h3>No Blogs Found</h3>
        <p>We couldn't find any blogs matching your search filters. Try adjusting your parameters.</p>
    </div>
@else
    <div class="blog-grid">
        @foreach($blogs as $blog)
            <article class="blog-card">
                <div class="card-image-wrapper">
                    @if($blog->image_path)
                        <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="card-image">
                    @else
                        <!-- fallback placeholder with beautiful dynamic gradients -->
                        <div class="card-image-placeholder category-{{ Str::slug($blog->category) }}">
                            <i class="fa-solid fa-image"></i>
                        </div>
                    @endif
                    <span class="card-badge category-{{ Str::slug($blog->category) }}">{{ $blog->category }}</span>
                </div>
                <div class="card-body">
                    <div class="card-meta">
                        <span class="meta-item"><i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                    </div>
                    <h3 class="card-title">{{ $blog->title }}</h3>
                    <p class="card-text">{{ $blog->short_description }}</p>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="card-link">
                        Read Full Post <span class="link-arrow"><i class="fa-solid fa-arrow-right-long"></i></span>
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <!-- AJAX Responsive Pagination -->
    <div class="pagination-wrapper">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
@endif
