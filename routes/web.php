<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ModalFormularioRendicion;
use App\Http\Controllers\PruebaPdfController;
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
});


Route::post('/submit-rendicion', [ModalFormularioRendicion::class,'submit'])->name('rendicion.submit');


Route::get('/pdf', [PruebaPdfController::class, 'submit'])->name('pdf.submit');

// Route::get('/pdf', function(){
//     return view('pruebaPdf');
// });