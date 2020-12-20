<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;

use App\Http\Livewire\Users\UserComponent;
use App\Http\Livewire\ResearchProject\ResearchProjectComponent;
use App\Http\Livewire\ResearchProject\UserResearchComponent;


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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Google Login Authenticator
Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

// User Component
Route::get('users', UserComponent::class);

// User Research Manager
Route::get('user/research', UserResearchComponent::class);

// Research Projects Controller
// Route::resource('projects', ResearchProjectController::class);
Route::get('projects', ResearchProjectComponent::class);

// To Dos
// Route::get('todos', Todos::class);

require __DIR__.'/auth.php';
