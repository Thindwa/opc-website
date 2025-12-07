<?php
namespace App\Http\Controllers;
use App\Models\News;

use App\Models\Page;
use App\Models\Event;
use App\Models\Video;
use App\Models\Document;
use App\Models\Minister;
use App\Models\Dminister;
use App\Models\Department;
use App\Models\Management;
use Illuminate\Http\Request;
use Outerweb\ImageLibrary\Models\Image;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->firstOrFail();
        $blocks = collect($page->content);

        $imageIndex = $blocks->search(fn ($blk) => ($blk['type'] ?? null) === \App\Filament\Blocks\ImageTextBlock::class);
        $accordionIndex = $blocks->search(fn ($blk) => ($blk['type'] ?? null) === \App\Filament\Blocks\HomeAccordionBlock::class);

        if ($imageIndex !== false && $accordionIndex !== false) {
            $imageBlock = $blocks->get($imageIndex);
            $accordionBlock = $blocks->get($accordionIndex);

            // Merge accordion items into the image block
            $imageBlock['data']['accordion_items'] = $accordionBlock['data']['items'] ?? [];

            // Replace updated image block
            $blocks = $blocks->map(function ($block, $index) use ($imageIndex, $imageBlock, $accordionIndex) {
                if ($index === $imageIndex) {
                    return $imageBlock;
                }
                return $block;
            });

            // Remove the standalone accordion block
            $blocks = $blocks->forget($accordionIndex)->values();
        }

        // SEO for home page
        $seo = [
            'title' => setting('seo.title', 'Office of the President and Cabinet - Government of Malawi'),
            'description' => setting('seo.description', 'Official website of the Office of the President and Cabinet, Government of Malawi.'),
        ];

        return view('frontend.home', [
            'page' => $page,
            'blocks' => $blocks->all(),
            'seo' => $seo,
        ]);
    }




    public function about()
    {
        $page = Page::where('slug', 'opc-hqs-sections-page')->firstOrFail();

        return view('frontend.about', [
            'tabs' => collect($page->content)->firstWhere('type', 'App\\Filament\\Blocks\\SectionTabsBlock')['data']['tabs'] ?? [],
        ]);
    }


    public function profile()
    {
        $page = Page::where('slug', 'his-excellency-profile')->firstOrFail();

        $contentBlocks = collect($page->content);

        // Extract the first image block
        $imageBlock = $contentBlocks->firstWhere('type', 'App\\Filament\\Blocks\\ImageBlock');
        $imagePath = $imageBlock['data']['image'] ?? null;
        $imageCaption = $imageBlock['data']['caption'] ?? null;

        // Exclude image blocks from content
        $filteredBlocks = $contentBlocks->reject(function ($block) {
            return $block['type'] === 'App\\Filament\\Blocks\\ImageBlock';
        })->values()->all(); // reset indexes

        return view('frontend.profile', [
            'page' => $page,
            'profileImage' => $imagePath,
            'profileCaption' => $imageCaption,
            'filteredContent' => $filteredBlocks,
        ]);


    }


    public function executive()
    {
        $page = Page::where('slug', 'executive-page')->firstOrFail();

        $contentBlocks = collect($page->content);

        // Extract the first image block
        $imageBlock = $contentBlocks->firstWhere('type', 'App\\Filament\\Blocks\\ImageBlock');
        $imagePath = $imageBlock['data']['image'] ?? null;
        $imageCaption = $imageBlock['data']['caption'] ?? null;

        // Exclude image blocks from content
        $filteredBlocks = $contentBlocks->reject(function ($block) {
            return $block['type'] === 'App\\Filament\\Blocks\\ImageBlock';
        })->values()->all(); // reset indexes

        return view('frontend.executive', [
            'page' => $page,
            'profileImage' => $imagePath,
            'profileCaption' => $imageCaption,
            'filteredContent' => $filteredBlocks,
        ]);
    }




    public function management()
{
    $management = Management::all();

    $spc = $management->where('position_type', 'CS')->first();
    $dspc = $management->where('position_type', 'DCS')->first();
    $ps = $management->where('position_type', 'PS');
    $directors = $management->where('position_type', 'Director');

    return view('frontend.management', compact('spc', 'dspc', 'ps', 'directors'));
}



    public function charter()
    {
        $page = Page::where('slug', 'service-charter')->firstOrFail();

        $seo = [
            'title' => $page->title . ' - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
        ];

        return view('frontend.charter', compact('page', 'seo'));
    }

    public function ministers()
    {
        $ministers = Minister::all();

        $president = $ministers->where('position_type', 'President')->first();
        $vp = $ministers->where('position_type', 'VP')->first();
        $secondVp = $ministers->where('position_type', 'Second_VP')->first();
        $cabinet = $ministers->where('position_type', 'Ministers')->all();

        $header = \App\Helpers\SettingsHelper::getMinistersHeader();

        $seo = [
            'title' => 'Cabinet Ministers - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
            'description' => 'Meet the Cabinet Ministers of Malawi, including the President, Vice President, and all Cabinet Ministers responsible for various government departments.',
        ];

        return view('frontend.ministers', compact('president', 'vp', 'secondVp', 'cabinet', 'header', 'seo'));
    }

    public function deputy()
    {
        $dministers = Dminister::all();
        $header = \App\Helpers\SettingsHelper::getDeputyMinistersHeader();

        $seo = [
            'title' => 'Deputy Ministers - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
            'description' => 'Meet the Deputy Ministers of Malawi who assist Cabinet Ministers in the executive branch of the government.',
        ];

        return view('frontend.deputy', compact('dministers', 'header', 'seo'));
    }


    public function history()
    {
        $page = Page::where('slug', 'history-page')->firstOrFail();

        $seo = [
            'title' => $page->title . ' - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
        ];

        return view('frontend.history', [
            'page' => $page,
            'seo' => $seo,
        ]);
    }

    public function chiefSecretaries()
    {
        $page = Page::where('slug', 'history-of-chief-secretaries')->firstOrFail();

        $seo = [
            'title' => $page->title . ' - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
        ];

        return view('frontend.secretaries-history', [
            'page' => $page,
            'seo' => $seo,
        ]);
    }


    public function departments()
    {
        $departments = Department::all();
        return view('frontend.departments', compact('departments'));
    }

    public function departmentShow($slug)
{
    $department = Department::where('slug', $slug)->firstOrFail();
    return view('frontend.department-show', compact('department'));
}



    public function news()
    {
        $newsItems = News::latest()->paginate(6);

        $seo = [
            'title' => 'News & Updates - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
            'description' => 'Stay updated with the latest news and updates from the Office of the President and Cabinet, Government of Malawi.',
        ];

        return view('frontend.news', compact('newsItems', 'seo'));
    }

    public function singlenews($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $recentPosts = News::latest()->take(5)->get();

        // Prepare SEO data for news article
        $seo = [
            'title' => $news->title . ' - ' . setting('general.brand_name', 'Office of the President and Cabinet'),
            'description' => \Illuminate\Support\Str::limit(strip_tags($news->description ?? ''), 160, '...'),
            'image' => $news->image ? asset('storage/' . $news->image) : null,
        ];

        return view('frontend.singlenews', compact('news', 'recentPosts', 'seo'));
    }


    public function upcoming()
    {
        $events = Event::orderBy('start_date')->get();

        $formattedEvents = $events->map(function ($e) {
            return [
                'title' => $e->title,
                'start_date' => $e->start_date->toDateString(),
                'end_date' => $e->end_date ? $e->end_date->toDateString() : null,
                'location' => $e->location,
                'description' => $e->description,
                'image' => $e->image ? asset('storage/' . $e->image) : null,
                'type' => 'Event',
            ];
        });

        return view('frontend.upcoming', [
            'events' => $formattedEvents,
        ]);
    }

    public function documents()
    {
        $documents = Document::all()->groupBy('category_type');
        return view('frontend.documents', compact('documents'));
    }



    public function photo()
    {
        $images = Image::all();
        return view('frontend.photo', compact('images'));
    }

    public function video()
    {
        $videos = Video::latest()->paginate(6);
        return view('frontend.video', compact('videos'));
    }

    public function contacts()
    {
        return view('frontend.contacts');
    }


}
