<?php

namespace App\Exports;

use App\Models\Visita;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Visita::all()->where('fraccionamiento', $idf);
    }
}
