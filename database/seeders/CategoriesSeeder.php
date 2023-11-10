<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            "name" => "Soporte Clientes",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('categories')->insert([
            "name" => "Vacaciones",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        DB::table('categories')->insert([
            "name" => "Soporte Interno",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
