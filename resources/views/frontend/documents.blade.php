@extends('layouts.frontend')

@section('content')

<!-- Banner Area -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title" style="font-size: 1.8rem;">Resource Center</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">OPC Gallery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Documents</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Documents Section -->
<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">DOCUMENT LIBRARY</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon"><i class="fas fa-file-alt"></i></span>
                        <span class="divider-line"></span>
                    </div>
                    <p class="content-text text-center">
                        Access our collection of publicly available documents including Speeches, policies, strategies, reports, and guidelines.
                    </p>
                </div>

                <div class="content-card card mb-4">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Tab Navigation -->
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="documentsTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="speeches-tab" data-bs-toggle="tab" data-bs-target="#speeches-tab-pane" type="button" role="tab" aria-controls="speeches-tab-pane" aria-selected="true">
                                            <i class="fas fa-gavel mr-2"></i>Speeches
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="strategies-tab" data-bs-toggle="tab" data-bs-target="#strategies-tab-pane" type="button" role="tab" aria-controls="strategies-tab-pane" aria-selected="false">
                                            <i class="fas fa-chess mr-2"></i>Strategic Plans
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="press-tab" data-bs-toggle="tab" data-bs-target="#press-tab-pane" type="button" role="tab" aria-controls="press-tab-pane" aria-selected="false">
                                            <i class="fas fa-bullhorn mr-2"></i>Press Releases
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="regulations-tab" data-bs-toggle="tab" data-bs-target="#regulations-tab-pane" type="button" role="tab" aria-controls="regulations-tab-pane" aria-selected="false">
                                            <i class="fas fa-balance-scale mr-2"></i>Regulations
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports-tab-pane" type="button" role="tab" aria-controls="reports-tab-pane" aria-selected="false">
                                            <i class="fas fa-chart-bar mr-2"></i>Reports
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="acts-tab" data-bs-toggle="tab" data-bs-target="#acts-tab-pane" type="button" role="tab" aria-controls="acts-tab-pane" aria-selected="false">
                                            <i class="fas fa-chart-bar mr-2"></i>Acts and Laws
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="misc-tab" data-bs-toggle="tab" data-bs-target="#misc-tab-pane" type="button" role="tab" aria-controls="misc-tab-pane" aria-selected="false">
                                            <i class="fas fa-ellipsis-h mr-2"></i>Miscellaneous
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="col-12">
                                <div class="tab-content p-4" id="documentsTabContent">
                                    <!-- Speeches Tab -->
                                    <div class="tab-pane fade show active" id="speeches-tab-pane" role="tabpanel" aria-labelledby="speeches-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">The launch of the OGP National Action Plan for Malawi.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                        
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">His Excellency SADC welcome remarks.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Policies/Climate%20Change%20Management%20Policy%20Final.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Strategies Tab -->
                                    <div class="tab-pane fade" id="strategies-tab-pane" role="tabpanel" aria-labelledby="strategies-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">National Refugee Management Strategy.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Strategies/updated-malawis-strategy-on-climate-change-learning-2021.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Strategies/updated-malawis-strategy-on-climate-change-learning-2021.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Press Releases Tab -->
                                    <div class="tab-pane fade" id="press-tab-pane" role="tabpanel" aria-labelledby="press-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">Press releases announcing new funding received.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Guides/GHG%20Inventory%20Guide.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Guides/GHG%20Inventory%20Guide.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Regulations Tab -->
                                    <div class="tab-pane fade" id="regulations-tab-pane" role="tabpanel" aria-labelledby="regulations-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">Refugee Protection Regulations.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Regulations/Environmental%20Protection%20Regulations.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Regulations/Environmental%20Protection%20Regulations.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Reports Tab -->
                                    <div class="tab-pane fade" id="reports-tab-pane" role="tabpanel" aria-labelledby="reports-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">Human Rights Reports.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Reports/GHG%20Emissions%20Report%202023.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Reports/GHG%20Emissions%20Report%202023.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Acts Tab -->
                                    <div class="tab-pane fade" id="acts-tab-pane" role="tabpanel" aria-labelledby="acts-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">Refugee Act 2023.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Acts/Refugee%20Act%202023.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Acts/Refugee%20Act%202023.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>

                                    <!-- Miscellaneous Tab -->
                                    <div class="tab-pane fade" id="misc-tab-pane" role="tabpanel" aria-labelledby="misc-tab">
                                        <div class="document-item">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="document-info">
                                                    <i class="fas fa-file-pdf document-icon"></i>
                                                    <span class="document-name">Biodiversity Inventory 2022.pdf</span>
                                                </div>
                                                <div class="document-actions">
                                                    <a class="btn btn-view" href="../storage/app/media/Resources/Miscellaneous/Biodiversity%20Inventory%202022.pdf" target="_blank">
                                                        <i class="fas fa-eye mr-1"></i> View
                                                    </a>
                                                    <a class="btn btn-download" href="../storage/app/media/Resources/Miscellaneous/Biodiversity%20Inventory%202022.pdf" download>
                                                        <i class="fas fa-download mr-1"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="document-divider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Initialize Bootstrap tabs -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap tabs
        var tabElms = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabElms.forEach(function(tabEl) {
            tabEl.addEventListener('click', function(event) {
                event.preventDefault();
                var tab = new bootstrap.Tab(tabEl);
                tab.show();
            });
        });
    });
