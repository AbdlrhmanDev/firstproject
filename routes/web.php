<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ResumeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employer\EmployerJobController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Language Switch Route
|--------------------------------------------------------------------------
*/

Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Routes Grouped with setlocale Middleware
|--------------------------------------------------------------------------
*/
Route::middleware(['setlocale'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Public Routes
    |--------------------------------------------------------------------------
    */

    // Home Page
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

    // Static Pages (Jobs, Career, Salaries, Companies)
    Route::controller(PageController::class)->group(function () {
        Route::get('/jobs', 'jobs')->name('jobs');
        Route::get('/career', 'career')->name('career');
        Route::get('/salaries', 'salaries')->name('salaries');
        Route::get('/companies', 'companies')->name('companies');
    });

    // Job Resource Routes (Accessible publicly or via middleware if needed)
    Route::resource('jobs', JobController::class);

    Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes
    |--------------------------------------------------------------------------
    */

    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    /*
    |--------------------------------------------------------------------------
    | Shared Routes (Authenticated Users)
    |--------------------------------------------------------------------------
    */

    // Shared Dashboard Route (for verified users)
    // Route::middleware(['auth', 'verified'])->group(function () {
    //     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // });


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:admin', 'disable_back_btn'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Admin Dashboard
            Route::get('/home', [AdminController::class, 'dashboardOverview'])->name('home');
            Route::get('/jobs', [AdminController::class, 'show'])->name('jobs');

            // Admin Profile Management
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });


    /*
    |--------------------------------------------------------------------------
    | Employer Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:employer', 'disable_back_btn'])
        ->prefix('employer')
        ->name('employer.')
        ->group(function () {

            // Employer Dashboard
            Route::get('/home', [EmployerController::class, 'dashboardHome'])->name('home');
            Route::get('/orders', [EmployerController::class, 'index'])->name('orders');

            // Employer Profile
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            // Job Management
            Route::resource('job', EmployerJobController::class)->except(['show']);

            // Job Application Status Update
            Route::patch('/application/{application}/status', [EmployerController::class, 'updateStatus'])
                ->name('applications.updateStatus');
        });


    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:user', 'disable_back_btn'])->group(function () {

        // User Dashboard
        Route::get('/dashboard/home', [DashboardController::class, 'index'])->name('user.home');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Resume Management
        Route::resource('/resume', ResumeController::class)->names([
            'index'   => 'user.resume.index',
            'create'  => 'user.resume.create',
            'store'   => 'user.resume.store',
            'show'    => 'user.resume.show',
            'edit'    => 'user.resume.edit',
            'update'  => 'user.resume.update',
            'destroy' => 'user.resume.destroy',
        ]);

        // Orders & Job Application
        Route::get('/orders', [DashboardController::class, 'orders'])->name('user.orders');
        Route::post('/apply/{job}', [JobController::class, 'apply']);
    });


    /*
    |--------------------------------------------------------------------------
    | Auth Scaffolding Routes
    |--------------------------------------------------------------------------
    */
    require __DIR__ . '/auth.php';
});
