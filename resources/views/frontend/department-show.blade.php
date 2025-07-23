@extends('layouts.frontend')
<style>
    .department-show {
        max-width: 900px;
        margin: 0 auto;
    }
    .department-image {
        width: 100%;
        object-fit: cover;
    }
    .section-title {
        color: #2c3e50;
        border-bottom: 2px solid #28a745;
        padding-bottom: 8px;
        margin-bottom: 15px;
    }
    .section-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }
    .back-button {
        transition: all 0.3s ease;
    }
    .back-button:hover {
        transform: translateX(-5px);
    }
</style>
@section('content')

<!-- Banner Section -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ $department->banner_image ? asset('storage/' . $department->banner_image) : asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container text-center">
            <div class="banner-heading">
                <h1 class="banner-title" style="font-size: 1.5rem;">Departments</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $department->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> --}}

<!-- Content Section -->
<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <!-- Section Title -->
                <div class="section-header text-center mb-5">
                    <h4 class="section-title" style="font-size: 1.5rem;">{{ $department->title }}</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Render Blocks -->
                {!! \App\Helpers\RenderBlocksHelper::render($department['content']) !!}
            </div>
        </div>
    </div>
</section>
@endsection



