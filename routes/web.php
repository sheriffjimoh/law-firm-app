<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', [RecordsController::class, 'index']);

 Route::post('/create_record', [RecordsController::class, 'create_records']);

 Route::post('/updateimage', [RecordsController::class, 'updateimage']);
 Route::get('/record_details/{key}', [RecordsController::class, 'single_record']);