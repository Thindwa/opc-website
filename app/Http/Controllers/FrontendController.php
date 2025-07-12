<?php
namespace App\Http\Controllers;
use App\Models\Page;

use App\Models\Video;
use App\Models\Minister;
use App\Models\Dminister;
use App\Models\Department;
use App\Models\Management;
use Illuminate\Http\Request;
use Outerweb\ImageLibrary\Models\Image;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Display the 'About' page with section tabs.
     *
     * This function retrieves the content from the 'opc-hqs-sections-page'
     * and extracts the tabs from the 'SectionTabsBlock' block type to be
     * displayed on the 'about' view.
     *
     * @return \Illuminate\View\View
     */

/*******  29d17a00-77a6-4142-b8cd-4162d09c2c98  *******/
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

    return view('frontend.charter', compact('page'));
    }

    public function ministers()
    {
        $ministers = Minister::all();

        $president = $ministers->where('position_type', 'President')->first();
        $vp = $ministers->where('position_type', 'VP')->first();
        $cabinet = $ministers->where('position_type', 'Ministers')->all();

        return view('frontend.ministers', compact('president', 'vp', 'cabinet'));
    }

        public function deputy()
    {
        $dministers = Dminister::all();
        return view('frontend.deputy', compact('dministers'));
    }

    public function cabinet()
    {
        return view('frontend.cabinet');
    }

    public function history()
{
    $page = Page::where('slug', 'history-page')->firstOrFail(); // or any identifier

    return view('frontend.history', [
        'page' => $page,
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

    public function singledepartment()
    {
        return view('frontend.singledepartment');
    }

    public function dodma()
    {
        return view('frontend.dodma');
    }

    public function human()
    {
        return view('frontend.human');
    }

    public function statutory()
    {
        return view('frontend.statutory');
    }

    public function printing()
    {
        return view('frontend.printing');
    }

    public function cgstores()
    {
        return view('frontend.cgstores');
    }

    public function contracting()
    {
        return view('frontend.contracting');
    }

    public function performance()
    {
        return view('frontend.performance');
    }

    public function events()
    {
        return view('frontend.events');
    }

    public function innovations()
    {
        return view('frontend.innovations');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function singlenews()
    {
        return view('frontend.singlenews');
    }

    public function upcoming()
    {
        return view('frontend.upcoming');
    }

    public function documents()
    {
        return view('frontend.documents');
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
