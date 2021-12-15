<?php

namespace Database\Seeders;

use App\Models\Fraccionamiento;
use Illuminate\Database\Seeder;

class FraccionamientoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fraccionamiento::truncate();


        $fraccionamiento =  [
            [
              'nombre' => 'S&T',
            ],
            [
              'nombre' => 'Asturias_50',
            ],

          ];

          Fraccionamiento::insert($fraccionamiento);
    }
}
