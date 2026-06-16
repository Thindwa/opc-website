<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Document;
use App\Models\Event;
use App\Models\Minister;
use App\Models\Dminister;
use App\Models\News;
use App\Models\Page;
use App\Models\SiteAnnouncement;
use App\Models\Video;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class FrontendContentService
{
    /**
     * Search the public site content across the major content sources.
     */
    public function search(string $query, int $limitPerGroup = 5): array
    {
        $query = trim($query);
        $terms = $this->queryTerms($query);
        $strictMode = $this->isStrictQuery($query, $terms);

        if ($query === '') {
            return [
                'query' => '',
                'groups' => [],
                'results' => [],
                'total' => 0,
                'sources' => $this->searchSources(),
            ];
        }

        $results = collect()
            ->merge($this->searchNews($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchDocuments($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchEvents($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchVideos($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchDepartments($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchPages($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchLeadership($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchAnnouncements($query, $terms, $limitPerGroup, $strictMode))
            ->merge($this->searchStaticSitePages($query, $terms, $limitPerGroup, $strictMode))
            ->sortByDesc('score')
            ->when($strictMode, fn (Collection $items) => $items->filter(fn (array $item) => ($item['score'] ?? 0) >= 150))
            ->values();

        $groups = $this->groupResults($results, $limitPerGroup);

        return [
            'query' => $query,
            'groups' => $groups,
            'results' => $results->take(24)->values()->all(),
            'total' => $results->count(),
            'sources' => $this->searchSources(),
        ];
    }

    /**
     * Build the active popup payload selected by admins.
     */
    public function getPopupAnnouncement(): ?array
    {
        $announcement = SiteAnnouncement::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());
            })
            ->orderByDesc('priority')
            ->orderByDesc('starts_at')
            ->orderByDesc('created_at')
            ->first();

        if (! $announcement) {
            return null;
        }

        $isHomePage = request()->routeIs('frontend.home');
        $showOnHomepage = (bool) $announcement->show_on_homepage;
        $showOnAllPages = (bool) $announcement->show_on_all_pages;

        if (! $showOnAllPages && ! ($showOnHomepage && $isHomePage)) {
            return null;
        }

        return [
            'id' => 'announcement-' . $announcement->id,
            'version' => optional($announcement->updated_at ?? $announcement->created_at)->timestamp ?? time(),
            'title' => $announcement->title,
            'badge' => $announcement->badge ?: $this->styleBadge($announcement->style),
            'message' => $announcement->message,
            'image' => $announcement->image ? asset('storage/' . $announcement->image) : null,
            'style' => $announcement->style ?: 'warning',
            'placement' => $announcement->placement ?: 'popup',
            'cta_label' => $announcement->cta_label,
            'cta_url' => $announcement->cta_url,
            'cta_target_blank' => (bool) $announcement->cta_target_blank,
            'secondary_cta_label' => $announcement->secondary_cta_label,
            'secondary_cta_url' => $announcement->secondary_cta_url,
            'dismiss_for_hours' => (int) $announcement->dismiss_for_hours,
            'show_once_per_session' => (bool) $announcement->show_once_per_session,
            'is_dismissible' => (bool) $announcement->is_dismissible,
            'enabled' => true,
            'storage_key' => 'opc_popup_seen_' . $announcement->id . '_' . (optional($announcement->updated_at ?? $announcement->created_at)->timestamp ?? time()),
        ];
    }

    private function searchNews(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        return News::query()
            ->latest()
            ->get()
            ->map(function (News $news) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $news->title,
                ]);
                $blob = $this->normalizeText([
                    $news->title,
                    $news->description,
                    $news->image,
                ]);

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.66)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'News',
                    'icon' => 'fas fa-newspaper',
                    'type' => 'news',
                    'title' => $news->title,
                    'excerpt' => $this->snippet($blob, $query, 160),
                    'url' => route('singlenews', $news->slug),
                    'meta' => optional($news->created_at)->format('F d, Y'),
                    'badge' => 'News',
                    'score' => $this->score($news->title, $news->description, $query, 110),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchDocuments(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        $items = collect();

        Document::query()
            ->latest()
            ->get()
            ->each(function (Document $document) use ($query, $terms, $items, $strictMode) {
                $files = collect($document->files ?? []);
                $fileNames = $files->map(fn (string $file) => pathinfo($file, PATHINFO_FILENAME))->all();

                $files->each(function (string $file) use ($document, $query, $terms, $items, $strictMode) {
                    $fileName = pathinfo($file, PATHINFO_FILENAME);
                    $gateBlob = $this->normalizeText([
                        $fileName,
                    ]);
                    $blob = $this->normalizeText([
                        $document->category_type,
                        $fileName,
                        $file,
                    ]);

                    if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.8)) {
                        return;
                    }

                    $items->push($this->makeResult([
                        'group' => 'Documents',
                        'icon' => 'fas fa-file-alt',
                        'type' => 'document_file',
                        'title' => $this->humanizeFilename($fileName),
                        'excerpt' => $document->category_type ? 'Filed under ' . $document->category_type : 'Official document',
                        'url' => route('documents', ['category' => Str::slug($document->category_type)]),
                        'meta' => 'File name match',
                        'badge' => 'Document',
                        'score' => $this->score($fileName, $document->category_type, $query, 130),
                        'highlight' => $this->highlight($blob, $query),
                    ]));
                });
            });

        return $items->take($limitPerGroup);
    }

    private function searchEvents(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        return Event::query()
            ->orderBy('start_date')
            ->get()
            ->map(function (Event $event) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $event->title,
                    $event->location,
                ]);
                $blob = $this->normalizeText([
                    $event->title,
                    $event->description,
                    $event->location,
                    $event->image,
                ]);

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.75)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'Events',
                    'icon' => 'fas fa-calendar-days',
                    'type' => 'event',
                    'title' => $event->title,
                    'excerpt' => $this->snippet($blob, $query, 150),
                    'url' => route('upcoming'),
                    'meta' => optional($event->start_date)->format('F d, Y'),
                    'badge' => 'Event',
                    'score' => $this->score($event->title, $event->location, $query, 105),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchVideos(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        return Video::query()
            ->latest()
            ->get()
            ->map(function (Video $video) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $video->title,
                ]);
                $blob = $this->normalizeText([
                    $video->title,
                    $video->youtube_url,
                ]);

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.75)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'Videos',
                    'icon' => 'fas fa-play-circle',
                    'type' => 'video',
                    'title' => $video->title,
                    'excerpt' => 'Official video archive',
                    'url' => route('video'),
                    'meta' => optional($video->created_at)->format('F d, Y'),
                    'badge' => 'Video',
                    'score' => $this->score($video->title, $video->youtube_url, $query, 95),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchDepartments(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        return Department::query()
            ->latest()
            ->get()
            ->map(function (Department $department) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $department->title,
                ]);
                $blob = $this->normalizeText(array_merge(
                    [$department->title, $department->banner_image],
                    $this->flattenText($department->content ?? [])
                ));

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.85)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'Departments',
                    'icon' => 'fas fa-building',
                    'type' => 'department',
                    'title' => $department->title,
                    'excerpt' => $this->snippet($blob, $query, 160),
                    'url' => route('departments.show', $department->slug),
                    'meta' => 'Department profile',
                    'badge' => 'Department',
                    'score' => $this->score($department->title, $blob, $query, 100),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchPages(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        $routeMap = [
            'home' => route('frontend.home'),
            'his-excellency-profile' => route('profile'),
            'executive-page' => route('executive'),
            'history-page' => route('history'),
            'history-of-chief-secretaries' => route('chief-secretaries'),
            'service-charter' => route('charter'),
            'opc-hqs-sections-page' => route('about'),
            'news-page' => route('news'),
            'events-page' => route('upcoming'),
            'documents-page' => route('documents'),
            'photos-page' => route('photo'),
            'videos-page' => route('video'),
        ];

        return Page::query()
            ->latest()
            ->get()
            ->map(function (Page $page) use ($query, $terms, $routeMap, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $page->title,
                ]);
                $blob = $this->normalizeText(array_merge(
                    [$page->title, $page->slug],
                    $this->flattenText($page->content ?? [])
                ));

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.85)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'Pages',
                    'icon' => 'fas fa-layer-group',
                    'type' => 'page',
                    'title' => $page->title,
                    'excerpt' => $this->snippet($blob, $query, 160),
                    'url' => $routeMap[$page->slug] ?? route('search', ['q' => $page->title]),
                    'meta' => 'Website page',
                    'badge' => 'Page',
                    'score' => $this->score($page->title, $blob, $query, 90),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchLeadership(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        $ministers = Minister::query()->latest()->get()->map(function (Minister $minister) use ($query, $terms, $strictMode) {
            $gateBlob = $this->normalizeText([$minister->name, $minister->position]);
            $blob = $this->normalizeText([$minister->name, $minister->position, $minister->position_type]);

            if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.8)) {
                return null;
            }

            return $this->makeResult([
                'group' => 'Leadership',
                'icon' => 'fas fa-user-tie',
                'type' => 'minister',
                'title' => $minister->name,
                'excerpt' => $minister->position ?: 'Cabinet ministry',
                'url' => route('ministers'),
                'meta' => 'Cabinet',
                'badge' => 'Minister',
                'score' => $this->score($minister->name, $minister->position, $query, 100),
                'highlight' => $this->highlight($blob, $query),
            ]);
        })->filter();

        $dministers = Dminister::query()->latest()->get()->map(function (Dminister $minister) use ($query, $terms, $strictMode) {
            $gateBlob = $this->normalizeText([$minister->name, $minister->position]);
            $blob = $this->normalizeText([$minister->name, $minister->position]);

            if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.8)) {
                return null;
            }

            return $this->makeResult([
                'group' => 'Leadership',
                'icon' => 'fas fa-user-tie',
                'type' => 'deputy_minister',
                'title' => $minister->name,
                'excerpt' => $minister->position ?: 'Deputy minister',
                'url' => route('deputy'),
                'meta' => 'Deputy leadership',
                'badge' => 'Deputy Minister',
                'score' => $this->score($minister->name, $minister->position, $query, 96),
                'highlight' => $this->highlight($blob, $query),
            ]);
        })->filter();

        return $ministers
            ->merge($dministers)
            ->sortByDesc('score')
            ->take($limitPerGroup)
            ->values();
    }

    private function searchAnnouncements(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        return SiteAnnouncement::query()
            ->where('is_active', true)
            ->orderByDesc('priority')
            ->latest()
            ->get()
            ->map(function (SiteAnnouncement $announcement) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $announcement->title,
                    $announcement->badge,
                    $announcement->cta_label,
                    $announcement->secondary_cta_label,
                ]);
                $blob = $this->normalizeText([
                    $announcement->title,
                    $announcement->badge,
                    $announcement->message,
                    $announcement->cta_label,
                    $announcement->secondary_cta_label,
                    $announcement->image,
                ]);

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.9 : 0.75)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => 'Announcements',
                    'icon' => 'fas fa-bell',
                    'type' => 'announcement',
                    'title' => $announcement->title,
                    'excerpt' => $this->snippet($blob, $query, 150),
                    'url' => $announcement->cta_url ?: route('search', ['q' => $announcement->title]),
                    'meta' => ucfirst(str_replace('_', ' ', $announcement->placement ?: 'popup')),
                    'badge' => $announcement->badge ?: 'Announcement',
                    'score' => $this->score($announcement->title, $announcement->message, $query, 115),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function searchStaticSitePages(string $query, array $terms, int $limitPerGroup, bool $strictMode): Collection
    {
        $pages = collect([
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Home',
                'excerpt' => 'Main landing page with latest highlights',
                'url' => route('frontend.home'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'home latest highlights landing',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'News',
                'excerpt' => 'Official news and updates',
                'url' => route('news'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'news updates press release',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Events',
                'excerpt' => 'Upcoming events and calendar',
                'url' => route('upcoming'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'events calendar public event',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Documents',
                'excerpt' => 'Library of circulars, notices, reports, and files',
                'url' => route('documents'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'documents circulars notices reports files',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Video Gallery',
                'excerpt' => 'Official video archive',
                'url' => route('video'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'video youtube archive media',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Photo Gallery',
                'excerpt' => 'Photo gallery of official activities',
                'url' => route('photo'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'photos gallery images activities',
            ],
            [
                'group' => 'Site Map',
                'icon' => 'fas fa-map',
                'type' => 'site_page',
                'title' => 'Contacts',
                'excerpt' => 'Office contact details and location',
                'url' => route('contacts'),
                'meta' => 'Site page',
                'badge' => 'Page',
                'keywords' => 'contact address office phone email',
            ],
        ]);

        return $pages
            ->map(function (array $page) use ($query, $terms, $strictMode) {
                $gateBlob = $this->normalizeText([
                    $page['title'],
                ]);
                $blob = $this->normalizeText([
                    $page['title'],
                    $page['excerpt'],
                    $page['keywords'],
                ]);

                if (! $this->matches($gateBlob, $query, $terms, $strictMode ? 0.95 : 0.9)) {
                    return null;
                }

                return $this->makeResult([
                    'group' => $page['group'],
                    'icon' => $page['icon'],
                    'type' => $page['type'],
                    'title' => $page['title'],
                    'excerpt' => $page['excerpt'],
                    'url' => $page['url'],
                    'meta' => $page['meta'],
                    'badge' => $page['badge'],
                    'score' => $this->score($page['title'], $page['keywords'], $query, 80),
                    'highlight' => $this->highlight($blob, $query),
                ]);
            })
            ->filter()
            ->take($limitPerGroup);
    }

    private function groupResults(Collection $results, int $limitPerGroup): array
    {
        return $results
            ->groupBy('group')
            ->map(function (Collection $items, string $label) use ($limitPerGroup) {
                return [
                    'label' => $label,
                    'icon' => $items->first()['icon'] ?? 'fas fa-search',
                    'items' => $items->take($limitPerGroup)->values()->all(),
                ];
            })
            ->values()
            ->all();
    }

    private function searchSources(): array
    {
        return [
            ['label' => 'News', 'icon' => 'fas fa-newspaper'],
            ['label' => 'Documents', 'icon' => 'fas fa-file-alt'],
            ['label' => 'Events', 'icon' => 'fas fa-calendar-days'],
            ['label' => 'Videos', 'icon' => 'fas fa-play-circle'],
            ['label' => 'Departments', 'icon' => 'fas fa-building'],
            ['label' => 'Pages', 'icon' => 'fas fa-layer-group'],
            ['label' => 'Leadership', 'icon' => 'fas fa-user-tie'],
            ['label' => 'Announcements', 'icon' => 'fas fa-bell'],
            ['label' => 'Site Map', 'icon' => 'fas fa-map'],
        ];
    }

    private function makeResult(array $data): array
    {
        return [
            'group' => $data['group'],
            'icon' => $data['icon'],
            'type' => $data['type'],
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'url' => $data['url'],
            'meta' => $data['meta'] ?? null,
            'badge' => $data['badge'] ?? null,
            'score' => $data['score'] ?? 0,
            'highlight' => $data['highlight'] ?? null,
        ];
    }

    private function score(?string $title, ?string $body, string $query, int $base = 100): int
    {
        $title = Str::lower((string) $title);
        $body = Str::lower((string) $body);
        $query = Str::lower(trim($query));

        $score = $base;

        if ($query === '') {
            return $score;
        }

        if (Str::contains($title, $query)) {
            $score += 60;
        }

        if (Str::contains($body, $query)) {
            $score += 35;
        }

        foreach (preg_split('/\s+/', $query) as $term) {
            if ($term !== '' && Str::contains($title, $term)) {
                $score += 10;
            }

            if ($term !== '' && Str::contains($body, $term)) {
                $score += 5;
            }
        }

        return $score;
    }

    private function matches(string $blob, string $query, array $terms, float $minCoverage): bool
    {
        $blob = Str::lower($blob);
        $query = Str::lower(trim($query));

        if ($query === '') {
            return false;
        }

        if (Str::contains($blob, $query)) {
            return true;
        }

        $matched = 0;

        foreach ($terms as $term) {
            if ($term !== '' && Str::contains($blob, $term)) {
                $matched++;
            }
        }

        if ($terms === []) {
            return false;
        }

        return ($matched / count($terms)) >= $minCoverage;
    }

    private function isStrictQuery(string $query, array $terms): bool
    {
        $normalizedQuery = trim($query);
        $wordCount = count(array_filter(preg_split('/\s+/', Str::lower($normalizedQuery)) ?: [], fn (string $term) => $term !== ''));

        return $wordCount >= 4 || count($terms) >= 4 || Str::length($normalizedQuery) >= 28;
    }

    private function queryTerms(string $query): array
    {
        $stopWords = [
            'the',
            'and',
            'or',
            'for',
            'to',
            'of',
            'a',
            'an',
            'in',
            'on',
            'by',
            'with',
            'at',
            'from',
            'as',
            'is',
            'are',
        ];

        return collect(preg_split('/\s+/', Str::lower(trim($query))) ?: [])
            ->map(fn (string $term) => trim(preg_replace('/[^a-z0-9]+/i', '', $term)))
            ->filter(fn (string $term) => $term !== '' && ! in_array($term, $stopWords, true))
            ->unique()
            ->values()
            ->all();
    }

    private function normalizeText(mixed $value): string
    {
        return trim(preg_replace('/\s+/', ' ', implode(' ', $this->flattenText($value))));
    }

    private function flattenText(mixed $value): array
    {
        if (is_string($value) || is_numeric($value)) {
            return [(string) $value];
        }

        if ($value instanceof \Stringable) {
            return [(string) $value];
        }

        if ($value instanceof Collection) {
            return $this->flattenText($value->all());
        }

        if (! is_array($value)) {
            return [];
        }

        $text = [];

        foreach ($value as $key => $item) {
            if (is_string($key) && in_array($key, ['image', 'banner_image', 'files', 'file', 'media'], true)) {
                $text = array_merge($text, $this->flattenFileName($item));
                continue;
            }

            if (is_string($key) && in_array($key, ['icon', 'id', 'slug', 'type'], true)) {
                continue;
            }

            $text = array_merge($text, $this->flattenText($item));
        }

        return $text;
    }

    private function flattenFileName(mixed $value): array
    {
        if (is_array($value) || $value instanceof Collection) {
            $items = $value instanceof Collection ? $value->all() : $value;

            $names = [];

            foreach ($items as $item) {
                $names = array_merge($names, $this->flattenFileName($item));
            }

            return $names;
        }

        if (! is_string($value) || trim($value) === '') {
            return [];
        }

        $path = urldecode($value);
        $baseName = pathinfo($path, PATHINFO_FILENAME);
        $fullName = basename($path);

        return array_values(array_filter([
            $baseName,
            $fullName,
        ]));
    }

    private function snippet(string $blob, string $query, int $length = 160): string
    {
        $blob = trim(preg_replace('/\s+/', ' ', strip_tags($blob)));

        if ($blob === '') {
            return '';
        }

        $query = Str::lower(trim($query));
        $lowerBlob = Str::lower($blob);
        $position = $query !== '' ? strpos($lowerBlob, $query) : false;

        if ($position === false) {
            return Str::limit($blob, $length, '...');
        }

        $start = max(0, $position - 40);
        $snippet = Str::substr($blob, $start, $length);

        return ($start > 0 ? '...' : '') . Str::limit($snippet, $length, '...');
    }

    private function highlight(string $blob, string $query): ?string
    {
        $blob = trim(preg_replace('/\s+/', ' ', strip_tags($blob)));
        $query = trim($query);

        if ($blob === '' || $query === '') {
            return null;
        }

        return $this->snippet($blob, $query, 120);
    }

    private function humanizeFilename(string $filename): string
    {
        return Str::of($filename)
            ->replace(['_', '-'], ' ')
            ->squish()
            ->title()
            ->toString();
    }

    private function styleBadge(string $style): string
    {
        return match ($style) {
            'danger' => 'Important alert',
            'info' => 'Notice',
            'success' => 'Update',
            'dark' => 'Official update',
            default => 'Official notice',
        };
    }
}
