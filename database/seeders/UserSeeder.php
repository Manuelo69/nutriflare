<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre_completo' => 'Admin',
            'nombre_usuario' => 'Manuel207',
            'slug' => Str::slug('Manuel207'),
            'email' => 'manullanorebanal@gmail.com',
            'contraseña' => Hash::make('password'),
            'fase_corporal' => 'definicion'
        ]);
    }
}