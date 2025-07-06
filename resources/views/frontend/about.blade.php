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

<div id="banner-area" class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
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
</div>

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

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
      <!-- Left Sidebar Tabs -->
      <div class="col-xl-3 col-lg-4">
        <div class="sidebar sidebar-left">
          <div class="widget">
            <h3 class="widget-title">OPC Sections</h3>
            <ul class="nav flex-column nav-pills service-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <li><a class="nav-link active" id="tab-opc-headquarters" data-toggle="pill" href="#content-opc-headquarters" role="tab" aria-controls="content-opc-headquarters" aria-selected="true">OPC Headquarters</a></li>
              <li><a class="nav-link" id="tab-administration" data-toggle="pill" href="#content-administration" role="tab" aria-controls="content-administration" aria-selected="false">Administration</a></li>
              <li><a class="nav-link" id="tab-procurement" data-toggle="pill" href="#content-procurement" role="tab" aria-controls="content-procurement" aria-selected="false">Procurement</a></li>
              <li><a class="nav-link" id="tab-cabinet" data-toggle="pill" href="#content-cabinet" role="tab" aria-controls="content-cabinet" aria-selected="false">Cabinet</a></li>
              <li><a class="nav-link" id="tab-finance" data-toggle="pill" href="#content-finance" role="tab" aria-controls="content-finance" aria-selected="false">Finance</a></li>
              <li><a class="nav-link" id="tab-me" data-toggle="pill" href="#content-me" role="tab" aria-controls="content-me" aria-selected="false">Monitoring and Evaluation</a></li>
              <li><a class="nav-link" id="tab-human-resource" data-toggle="pill" href="#content-human-resource" role="tab" aria-controls="content-human-resource" aria-selected="false">Human Resource</a></li>
              <li><a class="nav-link" id="tab-legal-affairs" data-toggle="pill" href="#content-legal-affairs" role="tab" aria-controls="content-legal-affairs" aria-selected="false">Legal Affairs</a></li>
              <li><a class="nav-link" id="tab-internal-audit" data-toggle="pill" href="#content-internal-audit" role="tab" aria-controls="content-internal-audit" aria-selected="false">Internal Audit</a></li>
              <li><a class="nav-link" id="tab-ict" data-toggle="pill" href="#content-ict" role="tab" aria-controls="content-ict" aria-selected="false">Information and Communication Technology (ICT)</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Right Content Area -->
      <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
          <!-- OPC Headquarters -->
          <div class="tab-pane fade show active scroll-target" id="content-opc-headquarters" role="tabpanel" aria-labelledby="tab-opc-headquarters">
            <h2 class="column-title mrt-0">OPC Headquarters</h2>
            <p>The Office of President and Cabinet (OPC) comprises Department of Disaster Management Affairs, Printing Services, Statutory Corporations, Central Government Stores, Government Contracting Unit, Performance Reporting Department, Department of Human Resource Management and Development, Department of Public Events and Department of Innovations and Creativity.</p>
            <p>OPC is guided by Malawi Nation's Policies, Legislation, vision, mission and Major Government priorities in the running of the country's Affairs.</p>
            <img src="{{ asset('frontendassets/images/services/service1a.jpg') }}" class="img-fluid mb-4" alt="OPC Headquarters Building">
          </div>

          <!-- Administration -->
          <div class="tab-pane fade scroll-target" id="content-administration" role="tabpanel" aria-labelledby="tab-administration">
            <h2 class="column-title mrt-0">Administration</h2>
            <p>Oversees the smooth running of operations, manages resources, and supports all departments within OPC.</p>
            <img src="{{ asset('frontendassets/images/administration.jpg') }}" class="img-fluid mb-4" alt="Administration Department">
          </div>

            <!-- procurement -->
            <div class="tab-pane fade scroll-target" id="content-procurement" role="tabpanel" aria-labelledby="tab-procurement">
                <h2 class="column-title mrt-0">Procurement</h2>
                <p>Responsible for the procurement of goods and services for the Government of Malawi.</p>
                <img src="{{ asset('frontendassets/images/administration.jpg') }}" class="img-fluid mb-4" alt="Procurement Department">
              </div>

          <!-- Cabinet -->
          <div class="tab-pane fade scroll-target" id="content-cabinet" role="tabpanel" aria-labelledby="tab-cabinet">
            <h2 class="column-title mrt-0">Cabinet</h2>
            <p>The OPC Cabinet provides leadership direction and high-level decision making on major governmental policies and programs.</p>
            <img src="{{ asset('frontendassets/images/cabinet.jpg') }}" class="img-fluid mb-4" alt="Cabinet Meeting">
          </div>

          <!-- Finance -->
          <div class="tab-pane fade scroll-target" id="content-finance" role="tabpanel" aria-labelledby="tab-finance">
            <h2 class="column-title mrt-0">Finance</h2>
            <p>Responsible for budget management, financial planning, and ensuring transparency in the allocation of OPC resources.</p>
            <img src="{{ asset('frontendassets/images/finance.jpg') }}" class="img-fluid mb-4" alt="Finance Department">
          </div>

          <!-- Monitoring and Evaluation -->
          <div class="tab-pane fade scroll-target" id="content-me" role="tabpanel" aria-labelledby="tab-me">
            <h2 class="column-title mrt-0">Monitoring and Evaluation</h2>
            <p>Tracks project progress, assesses program impacts, and ensures that initiatives meet desired outcomes and objectives.</p>
            <img src="{{ asset('frontendassets/images/monitoring.jpg') }}" class="img-fluid mb-4" alt="Monitoring and Evaluation">
          </div>

          <!-- Human Resource -->
          <div class="tab-pane fade scroll-target" id="content-human-resource" role="tabpanel" aria-labelledby="tab-human-resource">
            <h2 class="column-title mrt-0">Human Resource</h2>
            <p>Manages staff recruitment, welfare, performance, and capacity building, ensuring the OPC workforce remains highly motivated and effective.</p>
            <img src="{{ asset('frontendassets/images/hr.jpg') }}" class="img-fluid mb-4" alt="Human Resource Department">
          </div>

          <!-- Legal Affairs -->
          <div class="tab-pane fade scroll-target" id="content-legal-affairs" role="tabpanel" aria-labelledby="tab-legal-affairs">
            <h2 class="column-title mrt-0">Legal Affairs</h2>
            <p>Provides legal advice and representation, ensuring that all OPC operations are compliant with national laws and regulations.</p>
            <img src="{{ asset('frontendassets/images/legal.jpg') }}" class="img-fluid mb-4" alt="Legal Affairs Department">
          </div>

          <!-- Internal Audit -->
          <div class="tab-pane fade scroll-target" id="content-internal-audit" role="tabpanel" aria-labelledby="tab-internal-audit">
            <h2 class="column-title mrt-0">Internal Audit</h2>
            <p>Conducts independent evaluations of financial and operational activities to strengthen accountability and internal controls.</p>
            <img src="{{ asset('frontendassets/images/audit.jpg') }}" class="img-fluid mb-4" alt="Internal Audit Department">
          </div>

          <!-- ICT -->
          <div class="tab-pane fade scroll-target" id="content-ict" role="tabpanel" aria-labelledby="tab-ict">
            <h2 class="column-title mrt-0">Information and Communication Technology (ICT)</h2>
            <p>Leads the digital transformation of OPC through innovative IT solutions, infrastructure development, and cybersecurity management.</p>
            <img src="{{ asset('frontendassets/images/ict.jpg') }}" class="img-fluid mb-4" alt="ICT Department">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all tab links
    const tabLinks = document.querySelectorAll('.service-menu .nav-link');

    // Add click event listener to each tab link
    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Get the target tab pane ID
            const targetId = this.getAttribute('href');
            const targetPane = document.querySelector(targetId);

            // Remove active class from all tab links and panes
            document.querySelectorAll('.service-menu .nav-link').forEach(item => {
                item.classList.remove('active');
            });

            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });

            // Add active class to clicked tab link
            this.classList.add('active');

            // Show the target tab pane
            targetPane.classList.add('show', 'active');

            // Smooth scroll to the target pane
            targetPane.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            // For mobile view, close the menu if it's a collapsible menu
            if (window.innerWidth < 992) {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            }
        });
    });

    // Automatically scroll to the active tab content on page load
    const activeTabLink = document.querySelector('.service-menu .nav-link.active');
    if (activeTabLink) {
        const targetId = activeTabLink.getAttribute('href');
        const targetPane = document.querySelector(targetId);
        if (targetPane) {
            setTimeout(() => {
                targetPane.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 300); // Small delay to allow page to settle
        }
    }
});
</script>

@endsection
