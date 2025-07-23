

<div class="banner-carousel banner-carousel-1 mb-0">
    @foreach($slides as $slide)
      <div class="banner-carousel-item" style="background-image:url('{{ asset('storage/' . $slide['image']) }}')">
        <div class="slider-content text-left">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                @if (!empty($slide['title']))
                  <h2 class="slide-title" data-animation-in="slideInDown">{{ $slide['title'] }}</h2>
                @endif

                @if (!empty($slide['subtitle']))
                  <p class="slide-title" data-animation-in="fadeIn">{{ $slide['subtitle'] }}</p>
                @endif

                @if (!empty($slide['button_link']) && !empty($slide['button_text']))
                  <p data-animation-in="slideInRight">
                    <a href="{{ $slide['button_link'] }}" class="slider btn btn-primary border">{{ $slide['button_text'] }}</a>
                  </p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
