 <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
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
    use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




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
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });


    // Profile Routes
    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

    // Resume Routes
    // Route::middleware('auth')->group(function () {
    //     Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
    //     Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
    //     Route::get('/resume/show', [ResumeController::class, 'show'])->name('resume.show');
    //     Route::get('/resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    //     Route::post('/resume/update', [ResumeController::class, 'update'])->name('resume.update');
    // });

    // Job Resource Routes
    Route::resource('jobs', JobController::class);

    // Authentication Routes
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



    // Admin Routes Dashboard  
    Route::middleware(['auth', 'role:admin', 'disable_back_btn'])->prefix('admin')->name('admin.')->group(function () {

        // Profile Routes for Admin
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Dashboard Home
        Route::get('/home', [AdminController::class, 'dashboardOverview'])->name('home');

        // Jobs Management
        Route::get('/jobs', [AdminController::class, 'show'])->name('jobs');
    });


    // Route::middleware(['auth', 'role:admin', 'disable_back_btn'])->group(function () {
    //     Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    //     Route::get('/admin/jobs', [AdminController::class, 'show'])->name('admin.jobs');
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //     // Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //     Route::get('/admin/home', [AdminController::class, 'dashboardOverview'])->name('admin.home');
    // });

    // Route::middleware(['auth', 'role:employer'])->group(function () {
    //     Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    //     Route::get('/employer/orders', [EmployerController::class, 'index'])->name('employer.orders');
    //     Route::resource('/employer/jobs', EmployerJobController::class)->except(['show']);

    //     Route::patch('/application/{application}/status', [EmployerController::class, 'updateStatus'])
    //         ->name('application.updateStatus');
    // });
    // Employer Routes Dashboard
    // Route::middleware(['auth', 'role:employer', 'disable_back_btn'])->group(function () {
    //      Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    //     Route::get('/employer/home', [EmployerController::class, 'dashboardHome'])->name('employer.home');
    //     Route::get('/employer/orders', [EmployerController::class, 'index'])->name('employer.orders');
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //     Route::resource('/employer/jobs', EmployerJobController::class)->names([
    //         'index' => 'employer.job.index',
    //         'create' => 'employer.job.create',
    //         'store' => 'employer.job.store',
    //         'edit' => 'employer.job.edit',
    //         'destroy' => 'employer.job.destroy',



    //     ])->except(['show']);
    //     Route::patch('/application/{application}/status', [EmployerController::class, 'updateStatus'])
    //         ->name('application.updateStatus');
    // });
    Route::middleware(['auth', 'role:employer', 'disable_back_btn'])->prefix('employer')->name('employer.')->group(function () {

        // Route::get('/dashboard', [EmployerController::class, 'dashboard'])->name('dashboard');
        Route::get('/home', [EmployerController::class, 'dashboardHome'])->name('home');
        Route::get('/orders', [EmployerController::class, 'index'])->name('orders');

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Job Resource Routes
        Route::resource('/jobs', EmployerJobController::class)->names([
            'index' => 'job.index',
            'create' => 'job.create',
            'store' => 'job.store',
            'edit' => 'job.edit',
            'destroy' => 'job.destroy',
        ])->except(['show']);

        // Job Application Status Update
        Route::patch('/application/{application}/status', [EmployerController::class, 'updateStatus'])
            ->name('applications.updateStatus');
    });


    //USer Routes Dashboard
    // Route::middleware(['auth', 'role:user', 'disable_back_btn'])->group(function () {
    //     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //     Route::resource('/user/resume', ResumeController::class)->names([
    //         'index' => 'user.resume.index',
    //         'create' => 'user.resume.create',
    //         'store' => 'user.resume.store',
    //         'show' => 'user.resume.show',
    //         'edit' => 'user.resume.edit',
    //         'update' => 'user.resume.update',
    //         'destroy' => 'user.resume.destroy',
    //     ]);


    //     Route::get('/orders', [DashboardController::class, 'orders'])->name('user.orders');
    //     Route::post('/apply/{job}', [JobController::class, 'apply']);
    //     // Add this missing route for orders

    // });
    // web.php

    Route::middleware(['auth', 'role:user', 'disable_back_btn'])->group(function () {
        Route::get('/dashboard/home', [DashboardController::class, 'index'])->name('user.home');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('/resume', ResumeController::class)->names([
            'index'   => 'user.resume.index',
            'create'  => 'user.resume.create',
            'store'   => 'user.resume.store',
            'show'    => 'user.resume.show',
            'edit'    => 'user.resume.edit',
            'update'  => 'user.resume.update',
            'destroy' => 'user.resume.destroy', // 🧠 Add this too if you plan on deleting
        ]);

        Route::get('/orders', [DashboardController::class, 'orders'])->name('user.orders');
        Route::post('/apply/{job}', [JobController::class, 'apply']);
    });




    require __DIR__ . '/auth.php';


