 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;

    // Home Route
    Route::get('/', [HomeController::class, 'index']);


    // Grouped Public Pages
    Route::controller(PageController::class)->group(function () {
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::get('/career', 'career')->name('career');
    Route::get('/salaries', 'salaries')->name('salaries');
    Route::get('/companies', 'companies')->name('companies');
});

// Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', function () {
        return Auth::user()->role === 'admin' ? view('admin.dashboard') : redirect('/dashboard');
    })->name('admin.dashboard');
    
    Route::get('/employer/dashboard', function () {
        return Auth::user()->role === 'employer' ? view('employer.dashboard') : redirect('/dashboard');
    })->name('employer.dashboard');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resume Routes
Route::middleware('auth')->group(function () {
    Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
    Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
    Route::get('/resume/show', [ResumeController::class, 'show'])->name('resume.show');
    Route::get('/resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::post('/resume/update', [ResumeController::class, 'update'])->name('resume.update');
});

// Job Resource Routes
Route::resource('jobs', JobController::class);

// Authentication Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';













































// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\PageController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\ResumeController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\EmployerController;
// use App\Http\Controllers\JobController;


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

//     Route::get('/', [HomeController::class, 'index']);

//     Route::controller(PageController::class)->group(function () {
//         Route::get('/jobs', 'jobs')->name('jobs');
//         Route::get('/career', 'career')->name('career');
//         Route::get('/salaries', 'salaries')->name('salaries');
//         Route::get('/companies', 'companies')->name('companies');
//     });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Route::middleware(['auth'])->group(function () {

//     Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
//     Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
//     Route::get('/resume/show', [ResumeController::class, 'show'])->name('resume.show');
//     Route::get('/resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
//     Route::post('/resume/update', [ResumeController::class, 'update'])->name('resume.update');
// });
// Route::resource('jobs', JobController::class);


    // // Registration & Login Routes
    // Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::post('/register', [RegisteredUserController::class, 'store']);
    // Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    // Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    // Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    //      //  User Dashboard
    //     // Route::middleware(['auth'])->group(function () {
    //     //     Route::get('/dashboard', function () {
    //     //         return view('dashboard');
    //     //     })->name('user.dashboard');
    //     // });
    //     // Admin Dashboard
    //     Route::middleware(['auth'])->group(function () {
    //         Route::get('/admin/dashboard', function () {
    //             if (Auth::user()->role !== 'admin') {
    //                 return redirect('/dashboard');
    //             }
    //             return view('admin.dashboard');
    //         })->name('admin.dashboard');
    //     });

    //     // Employer Dashboard
    //     Route::middleware(['auth'])->group(function () {
    //         Route::get('/employer/dashboard', function () {
    //             if (Auth::user()->role !== 'employer') {
    //                 return redirect('/dashboard');
    //             }
    //             return view('employer.dashboard');
    //         })->name('employer.dashboard');
    //     });

//     // Registration & Login Routes
//     Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('/register', [RegisteredUserController::class, 'store']);
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//     // User Dashboard
//     Route::middleware(['auth'])->group(function () {
//         Route::get('/dashboard', function () {
//             return view('dashboard');
//         })->name('dashboard');
//     });

//     // Admin Dashboard
//     Route::middleware(['auth'])->group(function () {
//         Route::get('/admin/dashboard', function () {
//             if (Auth::user()->role !== 'admin') {
//                 return redirect('/dashboard');
//             }
//             return view('admin.dashboard');
//         })->name('admin.dashboard');
//     });

//     // Employer Dashboard
//     Route::middleware(['auth'])->group(function () {
//         Route::get('/employer/dashboard', function () {
//             if (Auth::user()->role !== 'employer') {
//                 return redirect('/dashboard');
//             }
//             return view('employer.dashboard');
//         })->name('employer.dashboard');
//     });


       

        
// require __DIR__ . '/auth.php'; 
