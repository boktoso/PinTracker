<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\PinHistory;

class PinController extends Controller {

    public function getAllPins() {
        return Pin::all();
    }

    public function getPin($id) {
        $pin = Pin::find($id);
        if (!empty($pin->id)) {
            return $pin;
        }
        return response()->json([
            "error" => "Pin not found",
        ], 404);
    }

    public function createPin(Request $request) {
        // TODO Add validation for fields that are needed.
        $pin = Pin::create($request->all());
        return response()->json($pin, 201);
    }

    public function updatePin(Request $request, $id) {
        $pin = Pin::find($id);
        // Create history for update.
        PinHistory::create([
            'pin_id' => $pin->id,
            'latitude' => $pin->latitude,
            'longitude' => $pin->longitude,
        ]);
        $pin->update($request->all());
        return response()->json($pin, 200);
    }

    public function deletePin($id) {
        $pin = Pin::find($id);
        $pin->delete();
        return response()->json(NULL, 204);
    }

}
