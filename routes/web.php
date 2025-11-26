<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(NotesController::class)->group(
    function () {
        Route::get('/note/create', 'create');
        Route::post('/note/store', 'store');
    }
);