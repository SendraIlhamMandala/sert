<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserController;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)->middleware('auth');

Route::post('cari', [UserController::class, 'carinama'])->name('carinama');

Route::get('/sertifikat/all', function () {
    $sertifikats = Sertifikat::find(1);
    $users = \App\Models\User::all();

    DB::table('user_sertifikats')
        ->where('user_id', 1)
        ->where('sertifikat_id', 1)
        ->update(['sebagai' => 'peserta']);

    DB::table('user_sertifikats')
        ->where('user_id', 1)
        ->where('sertifikat_id', 1)->get();

    foreach ($users as $key => $value) {
        $value->sertifikats()->sync($sertifikats);
    }
    return 'success';
});

Route::put('/sertifikat/updatedata/{id}', [SertifikatController::class, 'updatedata'])->name('sertifikat.updatedata');
Route::get('/sertifikat/addusers/{id}', [SertifikatController::class, 'addUsers'])->name('sertifikat.addusers');
Route::post('/sertifikat/storeusers/{id}', [SertifikatController::class, 'storeUsers'])->name('sertifikat.store.users');
Route::get('/sertifikat/removeuser/{id}', [SertifikatController::class, 'removeUser'])->name('sertifikat.removeuser');

Route::resource('sertifikat', SertifikatController::class)->middleware('auth');

Route::get('/sertifikat/canvas/{id}', function ($id) {
    [$user_id, $sertifikat_id] = explode('-', $id);
    $user = User::find($user_id);
    $sertifikat = Sertifikat::find($sertifikat_id);
    // dd(collect(collect(json_decode($sertifikat->lokasigambar->multiple))['x'])[1]);
    // dd($user->name);
    $font_urls = explode(';', $sertifikat->lokasigambar->fontUrl);

    $sebagai = DB::table('user_sertifikats')
        ->where('user_id', $user_id)
        ->where('sertifikat_id', $sertifikat_id)
        ->get()
        ->first()->sebagai;
    return view('sertifikat.canvas', compact('sertifikat', 'user', 'sertifikat_id', 'sebagai', 'font_urls'));
})->name('sertifikat.download');

Route::get('qrlib/{param}', function ($param) {
    include('../App/Http/Controllers/QrGenerator/qrlib.php');
    // outputs image directly into browser, as PNG stream
    $text = str_replace('_', '/', $param);

    $file = tempnam(sys_get_temp_dir(), 'qr') . '.png';
    QRcode::png($text, $file, QR_ECLEVEL_H, 4, 1);
    return response(file_get_contents($file))->header('Content-Type', 'image/png');
})->name('qrlib');


Route::get('qrlibtest', function () {
    echo '<img src="/qrlib" />';
})->name('qrlib');


Route::get('svgkit', function () {
    return view('svgkit');
});

require __DIR__ . '/auth.php';
