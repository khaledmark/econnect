<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use Illuminate\Support\Facades\Route;


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

    
Route::get('/',HomeComponent::class);
// Route::post('/create', 'App\Http\Livewire\HomeComponent@store');
Route::post('/send-message', 'App\Http\Livewire\AboutComponent@sendEmail');
Route::get('/create', 'App\Http\Livewire\AboutComponent@contact');



