@php
    $activeId = $tabs[0]['id'] ?? '';
@endphp

<div class="row">
    <!-- Tab menu -->
    <div class="col-md-4 mb-4">
        <ul class="nav flex-column nav-pills" id="section-tabs-{{ uniqid() }}" role="tablist" aria-orientation="vertical">
            @foreach($tabs as $index => $tab)
                <li class="nav-item">
                    <a
                        class="nav-link {{ $index === 0 ? 'active' : '' }}"
                        id="tab-{{ $tab['id'] }}"
                        data-bs-toggle="pill"
                        href="#content-{{ $tab['id'] }}"
                        role="tab"
                        aria-controls="content-{{ $tab['id'] }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    >
                        {{ $tab['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Tab content -->
    <div class="col-md-8">
        <div class="tab-content">
            @foreach($tabs as $index => $tab)
                <div
                    class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                    id="content-{{ $tab['id'] }}"
                    role="tabpanel"
                    aria-labelledby="tab-{{ $tab['id'] }}"
                >
                {!! \App\Helpers\RenderBlocksHelper::render($tab['content']) !!}
                </div>
            @endforeach
        </div>
    </div>
</div>
