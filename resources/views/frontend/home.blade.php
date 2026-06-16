@extends('layouts.frontend')

@section('content')
    @php
        $featuredNews = collect($featuredNews ?? []);
        $latestNews = collect($latestNews ?? []);
        $homeBlocks = collect($blocks ?? []);
        $primaryHomeBlock = $homeBlocks->take(1);
        $secondaryHomeBlocks = $homeBlocks->slice(1)->values();
    @endphp

    <section class="home-hero-wrap">
        @include('partials.frontslider', ['featuredNews' => $featuredNews])
    </section>

    @if ($primaryHomeBlock->isNotEmpty())
        <section class="home-blocks section-padding">
            <div class="container">
                {!! \App\Helpers\RenderBlocksHelper::render($primaryHomeBlock->all()) !!}
            </div>
        </section>
    @endif

    <section class="latest-news-section section-padding">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <p class="eyebrow mb-2">Office of the President and Cabinet</p>
                <h2 class="section-title mb-2">Latest News Updates</h2>
                <p class="section-subtitle mx-auto">
                    Recent updates, public announcements, and official stories from the Office of the President and Cabinet.
                </p>
            </div>

            <div class="row">
                @forelse ($latestNews as $news)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="latest-news-card h-100">
                            <a href="{{ route('singlenews', $news->slug) }}" class="latest-news-image d-block">
                                <img
                                    src="{{ $news->image ? asset('storage/' . $news->image) : asset('frontendassets/images/default.jpg') }}"
                                    alt="{{ $news->title }}"
                                >
                            </a>
                            <div class="latest-news-body">
                                <div class="news-meta mb-2">
                                    <span><i class="far fa-calendar-alt mr-1"></i>{{ optional($news->created_at)->format('d M, Y') }}</span>
                                </div>
                                <h3 class="latest-news-title">
                                    <a href="{{ route('singlenews', $news->slug) }}">{{ $news->title }}</a>
                                </h3>
                                <p class="latest-news-excerpt mb-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($news->description ?? ''), 135) }}
                                </p>
                                <a href="{{ route('singlenews', $news->slug) }}" class="latest-news-link">
                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center py-5 mb-0">
                            No news items available yet.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @if ($secondaryHomeBlocks->isNotEmpty())
        <section class="home-blocks section-padding pt-0">
            <div class="container">
                {!! \App\Helpers\RenderBlocksHelper::render($secondaryHomeBlocks->all()) !!}
            </div>
        </section>
    @endif

    <style>
        .home-hero-wrap {
            background: #fff;
            margin-top: 0;
            padding-top: 0;
            line-height: 0;
        }

        .home-hero-wrap .banner-carousel,
        .home-hero-wrap .opc-news-carousel,
        .home-hero-wrap .banner-carousel .banner-carousel-item {
            margin-top: 0 !important;
            padding-top: 0;
        }

        .home-blocks {
            background: #fff;
        }

        .home-blocks.section-padding {
            padding-top: 36px;
            padding-bottom: 36px;
        }

        .home-blocks .ts-features.py-5 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-bottom: 0;
        }

        .latest-news-section {
            background: #f7f7f5;
            padding-top: 36px;
            padding-bottom: 48px;
        }

        .home-blocks + .latest-news-section {
            margin-top: 0;
        }

        .section-heading .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #111;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-size: 0.78rem;
        }

        .section-heading .eyebrow::before,
        .section-heading .eyebrow::after {
            content: '';
            width: 36px;
            height: 2px;
            background: #111;
        }

        .latest-news-section .section-title {
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 800;
            color: #222;
        }

        .section-subtitle {
            max-width: 720px;
            color: #666;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .latest-news-card {
            background: #fff;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .latest-news-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 48px rgba(0, 0, 0, 0.12);
        }

        .latest-news-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .latest-news-body {
            padding: 1.35rem 1.4rem 1.5rem;
            border-left: 4px solid #111;
        }

        .news-meta {
            font-size: 0.85rem;
            color: #666;
            font-weight: 600;
        }

        .latest-news-title {
            font-size: 1.12rem;
            font-weight: 800;
            line-height: 1.35;
            margin-bottom: 0.85rem;
        }

        .latest-news-title a {
            color: #1f1f1f;
        }

        .latest-news-excerpt {
            color: #666;
            line-height: 1.7;
            margin-bottom: 0;
        }

        .latest-news-link {
            display: inline-flex;
            align-items: center;
            margin-top: 0.85rem;
            color: #a11f1d;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-size: 0.8rem;
        }

        .latest-news-link:hover {
            color: #7f1715;
            text-decoration: none;
        }

        @media (max-width: 991px) {
            .home-blocks.section-padding,
            .latest-news-section {
                padding-top: 28px;
                padding-bottom: 36px;
            }

            .latest-news-image img {
                height: 220px;
            }
        }

        @media (max-width: 575px) {
            .section-heading .eyebrow::before,
            .section-heading .eyebrow::after {
                width: 22px;
            }

            .latest-news-body {
                padding: 1.1rem 1rem 1.2rem;
            }

            .latest-news-image img {
                height: 200px;
            }
        }
    </style>
@endsection
