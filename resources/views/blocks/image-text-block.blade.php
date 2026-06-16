<section class="ts-features py-5">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-4 d-flex">
                <div class="minister-image text-center w-100">
                    <img src="{{ asset('storage/' . ($image ?? '')) }}" alt="President" class="img-fluid rounded shadow">
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

<style>
    .ts-features .minister-image {
        display: flex;
        height: 100%;
    }

    .ts-features .minister-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    @media (max-width: 991px) {
        .ts-features .minister-image {
            display: block;
            height: auto;
        }

        .ts-features .minister-image img {
            height: auto;
        }
    }
</style>
