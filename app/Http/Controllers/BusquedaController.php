<?php

namespace App\Http\Controllers;

use App\Models\Coresidente;
use App\Models\Personal;
use App\Models\Residentes;
use App\Models\ServicioP;
use App\Models\TipoR;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusquedaController extends Controller
{
    // ------------------------ VISTAS ------------------------

    //PANTALLA  PRINCIPAL
    public function index()
    {
        return view('Busqueda.principalB');
    }

    // PANTALLA PERSONAL
    public function indexP()
    {
        $idf = Auth::user()->fraccionamiento;
        $BP = Personal::all()->where('fraccionamiento', $idf);
        $servicio = ServicioP::all()->where('fraccionamiento', $idf);

        return view('Busqueda.busqueda-personal', compact('BP', 'servicio'));
    }

    // PANTALLA RESIDENTE
    public function indexR()
    {
        $idf = Auth::user()->fraccionamiento;
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        $BR = Residentes::all()->where('fraccionamiento', $idf);
        return view('Busqueda.busqueda-residente',  compact('BR', 'tipo'));
    }
    
    // PANTALLA VISITANTE
    public function indexV()
    {
        $idf = Auth::user()->fraccionamiento;
        $BV = Visita::all()->where('fraccionamiento', $idf);
        return view('Busqueda.busqueda-visita', compact('BV'));
    }

    // PANTALLA CORESIDENTE
    public function indexCR($id)
    {
        $diag = $id;
        $meca = Coresidente::all()->where('idr', $id);
        return view('Busqueda.coresidentes', compact('diag','meca'));
    }

    // ------------------------ PERSONAL ------------------------

    // EDITAR PERSONAL
    public function updateP(Request $request, $id){

        $BP = Personal::find($id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'ine' => ['required', 'string', 'max:255'],
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        $BP->nombre = request('nombre');
        $BP->telefono = request('telefono');
        $BP->direccion = request('direccion');
        $BP->tipo = request('tipo');
        $BP->ine = request('ine');
        $BP->servicio = request('servicio');

        $BP->save();
        
        return redirect()->back();
    }
    
    // ELIMINAR PERSONAL
    public function deleteP($id)
    {
         $BP = Personal::find($id); 
         $BP->delete();
         return redirect()->back();
    }


    // ------------------------ RESIDENTES ------------------------

    // EDITAR RESIDENTE
    public function updateR($id, Request $request){

        $BR = Residentes::find($id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255'],
        ]);

        $BR->nombre = request('nombre');
        $BR->telefono = request('telefono');
        $BR->direccion = request('direccion');
        $BR->correo = request('correo');
        $BR->tipo = request('tipo');

        $BR->save();
        return redirect()->back();
    }

    // ELIMINAR RESIDENTE
    public function deleteR($id)
    {
         $BR = Residentes::find($id); 
         $BR->delete();
         return redirect()->back();
    }

    // ------------------------ CORESIDENTE ------------------------

    public function createCR( Request $request){

        $idf = Auth::user()->fraccionamiento;


        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'relacion' => ['required', 'string', 'max:255'],
        ]);

        $CCR = new Coresidente();
        $CCR->idr = request('idr');
        $CCR->nombre = request('nombre');
        $CCR->relacion = request('relacion');
        $CCR->fraccionamiento = $idf;

        $CCR->save();


        return redirect()->back();
    }

    public function deleteCR($id)
    {
         $BR = Coresidente::find($id); 
         $BR->delete();
         return redirect()->back();
    }

    // ------------------------ VISITANTES ------------------------


    public function updateV(){

        $CV = new Visita();
        $CV->nombre = request('nombre');
        $CV->telefono = request('telefono');
        $CV->ine = request('ine');
        $CV->motivo = request('motivo');
        $CV->placa = request('placa');
        $CV->fecha = request('fecha');
        $CV->idr = request('idr');

        $CV->save();
        return redirect()->back();
    }


}
