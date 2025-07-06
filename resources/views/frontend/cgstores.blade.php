@extends('layouts.frontend')
@section('content')

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
                                <li class="breadcrumb-item active" aria-current="page">Central Government Stores</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">CENTRAL GOVERNMENT STORES</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon"><i class="fas fa-building" style="color: #d9534f;"></i></span>
                        <span class="divider-line"></span>
                    </div>
                </div>

                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title"><i class="fas fa-gavel mr-2" style="color: #d9534f;"></i>MANDATE</h2>
                        <div class="content-divider" style="background: #d9534f;"></div>
                        <p class="content-text">
                            To procure, manage and dispose suppliers and/or assets required for public user in ministries, departments and agencies 
                            <span class="reference">(Ref. Act of Parliament General Notice No.127/1968, the Public Procurement and Disposal of Public Assets (No.27 of 2017) Act, and Public Finance Management Act of 2003)</span>.
                        </p>
                    </div>
                </div>

                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title"><i class="fas fa-eye mr-2" style="color: #5cb85c;"></i>VISION</h2>
                        <div class="content-divider" style="background: #5cb85c;"></div>
                        <p class="content-text">
                            To be a leading provider of good quality and value for money goods and services to the public sector.
                        </p>
                    </div>
                </div>

                <div class="content-card card mb-4">
                    <div class="card-body">
                        <h2 class="content-title"><i class="fas fa-bullseye mr-2" style="color: #d9534f;"></i>MISSION</h2>
                        <div class="content-divider" style="background: #d9534f;"></div>
                        <p class="content-text">
                            To procure and supply good quality and value for money goods and services to all public sector institutions through maintenance of high standards and professionalism in supply chain management.
                        </p>
                    </div>
                </div>

                <div class="content-card card">
                    <div class="card-body">
                        <h2 class="content-title"><i class="fas fa-chess-board mr-2" style="color: #5cb85c;"></i>STRATEGIC OBJECTIVES</h2>
                        <div class="content-divider" style="background: #5cb85c;"></div>
                        <ul class="strategic-list">
                            <li><i class="fas fa-check-circle mr-2" style="color: #5cb85c;"></i>To procure adequate and quality stocks to meet the ever-rising demand of our clients.</li>
                            <li><i class="fas fa-check-circle mr-2" style="color: #5cb85c;"></i>To market Government Central Stores stocks to Ministries, Departments, and Agencies.</li>
                            <li><i class="fas fa-check-circle mr-2" style="color: #5cb85c;"></i>To manage Procurement and Supply Common Service Staff.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

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
.breadcrumb {
    background: transparent;
    padding: 0;
    margin-top: 1rem;
}
.breadcrumb-item a {
    color: #fff;
    transition: all 0.3s ease;
    position: relative;
}
.breadcrumb-item a:hover {
    color: #f8f9fa;
    text-decoration: none;
}
.breadcrumb-item a:hover::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #f8f9fa;
}
.breadcrumb-item.active {
    color: #f8f9fa;
    font-weight: 600;
}
.breadcrumb-item+.breadcrumb-item::before {
    color: #fff;
}

/* Section Padding */
.section-padding {
    padding: 80px 0;
}

/* Section Titles */
.section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
}
.title-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;
}
.divider-line {
    width: 50px;
    height: 2px;
    background: #d9534f;
    margin: 0 10px;
}
.divider-icon {
    font-size: 1.2rem;
}

/* Content Cards */
.content-card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}
.content-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}
.content-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
}
.content-divider {
    width: 60px;
    height: 3px;
    margin: 1rem 0;
}
.content-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
}
.reference {
    font-style: italic;
    color: #777;
    font-size: 0.95rem;
}

/* Strategic Objectives List */
.strategic-list {
    list-style: none;
    padding-left: 0;
}
.strategic-list li {
    padding: 8px 0;
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    display: flex;
    align-items: center;
}
</style>

@endsection
