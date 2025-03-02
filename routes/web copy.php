<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SearchController;


use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Account\Account;
use App\Livewire\Dashboard\Index;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\GithubLogin;
use App\Livewire\Auth\GoogleLogin;

Route::get('/', Index::class)->middleware(['auth', 'checkDevice', 'verified']);

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)->middleware('guest')->name('password.reset');
    Route::get('/google/callback', GoogleLogin::class);
    Route::get('/github/callback', GithubLogin::class);
});

Route::get('account', Account::class)->name('account');

Route::get('/email/verify', VerifyEmail::class)->middleware(['auth', 'checkDevice'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'checkDevice', 'signed'])->name('verification.verify');

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [HomeController::class, 'index']);
// Route::get('/money-converter', MoneyConverter::class);



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('roles/permission',[RoleController::class,'permission'])->name('roles.permission');
Route::post('roles/permission',[RoleController::class,'storePermission'])->name('roles.store-permission');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/users', UserController::class);
});


Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function(){
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile-update');
    Route::put('/profile', [ProfileController::class,'updatePassword'])->name('profile-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile-destroy');
});

Route::get('notifications/get',[NotificationsController::class, 'getNotificationsData'])->name('notifications.get');
Route::get('navbar/search',[SearchController::class,'showNavbarSearchResults']);
Route::post('navbar/search',[SearchController::class,'showNavbarSearchResults']);
