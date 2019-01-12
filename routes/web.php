<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\PlaylistsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Auth\ActivateAccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Front\ImagesController;
use App\Http\Controllers\Front\IndexController;
use App\Notifications\VideosUploaded;

/**
 * Auth
 */
$this->middleware([])->prefix('auth')->group(function () {
    $this->get('login', [LoginController::class, 'showLoginForm'])->name('login');
    $this->post('login', [LoginController::class, 'login']);
    $this->post('logout', [LoginController::class, 'logout'])->name('logout');
    $this->get('logout', [LoginController::class, 'logout'])->name('logout');

    $this->get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    $this->post('register', [RegisterController::class, 'register']);

    $this->get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    $this->post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    $this->get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    $this->post('password/reset', [ResetPasswordController::class, 'reset']);

    $this->get('activate', [ActivateAccountController::class, 'activate'])->name('activate');
    $this->post('activate', [ActivateAccountController::class, 'requestNewActivationEmail'])->name('activate.request');
    $this->get('unactivated', [ActivateAccountController::class, 'unactivated'])->name('unactivated');
    $this->get('terms-conditions', function() {})->name('terms-conditions');
    $this->get('privacy-policy', function() {})->name('privacy-policy');
});

/**
 * Front
 */
$this->middleware([])->name('front.')->group(function () {
    $this->get('/all-images', [ImagesController::class, 'index'])->name('all-images');
    $this->get('/image/{image}', [ImagesController::class, 'view'])->name('view-image');

    $this->middleware(['auth'])->group(function() {
        $this->get('/upload', [ImagesController::class, 'create'])->name('upload');
        $this->post('/upload', [ImagesController::class, 'store'])->name('store');
    });
});

/**
 * Main route
 */
$this->get('/', [IndexController::class, 'index'])->name('index');
