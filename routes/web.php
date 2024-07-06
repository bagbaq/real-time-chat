<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Events\messageEvent;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(RoomController::class)->group(function () {
    Route::get('/r/{number}', 'join_room')->name('join_room');
    Route::post('/upload_image', 'upload_image')->name('upload_image');
});

Route::post('/r/{number}/message/', function ($number) {
    request()->validate([
       'message' => 'required_without:image|string|alpha_num|max:255',
       'image' => 'required_without:message|max:500',
       'username' => 'required|ipv4'
    ]);

    event(new messageEvent(request()->input('message') ?? null, request()->input('image') ?? null, request()->username, $number));

    return 'done';
});

