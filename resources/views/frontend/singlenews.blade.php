@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
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
</div>

<!-- Main Content Section -->
<section id="main-container" class="main-container section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="post-content post-single">
                    <div class="post-media post-image">
                        <img loading="lazy" src="{{ asset('frontendassets/images/news/news1.jpg') }}" class="img-fluid rounded shadow" alt="post-image" style="width: 100%; height: 400px; object-fit: cover;">
                    </div>

                    <div class="post-body mt-4">
                        <div class="entry-header">
                            <div class="post-meta mb-4">
                                <span class="post-author mr-3">
                                    <i class="far fa-user mr-1"></i> Admin
                                </span>
                                <span class="post-cat mr-3">
                                    <i class="far fa-folder-open mr-1"></i> News
                                </span>
                                <span class="post-meta-date">
                                    <i class="far fa-calendar mr-1"></i> April 26, 2025
                                </span>
                            </div>
                            <h2 class="entry-title font-weight-medium mb-4" style="font-size: 1.4rem; line-height: 1.4; color: #2c3e50;">
                                Chakwera hails Pope Francis for his love and humility
                            </h2>
                        </div>

                        <div class="entry-content text-justify">
                            <p class="mb-4">President Dr Lazarus Chakwera has described late Pope Francis as a man of grand vision for humanity, kindness and faith.</p>
                            
                            <p class="mb-4">He said this Saturday at Maula Cathedral in Lilongwe during the Requiem Mass for Pope Francis. Chakwera said Pope Francis dedicated his service to the poor, the marginalized, the weak, and the condemned. "I will always cherish that encounter I had with Pope Francis some nine months ago. It lifted and soothed my spirit at a time when I was going through the darkest and most painful season of my presidency, and a season of deep anguish and pain for us Malawians.</p>

                            <p class="mb-4">"Pope Francis expressed his condolences for the calamities we had suffered as a nation through his words of comfort and encouragement," Chakwera said. He, therefore, said he prays for a special touch of comfort from God as the passing of the Pope continues to be mourned by millions around the world, and all Catholics in Malawi.</p>

                            <p class="mb-4">Archbishop George Desmond Tambala of Lilongwe Diocese thanked President Chakwera and Madam Monica Chakwera for attending the mass. He said the unity among Catholic members has been demonstrated through mass conducted in the 49 parishes under the Lilongwe diocese in honour of late Pope Francis.</p>

                            <p>"Late Pope Francis preached about peace. This was demonstrated when he humbled himself and kissed the feet of South Sudanese leaders to plead them for sustainable peace," Tambala said. Pope Francis born as Jorge Mario Bergoglio died on 21 April, 2025 at the age of 88.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts mb-5">
                        <h3 class="widget-title font-weight-bold mb-4 pb-3 border-bottom">Recent Posts</h3>
                        <ul class="list-unstyled">
                            <li class="mb-4 pb-3 border-bottom">
                                <div class="d-flex align-items-start">
                                    <div class="posts-thumb mr-3 flex-shrink-0">
                                        <a href="#" class="d-block">
                                            <img loading="lazy" alt="National Action Plan" 
                                                 src="{{ asset('frontendassets/images/news/news2.jpg') }}" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="width: 90px; height: 70px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="post-info flex-grow-1">
                                        <h5 class="entry-title mb-1">
                                            <a href="#" class="font-weight-medium text-dark hover-primary">National Action Plan for Open Government Partnership</a>
                                        </h5>
                                        <span class="post-date text-muted small d-block">
                                            <i class="far fa-calendar-alt mr-1"></i>April 15, 2025
                                        </span>
                                    </div>
                                </div>
                            </li>
            
                            <li class="mb-4 pb-3 border-bottom">
                                <div class="d-flex align-items-start">
                                    <div class="posts-thumb mr-3 flex-shrink-0">
                                        <a href="#" class="d-block">
                                            <img loading="lazy" alt="Projects in Blantyre" 
                                                 src="{{ asset('frontendassets/images/news/news3.jpg') }}" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="width: 90px; height: 70px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="post-info flex-grow-1">
                                        <h5 class="entry-title mb-1">
                                            <a href="#" class="font-weight-medium text-dark hover-primary">Chakwera Satisfied With Projects In Blantyre And Chikwawa</a>
                                        </h5>
                                        <span class="post-date text-muted small d-block">
                                            <i class="far fa-calendar-alt mr-1"></i>April 5, 2025
                                        </span>
                                    </div>
                                </div>
                            </li>
            
                            <li class="mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="posts-thumb mr-3 flex-shrink-0">
                                        <a href="#" class="d-block">
                                            <img loading="lazy" alt="IFRC Meeting" 
                                                 src="{{ asset('frontendassets/images/news/news4.jpg') }}" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="width: 90px; height: 70px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="post-info flex-grow-1">
                                        <h5 class="entry-title mb-1">
                                            <a href="#" class="font-weight-medium text-dark hover-primary">IFRC Secretary General Meets President Chakwera</a>
                                        </h5>
                                        <span class="post-date text-muted small d-block">
                                            <i class="far fa-calendar-alt mr-1"></i>March 20, 2025
                                        </span>
                                    </div>
                                </div>
                            </li>
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
    .post-media img {
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
    .post-media img {
        height: 250px;
    }
    
}
</style>

@endsection