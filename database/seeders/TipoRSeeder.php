<?php

namespace Database\Seeders;

use App\Models\TipoR;
use Illuminate\Database\Seeder;

class TipoRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoR::truncate();

        $tipor =  [
            [
              'tipo' => 'dueño',
              'fraccionamiento' => '2',
            ],
            [
              'tipo' => 'renta',
              'fraccionamiento' => '2',
            ],

          ];

          TipoR::insert($tipor);
    }
}
