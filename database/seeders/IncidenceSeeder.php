<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class IncidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('incidences')->insert([
            'title' => 'problema con el Presupuesto campaña 2023',
            'text' => 'hay un problema con el presupuesto',
            'estimated_minutes' => 30,
            'category_id' => 1,
            'owner_id' => 1,
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('incidences')->insert([
            'title' => 'Solicitud Vacaciones',
            'text' => 'Solicitud vacaciones',
            'estimated_minutes' => 45,
            'category_id' => 2,
            'owner_id' => 2,
            'department_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('incidences')->insert([
            'title' => 'El Servidor esta caido',
            'text' => 'El servidor lleva 1 hora caido',
            'estimated_minutes' => 60,
            'category_id' => 3,
            'owner_id' => 3,
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('incidences')->insert([
            'title' => 'El Servidor del cliente esta caido',
            'text' => 'El servidor del cliente ha caido',
            'estimated_minutes' => 30,
            'category_id' => 1,
            'owner_id' => 5,
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
