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
            "name" => "Categoria 1",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('categories')->insert([
            "name" => "Categoria 2",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        DB::table('categories')->insert([
            "name" => "Categoria 3",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
