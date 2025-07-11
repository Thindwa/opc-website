

<div class="content-card card mb-4 shadow-sm">
    <div class="card-body">
        @if($title)
            <h2 class="content-title" style="font-size: 1.3rem;">
                @if($icon)
                    <i class="{{ $icon }} mr-2" style="color: #d9534f;"></i>
                @endif
                {{ $title }}
            </h2>
            <div class="content-divider" style="background: #d9534f;"></div>
        @endif
        {!! \App\Helpers\RenderBlocksHelper::render($content ?? []) !!}
    </div>
</div>

