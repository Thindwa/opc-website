@extends('layouts.frontend')

@section('content')
    @php
        $groups = $results['groups'] ?? [];
        $topResults = $results['results'] ?? [];
        $sources = $results['sources'] ?? [];
        $total = $results['total'] ?? 0;
    @endphp

    <section class="search-results-page section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center mb-5">
                        <h2 class="section-title">Website Search</h2>
                        <p class="content-text">
                            Search official news, documents, events, pages, videos, and leadership profiles in one place.
                        </p>
                    </div>

                    <form action="{{ route('search') }}" method="GET" class="search-page-form mb-4">
                        <div class="input-group input-group-lg shadow-sm">
                            <input
                                type="search"
                                name="q"
                                value="{{ $query }}"
                                class="form-control"
                                placeholder="Search circulars, notices, news, events..."
                                aria-label="Search the website"
                            >
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    @if($query)
                        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                            <p class="mb-2 mb-md-0 text-muted">
                                Showing {{ $total }} result{{ $total === 1 ? '' : 's' }} for <strong>"{{ $query }}"</strong>
                            </p>
                            <a href="{{ route('frontend.home') }}" class="small text-success">Back to home</a>
                        </div>
                    @else
                        <div class="search-source-pills mb-4">
                            @foreach ($sources as $source)
                                <span class="badge badge-light border mr-2 mb-2 px-3 py-2">
                                    <i class="{{ $source['icon'] ?? 'fas fa-search' }} mr-1 text-success"></i>
                                    {{ $source['label'] ?? 'Source' }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    @if($query && !empty($topResults))
                        <div class="search-group card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="h5 mb-0">
                                        <i class="fas fa-star mr-2 text-warning"></i>
                                        Top Matches
                                    </h3>
                                    <span class="badge badge-light">Best ranked</span>
                                </div>
                            </div>
                            <div class="card-body pt-3">
                                <div class="row">
                                    @foreach (array_slice($topResults, 0, 6) as $item)
                                        <div class="col-md-6 mb-3">
                                            <a href="{{ $item['url'] }}" class="search-result-item d-block h-100">
                                                <div class="result-card p-3 h-100">
                                                    <div class="d-flex align-items-start">
                                                        <div class="result-icon mr-3">
                                                            <i class="{{ $item['icon'] ?? 'fas fa-file' }}"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                                <h4 class="h6 mb-0 text-dark">{{ $item['title'] }}</h4>
                                                                @if(!empty($item['badge']))
                                                                    <span class="badge badge-pill badge-success ml-2">{{ $item['badge'] }}</span>
                                                                @endif
                                                            </div>
                                                            @if(!empty($item['excerpt']))
                                                                <p class="text-muted small mb-2">{{ $item['excerpt'] }}</p>
                                                            @endif
                                                            @if(!empty($item['meta']))
                                                                <span class="small text-success">{{ $item['meta'] }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($groups))
                        @forelse ($groups as $group)
                            <div class="search-group card border-0 shadow-sm mb-4">
                                <div class="card-header bg-white border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="h5 mb-0">
                                            <i class="{{ $group['icon'] ?? 'fas fa-search' }} mr-2 text-success"></i>
                                            {{ $group['label'] ?? 'Results' }}
                                        </h3>
                                        <span class="badge badge-light">{{ count($group['items'] ?? []) }}</span>
                                    </div>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="row">
                                        @foreach ($group['items'] as $item)
                                            <div class="col-md-6 mb-3">
                                                <a href="{{ $item['url'] }}" class="search-result-item d-block h-100">
                                                    <div class="result-card p-3 h-100">
                                                        <div class="d-flex align-items-start">
                                                            <div class="result-icon mr-3">
                                                                <i class="{{ $item['icon'] ?? 'fas fa-file' }}"></i>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                                    <h4 class="h6 mb-0 text-dark">{{ $item['title'] }}</h4>
                                                                    @if(!empty($item['badge']))
                                                                        <span class="badge badge-pill badge-success ml-2">{{ $item['badge'] }}</span>
                                                                    @endif
                                                                </div>
                                                                @if(!empty($item['excerpt']))
                                                                    <p class="text-muted small mb-2">{{ $item['excerpt'] }}</p>
                                                                @endif
                                                                @if(!empty($item['meta']))
                                                                    <span class="small text-success">{{ $item['meta'] }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-light border text-center py-5">
                                <h3 class="h5 mb-3">No results found</h3>
                                <p class="mb-0 text-muted">
                                    Try a different keyword or browse the latest news, documents, pages, and events.
                                </p>
                            </div>
                        @endforelse
                    @else
                        <div class="alert alert-light border text-center py-5">
                            <h3 class="h5 mb-3">Start searching</h3>
                            <p class="mb-0 text-muted">
                                Search official news, documents, events, pages, videos, leadership profiles, and site announcements.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        .search-page-form .form-control {
            border-right: 0;
        }

        .search-page-form .btn {
            min-width: 140px;
        }

        .search-result-item {
            text-decoration: none;
        }

        .result-card {
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 0.75rem;
            background: #fff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .search-result-item:hover .result-card {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
        }

        .result-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            flex-shrink: 0;
        }

        .search-source-pills {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
@endsection
