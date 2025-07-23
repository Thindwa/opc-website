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
                <li class="breadcrumb-item active" aria-current="page">Headquarters</li>
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

  .banner-text {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
  }
  .banner-title {
      font-size: 2rem;
      font-weight: 700;
      text-transform: uppercase;
  }

  /* Main styling */
  .main-container {
      padding: 60px 0;
      background-color: #f8f9fa;
  }

  /* Sidebar styling */
  .sidebar-left {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.05);
    margin-bottom: 30px;
    position: sticky;
    top: 120px;
    max-height: calc(100vh - 150px);
    overflow-y: auto;        /* Allow vertical scroll */
    padding: 0;
    display: flex;
    flex-direction: column;
}

.widget-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    padding: 25px 25px 10px; /* match .service-menu padding */
    margin-bottom: 0;
    position: sticky;
    top: 0;
    z-index: 1;
}


.service-menu {
    flex-grow: 1;
    overflow-y: auto;
    padding: 25px; /* move padding here */
    border-left: 3px solid #28a745;
}

  .service-menu .nav-link {
      padding: 12px 15px;
      margin-bottom: 5px;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s ease;
      color: #495057;
      border-left: 3px solid transparent;
      display: flex;
      align-items: center;
  }

  .service-menu .nav-link:hover {
      background-color: rgba(40, 167, 69, 0.1);
      color: #28a745;
      border-left-color: #28a745;
  }

  .service-menu .nav-link.active {
      background-color: rgba(40, 167, 69, 0.1);
      color: #28a745;
      border-left-color: #28a745;
      font-weight: 600;
  }

  /* Content area styling */
  .tab-content {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      min-height: 100%;
      transition: opacity 0.3s ease;
  }

  .tab-pane {
      opacity: 0;
      transition: opacity 0.3s ease;
  }

  .tab-pane.active {
      opacity: 1;
  }

  .column-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
  }

  .column-title:after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 60px;
      height: 3px;
      background: #28a745;
  }

  .tab-content p {
      font-size: 1rem;
      line-height: 1.8;
      color: #555;
      margin-bottom: 20px;
  }

  .img-fluid {
      border-radius: 6px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin: 20px 0;
      transition: transform 0.3s ease;
      max-width: 100%;
      height: auto;
  }

  .img-fluid:hover {
      transform: translateY(-5px);
  }

  /* Scroll target styling */
  .scroll-target {
      scroll-margin-top: 120px; /* Adjust based on your header height */
  }

  /* Responsive adjustments */
  @media (max-width: 992px) {
    .sidebar-left {
        position: relative;
        max-height: none;
        overflow: visible;
    }

    .widget {
        height: auto;
    }

    .service-menu {
        max-height: none;
        overflow: visible;
    }
}


  @media (max-width: 768px) {
      .column-title {
          font-size: 1.5rem;
      }

      .widget-title {
          font-size: 1.3rem;
      }

      .main-container {
          padding: 30px 0;
      }

      .tab-content {
          padding: 20px;
      }
  }
</style>

<section id="main-container" class="main-container py-5">
    <div class="container">
      <div class="row">
        <!-- Left Sidebar Tabs -->
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar sidebar-left">
            <div class="widget">
              <h3 class="widget-title">OPC Sections</h3>
              <ul class="nav flex-column nav-pills service-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach($tabs as $index => $tab)
                  <li>
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                       id="tab-{{ $tab['id'] }}"
                       data-toggle="pill"
                       href="#content-{{ $tab['id'] }}"
                       role="tab"
                       aria-controls="content-{{ $tab['id'] }}"
                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                      {{ $tab['title'] }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <!-- Right Content Area -->
        <div class="col-xl-9 col-lg-8">
          <div class="tab-content" id="v-pills-tabContent">
            @foreach($tabs as $index => $tab)
            <div class="tab-pane fade scroll-target {{ $loop->first ? 'show active' : '' }}"
                 id="content-{{ $tab['id'] }}"
                 role="tabpanel"
                 aria-labelledby="tab-{{ $tab['id'] }}">
              <h2 class="column-title mrt-0">{{ $tab['title'] }}</h2>
              {!! \App\Helpers\RenderBlocksHelper::render($tab['content']) !!}
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
