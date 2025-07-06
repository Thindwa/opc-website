@extends('layouts.frontend')
@section('content')
@include('partials.frontslider')

<style>

  /* Custom styling */
  .action-style-box {
    background-color: #28a745;
    color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  .action-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0;
  }

  .minister-image {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: 1px solid rgba(40, 167, 69, 0.3) !important;
  }

  .minister-image img {
    max-height: 400px;
    width: auto;
    object-fit: cover;
  }

  .ts-service-box {
    transition: all 0.3s ease;
    height: 100%;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: 1px solid rgba(40, 167, 69, 0.3) !important;
  }

  .ts-service-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }

  .ts-service-image-wrapper {
    height: 200px;
    overflow: hidden;
  }

  .ts-service-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .ts-service-box:hover .ts-service-image-wrapper img {
    transform: scale(1.05);
  }

  .service-box-title {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .service-box-title a {
    color: #2c3e50;
    text-decoration: none;
  }

  .learn-more {
    color: #28a745;
    font-weight: 500;
  }

  .section-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    position: relative;
    padding-bottom: 15px;
  }

  .section-title:after {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
    width: 80px;
    height: 4px;
    background: #28a745;
  }

  .section-sub-title {
    font-size: 1.2rem;
    color: #6c757d;
    font-weight: 400;
  }

  /* Malawi Vision 2063 Section */
  .vision-2063-section {
    background-color: #f8f9fa;
    padding: 60px 0;
  }

  .vision-header {
    text-align: center;
    margin-bottom: 40px;
  }

  .vision-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    position: relative;
    display: inline-block;
  }

  .vision-title:after {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: -10px;
    width: 100px;
    height: 4px;
    background: #28a745;
  }

  .vision-image-container {
    height: 500px; /* Increased height */
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border: 3px solid #28a745;
  }

  .vision-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .vision-image-container:hover img {
    transform: scale(1.03);
  }

  .vision-content {
    padding: 0 30px;
  }

  .vision-subtitle {
    font-size: 1.8rem;
    color: #28a745;
    margin-bottom: 25px;
    font-weight: 600;
  }

  .vision-list {
    font-size: 1.1rem;
    line-height: 1.8;
    counter-reset: vision-item;
    padding-left: 0;
  }

  .vision-list li {
    position: relative;
    padding-left: 35px;
    margin-bottom: 15px;
    list-style: none;
  }

  .vision-list li:before {
    content: counter(vision-item) ".";
    counter-increment: vision-item;
    position: absolute;
    left: 0;
    color: #28a745;
    font-weight: bold;
    font-size: 1.2rem;
  }

  .document-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-top: 30px;
    border-left: 4px solid #28a745;
  }

  @media (max-width: 992px) {
    .vision-image-container {
      height: 400px;
      margin-bottom: 30px;
    }

    .vision-title {
      font-size: 2rem;
    }

    .vision-subtitle {
      font-size: 1.5rem;
    }
  }

  @media (max-width: 768px) {
    .action-title {
      font-size: 1.3rem;
    }

    .section-title {
      font-size: 1.6rem;
    }

    .vision-title {
      font-size: 1.8rem;
    }

    .vision-image-container {
      height: 300px;
    }
  }
</style>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
      <div class="row align-items-center">
        <div class="col-md-8 text-center text-md-left">
          <div class="call-to-action-text">
            <h3 class="action-title">Profile of H.E. Dr. Lazarus McCarthy Chakwera</h3>
          </div>
        </div>
        <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
          <div class="call-to-action-btn">
            <a class="btn btn-light" href="{{route('profile')}}">View Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="ts-features" class="ts-features py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4">
        <div class="minister-image text-center">
          <img src="frontendassets/images/team/team1.jpg" alt="Minister" class="img-fluid rounded shadow">
          <h4 class="mt-3">His Excellency</h4>
          <div class="minister-details">
            <span class="d-block font-weight-bold">Dr. Lazarus McCarthy Chakwera</span>
            <span>President of the Republic of Malawi</span>
          </div>
        </div>
      </div>

      <div class="col-lg-8 mt-4 mt-lg-0">
        <div class="ts-intro">
          <h3>About Office of President and Cabinet</h3>
          <p class="">The Office of the President and Cabinet (OPC) is responsible for providing advice and support to the President and Cabinet as well as providing oversight leadership in the Public Service.</p>
        </div>

        <div class="gap-20"></div>

        <div class="accordion accordion-group" id="our-values-accordion">
          <div class="card mb-2">
            <div class="card-header p-0 bg-transparent" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-block text-left d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <span>Vision</span>
                  <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
              <div class="card-body">
                An effective and efficient public service that facilitates the realization of national aspirations.
              </div>
            </div>
          </div>

          <div class="card mb-2">
            <div class="card-header p-0 bg-transparent" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-block text-left d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span>Mission</span>
                  <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
              <div class="card-body">
                "To provide support to the President and Cabinet and play a leadership role in the management of the public service to ensure the realization of national aspirations".
              </div>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-block text-left d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <span>Core values</span>
                  <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
              <div class="card-body">
                <ul class="list-unstyled">
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Transparency</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Accountability</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Professionalism</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Responsiveness</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Discipline</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Equity and Equality</li>
                  <li><i class="fas fa-check-circle text-success mr-2"></i> Creativity</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <a href="{{route('about')}}" class="btn btn-primary mt-3">Read More <i class="fas fa-arrow-right ml-2"></i></a>
      </div>
    </div>
  </div>
