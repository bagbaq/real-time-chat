<?php

use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Broadcast;

Route::post('/broadcasting/auth', function () {
    $user = new GenericUser(['id' => microtime()]);

    request()->setUserResolver(function () use ($user) {
        return $user;
    });

    return Broadcast::auth(request());
});

Broadcast::channel('room-{number}', function ($number) {
    return ['ip' => request()->ip()];
});
