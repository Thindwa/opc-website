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
                                <li class="breadcrumb-item active" aria-current="page">Public Events</li>
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
                    <h4 class="section-title">Public Events Department</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Mandate Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title">
                            <i class="fas fa-bullhorn mr-2"></i> Mandate
                        </h2>
                        <div class="content-divider"></div>
                        <p class="content-text">
                            The department’s core mandate is to organize presidential functions, i.e., functions involving the President, the First Lady, and the Vice President.
                        </p>
                    </div>
                </div>

                <!-- Core Activities Card -->
                <div class="content-card card shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-wrapper bg-info text-white rounded-circle mr-3">
                                <i class="fas fa-tasks fa-lg"></i>
                            </div>
                            <h2 class="content-title mb-0">Core Activities</h2>
                        </div>
                        <div class="content-divider bg-info mb-4"></div>

                        <div class="row">
                            <div class="col-md-12">
                                @foreach ([
                                    'Preside over planning for Presidential Public Programs',
                                    'Coordinate provision of necessary Presidential Standard services by other stakeholders of Presidential Public Functions',
                                    'Coordinate production and distribution of invitation cards for Presidential Public Functions based on an approved Government National Guest List',
                                    'Draft and produce programs for use at Presidential Public Functions',
                                    'Advise other Government Institutions on the planning and implementation of non-Presidential Public Functions',
                                    'Facilitate Presidential Public Functions'
                                ] as $activity)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <p class="mb-0 text-muted">{{ $activity }}</p>
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
