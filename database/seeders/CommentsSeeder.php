<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'text' => 'Hemos recibido la queja del cliente',
            'time_used' => 15,
            'incidence_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('comments')->insert([
            'text' => 'Se esta procesando',
            'time_used' => 20,
            'incidence_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('comments')->insert([
            'text' => 'Solucionado',
            'time_used' => 10,
            'incidence_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'El cliente lleva esperando 2 horas',
            'time_used' => 10,
            'incidence_id' => 4,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'ya lo he solucionado',
            'time_used' => 50,
            'incidence_id' => 4,
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
