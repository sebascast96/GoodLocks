<?php

namespace Database\Seeders;

use App\Models\ServicioP;
use Illuminate\Database\Seeder;

class ServicioPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicioP::truncate();

        $servicio =  [
            [
              'servicio' => 'OFICIAL',
              'fraccionamiento' => '2',
            ],
            [
              'servicio' => 'LIMPIEZA',
              'fraccionamiento' => '2',
            ],
            [
                'servicio' => 'JARDINERO',
                'fraccionamiento' => '2',
              ],

          ];

          ServicioP::insert($servicio);
    }
}
