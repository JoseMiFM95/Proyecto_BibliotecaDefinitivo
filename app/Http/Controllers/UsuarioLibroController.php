<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioLibroController extends Controller
{
    public function store(Request $request, Usuario $usuario, Libro $libro) {
        $rules = [
            'libro_id' => 'required|integer',
        ];

        $messages = [
            'integer' => 'La id debe ser numérica',
            'required' => 'El prestamo debe tener una id',
        ];

        $validateData = $request->validate($rules,$messages);
        $usuario->libros()->syncWithoutDetaching($validateData);

        return $this->showOne($usuario);
    }

    public function destroy(Usuario $usuario, Libro $libro) {
        $usuario->libros()->detach($libro->id_libro);
        return $this->showOne($usuario);
    }
}
