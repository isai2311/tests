<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbMenu')->insert(['cFolioMenu' => 1, 'cIdMenu' => 100, 'cParentIdMenu' => 0, 'cItemMenu' => 'Inicio', 'cUrlMenu' => 'home', 'cNomIcoMenu' => 'fas fa-home', 'cChildMenu' => 0, 'cNewMenu' => 0]);
        DB::table('tbMenu')->insert(['cFolioMenu' => 2, 'cIdMenu' => 200, 'cParentIdMenu' => 0, 'cItemMenu' => 'Catálogos', 'cUrlMenu' => '#', 'cNomIcoMenu' => 'fas fa-book', 'cChildMenu' => 1, 'cNewMenu' => 0]);
        DB::table('tbMenu')->insert(['cFolioMenu' => 3, 'cIdMenu' => 201, 'cParentIdMenu' => 200, 'cItemMenu' => 'Prueba', 'cUrlMenu' => 'pruebas', 'cNomIcoMenu' => 'fas fa-address-card', 'cChildMenu' => 0, 'cNewMenu' => 0]);
        DB::table('tbMenu')->insert(['cFolioMenu' => 4, 'cIdMenu' => 204, 'cParentIdMenu' => 200, 'cItemMenu' => 'Usuarios', 'cUrlMenu' => 'usuarios', 'cNomIcoMenu' => 'fas fa-tags', 'cChildMenu' => 0, 'cNewMenu' => 0]);
        DB::table('tbMenu')->insert(['cFolioMenu' => 5, 'cIdMenu' => 300, 'cParentIdMenu' => 0, 'cItemMenu' => 'Preguntas', 'cUrlMenu' => 'preguntas', 'cNomIcoMenu' => 'fas fa-tags', 'cChildMenu' => 0, 'cNewMenu' => 0]);

        DB::table('tPerfiles')->insert([
            'cPerDescripcion' => "Administrador",
            'cPerEstatus' => "1",
            'cPerPrivilegios' => "1,2,3,4"
        ]);
        DB::table('tPerfiles')->insert([
            'cPerDescripcion' => "Usuario",
            'cPerEstatus' => "1",
            'cPerPrivilegios' => "5"
        ]);
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => Hash::make('temporal'),
            'cUsuPerfil' => 1
          ]);

        DB::table('users')->insert([
        'name' => "User",
        'email' => 'user@user.com',
        'password' => Hash::make('temporal'),
        'cUsuPerfil' => 2
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