</script>

<style>
    /* Your existing CSS styles remain unchanged */
    .banner-area {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 250px;
        position: relative;
        display: flex;
        align-items: center;
    }
    .banner-area::before {
        content: '';
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
    .banner-text {
        position: relative;
        z-index: 1;
        color: #fff;
        width: 100%;
    }
    .banner-title {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }
    
    /* Section Title */
    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c3e50;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }
    .title-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1.5rem auto;
    }
    .divider-line {
        height: 2px;
        width: 50px;
        background: #e74c3c;
    }
    .divider-icon {
        margin: 0 15px;
        color: #e74c3c;
        font-size: 1.2rem;
    }
    
    /* Document Library Specific Styles */
    .document-item {
        margin-bottom: 1rem;
    }
    .document-info {
        display: flex;
        align-items: center;
        flex-grow: 1;
    }
    .document-icon {
        font-size: 1.5rem;
        margin-right: 1rem;
        color: #e74c3c;
    }
    .document-name {
        font-size: 1.1rem;
        color: #333;
    }
    .document-actions .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        margin-left: 0.5rem;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    .btn-view {
        background-color: #5bc0de;
        color: white;
        border: 1px solid #46b8da;
    }
    .btn-view:hover {
        background-color: #46b8da;
    }
    .btn-download {
        background-color: #5cb85c;
        color: white;
        border: 1px solid #4cae4c;
    }
    .btn-download:hover {
        background-color: #4cae4c;
    }
    .document-divider {
        margin: 1rem 0;
        border-top: 1px solid #eee;
    }
    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
        padding: 0 1rem;
    }
    .nav-tabs .nav-link {
        color: #555;
        font-weight: 500;
        border: none;
        border-bottom: 3px solid transparent;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        margin-right: 0.5rem;
    }
    .nav-tabs .nav-link.active {
        color: #e74c3c;
        background-color: transparent;
        border-bottom: 3px solid #e74c3c;
    }
    .nav-tabs .nav-link:hover:not(.active) {
        color: #e74c3c;
        background-color: rgba(231, 76, 60, 0.1);
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .banner-area {
            height: 220px;
        }
        .banner-title {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 1.3rem;
        }
        .nav-tabs .nav-link {
            padding: 0.5rem;
            font-size: 0.9rem;
        }
    }
    @media (max-width: 576px) {
        .banner-area {
            height: 200px;
        }
        .banner-title {
            font-size: 1.3rem;
        }
        .nav-tabs {
            overflow-x: auto;
            white-space: nowrap;
            flex-wrap: nowrap;
        }
    }
</style>

@endsection