<section class="call-to-action-box no-padding">
    <div class="container">
      <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
            <div class="call-to-action-text">
              <h3 class="action-title">Profile of H.E. {{ $name ?? '' }}</h3>
            </div>
          </div>
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
            <div class="call-to-action-btn">
              <a class="btn btn-light" href="{{route('profile')}}">View Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="ts-features py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="minister-image text-center">
                    <img src="{{ asset('storage/' . ($image ?? '')) }}" alt="President" class="img-fluid rounded shadow">
                    <h4 class="mt-3">His Excellency</h4>
                    <div class="minister-details">
                        <span class="d-block font-weight-bold">{{ $name ?? '' }}</span>
                        <span>President of the Republic of Malawi</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-4 mt-lg-0">
                <div class="ts-intro">
                    <h3>{{ $heading ?? '' }}</h3>
                    <p>{{ $content ?? '' }}</p>
                </div>

                @if (!empty($accordion_items))
                    <div class="accordion accordion-group mt-4" id="home-values-accordion">
                        @foreach ($accordion_items as $i => $item)
                            @php
                                $title = $item['title'] ?? '';
                                $body = $item['body'] ?? '';
                                $collapseId = 'collapse' . $i;
                            @endphp

                            <div class="card mb-2">
                                <div class="card-header p-0 bg-transparent" id="heading{{ $i }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left d-flex justify-content-between align-items-center {{ $i > 0 ? 'collapsed' : '' }}"
                                                type="button"
                                                data-toggle="collapse"
                                                data-target="#{{ $collapseId }}"
                                                aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                                aria-controls="{{ $collapseId }}">
                                            <span>{{ $title }}</span>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="{{ $collapseId }}"
                                     class="collapse {{ $i === 0 ? 'show' : '' }}"
                                     aria-labelledby="heading{{ $i }}"
                                     data-parent="#home-values-accordion">
                                    <div class="card-body">
                                        {!! nl2br(e($body)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
