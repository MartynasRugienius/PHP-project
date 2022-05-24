<?php

use App\Http\Controllers\EventUsers;
use App\Http\Controllers\Event;
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

Route::get('/', [Event::class, 'showEvents']);
Route::get('/contacts', [Event::class, 'contacts']);
Route::get('/aboutus', [Event::class, 'aboutus']);


Auth::routes();

Route::get('/add/event', [Event::class, 'showAddEvents']);
Route::post('/add/event', [Event::class, 'addEvent']);
Route::post('/delete/event/{id}', [Event::class, 'deleteEvent']);
Route::post('/update/event/{id}', [Event::class, 'updateEvent']);
Route::get('/update/event/{id}', [Event::class, 'showUpdate']);
Route::get('/events', [Event::class, 'showEvents']);
Route::get('/events/users', [Event::class, 'showUsersEvents']);
Route::get('/event/{id}', [Event::class, 'showEvent']);

Route::post('/register/event', [EventUsers::class, 'registerEvent']);
Route::post('/accept/event/{id}/{condition}', [EventUsers::class, 'accept']);
