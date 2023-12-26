<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarRequestsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ToolController;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\UserAdminController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/run-command', function () {
    Artisan::call('scrape:data');
    return "Command Run Successfully";
});


Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize:clear');
    return 'clear done';
});

Route::get('/run-seeder', function () {
    Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);

    return 'Seeder executed successfully!';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'migrated successfully';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'migrated successfully';
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('signup', [RegisterController::class, 'getForm'])->name('signup');
Route::post('signup', [RegisteredUserController::class, 'store'])->name('signup.store');
Route::get('signin', [LoginController::class, 'getForm'])->name('signin');
Route::post('signin', [LoginController::class, 'store'])->name('signin.store');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');
Route::get('add-new-tool', [ToolController::class, 'getForm'])->name('addNewTool');
Route::post('add-new-tool/store', [ToolController::class, 'store'])->name('addNewTool.store');
Route::post('filterTools', [HomeController::class, 'filterTools'])->name('filterTools');
Route::post('filterByInput', [HomeController::class, 'filterByInput'])->name('filterByInput');
Route::post('favorteTool', [ToolController::class, 'favorteTool'])->name('favorteTool');
Route::get('preview', [ToolController::class, 'preview'])->name('preview');
Route::get('my-profile', [UserAdminController::class, 'myProfile'])->name('my-profile');
Route::get('edit-profile', [UserAdminController::class, 'editProfile'])->name('edit-profile');
Route::post('update-profile', [UserAdminController::class, 'updateProfile'])->name('update-profile');
Route::get('edit-tool/{id?}', [ToolController::class, 'editTool'])->name('edit.tool');
Route::get('delete-tool/{id?}', [ToolController::class, 'destroyTool'])->name('delete.tool');
Route::get('delete-tool-image/{id?}', [ToolController::class, 'deleteToolImage'])->name('delete.tool.image');
Route::put('update-tool/{id?}', [ToolController::class, 'updateTool'])->name('update.tool');

Route::get('/admin', [AuthenticatedSessionController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('admin-panel', [UserAdminController::class, 'index'])->name('admin-panel.index');
});


Route::middleware('admin')->group(function () {

    // Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    Route::resource('car-request', CarRequestsController::class);
    Route::resource('seller-request', SellerRequestController::class);
    Route::resource('contact-request', ContactRequestController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('tools', ToolsController::class);
    
    Route::post('/blog-update', [BlogController::class, 'blogUpdate'])->name('blogUpdate');

    Route::post('/update-user', [UserProfileController::class, 'updateUser'])->name('updateUser');
    Route::resource('category', CategoryController::class);
    Route::post('/category-update', [CategoryController::class, 'categoryUpdate'])->name('categoryUpdate');

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
