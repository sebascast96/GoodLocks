<?php

namespace App\Http\Controllers;

use Larinfo;
use App\Models\Arduino;
use App\Models\Camaras;
use PDF;
use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use Illuminate\Support\Facades\Auth;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $camara = Camaras::all()->where('fraccionamiento', $idf);
        $arduino = Arduino::all()->where('fraccionamiento', $idf);
        $frac = Fraccionamiento::find($idf);
        return view('configuracion', compact('camara', 'arduino', 'frac'));
    }

    public function update($id)
    {
        $idf = Auth::user()->fraccionamiento;
        $Cam = Camaras::find($id);
        dd($Cam);
        $Cam->frente = request('frente');
        $Cam->placa = request('placa');
        $Cam->ine = request('ine');
        $Cam->salida = request('salida');
        dd($Cam);
        $Cam->save();

        return back();
    }

    public function addpanel($id)
    {
        $idf = Auth::user()->fraccionamiento;
        $frac = Fraccionamiento::find($idf);
        if (!Arduino::where('panel', $id)->where('fraccionamiento', $idf)->exists()) {
            for ($i = 1; $i <= 8; $i++) {
                Arduino::create(
                    [
                        'panel' => $id,
                        'puerto' => $i,
                        'abrir' => 'a',
                        'cerrar' => 'z',
                        'nonc' => '-',
                        'fraccionamiento' => $idf
                    ]
                );
            };
        }
        $frac->paneles = $id + 1;
        $frac->save();
        sleep(2);
        return back();
    }

    public function deletepanel($id)
    {
        $idf = Auth::user()->fraccionamiento;
        $frac = Fraccionamiento::find($idf);
        Arduino::where('panel', $id - 1)->delete();
        $frac->paneles = $id - 1;
        $frac->save();
        return back();
    }

    public function updateArduino(Request $request)
    {

        for ($i = 0; $i < $request->paneles; $i++) {
            for ($j = 1; $j <= 8; $j++) {
                $string = 'port' . $j . 'panel' . $i . 'name';
                $name = $request->$string;
                if ($request->exists('port' . $j . 'ncpanel' . $i)) {
                    Arduino::where('panel', $i)->where('puerto', $j)->where('fraccionamiento', Auth::user()->fraccionamiento)->update(
                        ['nonc' => 'nc', 'nombre' => $name]
                    );
                } elseif ($request->exists('port' . $j . 'nopanel' . $i)) {
                    Arduino::where('panel', $i)->where('puerto', $j)->where('fraccionamiento', Auth::user()->fraccionamiento)->update(
                        ['nonc' => 'no', 'nombre' => $name]
                    );
                }
            }
        }
        return back();
    }

    public function info()
    {
        $idf = Auth::user()->fraccionamiento;
        $cameras = Camaras::where('fraccionamiento', $idf)->get();
        $arduino = Arduino::where('fraccionamiento', $idf)->get();
        $frac = Fraccionamiento::find($idf);
        $larinfo = Larinfo::getInfo();
        $server = $larinfo['server'];
        $sw = $server['software'];
        $hw = $server['hardware'];
        $disk = $hw['disk'];
        unset($hw['disk']);
        $ram = $hw['ram'];
        unset($hw['ram']);
        unset($hw['swap']);
        $data = [
            'frac' => $frac,
            'camaras' => $cameras,
            'arduino' => $arduino,
            'host' => $larinfo['host'],
            'client' => $larinfo['client'],
            'sw' => $sw,
            'hw' => $hw,
            'disk' => $disk,
            'ram' => $ram,
        ];
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('informacion.pdf');
    }
}
