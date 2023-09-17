<?php

use App\Http\Controllers\Admin\{
    AdminController,
    UserController,
    ACL\PermissionController,
    ACL\RoleController,
    ChangelogController,
    ContactController,
    PageController,
};
use App\Http\Controllers\Site\{
    HomeController,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Chart home */
        Route::get('/chart', [AdminController::class, 'chart'])->name('home.chart');

        /** Contatos */
        Route::resource('contacts', ContactController::class)->except(['show']);

        /** Page */
        Route::get('/page/edit', [PageController::class, 'index'])->name('page.edit');
        Route::put('/page/{page}/edit', [PageController::class, 'update'])->name('page.update');

        /** Users */
        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::resource('users', UserController::class)->except(['show']);

        /**
         * ACL
         * */
        /** Permissions */
        Route::resource('permission', PermissionController::class)->except(['show']);

        /** Roles */
        Route::get('role/{role}/permission', [RoleController::class, 'permissions'])->name('role.permissions');
        Route::put('role/{role}/permission/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
        Route::resource('role', RoleController::class)->except(['show']);

        /** Changelog */
        Route::get('/changelog', [ChangelogController::class, 'index'])->name('changelog');
    });
});

/** Web */
/** Home */
Route::get('/', [HomeController::class, 'index'])->name('site');
Route::post('/contact', [HomeController::class, 'contact'])->name('site.contact');
// Route::get('/', function () {
//     return redirect('admin');
// });

Auth::routes([
    'register' => false,
]);
