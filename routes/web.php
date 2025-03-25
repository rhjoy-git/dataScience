<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    PageController,
    CourseController,
    DashboardController,
    EventController,
    ContactController,
    SkillController,
    Auth\LoginController
};

use App\Http\Controllers\Admin\{
    NavLinkController,
    CurriculumController,
    CourseDetailController,
    ToolController,
    CourseDataController,
    CourseSummaryController,
    CourseOfferingController,
    EnrollmentPointController,
    InstructorController,
    RequirementController,
    FaqController,
    TestimonialController,
    GraduateController,
    FooterDataController,
};


// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
// Route::get('/online-courses', [CourseController::class, 'onlineCourses'])->name('online-courses');
// Route::get('/workshop', [CourseController::class, 'workshop'])->name('workshop');
// Route::get('/free-class', [CourseController::class, 'freeClass'])->name('free-class');

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/data-science', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');

    // Resource Routes
    Route::resource('navlinks', NavLinkController::class);
    Route::resource('course-datas', CourseDataController::class);
    Route::resource('course-summary', CourseSummaryController::class);

    Route::resource('curriculum', CurriculumController::class);
    Route::resource('course-details', CourseDetailController::class);
    Route::resource('tools', ToolController::class);
    Route::resource('course-offering', CourseOfferingController::class);
    Route::resource('enrollment-point', EnrollmentPointController::class);
    Route::resource('instructor', InstructorController::class);
    Route::resource('requirement', RequirementController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('graduates', GraduateController::class);
    Route::resource('footerdatas', FooterDataController::class);
});

require __DIR__ . '/auth.php';
