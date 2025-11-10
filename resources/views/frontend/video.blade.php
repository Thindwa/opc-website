@extends('layouts.frontend')

@section('content')

<!-- Banner Area -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title" style="font-size: 1.8rem;">Resource Center</h1>
                        <nav aria-label="Breadcrumb navigation">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">OPC Gallery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Videos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Videos Section -->
<section class="about-opc section-padding" aria-labelledby="video-archive-heading">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 id="video-archive-heading" class="section-title">OFFICIAL VIDEO ARCHIVE</h2>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon"><i class="fas fa-play-circle" aria-hidden="true"></i></span>
                        <span class="divider-line"></span>
                    </div>
                    <p class="content-text text-center mb-4">
                        Explore our curated collection of government videos featuring important addresses, <br class="d-none d-md-block">
                        policy announcements, and national events. Stay informed with official content.
                    </p>
                </div>

                <div class="row video-gallery">
                    @foreach ($videos as $video)
                        <div class="col-lg-6 col-md-6 mb-4">
                            <article class="video-item card h-100 border-0 shadow-sm">
                                <div class="video-container rounded-top">
                                    <iframe src="{{ $video->embed_url }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen
                                        title="{{ $video->title }}"></iframe>
                                </div>
                                <div class="card-body bg-light rounded-bottom">
                                    <h3 class="video-title text-dark mb-1">
                                        <i class=" mr-2" aria-hidden="true"></i>{{ $video->title }}
                                    </h3>
                                    <p class="video-meta text-muted small mb-0">
                                        <i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($video->created_at)->format('F d, Y') }}
                                        <span class="mx-2">|</span>

                                    </p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row mt-4">
                    <div class="col-12">
                        {{ $videos->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<style>
    /* Banner Styles */
    .banner-area {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 280px;
        position: relative;
        display: flex;
        align-items: center;
    }
    .banner-area::before {
        content: '';
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
    .banner-text {
        position: relative;
        z-index: 1;
        color: #fff;
        width: 100%;
    }
    .banner-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        letter-spacing: 0.5px;
    }

    /* Section Title */
    .section-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
    }
    .title-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1.75rem auto;
    }
    .divider-line {
        height: 2px;
        width: 60px;
        background: #e74c3c;
    }
    .divider-icon {
        margin: 0 20px;
        color: #e74c3c;
        font-size: 1.5rem;
    }

    /* Video Gallery Styles */
    .video-item {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 8px !important;
        overflow: hidden;
    }
    .video-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        background: #000;
    }
    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .video-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }
    .video-meta {
        display: flex;
        align-items: center;
    }

    /* Pagination Styles */
    .pagination {
        margin-top: 2rem;
    }
    .page-item.active .page-link {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }
    .page-link {
        color: #e74c3c;
        padding: 0.5rem 0.9rem;
        margin: 0 3px;
        border-radius: 4px !important;
        border: 1px solid #dee2e6;
    }
    .page-link:hover {
        color: #c0392b;
        background-color: #f8f9fa;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .banner-title {
            font-size: 1.8rem;
        }
        .section-title {
            font-size: 1.5rem;
        }
    }
    @media (max-width: 768px) {
        .banner-area {
            height: 240px;
        }
        .content-text br {
            display: none;
        }
    }
    @media (max-width: 576px) {
        .banner-area {
            height: 220px;
        }
        .banner-title {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 1.3rem;
        }
        .video-gallery > [class*="col-"] {
            padding-left: 8px;
            padding-right: 8px;
        }
        .video-title {
            font-size: 1rem;
        }
    }
</style>

@endsection
