<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

    }
}
