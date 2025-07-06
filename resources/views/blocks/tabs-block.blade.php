@php $tabId = 'tabs-' . Str::uuid(); @endphp

<ul class="nav nav-tabs" id="{{ $tabId }}" role="tablist">
    @foreach ($tabs as $i => $tab)
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($i === 0) active @endif"
                id="tab-{{ $i }}" data-bs-toggle="tab"
                data-bs-target="#content-{{ $i }}" type="button" role="tab">
                {{ $tab['title'] }}
            </button>
        </li>
    @endforeach
</ul>

<div class="tab-content mt-3">
    @foreach ($tabs as $i => $tab)
        <div class="tab-pane fade @if($i === 0) show active @endif"
            id="content-{{ $i }}" role="tabpanel">
            {{ $tab['content'] }}
        </div>
    @endforeach
</div>
