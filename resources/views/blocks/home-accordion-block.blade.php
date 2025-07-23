<div class="accordion accordion-group" id="our-values-accordion">
    @foreach ($items as $index => $item)
      @php
        $collapseId = 'collapse' . $index;
        $headingId = 'heading' . $index;
      @endphp
      <div class="card mb-2">
        <div class="card-header p-0 bg-transparent" id="{{ $headingId }}">
          <h2 class="mb-0">
            <button class="btn btn-block text-left d-flex justify-content-between align-items-center {{ $index > 0 ? 'collapsed' : '' }}"
                    type="button"
                    data-toggle="collapse"
                    data-target="#{{ $collapseId }}"
                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-controls="{{ $collapseId }}">
              <span>{{ $item['title'] }}</span>
              <i class="fas fa-chevron-down"></i>
            </button>
          </h2>
        </div>
        <div id="{{ $collapseId }}" class="collapse {{ $index === 0 ? 'show' : '' }}" data-parent="#our-values-accordion">
          <div class="card-body">
            {!! nl2br(e($item['body'])) !!}
          </div>
        </div>
      </div>
    @endforeach
  </div>
