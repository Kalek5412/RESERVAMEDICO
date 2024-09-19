<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    }

    public function create (){
       
        return view('admin.consultorios.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombres'=>'required|max:150',
            'ubicacion'=>'required|max:150',
            'capacidad'=>'required|max:100',         
            'especialidad'=>'required|max:150',
            'estado'=>'required',
        ]);

        //Consultorio::create($request->all());

        $consultorio=new consultorio();
        $consultorio->nombres=$request->nombres;
        $consultorio->ubicacion=$request->ubicacion;
        $consultorio->capacidad=$request->capacidad;
        $consultorio->especialidad=$request->especialidad;    
        $consultorio->estado=$request->estado;
        $consultorio->save();
        return redirect()-> route('admin.consultorios.index')
            ->with('msj','se registro correctamente!');
    }


    public function show($id){
        $consultorio = Consultorio::findOrFail($id);
         return view('admin.consultorios.show',compact('consultorio'));
    }
     public function edit($id){
         $consultorio = Consultorio::findOrFail($id);
          return view('admin.consultorios.edit',compact('consultorio'));
    }


    public function update(Request $request, $id)
    {
        $consultorio=consultorio::find($id);
        $request->validate([
            'nombres'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'especialidad'=>'required',
            'estado'=>'required',
        ]);

        //Consultorio::update($request->all());

        $consultorio->nombres=$request->nombres;
        $consultorio->ubicacion=$request->ubicacion;
        $consultorio->capacidad=$request->capacidad;
        $consultorio->telefono=$request->telefono;
        $consultorio->especialidad=$request->especialidad;
        $consultorio->estado=$request->estado;
        $consultorio->save();
        return redirect()-> route('admin.consultorios.index')
        ->with('msj','se Actualizo al suuario correctamente!');
    }


  
    public function confirmDelete($id){
        $consultorio = consultorio::findOrFail($id);
         return view('admin.consultorios.delete',compact('consultorio'));
    }

    public function destroy($id){
        consultorio::destroy($id);
        return redirect()-> route('admin.consultorios.index')
        ->with('msj','se Elimino al suuario correctamente!');
    }

}
