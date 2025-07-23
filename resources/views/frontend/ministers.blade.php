@extends('layouts.frontend')
<style>

    /* Navbar fix */
    .navbar {
        position: relative;
        z-index: 9999;
    }

    /* Banner Area */
    .banner-area {
        min-height: 150px !important; /* or height: 200px if you want fixed height */
    background-size: cover;
    background-position: center;
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

    /* Green theme for active tab */
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #28a745; /* Bootstrap's green */
        color: #fff;
        font-weight: bold;
    }

    /* Hover effect: green */
    .nav-pills .nav-link:hover {
        background-color: #28a745;
        color: #fff;
    }

    /* Default inactive links: green text, no background */
    .nav-pills .nav-link {
        color: #28a745;
        border-radius: 0;
        transition: all 0.3s;
    }

    /* Minister card styling */
    .minister-card {
        border: 1px solid green;
        padding: 20px;
        border-radius: 15px;
        background-color: #f9f9f9;
        height: 100%;
        transition: transform 0.3s ease;
    }

    .minister-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .minister-image {
        max-width: 250px;
        margin: 0 auto;
    }

    .section-title {
        color: #28a745;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 30px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: #28a745;
    }
    </style>

@section('content')

{{-- <div id="banner-area" class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">About us</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Cabinet</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ministers</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end --> --}}


<section id="main-container" class="main-container pb-4">
  <div class="container">
    <!-- Title row -->
    <div class="row text-center">
      <div class="col-lg-12">
        <!-- Government Logo -->
        <div class="logo my-3">
          <img src="frontendassets/images/flags/emblam1.jpg" class="img-fluid" id="flags" alt="Government of Malawi Logo" style="width:120px; height:auto;">
        </div>

        <!-- Title -->
        <h6 class="section-main-title" style="font-size: 10px;">Government of Malawi</h6>
        <h2 class="section-title">Cabinet Ministers</h2>
        <p><strong>The appointments are with effect from 1st January 2025.</strong></p>

        <!-- Introduction Paragraph -->
        <p class="intro-text mb-5">
          The Cabinet of Malawi is the executive branch of the government, made up of the President of Malawi, Vice President, Ministers and Deputy Ministers responsible for the different departments.
        </p>
      </div>
    </div>
    <!-- Title row end -->


  @if($president)
<div class="row justify-content-center mb-5">
  <div class="col-lg-6 col-md-8">
    <div class="minister-card text-center">
      <img src="{{ asset('storage/' . $president->image) }}" alt="President" class="img-fluid rounded shadow mb-3 minister-image">
      <h3 class="mt-3" style="font-weight: bold;">His Excellency</h3>
      <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
        <strong>{{ $president->name }}</strong><br>
        {{ $president->position }}
      </p>
    </div>
  </div>
</div>
@endif


    <!-- Vice President Section -->
  @if($vp)
<div class="row justify-content-center mb-5">
  <div class="col-lg-6 col-md-8">
    <div class="minister-card text-center">
      <img src="{{ asset('storage/' . $vp->image) }}" alt="Vice President" class="img-fluid rounded shadow mb-3 minister-image">
      <h3 class="mt-3" style="font-weight: bold;">Vice President</h3>
      <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
        <strong>{{ $vp->name }}</strong><br>
        {{ $vp->position }}
      </p>
    </div>
  </div>
</div>
@endif


    <!-- Cabinet Ministers Section -->
    <div class="row text-center mb-5">
      <div class="col-12">
        <h3 class="section-title">Cabinet Ministers</h3>
      </div>
    </div>

   <div class="row">
  @foreach ($cabinet as $minister)
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="minister-card text-center">
        <img src="{{ asset('storage/' . $minister->image) }}" alt="{{ $minister->name }}" class="img-fluid rounded shadow mb-3 minister-image">
        <h4 class="mt-3" style="font-weight: bold;">{{ $minister->position }}</h4>
        <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
          <strong>{{ $minister->name }}</strong>
        </p>
      </div>
    </div>
  @endforeach
</div>

  </div><!-- Container end -->
</section><!-- Main container end -->

@endsection
