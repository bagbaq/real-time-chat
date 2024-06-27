<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Events\messageEvent;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(RoomController::class)->group(function () {
    Route::get('/r/{number}', 'join_room')->name('join_room');
});

Route::post('/r/{number}/message/', function ($number) {
    request()->validate([
       'message' => 'required|string|alpha_num|max:255',
       'username' => 'required|ipv4'
    ]);

    event(new messageEvent(Request()->input('message'), request()->username, $number));

    return 'done';
});
