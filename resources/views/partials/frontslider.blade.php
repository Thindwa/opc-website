@php
    $featuredNews = collect($featuredNews ?? []);
    $fallbackSlides = [
        [
            'image' => asset('frontendassets/images/slider-main/bg10.jpg'),
            'title' => 'Welcome to the Office of the President and Cabinet',
            'excerpt' => 'Official updates, leadership messages, and national priorities.',
            'url' => route('frontend.home'),
        ],
        [
            'image' => asset('frontendassets/images/slider-main/bg20a.jpg'),
            'title' => 'Public service updates and official notices',
            'excerpt' => 'Stay informed with announcements, circulars, and featured government news.',
            'url' => route('news'),
        ],
        [
            'image' => asset('frontendassets/images/slider-main/proj.jpg'),
            'title' => 'News, circulars, and event highlights in one place',
            'excerpt' => 'A central hub for essential content across the website.',
            'url' => route('documents'),
        ],
    ];
@endphp

<div class="banner-carousel banner-carousel-1 mb-0 opc-news-carousel">
    @forelse ($featuredNews as $news)
        <div class="banner-carousel-item opc-slide">
            <div class="slide-media">
                <img
                    src="{{ $news->image ? asset('storage/' . $news->image) : asset('frontendassets/images/default.jpg') }}"
                    alt="{{ $news->title }}"
                >
            </div>
            <div class="slider-overlay"></div>
            <div class="slider-content text-left">
                <div class="container h-100">
                    <div class="row align-items-end h-100">
                        <div class="col-12">
                            <div class="slide-title-bar">
                                <h2 class="slide-title" data-animation-in="fadeInUp">{{ $news->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        @foreach ($fallbackSlides as $slide)
            <div class="banner-carousel-item opc-slide">
                <div class="slide-media">
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}">
                </div>
                <div class="slider-overlay"></div>
                <div class="slider-content text-left">
                    <div class="container h-100">
                        <div class="row align-items-end h-100">
                            <div class="col-12">
                                <div class="slide-title-bar">
                                    <h2 class="slide-title" data-animation-in="fadeInUp">{{ $slide['title'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>

<style>
    .opc-news-carousel .opc-slide {
        position: relative;
        min-height: clamp(420px, 70vh, 760px);
        background: #111;
        overflow: hidden;
    }

    .opc-news-carousel .slide-media {
        position: absolute;
        inset: 0;
        z-index: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #111;
    }

    .opc-news-carousel .slide-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        display: block;
    }

    .opc-news-carousel .slider-overlay {
        position: absolute;
        inset: 0;
        z-index: 1;
        background:
            linear-gradient(90deg, rgba(0, 0, 0, 0.48) 0%, rgba(0, 0, 0, 0.16) 45%, rgba(0, 0, 0, 0) 100%),
            linear-gradient(0deg, rgba(0, 0, 0, 0.18), rgba(0, 0, 0, 0.18));
    }

    .opc-news-carousel .slider-content {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        align-items: end;
        padding: clamp(1.25rem, 3vw, 2rem) 0;
    }

    .opc-news-carousel .slide-title {
        color: #fff;
        font-size: clamp(1.5rem, 2.6vw, 2.6rem);
        font-weight: 800;
        line-height: 1.15;
        text-transform: uppercase;
        margin: 0;
    }

    .opc-news-carousel .slide-title-bar {
        display: inline-block;
        background: rgba(0, 0, 0, 0.55);
        padding: 0.9rem 1.1rem;
        max-width: min(100%, 980px);
    }

    .opc-news-carousel .slide-title-bar .slide-title {
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
    }

    @media (max-width: 767px) {
        .opc-news-carousel .opc-slide {
            min-height: 520px;
        }

        .opc-news-carousel .slide-title-bar {
            padding: 0.8rem 0.9rem;
        }
    }
</style>
