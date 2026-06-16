@php
    $documentBuckets = [
        [
            'title' => 'Press Releases',
            'categories' => ['Press-Releases'],
            'link' => route('documents', ['category' => 'press-releases']),
        ],
        [
            'title' => 'Circulars',
            'categories' => ['Circulars'],
            'link' => route('documents', ['category' => 'circulars']),
        ],
        [
            'title' => 'Policies',
            'categories' => ['Policies'],
            'link' => route('documents', ['category' => 'policies']),
        ],
    ];

    $allDocuments = \App\Models\Document::query()->latest()->get();
@endphp

<section class="ts-features py-5 bg-light vision-circulars-section">
    <div class="container-fluid vision-docs-fluid">
        <div class="section-heading text-center mb-5">
            <p class="vision-eyebrow mb-2">Official Documents</p>
            <h2 class="vision-section-title mb-2">Press Releases, Circulars and Policies</h2>
            <p class="vision-section-subtitle mx-auto">
                Browse recent official documents from the Office of the President and Cabinet, organized by category for quicker access.
            </p>
        </div>

        <div class="vision-doc-grid">
            @foreach ($documentBuckets as $bucket)
                @php
                    $items = $allDocuments
                        ->whereIn('category_type', $bucket['categories'])
                        ->flatMap(function ($document) {
                            $files = collect($document->files ?? []);

                            if ($files->isEmpty()) {
                                return [[
                                    'name' => $document->category_type,
                                    'path' => '',
                                    'document' => $document,
                                    'date' => optional($document->created_at)?->format('d M, Y'),
                                ]];
                            }

                            return $files->map(function ($file) use ($document) {
                                return [
                                    'name' => pathinfo((string) $file, PATHINFO_FILENAME),
                                    'path' => (string) $file,
                                    'document' => $document,
                                    'date' => optional($document->created_at)?->format('d M, Y'),
                                ];
                            });
                        })
                        ->filter(fn ($file) => filled($file['name']))
                        ->take(2)
                        ->values();
                @endphp

                <article class="vision-doc-card">
                    <h3 class="vision-panel-title">{{ $bucket['title'] }}</h3>

                    @if ($items->isNotEmpty())
                        <div class="vision-circular-list">
                            @foreach ($items as $item)
                                <article class="vision-circular-item">
                                    <div class="vision-circular-icon">
                                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="vision-circular-copy">
                                        <h4>{{ $item['name'] }}</h4>
                                        @if (!empty($item['date']))
                                            <div class="vision-circular-date">{{ $item['date'] }}</div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <a href="{{ $bucket['link'] }}" class="vision-doc-link">
                                <i class="fas fa-file-alt mr-1"></i> View All {{ $bucket['title'] }}
                            </a>
                        </div>
                    @else
                        <div class="vision-empty-state">
                            No {{ strtolower($bucket['title']) }} available yet.
                        </div>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>

<style>
    .vision-circulars-section .vision-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: #111;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        font-size: 0.78rem;
    }

    .vision-circulars-section .vision-eyebrow::before,
    .vision-circulars-section .vision-eyebrow::after {
        content: '';
        width: 36px;
        height: 2px;
        background: #111;
    }

    .vision-circulars-section .vision-docs-fluid {
        width: 100%;
        max-width: 100%;
        padding-left: 48px;
        padding-right: 48px;
    }

    .vision-circulars-section .vision-section-title {
        font-size: clamp(2rem, 3.7vw, 2.9rem);
        font-weight: 800;
        color: #222;
        line-height: 1.08;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .vision-circulars-section .vision-section-subtitle {
        max-width: 720px;
        color: #666;
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .vision-circulars-section .vision-doc-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 28px;
        align-items: start;
    }

    .vision-circulars-section .vision-doc-card {
        background: #fff;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.35rem 1.4rem 1.5rem;
        border-left: 4px solid #111;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        min-width: 0;
    }

    .vision-circulars-section .vision-doc-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 48px rgba(0, 0, 0, 0.12);
    }

    .vision-circulars-section .vision-panel-title {
        color: #1f1f1f;
        font-size: 1.4rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        line-height: 1.15;
    }

    .vision-circulars-section .vision-circular-list {
        display: grid;
        gap: 0.9rem;
    }

    .vision-circulars-section .vision-circular-item {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1rem 1rem 0.9rem;
        background: #fafcfb;
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
    }

    .vision-circulars-section .vision-circular-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: rgba(47, 143, 58, 0.12);
        color: #2f8f3a;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 38px;
        font-size: 1rem;
    }

    .vision-circulars-section .vision-circular-copy {
        min-width: 0;
        flex: 1 1 auto;
    }

    .vision-circulars-section .vision-circular-item h4 {
        margin: 0 0 0.35rem;
        font-size: 1rem;
        font-weight: 800;
        color: #222;
        text-transform: none;
        line-height: 1.4;
        white-space: normal;
        overflow-wrap: anywhere;
        word-break: break-word;
        max-width: 100%;
    }

    .vision-circulars-section .vision-circular-date {
        margin-top: 0.5rem;
        font-size: 0.82rem;
        color: #666;
        font-weight: 600;
    }

    .vision-circulars-section .vision-empty-state {
        border: 1px dashed #c8d7cb;
        border-radius: 8px;
        padding: 1.2rem;
        color: #666;
        background: #fafcfb;
        min-height: 82px;
    }

    .vision-circulars-section .vision-doc-link {
        display: inline-flex;
        align-items: center;
        color: #a11f1d;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        font-size: 0.8rem;
    }

    .vision-circulars-section .vision-doc-link:hover {
        color: #7f1715;
        text-decoration: none;
    }

    @media (max-width: 991px) {
        .vision-circulars-section .vision-doc-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575px) {
        .vision-circulars-section .vision-doc-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .vision-circulars-section .vision-docs-fluid {
            padding-left: 18px;
            padding-right: 18px;
        }

        .vision-circulars-section .vision-section-title {
            line-height: 1.1;
        }

        .vision-circulars-section .vision-eyebrow::before,
        .vision-circulars-section .vision-eyebrow::after {
            width: 22px;
        }
    }
</style>
