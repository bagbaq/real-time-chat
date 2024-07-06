<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller {
    public function join_room($number) {
        $validator = Validator::make(['number' => $number], [
            'number' => 'required|integer|min:0|max:200'
        ]);

        if ($validator->fails()) {
            return abort(404);
        }

        return view('room.single', [
            'room' => $number
        ]);
    }

    public function upload_image() {
        $validator = Validator::make(['image' => request()->file('image')], ['image' => 'required|image|max:3000|mimes:jpg,jpeg,png']);

        if ($validator->fails()) {
            return ['result' => 'fail'];
        }

        $path = Storage::disk('public')->put('images/room', request()->file('image'));

        return ['result' => 'ok', 'path' => $path];
    }
}
