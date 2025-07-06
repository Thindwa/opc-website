@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title" style="font-weight: 500;">Services</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<section class="services-section section-padding">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Our Services</h2>
            <div class="title-divider">
                <span class="divider-line"></span>
                <span class="divider-icon">
                    <i class="fas fa-building"></i>
                </span>
                <span class="divider-line"></span>
            </div>
            <p class="section-subtitle">Explore our comprehensive range of government services designed to serve the public efficiently.</p>
        </div>

        <div class="row">
            @php
                $services = [
                    ['icon' => 'fas fa-hands-helping', 'title' => 'Disaster Management Affairs', 'text' => 'Coordinating disaster risk management programs including prevention, mitigation, preparedness, response and recovery activities.', 'color' => 'danger'],
                    ['icon' => 'fas fa-print', 'title' => 'Printing Services', 'text' => 'Providing high-quality printing services using modern technology and professional staff to support government operations.', 'color' => 'primary'],
                    ['icon' => 'fas fa-users', 'title' => 'Human Resource Management', 'text' => 'Developing and implementing equitable HR policies to maintain a high-quality, result-oriented public service.', 'color' => 'info'],
                    ['icon' => 'fas fa-warehouse', 'title' => 'Central Government Stores', 'text' => 'Procuring and supplying quality goods and services to public institutions while maintaining high standards.', 'color' => 'warning'],
                    ['icon' => 'fas fa-landmark', 'title' => 'Statutory Corporations', 'text' => 'Ensuring optimal resource allocation and management for efficient service delivery by state corporations.', 'color' => 'success'],
                    ['icon' => 'fas fa-file-contract', 'title' => 'Government Contracts Unit', 'text' => 'Leading contracts and concessions management to ensure value for money and cost effectiveness.', 'color' => 'purple'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Performance Reporting', 'text' => 'Overseeing and coordinating MDAs to enhance performance in public service delivery.', 'color' => 'teal'],
                    ['icon' => 'fas fa-calendar-alt', 'title' => 'Public Events', 'text' => 'Organizing presidential functions involving the President, First Lady, and Vice President.', 'color' => 'pink'],
                    ['icon' => 'fas fa-lightbulb', 'title' => 'Innovations and Creativity', 'text' => 'Developing innovative solutions to enhance government services and operations.', 'color' => 'orange'],
                ];
            @endphp

            @foreach($services as $index => $service)
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="service-card card h-100">
                    <div class="card-icon bg-{{ $service['color'] }}">
                        <i class="{{ $service['icon'] }}"></i>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $service['title'] }}</h3>
                        <p class="card-text">{{ $service['text'] }}</p>
                        <a href="#" class="btn btn-sm btn-outline-{{ $service['color'] }}">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            @if(($index + 1) % 3 == 0)
                <div class="w-100 mb-5"></div> <!-- Space after every 3 cards -->
            @endif
            @endforeach

        </div>
    </div>
</section>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // animation duration
        once: true, // only animate once
    });
</script>

<style>
/* Banner Styles */
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
    background: rgba(0, 0, 0, 0.6);
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
    font-size: 2.0rem;
    font-weight: 250; /* Changed from 700 to 500 (medium) */
    margin-bottom: 1rem;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}
.breadcrumb {
    background: transparent;
    padding: 0;
}
.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.7);
}
.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
}
.breadcrumb-item.active {
    color: #fff;
}

/* Services Section */
.services-section {
    background-color: #f8f9fa;
    padding: 80px 0;
}
.section-header {
    margin-bottom: 60px;
}
.section-title {
    font-size: 2rem;
    font-weight: 500; /* Changed from 700 to 500 (medium) */
    color: #2c3e50;
    margin-bottom: 1rem;
    text-transform: uppercase;
}
.section-subtitle {
    color: #6c757d;
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
    font-weight: 400;
}
.title-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem auto;
    max-width: 300px;
}
.divider-line {
    flex: 1;
    height: 1px;
    background: #dee2e6;
}
.divider-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #5bc0de;
    border: 1px solid #dee2e6;
    margin: 0 15px;
    font-size: 1.5rem;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}

/* Service Cards */
.service-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    background: #fff;
}
.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}
.card-icon {
    width: 80px;
    height: 80px;
    margin: -40px auto 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    background-color: #333;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
.card-icon i {
    font-size: 40px;
}
.service-card:hover .card-icon {
    transform: scale(1.1);
}
.service-card:hover .card-icon i {
    transform: scale(1.1);
}
.card-body {
    padding: 30px 20px;
}
.card-title {
    font-size: 1.25rem;
    font-weight: 500; /* Changed from 600 to 500 (medium) */
    margin-bottom: 15px;
    color: #2c3e50;
}
.card-text {
    color: #6c757d;
    margin-bottom: 20px;
    font-size: 0.95rem;
    line-height: 1.6;
    font-weight: 400;
}
.btn {
    font-weight: 500;
    padding: 8px 20px;
    border-width: 2px;
    transition: all 0.3s ease;
}
.btn:hover {
    transform: translateY(-2px);
}

/* Custom Colors */
.bg-purple { background-color: #6f42c1; }
.bg-teal { background-color: #20c997; }
.bg-pink { background-color: #d63384; }
.bg-orange { background-color: #fd7e14; }

.btn-outline-purple {
    color: #6f42c1;
    border-color: #6f42c1;
}
.btn-outline-purple:hover {
    background-color: #6f42c1;
    color: #fff;
}
.btn-outline-teal {
    color: #20c997;
    border-color: #20c997;
}
.btn-outline-teal:hover {
    background-color: #20c997;
    color: #fff;
}
.btn-outline-pink {
    color: #d63384;
    border-color: #d63384;
}
.btn-outline-pink:hover {
    background-color: #d63384;
    color: #fff;
}
.btn-outline-orange {
    color: #fd7e14;
    border-color: #fd7e14;
}
.btn-outline-orange:hover {
    background-color: #fd7e14;
    color: #fff;
}

/* Responsive */
@media (max-width: 992px) {
    .banner-title { font-size: 2rem; }
    .section-title { font-size: 1.75rem; }
}
@media (max-width: 768px) {
    .banner-area { height: 250px; }
    .banner-title { font-size: 1.75rem; }
    .section-title { font-size: 1.5rem; }
    .section-subtitle { font-size: 1rem; }
    .divider-icon { width: 40px; height: 40px; font-size: 1rem; }
}
@media (max-width: 576px) {
    .banner-title { font-size: 1.5rem; }
    .section-header { margin-bottom: 40px; }
}
</style>

@endsection