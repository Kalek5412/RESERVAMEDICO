<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create (){
       
        return view('admin.pacientes.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'dni'=>'required|max:100|unique:pacientes',
            'num_seguro'=>'required|max:150|unique:pacientes',
            'fecha_nacimiento'=>'required|max:150',
            'genero'=>'required',
            'celular'=>'required|max:150',          
            'correo'=>'required|max:150|unique:pacientes',
            'direccion'=>'required|max:150',
            'grupo_sanguineo'=>'required',
            'alergias'=>'required|max:150',
            'contacto_emergencia'=>'required|max:250',

        ]);
        $paciente=new Paciente();
        $paciente->nombres=$request->nombres;
        $paciente->apellidos=$request->apellidos;
        $paciente->dni=$request->dni;
        $paciente->num_seguro=$request->num_seguro;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->genero=$request->genero;
        $paciente->celular=$request->celular;
        $paciente->correo=$request->correo;
        $paciente->direccion=$request->direccion;
        $paciente->grupo_sanguineo=$request->grupo_sanguineo;
        $paciente->alergias=$request->alergias;
        $paciente->contacto_emergencia=$request->contacto_emergencia;
        $paciente->observaciones=$request->observaciones;
        $paciente->save();
        return redirect()-> route('admin.pacientes.index')
            ->with('msj','se registro correctamente!');
    }


    public function show($id){
        $paciente = Paciente::findOrFail($id);
         return view('admin.pacientes.show',compact('paciente'));
    }
     public function edit($id){
         $paciente = Paciente::findOrFail($id);
          return view('admin.pacientes.edit',compact('paciente'));
    }


    public function update(Request $request, $id)
    {
        $paciente=Paciente::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'dni'=>'required|unique:pacientes,dni,'.$paciente->id,
            'num_seguro'=>'required|unique:pacientes,num_seguro,'.$paciente->id,
            'fecha_nacimiento'=>'required',
            'genero'=>'required',
            'celular'=>'required',
            'correo'=>'required|unique:pacientes,correo,'.$paciente->id,
            'direccion'=>'required',
            'grupo_sanguineo'=>'required',
            'alergias'=>'required',
            'contacto_emergencia'=>'required',
            'observaciones'=>'required',
        ]);
   
        $paciente->nombres=$request->nombres;
        $paciente->apellidos=$request->apellidos;
        $paciente->dni=$request->dni;
        $paciente->num_seguro=$request->num_seguro;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->genero=$request->genero;
        $paciente->celular=$request->celular;
        $paciente->correo=$request->correo;
        $paciente->direccion=$request->direccion;
        $paciente->grupo_sanguineo=$request->grupo_sanguineo;
        $paciente->alergias=$request->alergias;
        $paciente->contacto_emergencia=$request->contacto_emergencia;
        $paciente->observaciones=$request->observaciones;

        $paciente->save();
        return redirect()-> route('admin.pacientes.index')
        ->with('msj','se Actualizo al suuario correctamente!');
    }



    public function confirmDelete($id){
        $paciente = Paciente::findOrFail($id);
         return view('admin.pacientes.delete',compact('paciente'));
    }

    public function destroy($id){
        Paciente::destroy($id);
        return redirect()-> route('admin.pacientes.index')
        ->with('msj','se Elimino al suuario correctamente!');
    }
}
