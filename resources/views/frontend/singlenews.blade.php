@extends('layouts.frontend')

@section('title', $seo['title'] ?? $news->title . ' - ' . setting('general.brand_name', 'Office of the President and Cabinet'))

@section('content')

<!-- Banner Section -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title">News Details</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">News</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Main Content Section -->
<section id="main-container" class="main-container section-padding">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="post-content post-single">
                    <div class="post-media post-image" style="overflow: hidden; border-radius: 8px; height: 400px; background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);">
                        <img loading="lazy"
                             src="{{ $news->image ? asset('storage/' . $news->image) : asset('frontendassets/images/default.jpg') }}"
                             class="img-fluid rounded shadow"
                             alt="{{ $news->title }}"
                             style="width: 100%; height: 100%; object-fit: cover; object-position: center 30%; display: block;">
                    </div>

                    <div class="post-body mt-4">
                        <div class="entry-header">
                            <div class="post-meta mb-4">
                                <span class="post-author mr-3"><i class="far fa-user mr-1"></i> Admin</span>
                                <span class="post-cat mr-3"><i class="far fa-folder-open mr-1"></i> News</span>
                                <span class="post-meta-date"><i class="far fa-calendar mr-1"></i> {{ $news->created_at->format('F d, Y') }}</span>
                            </div>
                            <h2 class="entry-title font-weight-medium mb-4" style="font-size: 1.4rem; line-height: 1.4; color: #2c3e50;">
                                {{ $news->title }}
                            </h2>
                        </div>

                        <div class="entry-content text-justify">
                            {!! \App\Helpers\HtmlSanitizer::sanitize($news->description) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts mb-5">
                        <h3 class="widget-title font-weight-bold mb-4 pb-3 border-bottom">Recent Posts</h3>
                        <ul class="list-unstyled">
                            @foreach ($recentPosts as $post)
                                <li class="mb-4 pb-3 border-bottom">
                                    <div class="d-flex align-items-start">
                                        <div class="posts-thumb mr-3 flex-shrink-0" style="width: 90px; height: 70px; border-radius: 4px; overflow: hidden; background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);">
                                            <a href="{{ route('singlenews', $post->slug) }}" class="d-block w-100 h-100">
                                                <img loading="lazy"
                                                     src="{{ $post->image ? asset('storage/' . $post->image) : asset('frontendassets/images/default.jpg') }}"
                                                     alt="{{ $post->title }}"
                                                     class="img-fluid rounded shadow-sm"
                                                     style="width: 100%; height: 100%; object-fit: cover; object-position: center 30%; display: block;">
                                            </a>
                                        </div>
                                        <div class="post-info flex-grow-1">
                                            <h5 class="entry-title mb-1">
                                                <a href="{{ route('singlenews', $post->slug) }}" class="font-weight-medium text-dark hover-primary">
                                                    {{ Str::limit($post->title, 60) }}
                                                </a>
                                            </h5>
                                            <span class="post-date text-muted small d-block">
                                                <i class="far fa-calendar-alt mr-1"></i>{{ $post->created_at->format('F d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<style>

.entry-title {
    font-size: 1.4rem;  /* Medium size */
    font-weight: 500;   /* Medium weight */
    line-height: 1.4;
    color: #2c3e50;     /* Dark color for better readability */
    margin-bottom: 1.5rem;
    position: relative;
}

/* Optional: Add subtle underline */
.entry-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: #5bc0de;
    margin-top: 10px;
    border-radius: 3px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .entry-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 576px) {
    .entry-title {
        font-size: 1.2rem;
    }
}



/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 300px;
    position: relative;
    display: flex;
    align-items: center;
}
.banner-area::before {
    content: '';
    background: rgba(0,0,0,0.6);
    position: absolute;
    width: 100%;
    height: 100%;
}
.banner-text {
    position: relative;
    z-index: 1;
    color: #fff;
}
.banner-title {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}
.breadcrumb {
    background: transparent;
    padding: 0;
}
.breadcrumb-item a {
    color: #fff;
    transition: color 0.3s;
}
.breadcrumb-item a:hover {
    color: #5bc0de;
    text-decoration: none;
}
.breadcrumb-item.active {
    color: #f8f9fa;
}
.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.7);
}

/* Main Content */
.main-container {
    padding: 60px 0;
}
.entry-title {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    line-height: 1.4;
}
.post-meta {
    color: #6c757d;
    font-size: 0.9rem;
}
.post-meta i {
    margin-right: 5px;
}
.entry-content {
    font-size: 1.05rem;
}
.entry-content p {
    margin-bottom: 1.5rem;
    line-height: 1.8;
    color: #495057;
}
.entry-content .lead {
    font-size: 1.2rem;
    font-weight: 400;
    color: #2c3e50;
}

/* Sidebar */
.sidebar {
    position: sticky;
    top: 20px;
}
.widget {
    margin-bottom: 30px;
    padding: 25px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}
.widget-title {
    font-size: 1.25rem;
    margin-bottom: 1.5rem;
    padding-bottom: 12px;
    border-bottom: 2px solid #f1f1f1;
}
.posts-thumb img {
    transition: transform 0.3s ease;
}
.posts-thumb:hover img {
    transform: scale(1.05);
}
.entry-title a {
    transition: color 0.3s;
}
.hover-primary:hover {
    color: #5bc0de !important;
}
.post-date {
    font-size: 0.8rem;
}

/* Responsive */
@media (max-width: 992px) {
    .banner-title {
        font-size: 1.8rem;
    }
    .entry-title {
        font-size: 1.6rem;
    }
}
@media (max-width: 768px) {
    .banner-area {
        height: 250px;
    }
    .banner-title {
        font-size: 1.5rem;
    }
    .entry-title {
        font-size: 1.4rem;
    }
    .post-media.post-image {
        height: 300px;
    }
}
@media (max-width: 576px) {
    .banner-title {
        font-size: 1.4rem;
    }
    .entry-title {
        font-size: 1.3rem;
    }
    .post-media.post-image {
        height: 250px;
    }

}
</style>

@endsection
