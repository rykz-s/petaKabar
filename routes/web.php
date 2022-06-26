<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaController;

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
    return view('pane');
});

Route::get('/tabel', function () {
    return view('tabel');
});

// Route::get('/nopane', function () {
//     return view('nopane');
// });

Route::get('/nopane', [PetaController::class, 'index']);
Route::get('/tabel', [TabelController::class, 'index']);

