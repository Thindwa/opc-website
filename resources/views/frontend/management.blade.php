@extends('layouts.frontend')
<style>
    /* Banner */
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

    /* Custom styling for the team section */
    .profile-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 2rem;
      position: relative;
      padding-bottom: 15px;
    }

    .profile-title:after {
      content: '';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 0;
      width: 80px;
      height: 4px;
      background: #28a745;
    }

    .ts-team-wrapper {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      height: 100%;
      background: #fff;
    }

    .ts-team-wrapper:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .team-img-wrapper {
      height: 320px; /* Increased height for better image display */
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f8f9fa; /* Fallback background */
    }

    .team-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top center; /* Ensures faces are always visible */
      transition: transform 0.5s ease;
    }

    .ts-team-wrapper:hover .team-img-wrapper img {
      transform: scale(1.05);
    }

    .ts-team-content-classic {
      padding: 20px;
      text-align: center;
    }

    .ts-name {
      font-size: 1.2rem;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0.5rem;
    }

    .ts-designation {
      color: #28a745;
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 0;
    }

    .section-intro {
      text-align: center;
      max-width: 800px;
      margin: 0 auto 3rem;
      color: #555;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .team-img-wrapper {
        height: 280px;
      }
    }

    @media (max-width: 768px) {
      .profile-title {
        font-size: 2rem;
      }

      .team-img-wrapper {
        height: 250px;
      }
    }

    @media (max-width: 576px) {
      .team-img-wrapper {
        height: 220px;
      }
    }


  /* Title styling - h4 size with medium weight */
  .profile-title {
    font-size: 1.5rem; /* h4 size */
    font-weight: 500; /* medium weight */
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
  }

  .profile-title:after {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
    width: 80px;
    height: 4px;
    background: #28a745;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .profile-title {
      font-size: 1.3rem;
    }
  }

  </style>

@section('content')

{{-- <div  class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
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
                      <li class="breadcrumb-item active" aria-current="page">Top Management</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div> --}}




<section id="main-container" class="main-container pb-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">





<h4 class="profile-title">Top Management</h4>
        <div class="section-intro">
          <p>The dedicated leadership team driving excellence and innovation in government operations. Meet the professionals committed to serving the nation with integrity and vision.</p>
        </div>
      </div>
    </div>

    <div class="conatiner">
        @if($spc)
<div class="row justify-content-center mb-5">
  <div class="col-lg-6 col-md-8">
    <div class="minister-card text-center">
      <img src="{{ asset('storage/' . $spc->image) }}" alt="{{ $spc->name }}" class="img-fluid rounded shadow mb-3 minister-image">
      <div class="ts-team-content-classic mt-3">
        <h3 class="ts-name">{{ strtoupper($spc->name) }}</h3>
        <p class="ts-designation">{{ $spc->position }}</p>
      </div>
    </div>
  </div>
</div>
@endif

          @if($dspc)
<div class="row justify-content-center mb-5">
  <div class="col-lg-6 col-md-8">
    <div class="minister-card text-center">
      <img src="{{ asset('storage/' . $dspc->image) }}" alt="{{ $dspc->name }}" class="img-fluid rounded shadow mb-3 minister-image">
      <div class="ts-team-content-classic mt-3">
        <h3 class="ts-name">{{ strtoupper($dspc->name) }}</h3>
        <p class="ts-designation">{{ $dspc->position }}</p>
      </div>
    </div>
  </div>
</div>
@endif

    <!-- Principal Secretaries Row -->
    @if($ps->count())
  <div class="row mb-4">
    <div class="col-12">
      <br><br><br>
      <h4 class="text-center mb-4" style="color: #28a745; font-weight: 600;">Principal Secretaries</h4>
    </div>

    @foreach($ps as $person)
      <div class="col-lg-3 col-md-6 mb-5">
        <div class="ts-team-wrapper">
          <div class="team-img-wrapper">
            <img src="{{ asset('storage/' . $person->image) }}" class="img-fluid" alt="{{ $person->name }}">
          </div>
          <div class="ts-team-content-classic">
            <h3 class="ts-name">{{ strtoupper($person->name) }}</h3>
            <p class="ts-designation">{{ $person->position }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif


    <!-- Directors Row -->
    @if($directors->count())
  <div class="row">
    <div class="col-12">
      <h4 class="text-center mb-4" style="color: #28a745; font-weight: 600;">Directors</h4>
    </div>

    @foreach($directors as $person)
      <div class="col-lg-3 col-md-6 mb-5">
        <div class="ts-team-wrapper">
          <div class="team-img-wrapper">
            <img src="{{ asset('storage/' . $person->image) }}" class="img-fluid" alt="{{ $person->name }}">
          </div>
          <div class="ts-team-content-classic">
            <h3 class="ts-name">{{ strtoupper($person->name) }}</h3>
            <p class="ts-designation">{{ $person->position }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif

  </div>
</section>

@endsection
