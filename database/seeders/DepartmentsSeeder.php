<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            "name" => "Departamento1",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('departments')->insert([
            "name" => "Departamento2",
            "created_at" => now(),
            "updated_at" => now(),

        ]);
        DB::table('departments')->insert([
            "name" => "Departamento3",
            "created_at" => now(),
            "updated_at" => now(),

        ]);
    }
}
