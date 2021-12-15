<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $usuarios =  [
            [
              'name' => 'Rodrigo',
              'fraccionamiento' => '1',
              'nivel' => 'adminT',
              'email' => 'S&T@admin.com',
              'password' => bcrypt('P@ssw0rd'),
            ],
            [
                'name' => 'Administrador',
                'fraccionamiento' => '2',
                'nivel' => 'admin',
                'email' => 'admin@austrias.com',
                'password' => bcrypt('P@ssw0rd'),
            ],

          ];

          User::insert($usuarios);
    }
}
