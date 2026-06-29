<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::get('/profile', [FrontendController::class,'profile'])->name('profile');
Route::get('/executive', [FrontendController::class,'executive'])->name('executive');
Route::get('/management', [FrontendController::class,'management'])->name('management');
Route::get('/charter', [FrontendController::class,'charter'])->name('charter');
Route::get('/ministers', [FrontendController::class,'ministers'])->name('ministers');
Route::get('/deputy', [FrontendController::class,'deputy'])->name('deputy');
Route::get('/history', [FrontendController::class,'history'])->name('history');
Route::get('/chief-secretaries', [FrontendController::class,'chiefSecretaries'])->name('chief-secretaries');
Route::get('/dodma', [FrontendController::class,'dodma'])->name('dodma');

Route::get('/departments', [FrontendController::class, 'departments'])->name('departments.index');
Route::get('/departments/{slug}', [FrontendController::class, 'departmentShow'])->name('departments.show');

Route::get('/singledepartment', [FrontendController::class,'singledepartment'])->name('singledepartment');
Route::get('/human', [FrontendController::class,'human'])->name('human');
Route::get('/civil', [FrontendController::class,'civil'])->name('civil');
Route::get('/statutory', [FrontendController::class,'statutory'])->name('statutory');
Route::get('/printing', [FrontendController::class,'printing'])->name('printing');
Route::get('/cgstores', [FrontendController::class,'cgstores'])->name('cgstores');
Route::get('/contracting', [FrontendController::class,'contracting'])->name('contracting');
Route::get('/performance', [FrontendController::class,'performance'])->name('performance');
Route::get('/events', [FrontendController::class,'events'])->name('events');
Route::get('/innovations', [FrontendController::class,'innovations'])->name('innovations');
Route::get('/services', [FrontendController::class,'services'])->name('services');
Route::get('/contacts', [FrontendController::class,'contacts'])->name('contacts');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/news/{slug}', [FrontendController::class, 'singlenews'])->name('singlenews');
Route::get('/upcoming', [FrontendController::class,'upcoming'])->name('upcoming');
Route::get('/documents', [FrontendController::class,'documents'])->name('documents');
Route::get('/photo', [FrontendController::class,'photo'])->name('photo');
Route::get('/video', [FrontendController::class,'video'])->name('video');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::get('/search/suggestions', [FrontendController::class, 'searchSuggestions'])->name('search.suggestions');

// Livewire update route — custom path to bypass ModSecurity, registered via setUpdateRoute
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/opc-lw-update', $handle)->middleware('web');
});
