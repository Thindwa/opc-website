@extends('layouts.frontend')

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
                      <li class="breadcrumb-item"><a href="#">OPC</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Executive</li>
                    </ol>
                </nav>
              </div>
          </div>
        </div>
    </div>
  </div>
</div> --}}

<style>

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

  /* Executive section styling */
  .minister-profile {
    float: right;
    margin: 0 0 20px 30px;
    width: 300px;
    border: 1px solid #28a745;
    padding: 15px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    background: #f8f9fa;
  }

  .minister-profile img {
    border-radius: 10px;
    margin-bottom: 15px;
  }

  .minister-title {
    font-weight: 600;
    color: #28a745;
    margin-bottom: 5px;
  }

  .minister-name {
    font-weight: 600;
    margin-bottom: 5px;
  }

  .minister-position {
    font-size: 0.9rem;
    color: #555;
    line-height: 1.4;
  }

  .section-title {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
  }

  .section-title:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 60px;
    height: 3px;
    background: #28a745;
  }

  .cabinet-item {
    margin-bottom: 8px;
    padding-bottom: 8px;
    border-bottom: 1px solid #eee;
  }

  @media (max-width: 768px) {
    .minister-profile {
      float: none;
      width: 100%;
      margin: 0 0 30px 0;
    }
  }
</style>

<!-- Executive Arm Section -->
<section id="executive-content" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">

          {{-- You can still keep the banner or minister image here if needed --}}
          <div class="minister-profile mb-4">
            <img
              src="{{ $profileImage ? asset('storage/' . $profileImage) : asset('frontendassets/images/services/service2a.jpg') }}"
              alt="President"
              class="img-fluid"
            >

            @if (!empty($profileCaption))
            <div class="text-muted small mt-2">{{ $profileCaption }}</div>
        @endif
          </div>

          {{-- Render blocks --}}
          <div class="executive-block-content">
            {!! \App\Helpers\RenderBlocksHelper::render($filteredContent) !!}

          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
