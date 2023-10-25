<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear incidencias de ejemplo
        DB::table('incidences')->insert([
            'title' => 'Incidencia 1',
            'text' => 'Descripción de la Incidencia 1',
            'estimated_minutes' => 30,
            'category_id' => 1,
            'owner_id' => 1,
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('incidences')->insert([
            'title' => 'Incidencia 2',
            'text' => 'Descripción de la Incidencia 2',
            'estimated_minutes' => 45,
            'category_id' => 2,
            'owner_id' => 2,
            'department_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('incidences')->insert([
            'title' => 'Incidencia 3',
            'text' => 'Descripción de la Incidencia 3',
            'estimated_minutes' => 60,
            'category_id' => 3,
            'owner_id' => 3,
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
