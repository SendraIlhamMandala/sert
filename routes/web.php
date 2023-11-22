<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
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
Route::resource('sertifikat', SertifikatController::class)->middleware('auth');

Route::get('/sertifikat/canvas/{id}', function ($id) {
    [$user_id, $sertifikat_id] = explode('-', $id);
    $user = User::find($user_id);
    $sertifikat = Sertifikat::find($user_id);
    return view('sertifikat.canvas', compact('sertifikat','user', 'sertifikat_id'));
})->name('sertifikat.download');

Route::get('qrlib/{param}', function ($param) {
    include ('../App/Http/Controllers/QrGenerator/qrlib.php');
// outputs image directly into browser, as PNG stream
$text = str_replace('_', '/', $param);

$file = tempnam(sys_get_temp_dir(), 'qr') . '.png';
QRcode::png($text, $file, QR_ECLEVEL_H , 4 , 1 );
return response(file_get_contents($file))->header('Content-Type', 'image/png');
})->name('qrlib');


Route::get('qrlibtest', function () {
    echo '<img src="/qrlib" />';
})->name('qrlib');


require __DIR__.'/auth.php';
