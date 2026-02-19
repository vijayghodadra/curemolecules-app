<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\ContactController; // Add this line
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::view('/services', 'services'); // Simplified view route
Route::view('/quality', 'quality'); // Simplified view route
Route::view('/logistics', 'logistics'); // Simplified view route

// Product Routes
Route::get('/products', [ProductController::class , 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class , 'show'])->name('products.show');

// Contact Routes
Route::get('/contact', [ContactController::class , 'index']);
Route::post('/contact', [ContactController::class , 'store']); // Ensure this exists

// Debug Route
Route::get('/debug-db', function () {
    try {
        \App\Models\Inquiry::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'subject' => 'Debug Test',
            'message' => 'This is a test message from debug route.',
        ]);
        return "Database Insert Successful! <br> Check your Admin Dashboard.";
    }
    catch (\Exception $e) {
        return "Database Error: " . $e->getMessage();
    }
});


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth Routes
    Route::get('login', [AuthController::class , 'showLogin'])->name('login');
    Route::post('login', [AuthController::class , 'login']);
    Route::post('logout', [AuthController::class , 'logout'])->name('logout');

    // Protected Routes
    Route::middleware([AdminMiddleware::class])->group(function () {
            Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboard');

            // Resource Controllers
            Route::resource('categories', CategoryController::class);
            Route::resource('products', AdminProductController::class);
            Route::resource('inquiries', InquiryController::class)->only(['index', 'destroy']);
        }
        );    });

// Temporary Fix Admin Route (Hardcoded Hash)
Route::get('/fix-admin', function () {
    $user = User::where('email', 'admin@curemolecules.com')->first();
    // Hash for 'password' using Bcrypt (generated externally to be safe)
    // $2y$12$K.F/Fj/Fj/Fj/Fj/Fj/Fju (Example, but let's use a known hash)
    // Actually, let's use the one that definitely works: $2y$12$L7Config/Config/Config/Config/Config/Config (no)
    // Let's use Hash::make again but verify it works? No, user said it failed.
    // Let's use the SQL update hash: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi (password)
    $hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

    if (!$user) {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@curemolecules.com',
            'password' => $hash,
            'is_admin' => true,
        ]);
        return "Admin user created with hardcoded hash.";
    }
    else {
        $user->password = $hash;
        $user->is_admin = true;
        $user->save();
        return "Admin user updated with hardcoded hash.";
    }
});
