<?php

use App\Livewire\CollabTextEditor;
use App\Livewire\MainView;
use App\Livewire\ThreadMessages;
use App\Livewire\ThreadView;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('thread/{thread}', ThreadMessages::class)
    ->middleware(['auth'])
    ->name('viewMessages');


Route::get('room/{room}', MainView::class)
    ->middleware(['auth'])
    ->name('viewRoom');

Route::get('logout', function () {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');


Route::get('/helloworld', function () {
    return view('helloworld');
});

Route::get('editorText/{random?}', CollabTextEditor::class)->name('editorText');
require __DIR__ . '/auth.php';
