@php
    $popup = $siteAnnouncementPopup ?? null;
    $placement = $popup['placement'] ?? 'popup';
@endphp

@if (!empty($popup))
    @if ($placement === 'banner')
        <div
            id="siteAnnouncementBanner"
            class="site-announcement site-announcement-banner alert alert-{{ $popup['style'] ?? 'warning' }} m-0 rounded-0 border-0"
            role="status"
            style="display:none;"
        >
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between py-2">
                    <div class="d-flex align-items-start align-items-md-center mr-md-3 mb-2 mb-md-0">
                        @if (!empty($popup['badge']))
                            <span class="badge badge-light text-uppercase mr-3 px-2 py-1">{{ $popup['badge'] }}</span>
                        @endif
                        <div>
                            <div class="font-weight-bold line-clamp-1">{{ $popup['title'] ?? 'Official update' }}</div>
                            <div class="small text-white-75 line-clamp-2">{{ $popup['message'] ?? '' }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center flex-wrap">
                        @if(!empty($popup['cta_url']) && !empty($popup['cta_label']))
                            <a
                                href="{{ $popup['cta_url'] }}"
                                class="btn btn-sm btn-light mr-2 mb-2 mb-md-0"
                                @if(!empty($popup['cta_target_blank'])) target="_blank" rel="noopener noreferrer" @endif
                            >
                                {{ $popup['cta_label'] }}
                            </a>
                        @endif

                        @if(($popup['is_dismissible'] ?? true))
                            <button type="button" class="btn btn-sm btn-outline-light js-announcement-dismiss">
                                Close
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif ($placement === 'slide_in')
        <div
            id="siteAnnouncementSlideIn"
            class="site-announcement site-announcement-slide-in card border-0 shadow-lg"
            role="dialog"
            aria-live="polite"
            aria-label="Site announcement"
            style="display:none;"
        >
            @if (!empty($popup['image']))
                <div class="site-announcement-image" style="background-image: url('{{ $popup['image'] }}');"></div>
            @endif
            <div class="card-header bg-{{ $popup['style'] ?? 'warning' }} text-white border-0 d-flex align-items-start justify-content-between">
                <div class="pr-3">
                    <div class="small text-uppercase font-weight-bold opacity-75">{{ $popup['badge'] ?? 'Official notice' }}</div>
                    <h5 class="mb-0">{{ $popup['title'] ?? 'New update available' }}</h5>
                </div>

                @if(($popup['is_dismissible'] ?? true))
                    <button type="button" class="close text-white js-announcement-dismiss" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                @endif
            </div>

            <div class="card-body">
                <p class="mb-3">{{ $popup['message'] ?? '' }}</p>

                <div class="d-flex flex-wrap align-items-center">
                    @if(!empty($popup['cta_url']) && !empty($popup['cta_label']))
                        <a
                            href="{{ $popup['cta_url'] }}"
                            class="btn btn-{{ $popup['style'] ?? 'warning' }} btn-sm mr-2 mb-2"
                            @if(!empty($popup['cta_target_blank'])) target="_blank" rel="noopener noreferrer" @endif
                        >
                            {{ $popup['cta_label'] }}
                        </a>
                    @endif

                    @if(!empty($popup['secondary_cta_url']) && !empty($popup['secondary_cta_label']))
                        <a href="{{ $popup['secondary_cta_url'] }}" class="btn btn-outline-secondary btn-sm mr-2 mb-2">
                            {{ $popup['secondary_cta_label'] }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="siteAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="siteAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-{{ $popup['style'] ?? 'primary' }} text-white">
                        <div>
                            <div class="small text-uppercase font-weight-bold opacity-75">
                                {{ $popup['badge'] ?? 'Important update' }}
                            </div>
                            <h5 class="modal-title mb-0" id="siteAnnouncementModalLabel">
                                {{ $popup['title'] ?? 'Official notice' }}
                            </h5>
                        </div>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="row no-gutters">
                            @if (!empty($popup['image']))
                                <div class="col-md-5 popup-visual" style="background-image: url('{{ $popup['image'] }}');"></div>
                            @endif
                            <div class="{{ !empty($popup['image']) ? 'col-md-7' : 'col-12' }}">
                                <div class="p-4">
                                    <p class="text-muted text-uppercase small mb-2">{{ $popup['badge'] ?? 'Official notice' }}</p>
                                    <h4 class="mb-3">{{ $popup['title'] ?? 'New update available' }}</h4>
                                    <p class="mb-4">{{ $popup['message'] ?? '' }}</p>

                                    <div class="d-flex flex-wrap align-items-center">
                                        @if(!empty($popup['cta_url']) && !empty($popup['cta_label']))
                                            <a
                                                href="{{ $popup['cta_url'] }}"
                                                class="btn btn-{{ $popup['style'] ?? 'primary' }} mr-2 mb-2"
                                                @if(!empty($popup['cta_target_blank'])) target="_blank" rel="noopener noreferrer" @endif
                                            >
                                                {{ $popup['cta_label'] }}
                                            </a>
                                        @endif

                                        @if(!empty($popup['secondary_cta_url']) && !empty($popup['secondary_cta_label']))
                                            <a href="{{ $popup['secondary_cta_url'] }}" class="btn btn-outline-secondary mr-2 mb-2">
                                                {{ $popup['secondary_cta_label'] }}
                                            </a>
                                        @endif

                                        @if(($popup['is_dismissible'] ?? true))
                                            <button type="button" class="btn btn-light mb-2 js-announcement-dismiss">
                                                Dismiss
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

<script>
(function () {
    const alertPopup = @json($popup);
    const placement = (alertPopup && alertPopup.placement) ? alertPopup.placement : 'popup';
    const popupModal = document.getElementById('siteAnnouncementModal');
    const banner = document.getElementById('siteAnnouncementBanner');
    const slideIn = document.getElementById('siteAnnouncementSlideIn');

    const storage = alertPopup && alertPopup.show_once_per_session ? window.sessionStorage : window.localStorage;

    if (!alertPopup || !storage) {
        return;
    }

    const storageKey = alertPopup.storage_key || 'opc_popup_seen';
    const cooldownMinutes = Number(alertPopup.dismiss_for_hours || 12) * 60;
    const existing = storage.getItem(storageKey);

    const markSeen = function () {
        storage.setItem(storageKey, JSON.stringify({
            id: alertPopup.id,
            seen_at: Date.now(),
            placement: placement
        }));
    };

    let shouldShow = true;

    if (existing) {
        try {
            const record = JSON.parse(existing);
            const sameId = record && record.id === alertPopup.id;
            const ageMinutes = record && record.seen_at ? (Date.now() - record.seen_at) / 60000 : Infinity;

            if (sameId && alertPopup.show_once_per_session) {
                shouldShow = false;
            } else {
                shouldShow = !(sameId && ageMinutes < cooldownMinutes);
            }
        } catch (error) {
            shouldShow = true;
        }
    }

    const hideAnnouncement = function () {
        if (banner) {
            banner.style.display = 'none';
        }

        if (slideIn) {
            slideIn.classList.remove('is-visible');
            window.setTimeout(function () {
                slideIn.style.display = 'none';
            }, 250);
        }

        if (document.body) {
            document.body.classList.remove('has-site-announcement-banner');
            document.body.style.paddingTop = '';
        }
    };

    if (!shouldShow) {
        hideAnnouncement();
        return;
    }

    const dismissButtons = document.querySelectorAll('.js-announcement-dismiss');
    dismissButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            markSeen();
            hideAnnouncement();

            if (popupModal && window.jQuery && typeof window.jQuery(popupModal).modal === 'function') {
                window.jQuery(popupModal).modal('hide');
            }
        });
    });

    if (placement === 'banner') {
        if (banner) {
            banner.style.display = 'block';
            if (document.body) {
                document.body.classList.add('has-site-announcement-banner');
                document.body.style.paddingTop = banner.offsetHeight + 'px';
            }
            markSeen();
        }
        return;
    }

    if (placement === 'slide_in') {
        if (slideIn) {
            slideIn.style.display = 'block';
            window.setTimeout(function () {
                slideIn.classList.add('is-visible');
            }, 150);
            markSeen();
        }
        return;
    }

    if (popupModal && window.jQuery) {
        window.setTimeout(function () {
            if (typeof window.jQuery(popupModal).modal === 'function') {
                window.jQuery(popupModal).modal('show');
            }
        }, 900);

        window.jQuery(popupModal).on('hidden.bs.modal', function () {
            markSeen();
        });
    }
})();
</script>

