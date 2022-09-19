<?php

namespace App\Http\Controllers;

use App\Models\Ruta;

use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function getRutas(){

        $rutas = Ruta::all();

        return view('Welcome')
            ->with('rutas', $rutas); 
    }
}
