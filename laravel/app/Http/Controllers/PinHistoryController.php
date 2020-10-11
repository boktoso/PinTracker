<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\PinHistory;

class PinHistoryController extends Controller
{
    public function index() {
        return PinHistory::all();
    }

    public function show(PinHistory $pinHistory) {
        return $pinHistory;
    }

    public function getForPinByPin(Pin $pin) {
        $pinHistory = json_decode(json_encode($pin->history));
        return $pinHistory;
    }
}
