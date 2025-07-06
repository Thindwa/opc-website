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
                                <li class="breadcrumb-item active" aria-current="page">Performance Reporting</li>
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
                    <h4 class="section-title">Performance Reporting Department</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title">
                            <i class="fas fa-eye mr-2"></i> Vision
                        </h2>
                        <div class="content-divider"></div>
                        <p class="content-text">
                            "A public service that delivers high quality results"
                        </p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title">
                            <i class="fas fa-bullseye mr-2"></i> Mission
                        </h2>
                        <div class="content-divider"></div>
                        <p class="content-text">
                            "To provide an efficient and effective oversight, coordination and supervision of MDAs to enhance performance in the delivery of quality public services"
                        </p>
                    </div>
                </div>

                <!-- Core Values Card -->
                <div class="content-card card shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-wrapper bg-info text-white rounded-circle mr-3">
                                <i class="fas fa-star fa-lg"></i>
                            </div>
                            <h2 class="content-title mb-0">Core Values</h2>
                        </div>
                        <div class="content-divider bg-info mb-4"></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ([
                                    'Professionalism' => 'PED seeks to perform its work according to ethical and standard procedures and without prejudice.',
                                    'Transparency & Accountability' => 'PED seeks to be open in its dealings and will give reasons for any administrative decisions and actions to the contrary if required. PED will be held responsible and answerable for the decisions made and actions taken.',
                                    'Integrity' => 'PED seeks to serve the public with honesty and see to it that its members of staff conduct themselves in a manner that is beyond reproach'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                @foreach ([
                                    'Teamwork' => 'PED seeks to ensure that its members of staff work collaboratively internally and with other MDAs in order to achieve the desired results.',
                                    'Customer Centeredness' => 'PED values a cordial relationship with MDAs as its key clients in the delivery of public sector performance enhancement programs that it champions aimed at improving organizational performance.',
                                    'Passion for Results' => 'PED is eager to see achievement of results for work done across all its programs that will trickle down to MDAs'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
    background: #5bc0de;
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

/* Value Items */
.value-item {
    transition: 0.3s ease;
}
.value-item:hover {
    background: #f1f8f1;
    transform: translateX(5px);
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