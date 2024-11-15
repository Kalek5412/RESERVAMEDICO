<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        $total_usuarios = User::count();
        $total_pacientes = Paciente::count();
        $total_secretarias=Secretaria::count();
        $total_consultorios=Consultorio::count();
        $total_doctores=Doctor::count();
        $total_horarios=Horario::count();
        $total_eventos=Horario::count();

        $consultorios=Consultorio::all();
        $doctores=Doctor::all();
        $eventos=Event::all();
        return view('admin.index',compact('total_usuarios','total_secretarias','total_pacientes','total_consultorios','total_doctores',
            'total_horarios','total_eventos','consultorios','doctores','eventos'));
    }

    public function verReservas($id){
        $eventos=Event::where('user_id',$id)->get();
        return view('admin.verReservas',compact('eventos'));
    }
 
}
