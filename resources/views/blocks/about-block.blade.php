@php
    $logo = $logo ?? null;
    $description = $description ?? '';
    $socials = $social_links ?? [];
@endphp

@if ($logo)
    <img loading="lazy" width="200" class="footer-logo mb-3" src="{{ asset('storage/' . $logo) }}" alt="Logo">
@endif

<p class="text-light" style="text-align: justify; line-height: 1.6;">{{ $description }}</p>

@if (!empty($socials))
    <div class="footer-social mt-4">
        <ul class="list-inline">
            @foreach ($socials as $social)
                <li class="list-inline-item">
                    <a href="{{ $social['url'] }}" target="_blank" class="text-white" aria-label="Social Link">
                        <i class="{{ $social['icon'] }} fa-lg"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
