<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
use App\Models\Sertifikat;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $sertifikat = \App\Models\Sertifikat::find(1);
    return view('dashboard', compact('sertifikat'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/sertifikat/all', function () {
    $sertifikats = Sertifikat::find(1);
    $users = \App\Models\User::all();
    foreach ($users as $key => $value) {
        $value->sertifikats()->sync($sertifikats);
    }
    return 'success';
});
Route::resource('sertifikat', SertifikatController::class);

Route::get('/sertifikat/canvas/{id}', function ($id) {
    $sertifikat = Sertifikat::find($id);
    return view('sertifikat.canvas', compact('sertifikat'));
});

require __DIR__.'/auth.php';
