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
                      <li class="breadcrumb-item active" aria-current="page">Profile</li>
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

    .president-profile {
        position: relative;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .president-image-card {
        float: right;
        margin: 0 0 30px 30px;
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
            <img src="{{ asset('frontendassets/images/team/team1.jpg') }}" alt="His Excellency Dr. Lazarus McCarthy Chakwera" class="president-image">
            <h4 class="mt-3 text-success">His Excellency</h4>
            <div class="president-info">
              <h5 class="mb-1">Dr. Lazarus McCarthy Chakwera</h5>
              <p class="text-muted">President of the Republic of Malawi</p>
            </div>
          </div>

          <!-- Profile Title -->
          <h4 class="profile-title">Profile of President Dr. Lazarus McCarthy Chakwera</h4>

          <!-- Profile Content -->
          <div class="profile-content">
            
            <p>His Excellency Dr. Lazarus McCarthy Chakwera, the sixth President of the Republic of Malawi, was sworn into office on June 28, 2020 at Malawi Square, Bingu International Convention Centre in Lilongwe following a landmark election that restored faith in Malawi's democracy.</p>

            <p>Before his presidency, Dr. Chakwera served as President of the Malawi Assemblies of God from 1989 until May 2013 when he resigned to contest in the 2014 General Elections as the Malawi Congress Party presidential candidate. Though the election was marred by irregularities, Dr. Chakwera demonstrated statesmanship by accepting the results and serving as Leader of Opposition in the National Assembly, where he won a parliamentary seat.</p>

            <p>The 2019 elections saw history repeat itself with even more glaring irregularities, including widespread use of correction fluid on results sheets. This time, Dr. Chakwera joined forces with Vice President Dr. Saulos Klaus Chilima to challenge the results. Their landmark constitutional case resulted in the nullification of the election - a first in Malawi's history - and set the stage for the 2020 Fresh Presidential Election, which Dr. Chakwera won decisively with 58.57% of the vote.</p>

            <h5 class="mt-4 mb-3 text-success">Early Life and Education</h5>
            <p>Born on April 5, 1955 in rural Lilongwe to subsistence farmers Earnest and Mallen Chakwera, the President's humble beginnings shaped his character and worldview. Named "Lazarus" after the biblical figure raised from the dead, he overcame childhood hardships that claimed two of his siblings. Dr. Chakwera's academic journey took him from the University of Malawi (BA Philosophy, 1977) to institutions in South Africa and the United States, culminating in a doctorate from Trinity International University in 2000 and professorship from Pan Africa Theological Seminary in 2005.</p>

            <p>Married to First Lady Monica Chakwera since 1977, the President is a devoted family man with four children and twelve grandchildren. His leadership experience spans religious, academic, and civic spheres, including chairing the Evangelical Association of Malawi, National Council for Sports, and serving on several international boards.</p>

            <h5 class="mt-4 mb-3 text-success">The SUPER HI-5 Governance Agenda</h5>
            <p>President Chakwera's administration is built on five foundational principles known as the SUPER HI-5:</p>
            
            <div class="profile-highlights">
              <ul>
                <li><strong>Servant Leadership:</strong> Transforming government into a service-oriented institution focused on results rather than privileges.</li>
                <li><strong>Uniting Malawi:</strong> Bridging political, tribal, and social divides through inclusive leadership and cultural celebration.</li>
                <li><strong>Prospering Together:</strong> Ambitious economic plans including job creation, tax relief, agricultural reform, and women's empowerment.</li>
                <li><strong>Ending Corruption:</strong> Strengthening anti-corruption institutions with specialized courts and departmental oversight.</li>
                <li><strong>Rule of Law:</strong> Commitment to constitutional governance, judicial independence, and law enforcement support.</li>
              </ul>
            </div>

            <p>These principles embody President Chakwera's vision of <em>"Building A New Malawi Enjoyed by All"</em> (<em>Kumanga Malawi Watsopano Okomela Tonse</em>), which inspired the name of his nine-party Tonse Alliance that won the historic 2020 election. His leadership continues to focus on restoring hope, accountability, and shared prosperity to the Warm Heart of Africa.</p>

          </div>

        </div><!-- president-profile -->
      </div><!-- col-12 -->
    </div><!-- row -->
  </div><!-- container -->
</section>

@endsection