<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeWebhookController;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Auth\Password\Recovery;
use App\Livewire\Pages\Auth\Password\Reset;
use App\Livewire\Pages\Auth\Verification\Notice;
use App\Livewire\Pages\Checkout\Cancel;
use App\Livewire\Pages\Checkout\Success;
use App\Livewire\Pages\Products\Index;
use App\Livewire\Pages\Products\Show;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/password/request', Recovery::class)->name('password.request');
    Route::get('/password/reset', Reset::class)->name('password.reset');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout')->middleware('auth');

Route::get('/verification/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    if (Auth::check()) {
        return redirect()->route('products.index')->with('success', 'Email verified with success! Sing in to continue.');
    }

    return redirect()->route('login')->with('success', 'Email verified with success! Sing in to continue.');
})->name('verification.verify')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/verification/notice', Notice::class)->name('verification.notice');

    Route::post('/verification/send', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', Index::class)->name('products.index');
    Route::get('/checkout', [CheckoutController::class, 'generateCheckoutSession'])->name('checkout.create');
    Route::get('/checkout/success', Success::class)->name('checkouts.sucess');
    Route::get('/checkout/cancel', Cancel::class)->name('checkouts.cancel');
    Route::get('/{product}', Show::class)->name('products.show');
});

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('stripe.webhook');
