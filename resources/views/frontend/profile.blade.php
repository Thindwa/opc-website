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
                      <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->  --}}


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

    .president-profile {
        position: relative;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .president-image-card {
        float: left;
        margin: 0 30px 30px 0;
        width: 300px;
        border: 2px solid #28a745;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        background-color: #f9f9f9;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .president-image-card:hover {
        transform: translateY(-5px);
    }

    .president-image {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .profile-title {
        color: #2a5885;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
    }

    .profile-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 80px;
        height: 3px;
        background: #28a745;
    }

    .profile-content {
        text-align: justify;
        line-height: 1.8;
        font-size: 16px;
        color: #444;
    }

    .profile-content p {
        margin-bottom: 20px;
    }

    .profile-highlights {
        background-color: #f8f9fa;
        border-left: 4px solid #28a745;
        padding: 20px;
        margin: 25px 0;
        border-radius: 0 5px 5px 0;
    }

    .profile-highlights li {
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .president-image-card {
            float: none;
            margin: 0 auto 30px;
            width: 80%;
        }
    }
</style>

<section id="president-profile" class="ts-features py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="president-profile">

          <!-- President Image Card -->
          <div class="president-image-card">
             <img
              src="{{ $profileImage ? asset('storage/' . $profileImage) : asset('frontendassets/images/services/service2a.jpg') }}"
              alt="President"
              class="img-fluid"
            >

            @if (!empty($profileCaption))
            <div class="text-muted small mt-2">{{ $profileCaption }}</div>
        @endif
          </div>


          <!-- Profile Content -->
          <div class="profile-content">

            {{-- Render blocks --}}
          <div class="executive-block-content">
            {!! \App\Helpers\RenderBlocksHelper::render($filteredContent) !!}

          </div>

          </div>

        </div><!-- president-profile -->
      </div><!-- col-12 -->
    </div><!-- row -->
  </div><!-- container -->
</section>

@endsection
