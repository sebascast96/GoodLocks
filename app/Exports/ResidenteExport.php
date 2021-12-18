<?php

namespace App\Exports;

use App\Models\Residentes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class ResidenteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Residentes::all()->where('fraccionamiento', $idf);
    }
}
