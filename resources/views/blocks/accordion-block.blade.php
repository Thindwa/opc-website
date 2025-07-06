<div class="accordion my-4" id="accordion-{{ Str::uuid() }}">
    @foreach ($items as $index => $item)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}">
                    {{ $item['title'] }}
                </button>
            </h2>
            <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse">
                <div class="accordion-body">
                    {{ $item['content'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
