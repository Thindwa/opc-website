@php
    $design = $design ?? 'design1';
    $slides = $slides ?? [];
@endphp

<div class="banner-carousel banner-carousel-1 mb-0 slider-{{ $design }}">
    @foreach($slides as $slide)
        @if($design === 'design1')
            {{-- DESIGN 1: Side-by-Side (Text Left, Image Right) --}}
            <div class="banner-carousel-item">
                @if (!empty($slide['title']) || !empty($slide['subtitle']) || (!empty($slide['button_link']) && !empty($slide['button_text'])))
                <div class="slider-caption-container">
                    <div class="container">
                        <div class="text-content">
                            @if (!empty($slide['title']))
                                <h2 class="slide-title" data-animation-in="slideInDown">{{ $slide['title'] }}</h2>
                            @endif
                            @if (!empty($slide['subtitle']))
                                <p class="slide-title slide-subtitle" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                            @endif
                            @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                                <p data-animation-in="slideInRight">
                                    <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <div class="slider-image-wrapper">
                    <img src="{{ asset('storage/' . $slide['image']) }}" alt="{{ $slide['title'] ?? 'Slide Image' }}">
                </div>
            </div>

        @elseif($design === 'design2')
            {{-- DESIGN 2: Text Overlay on Image (Left Aligned) --}}
            <div class="banner-carousel-item">
                <div class="slider-image-wrapper">
                    <img src="{{ asset('storage/' . $slide['image']) }}" alt="{{ $slide['title'] ?? 'Slide Image' }}">
                </div>
                @if (!empty($slide['title']) || !empty($slide['subtitle']) || (!empty($slide['button_link']) && !empty($slide['button_text'])))
                <div class="slider-overlay-content">
                    <div class="text-content">
                        @if (!empty($slide['title']))
                            <h2 class="slide-title" data-animation-in="slideInLeft">{{ $slide['title'] }}</h2>
                        @endif
                        @if (!empty($slide['subtitle']))
                            <p class="slide-subtitle" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                        @endif
                        @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                            <p data-animation-in="slideInRight">
                                <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                            </p>
                        @endif
                    </div>
                </div>
                @endif
            </div>

        @elseif($design === 'design3')
            {{-- DESIGN 3: Centered Text Overlay on Image --}}
            <div class="banner-carousel-item">
                <div class="slider-image-wrapper">
                    <img src="{{ asset('storage/' . $slide['image']) }}" alt="{{ $slide['title'] ?? 'Slide Image' }}">
                </div>
                @if (!empty($slide['title']) || !empty($slide['subtitle']) || (!empty($slide['button_link']) && !empty($slide['button_text'])))
                <div class="slider-overlay-content">
                    <div class="text-content">
                        @if (!empty($slide['title']))
                            <h2 class="slide-title" data-animation-in="slideInDown">{{ $slide['title'] }}</h2>
                        @endif
                        @if (!empty($slide['subtitle']))
                            <p class="slide-subtitle" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                        @endif
                        @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                            <p data-animation-in="slideInUp">
                                <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                            </p>
                        @endif
                    </div>
                </div>
                @endif
            </div>

        @elseif($design === 'design4')
            {{-- DESIGN 4: Side-by-Side (Image Left, Text Right) --}}
            <div class="banner-carousel-item">
                <div class="slider-image-wrapper">
                    <img src="{{ asset('storage/' . $slide['image']) }}" alt="{{ $slide['title'] ?? 'Slide Image' }}">
                </div>
                @if (!empty($slide['title']) || !empty($slide['subtitle']) || (!empty($slide['button_link']) && !empty($slide['button_text'])))
                <div class="slider-caption-container">
                    <div class="container">
                        <div class="text-content">
                            @if (!empty($slide['title']))
                                <h2 class="slide-title" data-animation-in="slideInRight">{{ $slide['title'] }}</h2>
                            @endif
                            @if (!empty($slide['subtitle']))
                                <p class="slide-title slide-subtitle" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                            @endif
                            @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                                <p data-animation-in="slideInLeft">
                                    <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>

        @elseif($design === 'design5')
            {{-- DESIGN 5: Full-Width Image with Text Below --}}
            <div class="banner-carousel-item">
                <div class="slider-image-wrapper">
                    <img src="{{ asset('storage/' . $slide['image']) }}" alt="{{ $slide['title'] ?? 'Slide Image' }}">
                </div>
                @if (!empty($slide['title']) || !empty($slide['subtitle']) || (!empty($slide['button_link']) && !empty($slide['button_text'])))
                <div class="slider-caption-container">
                    <div class="container">
                        <div class="text-content">
                            @if (!empty($slide['title']))
                                <h2 class="slide-title" data-animation-in="slideInDown">{{ $slide['title'] }}</h2>
                            @endif
                            @if (!empty($slide['subtitle']))
                                <p class="slide-title slide-subtitle" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                            @endif
                            @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                                <p data-animation-in="slideInUp">
                                    <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @endif
    @endforeach
</div>
