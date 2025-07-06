@extends('layouts.frontend')

@section('content')

<!-- Banner Area -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
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
</div>

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
                    <!-- Video 1 -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <article class="video-item card h-100 border-0 shadow-sm">
                            <div class="video-container rounded-top">
                                <iframe src="https://www.youtube.com/embed/yV3oNuMqmm8" frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    title="President Chakwera speech marking 100 days in office"></iframe>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <h3 class="video-title text-dark mb-1">
                                    <i class="fas fa-microphone-alt text-danger mr-2" aria-hidden="true"></i>President Chakwera speech marking 100 days in office
                                </h3>
                                <p class="video-meta text-muted small mb-0">
                                    <i class="far fa-calendar-alt mr-1" aria-hidden="true"></i> October 05, 2020
                                    <span class="mx-2" aria-hidden="true">|</span>
                                    <i class="far fa-clock mr-1" aria-hidden="true"></i> 12:45 mins
                                </p>
                            </div>
                        </article>
                    </div>

                    <!-- Video 2 -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <article class="video-item card h-100 border-0 shadow-sm">
                            <div class="video-container rounded-top">
                                <iframe src="https://www.youtube.com/embed/KulX1shrOgw" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    title="Malawi President Addresses United Nations General Debate"></iframe>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <h3 class="video-title text-dark mb-1">
                                    <i class="fas fa-hard-hat text-primary mr-2" aria-hidden="true"></i>Malawi - President Addresses United Nations General Debate, 78th Session | #UNGA
                                </h3>
                                <p class="video-meta text-muted small mb-0">
                                    <i class="far fa-calendar-alt mr-1" aria-hidden="true"></i> December 5, 2022
                                    <span class="mx-2" aria-hidden="true">|</span>
                                    <i class="far fa-clock mr-1" aria-hidden="true"></i> 8:22 mins
                                </p>
                            </div>
                        </article>
                    </div>

                    <!-- Video 3 -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <article class="video-item card h-100 border-0 shadow-sm">
                            <div class="video-container rounded-top">
                                <iframe src="https://www.youtube.com/embed/oKb4DaUAKgk" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    title="President's Address to Parliament"></iframe>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <h3 class="video-title text-dark mb-1">
                                    <i class="fas fa-graduation-cap text-info mr-2" aria-hidden="true"></i>President's Address to Parliament
                                </h3>
                                <p class="video-meta text-muted small mb-0">
                                    <i class="far fa-calendar-alt mr-1" aria-hidden="true"></i> November 20, 2022
                                    <span class="mx-2" aria-hidden="true">|</span>
                                    <i class="far fa-clock mr-1" aria-hidden="true"></i> 15:30 mins
                                </p>
                            </div>
                        </article>
                    </div>

                    <!-- Video 4 -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <article class="video-item card h-100 border-0 shadow-sm">
                            <div class="video-container rounded-top">
                                <iframe src="https://www.youtube.com/embed/awYiolAg5tE" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    title="Open Government Week 2024 Highlights"></iframe>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <h3 class="video-title text-dark mb-1">
                                    <i class="fas fa-heartbeat text-danger mr-2" aria-hidden="true"></i>Open Government Week 2024 Highlights 
                                </h3>
                                <p class="video-meta text-muted small mb-0">
                                    <i class="far fa-calendar-alt mr-1" aria-hidden="true"></i> October 10, 2022
                                    <span class="mx-2" aria-hidden="true">|</span>
                                    <i class="far fa-clock mr-1" aria-hidden="true"></i> 9:45 mins
                                </p>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="row mt-4">
                    <div class="col-12">
                        <nav aria-label="Video pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1 <span class="sr-only">(current)</span></span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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