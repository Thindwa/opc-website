@extends('layouts.frontend')

@section('content')

<!-- Enhanced Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title">Resource Center</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">OPC Gallery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Photos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section with Enhanced Styling -->
<section id="main-container" class="main-container section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <!-- Section Title -->
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">Our Photo Gallery</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-camera"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                    <p class="section-subtitle mt-3">Browse through our collection of official photographs</p>
                </div>

                <!-- Filter Buttons with Enhanced Styling -->
                <div class="shuffle-btn-group mb-5 text-center">
                    @foreach ([
                        'all' => 'Show All',
                        'commercial' => 'Commercial',
                        'education' => 'Education',
                        'government' => 'Government',
                        'infrastructure' => 'Infrastructure',
                        'sona' => 'SONA',
                        'speech' => 'His Excellency, Speeches'
                    ] as $value => $label)
                        <label class="filter-btn {{ $value === 'all' ? 'active' : '' }}" for="{{ $value }}">
                            <input type="radio" name="shuffle-filter" id="{{ $value }}" value="{{ $value }}" {{ $value === 'all' ? 'checked="checked"' : '' }}>
                            {{ $label }}
                        </label>
                    @endforeach
                </div>

                <!-- Gallery Grid -->
                <div class="row shuffle-wrapper gallery-grid">
                    <div class="col-1 shuffle-sizer"></div>
                    
                    <!-- Commercial Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;commercial&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/commercial1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/commercial1.jpg') }}" alt="Commercial project">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">H.E. Launches Coca-Cola PET Plant</a>
                                    </h3>
                                    <p class="project-cat">Commercial</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Speech Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;speech&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/speech1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/speech1.jpg') }}" alt="Presidential speech">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">H.E. Official Speeches</a>
                                    </h3>
                                    <p class="project-cat">Speeches</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Government Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/agriculture1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/agriculture1.jpg') }}" alt="Agricultural project">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Kama Mega Farm Initiative</a>
                                    </h3>
                                    <p class="project-cat">Government</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;education&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/education1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/education1.jpg') }}" alt="Education project">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Student Bursary Program Launch</a>
                                    </h3>
                                    <p class="project-cat">Education</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Infrastructure Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;infrastructure&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/infrastructure1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/infrastructure1.jpg') }}" alt="Infrastructure project">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">MHC Head Office Inauguration</a>
                                    </h3>
                                    <p class="project-cat">Infrastructure</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sona Item -->
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;sona&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('frontendassets/images/photos/sona1.jpg') }}">
                                <img class="img-fluid" src="{{ asset('frontendassets/images/photos/sona1.jpg') }}" alt="SONA event">
                                <div class="img-overlay">
                                    <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                                </div>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">State of the National Address 2024</a>
                                    </h3>
                                    <p class="project-cat">SONA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- Gallery grid end -->
            </div>
        </div><!-- Content row end -->
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Custom Styles -->
<style>
/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 250px;
    position: relative;
    display: flex;
    align-items: center;
}
.banner-area::before {
    content: '';
    background: rgba(0, 0, 0, 0.6);
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

/* Titles */
.banner-title {
    font-size: 1.8rem; /* Reduced from 2.5rem to medium size */
    font-weight: bold;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}
.section-title {
    font-size: 1.5rem; /* Slightly reduced */
    font-weight: bold;
    color: #2c3e50;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}
.section-subtitle {
    color: #7f8c8d;
    font-size: 1rem;
}

/* Breadcrumb */
.breadcrumb {
    background: transparent;
    padding: 0;
    justify-content: center;
}
.breadcrumb-item a {
    color: #ecf0f1;
}
.breadcrumb-item.active {
    color: #e74c3c;
}
.breadcrumb-item + .breadcrumb-item::before {
    color: #bdc3c7;
}

/* Dividers */
.title-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem auto;
}
.divider-line {
    height: 2px;
    width: 50px;
    background: #e74c3c;
}
.divider-icon {
    margin: 0 15px;
    color: #e74c3c;
    font-size: 1.2rem;
}

/* Filter Buttons */
.shuffle-btn-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 30px;
}
.filter-btn {
    padding: 8px 20px;
    border: 2px solid #e74c3c;
    border-radius: 30px;
    color: #e74c3c;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 5px;
}
.filter-btn input[type="radio"] {
    display: none;
}
.filter-btn.active, .filter-btn:hover {
    background: #e74c3c;
    color: white;
}

/* Gallery Grid */
.gallery-grid {
    margin-top: 20px;
}
.project-img-container {
    position: relative;
    margin-bottom: 30px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
.project-img-container:hover {
    transform: translateY(-10px);
}
.img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}
.project-img-container:hover .img-overlay {
    opacity: 1;
}
.gallery-icon {
    color: white;
    font-size: 2rem;
    background: rgba(231, 76, 60, 0.8);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.project-img-container:hover .gallery-icon {
    transform: scale(1.1);
}

/* Project Info */
.project-item-info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: white;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}
.project-img-container:hover .project-item-info {
    transform: translateY(0);
}
.project-item-title {
    font-size: 1.1rem;
    margin-bottom: 5px;
}
.project-item-title a {
    color: white;
    text-decoration: none;
}
.project-cat {
    font-size: 0.9rem;
    color: #f1c40f;
    margin-bottom: 0;
}

/* Responsive */
@media (max-width: 992px) {
    .banner-title {
        font-size: 1.6rem;
    }
    .section-title {
        font-size: 1.3rem;
    }
    .filter-btn {
        padding: 6px 15px;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .banner-area {
        height: 220px;
    }
    .banner-title {
        font-size: 1.4rem;
    }
    .shuffle-btn-group {
        gap: 5px;
    }
    .filter-btn {
        padding: 5px 12px;
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .banner-area {
        height: 200px;
    }
    .banner-title {
        font-size: 1.3rem;
    }
    .section-title {
        font-size: 1.2rem;
    }
    .shuffle-btn-group {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }
    .filter-btn {
        margin: 0;
        text-align: center;
    }
}
</style>

@endsection