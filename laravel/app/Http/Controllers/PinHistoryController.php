<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\PinHistory;

class PinHistoryController extends Controller {

    public function listAllPinHistories() {
        return PinHistory::all();
    }

    public function getPinHistory($pinHistoryId) {
        $pinHistory = PinHistory::find($pinHistoryId);
        if (!empty($pinHistory->id)) {
            return $pinHistory;
        }
        return response()->json([
            "error" => "PinHistory not found",
        ], 404);
    }

    public function getPinHistoryListForPin($id) {
        $pin = Pin::find($id);
        $pinHistory = json_decode(json_encode($pin->history));
        return $pinHistory;
    }

}
