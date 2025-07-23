<section class="ts-features py-5 bg-light">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-7">
          <div class="vision-image-container text-center p-3"
               style="background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border: 1px solid rgba(40, 167, 69, 0.3); height: 100%;">
            <h3 class="fw-bold mb-3 text-success">MALAWI VISION 2063</h3>
            <div style="height: calc(100% - 50px); display: flex; align-items: center; justify-content: center;">
              <img src="{{ asset('storage/' . $image) }}"
                   alt="Malawi Vision"
                   class="rounded shadow"
                   style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
          </div>
        </div>

        <div class="col-lg-5 mt-4 mt-lg-0">
          <div class="ts-intro">
            <h2 class="into-title mb-4 text-left">{{ $title }}</h2>

            <ol class="custom-list pl-3" style="line-height: 1.8;">
              @foreach ($bullets as $bullet)
                <li class="mb-2">{{ $bullet['text'] ?? '' }}</li>
              @endforeach
            </ol>
             {{-- ✅ Add this read more button --}}
          <div class="mt-4">
            <a href="{{ route('documents') }}#policies" class="btn btn-success">
              <i class="fas fa-file-alt mr-1"></i> View Related Policies
            </a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
