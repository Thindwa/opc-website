@extends('layouts.frontend')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')

<!-- Banner Area -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
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
</div> --}}

@php
    use Illuminate\Support\Str;
    $activeCategorySlug = $activeCategory ? Str::slug($activeCategory) : null;
@endphp

<section class="about-opc section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Section Header -->
                <div class="section-header text-center mb-5">
                    <h4 class="section-title">DOCUMENT LIBRARY</h4>
                    <div class="title-divider">
                        <span class="divider-line"></span>
                        <span class="divider-icon"><i class="fas fa-file-alt"></i></span>
                        <span class="divider-line"></span>
                    </div>
                    <p class="content-text text-center">
                        Access our collection of publicly available documents including speeches, plans, reports and more.
                    </p>
                </div>

                <div class="content-card card mb-4">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Tab Navigation -->
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="documentsTab" role="tablist">
                                    @foreach ($documents as $category => $items)
                                        @php
                                            $tabId = Str::slug($category);
                                            $isActive = $activeCategorySlug
                                                ? $activeCategorySlug === $tabId
                                                : $loop->first;
                                        @endphp
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link @if ($isActive) active @endif"
                                                id="{{ $tabId }}-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#{{ $tabId }}"
                                                type="button"
                                                role="tab"
                                                aria-controls="{{ $tabId }}"
                                                aria-selected="{{ $isActive ? 'true' : 'false' }}"
                                            >
                                                {{ $category }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="col-12">
                                <div class="tab-content p-4" id="documentsTabContent">
                                    @foreach ($documents as $category => $docs)
                                        @php
                                            $tabId = Str::slug($category);
                                            $isActive = $activeCategorySlug
                                                ? $activeCategorySlug === $tabId
                                                : $loop->first;
                                        @endphp
                                        <div
                                            class="tab-pane fade @if ($isActive) show active @endif"
                                            id="{{ $tabId }}"
                                            role="tabpanel"
                                            aria-labelledby="{{ $tabId }}-tab"
                                        >
                                            @foreach ($docs as $doc)
                                                @foreach ($doc->files ?? [] as $file)
                                                    @php
                                                        $fileName = ucwords(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME)));
                                                        $fileUrl = asset('storage/' . $file);
                                                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                        $iconMap = [
                                                            'pdf' => 'fas fa-file-pdf',
                                                            'doc' => 'fas fa-file-word',
                                                            'docx' => 'fas fa-file-word',
                                                            'ppt' => 'fas fa-file-powerpoint',
                                                            'pptx' => 'fas fa-file-powerpoint',
                                                        ];
                                                        $iconClass = $iconMap[$ext] ?? 'fas fa-file';
                                                    @endphp

                                                    <div class="document-item">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <div class="document-info">
                                                                <i class="{{ $iconClass }} document-icon"></i>
                                                                <span class="document-name">{{ $fileName }}</span>
                                                            </div>
                                                            <div class="document-actions">
                                                                <a class="btn btn-view" href="{{ $fileUrl }}" target="_blank">
                                                                    <i class="fas fa-eye mr-1"></i> View
                                                                </a>
                                                                <a class="btn btn-download" href="{{ $fileUrl }}" download>
                                                                    <i class="fas fa-download mr-1"></i> Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <hr class="document-divider">
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div> <!-- /col-12 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




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
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;

        if (hash) {
            const targetTabButton = document.querySelector(`button[data-bs-target="${hash}"]`);
            const targetTabPane = document.querySelector(hash);

            if (targetTabButton && targetTabPane) {
                // Remove 'active show' from all tab panes
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('active', 'show');
                });

                // Remove 'active' from all tab buttons
                document.querySelectorAll('.nav-link').forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });

                // Activate the tab
                const tab = new bootstrap.Tab(targetTabButton);
                tab.show();

                // Add required classes manually to tab-pane (fixes rare race condition)
                targetTabPane.classList.add('active', 'show');
            }
        }
    });
</script>
