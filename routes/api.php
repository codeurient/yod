<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\ClientsPopupController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Page404Controller;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\PressController;
use App\Http\Controllers\Products;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPageController;
use App\Http\Controllers\ProjectsCategoryController;
use App\Http\Controllers\SearchActiveController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ThanksPageController;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => LocaleMiddleware::getLocale(), 'middleware' => LocaleMiddleware::class], function(){

    Route::get('/header', [HeaderController::class, 'header'])->name('header');
    Route::get('/footer', [FooterController::class, 'footer'])->name('footer');

    Route::get('/searchactive', [SearchActiveController::class, 'searchactive'])->name('searchactive');
    Route::match(['post', 'get'], '/search_text', [SearchActiveController::class, 'search_text']);

    Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
    Route::get('/main', [MainController::class, 'main'])->name('main');

    Route::get('/projectscategoryall', [ProjectsCategoryController::class, 'allProjectCategory'])->name('projectscategoryall');
    Route::get('/projectscategory/{category_slug}', [ProjectsCategoryController::class, 'projectscategory'])->name('projectscategory');
    Route::get('/project/{category_slug}/{slug}', [ProjectController::class, 'project'])->name('project');

    Route::get('/project/{slug}', [ProjectController::class, 'getOneProject'])->name('oneProject');

    Route::get('/projects_page', [ProjectPageController::class, 'index'])->name('projects_page');
    Route::get('/all_projects', [ProjectController::class, 'getAllProjects'])->name('projects');
    Route::get('/project_list', [ProjectController::class, 'getAllProjectList'])->name('project_list');

    Route::get('/contacts', [ContactsController::class, 'contacts'])->name('contacts');
    Route::get('/page404', [Page404Controller::class, 'page404'])->name('page404');
    Route::get('/thank_page', [ThanksPageController::class, 'thankPage'])->name('thankspage');

    Route::get('/clients_popup', [ClientsPopupController::class, 'clients_popup'])->name('clients_popup');
    Route::post('/clients_popup_send', [ClientsPopupController::class, 'clients_popup_post']);

    Route::get('/about', [AboutController::class, 'about'])->name('about');
    Route::get('/service', [ServiceController::class, 'service'])->name('service');
    Route::get('/services', [ServiceController::class, 'getServicesList'])->name('services');
    Route::get('/service/{slug}', [ServiceController::class, 'getOneService'])->name('oneServices');
    Route::get('/press', [PressController::class, 'press'])->name('press');
    Route::get('/partners', [PartnersController::class, 'partners'])->name('partners');
    Route::get('/awards', [AwardsController::class, 'awards'])->name('awards');

    Route::get('/sitemap.xml', [SeoController::class, 'getSiteMap'])->name('getSiteMap');

});
Route::get('setlocale/{lang}', [LocaleController::class, 'switchLocale'])->name('setlocale');


