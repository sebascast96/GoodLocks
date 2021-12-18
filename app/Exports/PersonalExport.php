<?php

namespace App\Exports;

use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Personal::all()->where('fraccionamiento', $idf);
    }

}
