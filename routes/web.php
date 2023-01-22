<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\MainController;
use \App\Http\Controllers\RatingController;
use \App\Http\Controllers\AdminController;


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
// [UserController::class, 'index']
//Route::get('/',[HomeController::class,'index']);
/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/debug',function(){
    return view('debug');
});

Route::get('/',[MainController::class,'index'])->name('hauptseite');

Route::get('/erstelle_ticket', [MainController::class, 'create_ticket']);


Route::post('/anmeldung_verifizieren', [RegistrationController::class, 'sign_in_validate'])->name('anmeldung_verifizieren');

Route::post('/registrierung_verifizieren', [RegistrationController::class, 'register_validate'])->name('registrierung');

Route::get('/abmeldung', [RegistrationController::class, 'sign_out'])->name('abmelden')->name('abmelden');

Route::get('/mein_konto', [RegistrationController::class, 'my_account'])->name('mein Konto');



Route::get('/bewertungen', [RatingController::class, 'index'])->name('bewertungen');

Route::post('/bewertung_verifizieren',[RatingController::class, 'rating_validate'])->name('bewertung_verifizieren');

Route::get('/loesche_bewertung', [RatingController::class, 'delete_rating'])->name('loeschen_bewertung');



Route::get('/adminbereich', [AdminController::class, 'index'])->name('admin');

Route::post('/adminbereich/bewertung_speichern', [AdminController::class, 'ratings_save']);

Route::post('/admin_liste_speichern' , [AdminController::class, 'change_admin']);

Route::get('/veraendere_status', [AdminController::class, 'change_status']);
