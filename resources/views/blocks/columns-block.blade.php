@php
    $colClass = match ($columns) {
        3 => 'col-md-4',
        default => 'col-md-6',
    };
@endphp

<div class="row my-4">
    @foreach ($content as $column)
        <div class="{{ $colClass }}">
            {!! $column['html'] !!}
        </div>
    @endforeach
</div>
