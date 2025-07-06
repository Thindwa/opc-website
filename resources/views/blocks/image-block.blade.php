@php
    $imagePath = $image ? asset('storage/' . $image) : null;
@endphp

@if($imagePath)
    <figure class="text-center my-4">
        <img src="{{ $imagePath }}" alt="{{ $alt ?? '' }}" class="img-fluid rounded shadow-sm">

        @if (!empty($caption))
            <figcaption class="mt-2 text-muted small">
                {!! nl2br(e($caption)) !!}
            </figcaption>
        @endif
    </figure>
@endif
