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

<div id="banner-area" class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
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
  </div><!-- Banner area end -->


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

    <!-- His Excellency Section -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-6 col-md-8">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team1.jpg" alt="President" class="img-fluid rounded shadow mb-3 minister-image">
          <h3 class="mt-3" style="font-weight: bold;">His Excellency</h3>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Dr. Lazarus McCarthy Chakwera.</strong><br>
            President of the Republic of Malawi,<br>
            Commander-in-Chief of the Malawi Defence Force.
          </p>
        </div>
      </div>
    </div>

    <!-- Vice President Section -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-6 col-md-8">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team2.jpg" alt="Vice President" class="img-fluid rounded shadow mb-3 minister-image">
          <h3 class="mt-3" style="font-weight: bold;">Vice President</h3>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Right Honourable Dr. Michael Bizwick Usi.</strong><br>
            Minister of State for Public Service Delivery<br>
          </p>
        </div>
      </div>
    </div>

    <!-- Cabinet Ministers Section -->
    <div class="row text-center mb-5">
      <div class="col-12">
        <h3 class="section-title">Cabinet Ministers</h3>
      </div>
    </div>

    <div class="row">
      <!-- Finance Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team3.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Finance and Economic Affairs</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Simplex Chithyola, MP</strong>
          </p>
        </div>
      </div>

      <!-- Trade Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team4.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Trade and Industry</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Eng. Vitumbiko Augeans Zasamula Mumba.</strong>
          </p>
        </div>
      </div>

      <!-- Agriculture Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team5.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Agriculture</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Samuel Kawale, MP</strong>
          </p>
        </div>
      </div>

      <!-- Homeland Security Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team6.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Homeland Security</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Ezekiel Peter Ching'oma, MP</strong>
          </p>
        </div>
      </div>

      <!-- Foreign Affairs Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team7.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Foreign Affairs</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Khumbize Kandodo Chiponda, MP</strong>
          </p>
        </div>
      </div>

      <!-- Health Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team8.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Health</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Khumbize Kandodo Chiponda, MP</strong>
          </p>
        </div>
      </div>

      <!-- Local Government Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team9.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Local Government, Unity, and Culture</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Richard Chimwendo Banda, MP</strong>
          </p>
        </div>
      </div>

      <!-- Higher Education Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team10.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Higher Education</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Dr. Jessie Kabwila</strong>
          </p>
        </div>
      </div>

      <!-- Justice Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team11.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Justice</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Titus Mvalo</strong>
          </p>
        </div>
      </div>

      <!-- Gender Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team12.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Gender</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Jean Muonaowauza Sendeza MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Defence Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team13.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Defence</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Monica Chang'anamuno, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Tourism Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team14.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Tourism</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Vera Kamtukule</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Water and Sanitation Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team15.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Water and Sanitation</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Abida Sidik Mia, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Natural Resources and Climate Change Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team16.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Natural Resources and Climate Change</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Dr. Owen Chomanika, M.P</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Energy Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team17.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Energy</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Ibrahim Matola</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Information and Digitalization Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team18.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Information and Digitalization</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Moses Kunkuyu Kalongashawa</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Transport and Public Works Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team19.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Transport and Public Works</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Jacob Hara, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Basic and Secondary Education Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team20.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Basic and Secondary Education</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Madalitso Kambauwa Wirima, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Lands Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team21.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Lands</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Deus Gumba, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Mining Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team22.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Mining</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Dr. Kenneth Zikhale Ng'oma, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Youth and Sports Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team23.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Youth and Sports</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Uchizi Mkandawire, MP</strong>
          </p>
        </div>
      </div>

      <!-- Minister of Labour Section -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="minister-card text-center">
          <img src="frontendassets/images/team/team24.jpg" alt="Minister" class="img-fluid rounded shadow mb-3 minister-image">
          <h4 class="mt-3" style="font-weight: bold;">Minister of Labour</h4>
          <p style="margin-bottom: 0; line-height: 1.4; font-size: 1.1rem;">
            <strong>Hon. Peter Dimba, MP</strong>
          </p>
        </div>
      </div>
    </div><!-- Ministers row end -->
  </div><!-- Container end -->
</section><!-- Main container end -->

@endsection
