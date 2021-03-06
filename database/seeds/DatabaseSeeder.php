<?php

use App\Libro;
use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        $this->call(UsuarioSeeder::class);
        $totalUsuarios = 1000;
        
        $this->call(LibroSeeder::class);
        $totalLibros = 100;

        $totalprestamos = 20;

        for ($i=0; $i < $totalprestamos; $i++) {
            $usuario = Usuario::all()->random();
            $libro = Libro::all()->random()->id;

            $usuario->libros()->attach($libro);
        }

        Schema::enableForeignKeyConstraints();
        
    }
}
