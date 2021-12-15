<?php

namespace Database\Seeders;

use App\Models\Arduino;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Arduinoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Arduino::truncate();

        $arduino =  [
            [
              'estatus' => '1',
              'abrir' => 'a',
              'cerrar' => 'z',
              'fraccionamiento' => '2',
            ],
            [
              'estatus' => '0',
              'abrir' => 's',
              'cerrar' => 'x',
              'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'd',
                'cerrar' => 'c',
                'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'f',
                'cerrar' => 'v',
                'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'g',
                'cerrar' => 'b',
                'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'h',
                'cerrar' => 'n',
                'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'j',
                'cerrar' => 'm',
                'fraccionamiento' => '2',
            ],
            [
                'estatus' => '0',
                'abrir' => 'k',
                'cerrar' => 'l',
                'fraccionamiento' => '2',
            ]
          ];

          Arduino::insert($arduino);


      


    }
}
