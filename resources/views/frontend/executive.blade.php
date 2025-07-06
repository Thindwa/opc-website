@extends('layouts.frontend')

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
                      <li class="breadcrumb-item"><a href="#">OPC</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Executive</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

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
<section id="ts-features" class="ts-features py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="ts-intro position-relative">

          <!-- Minister Profile -->
          <div class="minister-profile">
            <img src="{{ asset('frontendassets/images/services/service2a.jpg') }}" alt="His Excellency Dr. Lazarus McCarthy Chakwera" class="img-fluid">
            <div class="minister-title">His Excellency</div>
            <div class="minister-name">Dr. Lazarus McCarthy Chakwera</div>
            <div class="minister-position">
              President of the Republic of Malawi<br>
              Commander-In-Chief Of The MDF
            </div>
          </div>

          <!-- Main Content -->
          <h2 class="section-title">THE EXECUTIVE ARM OF GOVERNMENT</h2>
          
          <div class="text-justify">
            <p>The Executive Arm of Government comprises the Presidency (President and Vice) and Cabinet Ministers and Deputy Ministers. The Executive is headed by the State President, who is also the Commander-in-Chief of the Malawi Defence Force and Malawi Police Service.</p>

            <p>The current President of the Republic of Malawi is His Excellency Dr. Lazarus McCarthy Chakwera. Dr. Chakwera was elected as the sixth President of the Republic on 23rd June 2020. The President is also serving as the Minister of Defence. The current Vice President is Right Honourable Dr. Michael Bizwick Usi, sworn in on 21 June 2024 at Parliament Building in Lilongwe after the death of the late Vice President Dr. Saulos Klaus Chilima.</p>

            <p>The inauguration of the sixth President took place on 6th July 2020 at Kamuzu Barracks in Lilongwe under the theme "Building a Better Malawi." The inauguration, which was set to take place simultaneously with the 56th Independence celebrations, was moved to the Army barracks as a precaution against the COVID-19 pandemic. In both speeches made at the Swearing-In and Inauguration ceremonies, Dr. Chakwera emphasized a servant leadership style and building a nation of opportunity and hope for all.</p>
          </div>

        </div><!-- /.ts-intro -->
      </div><!-- /.col-12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<!-- Cabinet Section -->
<section id="cabinet" class="ts-features py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="ts-intro">

          <!-- Cabinet Title -->
          <h2 class="section-title">Cabinet</h2>

          <div class="text-justify">
            <p>The Cabinet of Malawi is the executive branch of the government, made up of the President, Vice President, Ministers, and Deputy Ministers responsible for various departments.</p>

            <div class="mt-4">
              <h4 class="fw-bold mb-3">The Cabinet</h4>
              <div class="cabinet-list">
                <div class="cabinet-item">President of the Republic of Malawi, Commander-in-Chief of the Malawi Defence Force, His Excellency Dr. Lazarus McCarthy Chakwera.</div>
                <div class="cabinet-item">Vice President and Minister of State for Public Service Delivery, Right Honourable Dr. Michael Bizwick Usi</div>
                <div class="cabinet-item">Hon. Simplex Chithyola, M.P: Minister of Finance and Economic Affairs</div>
                <div class="cabinet-item">Hon. Eng. Vitumbiko Augeans Zasamula Mumba: Minister of Trade and Industry</div>
                <div class="cabinet-item">Hon. Samuel Kawale, M.P: Minister of Agriculture</div>
                <div class="cabinet-item">Hon. Ezekiel Peter Ching'oma, M.P: Minister of Homeland Security</div>
                <div class="cabinet-item">Hon. Nancy Tembo, M.P: Minister of Foreign Affairs</div>
                <div class="cabinet-item">Hon. Khumbize Kandodo Chiponda, M.P: Minister of Health</div>
                <div class="cabinet-item">Hon. Richard Chimwendo Banda, M.P: Minister of Local Government, Unity, and Culture</div>
                <div class="cabinet-item">Hon. Dr. Jessie Kabwila: Minister of Higher Education</div>
                <div class="cabinet-item">Hon. Titus Mvalo: Minister of Justice</div>
                <div class="cabinet-item">Hon. Jean Muonaowauza Sendeza: Minister of Gender</div>
                <div class="cabinet-item">Hon. Monica Chang'anamuno, M.P: Minister of Defence</div>
                <div class="cabinet-item">Hon. Vera Kamtukule: Minister of Tourism</div>
                <div class="cabinet-item">Hon. Abida Sidik Mia, M.P: Minister of Water and Sanitation</div>
                <div class="cabinet-item">Hon. Dr. Owen Chomanika, M.P: Minister of Natural Resources and Climate Change</div>
                <div class="cabinet-item">Hon. Ibrahim Matola: Minister of Energy</div>
                <div class="cabinet-item">Hon. Moses Kunkuyu Kalongashawa: Minister of Information and Digitalization</div>
                <div class="cabinet-item">Hon. Jacob Hara, M.P: Minister of Transport and Public Works</div>
                <div class="cabinet-item">Hon. Madalitso Kambauwa Wirima, M.P: Minister of Basic and Secondary Education</div>
                <div class="cabinet-item">Hon. Deus Gumba, M.P: Minister of Lands</div>
                <div class="cabinet-item">Hon. Dr. Kenneth Zikhale Ng'oma, M.P: Minister of Mining</div>
                <div class="cabinet-item">Hon. Uchizi Mkandawire, M.P: Minister of Youth and Sports</div>
                <div class="cabinet-item">Hon. Peter Dimba, M.P: Minister of Labour</div>
              </div>

              <h4 class="fw-bold mt-5">Deputy Ministers</h4>
              <div class="cabinet-list">
                <div class="cabinet-item">Hon. Joyce Chitsulo, M.P: Deputy Minister of Local Government, Unity, and Culture</div>
                <div class="cabinet-item">Hon. Noah Chimpeni, M.P: Deputy Minister of Health</div>
                <div class="cabinet-item">Hon. Baba Steven Malondera, M.P: Deputy Minister of Transport and Public Works</div>
                <div class="cabinet-item">Hon. Benedicto Kaluwa-Adwell Chambo, M.P: Deputy Minister of Agriculture</div>
                <div class="cabinet-item">Hon. Patricia Nangozo-Kainga, M.P: Deputy Minister of Foreign Affairs</div>
                <div class="cabinet-item">Hon. Halima Alima Daud, M.P: Deputy Minister of Gender</div>
                <div class="cabinet-item">Hon. Liana Chapota Munthali, M.P: Deputy Minister of Water and Sanitation</div>
              </div>
            </div>
          </div>

        </div><!-- /.ts-intro -->
      </div><!-- /.col-12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

@endsection