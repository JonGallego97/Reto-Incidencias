<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear tres usuarios de ejemplo
        DB::table('users')->insert([
            'name' => 'Usuario 1',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('password1'),
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario 2',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('password2'),
            'department_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario 3',
            'email' => 'usuario3@example.com',
            'password' => Hash::make('password3'),
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario 4',
            'email' => 'usuario4@example.com',
            'password' => Hash::make('password4'),
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario 5',
            'email' => 'usuario5@example.com',
            'password' => Hash::make('password5'),
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
