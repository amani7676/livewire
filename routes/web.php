<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin2\Panel\Index;
use App\Livewire\Admin2\User\UserList;
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


 Route::get('/admin/', Index::class)->name('panel');
    Route::get('admin/users', UserList::class)->name('users.list');
Route::middleware('auth')->group(function () {
    // Route::get(


});

require __DIR__ . '/auth.php';
