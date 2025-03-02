<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Account\Account;
use App\Livewire\Dashboard\Index;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\GithubLogin;
use App\Livewire\Auth\GoogleLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use App\Http\Controllers\MailController;
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


//Route::get('send-mail', [MailController::class, 'index']);
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

