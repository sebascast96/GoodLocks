<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Residentes;
use App\Models\ServicioP;
use App\Models\TipoR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministracionController extends Controller
{

     // ------------------------ VISTAS ------------------------
    
    // PANTALLA PRINCIPAL ADMINISTRACION
    public function index()
    {
        return view('Administracion.principalA');
    }

    // PANTALLA PERSONAL ADMINISTRACION
    public function indexAP()
    {
        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        $servicio = ServicioP::all()->where('fraccionamiento', $idf);
        
        return view('Administracion.personal', compact('idr', 'servicio'));
    }

    // PANTALLA RESIDENTES ADMINISTRACION
    public function indexAR()
    {
        $idf = Auth::user()->fraccionamiento;
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        return view('Administracion.residentes', compact('tipo'));
    }

    // ------------------------ SERVICIO ------------------------

    //CREAR SERVICIO
    public function crearSP(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        ServicioP::create([
            'servicio' => $request->servicio,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    // ELIMINAR SERVICIO    
    public function eliminarSP($id)
    {
        $ids = ServicioP::find($id);
        $ids->delete();

        return redirect()->back();
    }

     // ------------------------ PERSONAL ------------------------

    //  CREAR PERSONAL

    public function createP(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'ine' => ['required', 'string', 'max:255'],
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        Personal::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo,
            'ine' => $request->ine,
            'servicio' => $request->servicio,
            'idr' => $request->idr,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    // ------------------------ TIPO DE RESIDENTE ------------------------

    //CREAR TIPO DE SERVICIO
    public function crearTR(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'tipo' => ['required', 'string', 'max:255'],
        ]);

        TipoR::create([
            'tipo' => $request->tipo,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    // ELIMINAR SERVICIO    
    public function eliminarTR($id)
    {
        $ids = TipoR::find($id);
        $ids->delete();

        return redirect()->back();
    }

    // ------------------------ RESIDENTE ------------------------

    public function createR(Request $request){

        $idf = Auth::user()->fraccionamiento;
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255'],
            'tipo' => ['required', 'string',  'max:255'],
        ]);

        Residentes::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo,
            'correo' => $request->correo,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }



}
