@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title">Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Departments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Government Contracting Unit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Department Section -->
<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">

                <!-- Section Title -->
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">Government Contracting Unit</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon">
                            <i class="fas fa-file-contract"></i>
                        </span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <!-- Introduction -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <p class="content-text">
                            The Government of Malawi (GoM) established Government Contracting Unit (GCU) in the Office of the President and Cabinet (OPC) to review, consider, vet, negotiate and pass contractual proposals before they are concluded on behalf of the Malawi Government. The Government established the Unit in July 2012 in order to close gaps existing in the development, implementation, management and monitoring of government contracts and concession agreements by various Ministries, Departments and Agencies (MDAs).
                        </p>
                        <p class="content-text">
                            This was in response to the concerns from the public expressed through various communication channels on how government contracts, concessions, projects and programmes are awarded, negotiated, and implemented by the MDAs. Issues such as inadequate or lack of scrutiny in procurement of contracts, unfavourable provisions and conditions in contracts and concession agreements, and lack of implementation monitoring systems has made the Government to lose revenue and fail to maximize value on contracts, projects and programmes resulting to underperformance, cost overruns and claims.
                        </p>
                        <p class="content-text">
                            The Unit is therefore providing the checks and balances by ensuring that government policies, rules, guidelines, procedures and specifications are dutifully followed in the development, negotiation, implementation, management and monitoring of government contracts and concession agreements. This ensures that Government is only committed to financing and implementing contracts and other agreements which are being thoroughly scrutinized, vetted, certified as reasonable, advantageous and that there is value for money.
                        </p>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title">
                            <i class="fas fa-eye mr-2"></i> Vision
                        </h2>
                        <div class="content-divider"></div>
                        <p class="content-text">
                            "Maximise value from all government contracts and concessions."
                        </p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title">
                            <i class="fas fa-bullseye mr-2"></i> Mission
                        </h2>
                        <div class="content-divider"></div>
                        <p class="content-text">
                            "To provide leadership in contracts and concessions management to ensure optimal contracts and concessions performance, value for money, timeliness and cost effectiveness for the betterment of the people of Malawi."
                        </p>
                    </div>
                </div>

                <!-- Core Values Card -->
                <div class="content-card card shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-wrapper bg-info text-white rounded-circle mr-3">
                                <i class="fas fa-star fa-lg"></i>
                            </div>
                            <h2 class="content-title mb-0">Core Values</h2>
                        </div>
                        <div class="content-divider bg-info mb-4"></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ([
                                    'Integrity' => 'Maintaining high ethical standards in all our dealings',
                                    'Professionalism' => 'Demonstrating expertise and competence in contract management',
                                    'Commitment' => 'Dedication to achieving our mandate and objectives',
                                    'Transparency & Accountability' => 'Openness and responsibility in all our operations',
                                    'Confidentiality' => 'Protecting sensitive government contract information'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                @foreach ([
                                    'Responsiveness' => 'Timely action on all contract matters',
                                    'Fairness' => 'Impartial treatment of all stakeholders',
                                    'Civic Involvement' => 'Engaging with citizens on contract matters',
                                    'Value for Money' => 'Ensuring optimal returns on government contracts',
                                    'Partnership' => 'Collaborating with stakeholders',
                                    'Innovativeness and Technology' => 'Leveraging modern solutions'
                                ] as $key => $value)
                                    <div class="value-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex align-items-start">
                                            <span class="badge-value bg-info text-white mr-3">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="font-weight-bold text-dark mb-1">{{ $key }}</h5>
                                                <p class="mb-0 text-muted">{{ $value }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-4 text-center">
                                    <a href="#" class="btn btn-outline-info">Download Strategic Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Custom Styles -->
<style>
/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 250px;
    position: relative;
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
.section-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2c3e50;
    text-transform: uppercase;
}
.content-title {
    font-size: 1.3rem;
    font-weight: bold;
}

/* Dividers */
.title-divider, .content-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem 0;
    height: 3px;
    width: 80px;
    background: #5bc0de;
}

/* Cards */
.content-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: 0.3s ease-in-out;
}
.content-card:hover {
    transform: translateY(-5px);
}

/* Value Items */
.value-item {
    transition: 0.3s ease;
}
.value-item:hover {
    background: #f1f8f1;
    transform: translateX(5px);
}

/* Responsive */
@media (max-width: 768px) {
    .banner-title,
    .section-title {
        font-size: 1.3rem;
    }
}
</style>

@endsection