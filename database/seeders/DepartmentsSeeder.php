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
            "name" => "Marketing",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('departments')->insert([
            "name" => "Recursos Humanos",
            "created_at" => now(),
            "updated_at" => now(),

        ]);
        DB::table('departments')->insert([
            "name" => "Desarrollo",
            "created_at" => now(),
            "updated_at" => now(),

        ]);
    }
}
