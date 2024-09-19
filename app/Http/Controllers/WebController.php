<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Consultorio;

class WebController extends Controller{

    public function index(){

            $consultorios = Consultorio::all();
            return view('index',compact('consultorios'));
    }

    public function datosConsultorio($id){

        $consultorio = Consultorio::find($id);

        try{
            $horarios=Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('datosConsultorio',compact('horarios','consultorio'));
           }catch(\Exception $exception){
            return response()->json(['msj'=>'Error']);
           } 
    }
}
