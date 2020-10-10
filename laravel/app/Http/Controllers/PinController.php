<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\PinHistory;

class PinController extends Controller {

    public function index() {
        return Pin::all();
    }

    public function show(Pin $pin) {
        return $pin;
    }

    public function store(Request $request) {
        $pin = Pin::create($request->all());
        return response()->json($pin, 201);
    }

    public function update(Request $request, Pin $pin) {
        // Create history for update.
        PinHistory::create([
            'pin_id' => $pin->getId(),
            'latitude' => $pin->getLatitude(),
            'longitude' => $pin->getLongitude(),
        ]);
        $pin->update($request->all());
        return response()->json($pin, 200);
    }

    public function delete(Pin $pin) {
        $pin->delete();
        return response()->json(NULL, 204);
    }

}
