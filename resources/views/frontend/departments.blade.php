@extends('layouts.frontend')

@section('content')

<!-- Enhanced Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-overlay"></div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title text-uppercase fw-bold mb-3">Government Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center bg-transparent p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-white hover-underline">Home</a></li>
                                <li class="breadcrumb-item active text-light" aria-current="page">All Departments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Refined Departments Section -->
<section class="departments-section py-5 bg-white">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title display-4 fw-bold text-dark mb-3 font-serif">Our Departments</h2>
            <div class="title-divider mb-4 d-flex justify-content-center align-items-center">
                <span class="divider-line bg-success"></span>
                <span class="divider-icon bg-white text-success d-flex align-items-center justify-content-center mx-3">
                    <i class="fas fa-building fs-5"></i>
                </span>
                <span class="divider-line bg-success"></span>
            </div>
            <p class="section-subtitle lead text-secondary px-lg-5 mx-lg-5">
                Explore our comprehensive range of government services designed to serve the public efficiently and effectively.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($departments as $department)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card department-card border-0 h-100 overflow-hidden transition-all hover-lift">
                    <div class="card-body d-flex flex-column p-4 text-center">
                        <div class="card-icon-wrapper mb-4 mx-auto">
                            <img src="{{ asset('storage/' . $department->image) }}" alt="{{ $department->title }}" 
                                 class="img-fluid rounded-circle border border-3 border-white shadow-lg" 
                                 style="width: 110px; height: 110px; object-fit: cover;">
                        </div>
                        <h5 class="card-title fw-bold text-dark mb-3 fs-5">{{ $department->title }}</h5>
                        <p class="card-text text-muted mb-4 lh-base">
                            {{ \Illuminate\Support\Str::limit($department->description, 120) }}
                        </p>
                        <div class="mt-auto mx-auto pt-2">
                            <a href="{{ route('frontend.department.show', ['id' => $department->id]) }}" 
                               class="btn btn-outline-success btn-md px-4 py-2 rounded-pill fw-medium">
                                Learn More <i class="fas fa-arrow-right ms-2 align-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Improved typography */
    .font-serif {
        font-family: 'Georgia', serif;
    }
    
    /* Enhanced button styling */
    .btn-outline-success {
        border-width: 2px;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }
    
    /* Card enhancements */
    .department-card {
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* Navbar fix */
.navbar {
    position: relative;
    z-index: 9999;
}

/* Banner Area */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    height: 250px; /* Reduced banner height */
    z-index: 1;
    overflow: hidden;
}
.banner-area::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: -1;
}
.banner-text {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
}
.banner-title {
    font-size: 2rem; /* Slightly smaller to match new height */
    font-weight: 700;
    text-transform: uppercase;
}
    
    .hover-underline::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: white;
        transition: width 0.3s ease;
    }
    
    .hover-underline:hover::after {
        width: 100%;
    }
    
    /* Divider styling */
    .divider-line {
        display: inline-block;
        width: 70px;
        height: 2px;
        background: #28a745;
    }
    
    .divider-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: white;
        color: #28a745;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .banner-title {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .section-subtitle {
            padding: 0 1rem !important;
            margin: 0 1rem !important;
        }
        
        .card-icon-wrapper img {
            width: 90px !important;
            height: 90px !important;
        }
    }
</style>
@endpush