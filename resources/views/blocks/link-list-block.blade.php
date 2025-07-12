<div class="footer-widget mb-4">
    <h3 class="widget-title text-white mb-4">{{ $title ?? 'Useful Links' }}</h3>
    <ul class="list-unstyled">
        @foreach($links ?? [] as $link)
            <li class="mb-2">
                <a href="{{ $link['url'] }}" class="text-light" target="_blank">
                    <i class="fas fa-chevron-right mr-2 text-success"></i> {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
