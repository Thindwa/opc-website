@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title">Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Departments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Innovations & Creativity</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Department Section -->
<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">

                <!-- Section Title -->
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">Innovations & Creativity Department</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-lightbulb"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Coming Soon Banner -->
                <div class="content-card card mb-4 text-center py-5" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <div class="coming-soon-banner">
                            <i class="fas fa-lightbulb fa-4x mb-3 text-warning"></i>
                            <h3 class="mb-3">Content Coming Soon</h3>
                            <p class="text-muted">We're working on something innovative and creative for you!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Custom Styles -->
<style>
/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 250px;
    position: relative;
}
.banner-area::before {
    content: '';
    background: rgba(0,0,0,0.6);
    position: absolute;
    width: 100%;
    height: 100%;
}
.banner-text {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
}

/* Titles */
.banner-title {
    font-size: 1.5rem;
    font-weight: bold;
}
.section-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2c3e50;
    text-transform: uppercase;
}
.content-title {
    font-size: 1.3rem;
    font-weight: bold;
}

/* Dividers */
.title-divider, .content-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem 0;
    height: 3px;
    width: 80px;
    background: #ffc107;
}

/* Cards */
.content-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: 0.3s ease-in-out;
}
.content-card:hover {
    transform: translateY(-5px);
}

/* Coming Soon Banner */
.coming-soon-banner {
    padding: 2rem;
}
.coming-soon-banner i {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* Responsive */
@media (max-width: 768px) {
    .banner-title,
    .section-title {
        font-size: 1.3rem;
    }
}
</style>

@endsection