<style>
    .site-announcement-banner {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1050;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .site-announcement-banner .line-clamp-1,
    .site-announcement-banner .line-clamp-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .site-announcement-banner .line-clamp-1 {
        -webkit-line-clamp: 1;
    }

    .site-announcement-banner .line-clamp-2 {
        -webkit-line-clamp: 2;
    }

    .site-announcement-slide-in {
        position: fixed;
        right: 18px;
        bottom: 18px;
        z-index: 1060;
        width: min(420px, calc(100vw - 32px));
        border-radius: 1rem;
        overflow: hidden;
        transform: translateY(24px) scale(0.98);
        opacity: 0;
        transition: transform 0.25s ease, opacity 0.25s ease;
    }

    .site-announcement-slide-in.is-visible {
        transform: translateY(0) scale(1);
        opacity: 1;
    }

    .site-announcement-image {
        min-height: 180px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .popup-visual {
        min-height: 260px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .site-announcement .opacity-75 {
        opacity: 0.75;
    }

    .search-suggestion-item {
        padding: 0.6rem 0.75rem;
        border-radius: 0.4rem;
        background: rgba(255, 255, 255, 0.05);
        transition: background-color 0.2s ease, transform 0.2s ease;
        text-decoration: none;
    }

    .search-suggestion-item:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-1px);
        text-decoration: none;
    }

    .search-suggestions {
        max-height: 320px;
        overflow-y: auto;
    }
</style>
