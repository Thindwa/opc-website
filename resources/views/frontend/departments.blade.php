@extends('layouts.frontend')
<style>
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
</style>
@section('content')

{{-- <div id="banner-area" class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
    <div class="banner-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="banner-heading">
              <h1 class="banner-title">Departments At OPC</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">OPC</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Headquarters</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

<!-- Refined Departments Section -->
<section class="departments-section py-5 bg-white">
    <div class="container">


        <section class="py-5">
            <div class="container">
                <div class="section-header text-center mb-4">
                    <h3 class="section-title">Departments Overview</h3>
                    <p class="text-muted">Click on any department to view more details.</p>
                </div>
                <div class="row">
                    @foreach ($departments as $dept)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="{{ $dept->icon ?? 'fas fa-building' }} fa-2x mb-3 text-success"></i>
                                    <h5 class="card-title">{{ $dept->title }}</h5>
                                    <a href="{{ route('departments.show', $dept->slug) }}" class="stretched-link text-decoration-none">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</section>

@endsection