</section>



<section id="main-container" class="main-container">
    <div class="row justify-content-center">
  <div class="col-lg-10 text-center">
    <h2 class="section-title">Office of President and Cabinet</h2>
    <h3 class="section-sub-title">Overviews</h3>
  </div>
</div>
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ts-service-box">
            <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="frontendassets/images/services/service1a.jpg" alt="Office of President">
              </div>
          <div class="d-flex">
            <div class="ts-service-info p-3">
              <h3 class="service-box-title">
                <a href="service-single.html">Office of President</a>
              </h3>
              <p class="text-justify">
                The Office of the President and Cabinet derives its mandate from the Constitution of Malawi,
                the Public Service Act and other legal instruments.
              </p>
              <a class="learn-more d-inline-block" href="{{route('about')}}" aria-label="service-details">
                <i class="fa fa-caret-right"></i> Read more
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ts-service-box">
          <div class="ts-service-image-wrapper">
            <img loading="lazy" class="w-100" src="frontendassets/images/services/service2a.jpg" alt="The Executive">
          </div>
          <div class="d-flex">
            <div class="ts-service-info p-3">
              <h3 class="service-box-title">
                <a href="service-single.html">The Executive</a>
              </h3>
              <p class="text-justify">
                The president leads the executive branch of the government of Malawi and is the commander-in-chief of the Malawian Defence Force.
              </p>
              <a class="learn-more d-inline-block" href="{{route('executive')}}" aria-label="service-details">
                <i class="fa fa-caret-right"></i> Read more
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ts-service-box">
          <div class="ts-service-image-wrapper">
            <img loading="lazy" class="w-100" src="frontendassets/images/services/service3a.jpg" alt="Open Government Partnership">
          </div>
          <div class="d-flex">
            <div class="ts-service-info p-3">
              <h3 class="service-box-title">
                <a href="service-single.html">Open Government Partnership</a>
              </h3>
              <p class="text-justify">
                Open Government Partnership is an organization of reformers inside and outside of governments working to transform how government serves its citizens.
              </p>
              <a class="learn-more d-inline-block" href="https://ogp.gov.mw/" target="_blank" aria-label="service-details">
                <i class="fa fa-caret-right"></i> Read more
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="ts-features" class="ts-features py-5 bg-light">
  <div class="container">
    <div class="row align-items-start">

      <!-- Image column with stretched image -->
      <div class="col-lg-7">
        <div class="vision-image-container text-center p-3"
             style="background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border: 1px solid rgba(40, 167, 69, 0.3); height: 100%;">
          <h3 class="fw-bold mb-3 text-success">MALAWI VISION 2063</h3>

          <!-- Stretched image filling container -->
          <div style="height: calc(100% - 50px); display: flex; align-items: center; justify-content: center;">
            <img src="frontendassets/images/team/mw12063.jpg"
                 alt="Malawi Vision 2063 with all enablers"
                 class="rounded shadow"
                 style="max-width: 100%; max-height: 100%; object-fit: contain;">
          </div>
        </div>
      </div>

      <!-- Content column -->
      <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="ts-intro">
          <h2 class="into-title mb-4 text-left">The Malawi we want by 2063</h2>

          <ol class="custom-list pl-3" style="line-height: 1.8;">
            <li class="mb-2">An inclusively wealthy and self-reliant industrialized upper middle-income country.</li>
            <li class="mb-2">A vibrant knowledge-based economy with a strong and competitive manufacturing industry.</li>
            <li class="mb-2">World-class urban centers and tourism hubs across the country.</li>
            <li class="mb-2">A united, peaceful, patriotic and proud people.</li>
            <li class="mb-2">Effective governance systems and institutions.</li>
            <li class="mb-2">A high-performing and professional public service.</li>
            <li class="mb-2">A dynamic and vibrant private sector.</li>
            <li class="mb-2">Globally competitive economic infrastructure.</li>
            <li class="mb-2">A globally competitive and highly motivated human resource.</li>
            <li class="mb-2">An environmentally sustainable economy.</li>
          </ol>

          <div class="mt-4 d-flex flex-wrap" style="gap: 10px;">
            <a class="btn btn-outline-secondary" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" target="_blank">
              <i class="fas fa-eye mr-2"></i> View Document
            </a>
            <a class="btn btn-success" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" download>
              <i class="fas fa-download mr-2"></i> Download PDF
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
