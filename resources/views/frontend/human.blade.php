@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title" style="font-size: 1.5rem;">Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Departments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Human Resource Management and Development</li>
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
                    <h4 class="section-title" style="font-size: 1.5rem;">Department of Human Resource Management and Development</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-users" style="color: #5bc0de;"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title" style="font-size: 1.3rem;">
                            <i class="fas fa-eye mr-2" style="color: #5bc0de;"></i> Vision
                        </h2>
                        <div class="content-divider" style="background: #5bc0de;"></div>
                        <p class="content-text">
                            "A high quality and result-oriented Public Service"
                        </p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title" style="font-size: 1.3rem;">
                            <i class="fas fa-bullseye mr-2" style="color: #5bc0de;"></i> Mission
                        </h2>
                        <div class="content-divider" style="background: #5bc0de;"></div>
                        <p class="content-text">
                            "To foster and sustain a high quality and result-oriented public service through systematic development and implementation of equitable, sound human and institutional management policies, strategies, practices and systems in order to ensure efficiency and effectiveness"
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
                            <h2 class="content-title mb-0" style="font-size: 1.3rem;">Core Values</h2>
                        </div>
                        <div class="content-divider bg-info mb-4" style="height: 3px; width: 80px;"></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ([
                                    'Professionalism' => 'We shall discharge our duties with a high degree of integrity in keeping with ethical standards',
                                    'Innovation' => 'We shall encourage responsible risk-taking and innovation to instil the spirit of DHRM&D as a learning organization.',
                                    'Transparency and Accountability' => 'We shall discharge our services in an open manner and shall be accountable for our actions.'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1" style="font-size: 1.1rem;">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                @foreach ([
                                    'Networking' => 'We believe in shared stewardship and responsibility and the importance of working and collaborating with other stakeholders in order to achieve our Vision.',
                                    'Adaptive, Dynamic and Responsive' => 'We are committed to be responsive to changing needs and circumstances in order to provide a better service to the expectations of our customers and stakeholders.'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1" style="font-size: 1.1rem;">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-4 text-center">
                                    <a href="#" class="btn btn-outline-info">Read More</a>
                                </div>
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
.section-title {
    font-weight: bold;
    color: #2c3e50;
    text-transform: uppercase;
}

/* Dividers */
.title-divider, .content-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem 0;
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
    .banner-title {
        font-size: 1.5rem;
    }
    .section-title {
        font-size: 1.3rem;
    }
}
</style>

@endsection