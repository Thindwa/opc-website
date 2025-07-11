@php
    $listItems = preg_split('/\r\n|\r|\n/', $items ?? '');
    $tag = $type ?? 'ul';
    $styleMap = [
        'disc' => 'list-disc',
        'circle' => 'list-[circle]',
        'square' => 'list-[square]',
        'decimal' => 'list-decimal',
        'roman' => 'list-[lower-roman]',
        'alpha' => 'list-[lower-alpha]',
    ];
    $bulletClass = $styleMap[$style] ?? 'list-disc';

    $hasIcons = $show_icons ?? false;
    $iconClass = $icon ?? 'bi bi-check-circle';
@endphp

<{{ $tag }} class="{{ $bulletClass }} {{ $alignment ?? '' }} {{ $class ?? '' }} ps-4">
    @foreach ($listItems as $item)
        @if (!empty(trim($item)))
            <li class="list-group-item">
                @if($hasIcons)
                    <i class="{{ $iconClass }} mx-3"></i>
                @endif
                <span>{{ $item }}</span>
            </li>
        @endif
    @endforeach
</{{ $tag }}>
