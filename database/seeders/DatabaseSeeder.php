<?php

namespace Database\Seeders;

use App\Models\Fraccionamiento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(Arduinoseeder::class);
        $this->call(CamarasSeeder::class);
        $this->call(TipoRSeeder::class);
        $this->call(ServicioPSeeder::class);
    }
}
