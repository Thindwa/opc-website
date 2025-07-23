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
                <h1 class="banner-title">About OPC</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">OPC</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Service Charter</li>
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

  /* Main container styling */
  .main-container {
    padding: 60px 0;
    background-color: #f8f9fa;
  }

  /* Title styling - Updated to h4 size and medium weight */
  .service-charter-title {
    font-size: 1.5rem; /* h4 size */
    font-weight: 500; /* medium weight */
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
  }

  .service-charter-title:after {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
    width: 80px;
    height: 4px;
    background: #28a745;
  }

  /* Table styling */
  .service-table {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    margin-bottom: 40px;
  }

  .service-table thead {
    background-color: #28a745;
    color: white;
  }

  .service-table th {
    font-weight: 600;
    padding: 15px;
    text-align: center;
    vertical-align: middle;
  }

  .service-table td {
    padding: 12px 15px;
    vertical-align: top;
  }

  .service-table tbody tr:nth-child(even) {
    background-color: rgba(40, 167, 69, 0.05);
  }

  .service-table tbody tr:hover {
    background-color: rgba(40, 167, 69, 0.1);
  }

  /* Complaints section */
  .complaints-section {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
  }

  .complaints-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #28a745;
    margin-bottom: 20px;
    border-left: 4px solid #28a745;
    padding-left: 15px;
  }

  .complaints-content {
    font-size: 1rem;
    line-height: 1.8;
    color: #555;
  }

  .complaints-content strong {
    color: #2c3e50;
  }

  .complaints-content a {
    color: #28a745;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s;
  }

  .complaints-content a:hover {
    color: #218838;
    text-decoration: underline;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .service-charter-title {
      font-size: 1.3rem;
    }

    .service-table th,
    .service-table td {
      padding: 10px;
      font-size: 0.9rem;
    }

    .complaints-title {
      font-size: 1.1rem;
    }
  }
</style>

<section id="main-container" class="main-container">
    <div class="container">
        @if(isset($page->content))
            {!! \App\Helpers\RenderBlocksHelper::render($page->content) !!}
        @endif
      </div>
</section>

@endsection
