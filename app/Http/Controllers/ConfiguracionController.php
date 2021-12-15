<?php

namespace App\Http\Controllers;

use App\Models\Camaras;
use App\Models\Arduino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $camara = Camaras::all()->where('fraccionamiento', $idf);
        $arduino = Arduino::all()->where('fraccionamiento', $idf);
        return view('configuracion',compact('camara', 'arduino'));
    }

    public function update($id){

        $idf = Auth::user()->fraccionamiento;
        $Cam = Camaras::find($id);
        $Cam->frente = request('frente');
        $Cam->placa = request('placa');
        $Cam->save();
        
        return back();
    }
}
