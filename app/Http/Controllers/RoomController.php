<?php

namespace App\Http\Controllers;

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
}
