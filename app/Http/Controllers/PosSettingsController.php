<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosSettingsController extends Controller
{
    public function PosSettingsAdd(){
        return view('pos.pos_settings.add_pos_settings');
    }
}
