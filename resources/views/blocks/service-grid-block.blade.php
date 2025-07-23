<section id="main-container" class="main-container">
    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">
        <h3 class="section-sub-title pb-0 mb-0">{{ $title ?? 'Office of President and Cabinet' }}</h3>
        <h3 class="section-title pb-4">{{ $subtitle ?? 'Overviews' }}</h3>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach ($cards as $card)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{ asset('storage/' . $card['image']) }}" alt="{{ $card['title'] }}">
              </div>
              <div class="d-flex">
                <div class="ts-service-info p-3">
                  <h3 class="service-box-title">
                    <a href="{{ $card['link'] ?? '#' }}">{{ $card['title'] }}</a>
                  </h3>
                  <p class="text-justify">{{ $card['description'] }}</p>
                  <a class="learn-more d-inline-block" href="{{ $card['link'] ?? '#' }}">
                    <i class="fa fa-caret-right"></i> Read more
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
