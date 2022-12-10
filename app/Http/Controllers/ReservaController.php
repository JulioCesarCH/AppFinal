<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Reserva;
class ReservaController extends Controller
{
    public function indexp(){
        $resultados=DB::table('reservas')
        ->join('mesas', 'reservas.mesa_id', '=', 'mesas.id')
        ->join('restaurantes', 'reservas.restaurante_id', '=', 'restaurantes.id')
        ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
        ->select('reservas.*', 'mesas.numero as mesa', 'clientes.nombre as cliente','restaurantes.nombre as restaurante')
        ->get();
        $resultados2=DB::table('restaurantes')->get();
        $resultados3=DB::table('mesas')->get();
        $resultados4=DB::table('clientes')->get();

    return view("reservas")
        ->with("resultados",$resultados)  
        ->with("resultados2",$resultados2)
        ->with("resultados3",$resultados3)
        ->with("resultados4",$resultados4); 
    }

    public function guardar(Request $request){
        $gastro = new Reserva();
        $gastro->nombre=$request->input("nombre");
        $gastro->num_reserva=$request->$this->generar();
        $gastro->fecha=$request->input("fecha");
        $gastro->servicio=$request->input("servicio");
        $gastro->num_personas=$request->input("num_personas");
        $gastro->estado=$request->input("estado");
        $gastro->restaurante_id=$request->input("restaurante_id");
        $gastro->cliente_id=$request->input("cliente_id");
        $gastro->mesa_id=$request->input("mesa_id");
        $gastro->save();
        
         return redirect('/reservas');
    
     }

     public function generar(){
        $length=10;
        $letras=substr(str_shuffle('ABCDEFGHIJKLMNOPQRST',1,$length));
        $numeros=rand(1111,9999);
        return $letras.$numeros;
     }

}
