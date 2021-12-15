<?php

namespace App\Http\Controllers;

use App\Models\Arduino as ModelsArduino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Arduino extends Controller
{
    public function update(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;
        $active = ModelsArduino::where('estatus', 1)->first();
        $active->estatus = "0";
        $active->save();
        $a = ModelsArduino::find($request->relay);
        $a->estatus = "1";

        return redirect()->back();
    }
}
