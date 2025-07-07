<?php
namespace App\Http\Controllers;
use App\Models\Page;

use App\Models\Department;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
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
        return view('frontend.management');
    }

    public function charter()
    {
        return view('frontend.charter');
    }

    public function ministers()
    {
        return view('frontend.ministers');
    }

    public function deputy()
    {
        return view('frontend.deputy');
    }

    public function cabinet()
    {
        return view('frontend.cabinet');
    }

    public function history()
    {
        return view('frontend.history');
    }

    public function departments()
    {
        $departments = Department::where('status', true)->get(); // Get only active departments
        return view('frontend.departments', compact('departments'));
    }

    public function departmentShow($id)
{
    $department = Department::findOrFail($id);
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
        return view('frontend.photo');
    }

    public function video()
    {
        return view('frontend.video');
    }

    public function contacts()
    {
        return view('frontend.contacts');
    }


}
