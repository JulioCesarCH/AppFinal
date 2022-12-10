<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class RestauranteController extends Controller
{
    public function indexp(){
        $resultados=DB::table('restaurantes')
        ->join('mesas', 'restaurantes.mesa_id', '=', 'mesas.id')
        ->select('restaurantes.*', 'mesas.numero', 'mesas.capacidad')
        ->get();

    return view("restaurantes")
        ->with("resultados",$resultados);  
    }

}
