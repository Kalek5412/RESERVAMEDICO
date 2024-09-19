<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = doctor::with('user')->get();
        return view('admin.doctores.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
/*         $datos=request()->all();
        return response()->json($datos); */
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'telefono'=>'required',
            'licencia_medica'=>'required|unique:doctors',
            'especialidad'=>'required',
            'email'=>'required|max:150|unique:users',
            'password'=>'required|max:250|confirmed'
        ]);
        $usuario=new User();
        $usuario->name=$request->nombres;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request['password']);
        $usuario->save();

        $doctor=new Doctor();
        $doctor->user_id=$usuario->id;
        $doctor->nombres=$request->nombres;
        $doctor->apellidos=$request->apellidos;
        $doctor->telefono=$request->telefono;
        $doctor->licencia_medica=$request->licencia_medica;
        $doctor->especialidad=$request->especialidad;
        $doctor->save();
        return redirect()-> route('admin.doctores.index')
        ->with('msj','se registro correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.edit',compact('doctor'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor=Doctor::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'telefono'=>'required',
            'licencia_medica'=>'required|unique:doctors,licencia_medica,'.$doctor->id,
            'especialidad'=>'required',        
            'email'=>'required|max:150|unique:users,email,'.$doctor->user->id,
            'password'=>'nullable|max:250|confirmed'
        ]);
        
        $doctor->nombres=$request->nombres;
        $doctor->apellidos=$request->apellidos;
        $doctor->telefono=$request->telefono;
        $doctor->licencia_medica=$request->licencia_medica;
        $doctor->especialidad=$request->especialidad;
        $doctor->save();

        $usuario=User::find($doctor->user->id);
        $usuario->name=$request->nombres;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request['password']);
        $usuario->save();
        return redirect()-> route('admin.doctores.index')
        ->with('msj','se actualizo registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {     
        $doctor = doctor::findOrFail($id);
        return view('admin.doctores.delete',compact('doctor'));
    }

    public function destroy($id)
    {
        $doctor = doctor::find($id);
        //eliminar usuario asociado
        $user=$doctor->user;
        $user->delete();
        //elimianr a la doctor
        $doctor->delete();

        return redirect()-> route('admin.doctores.index')
        ->with('msj','se Elimino al suuario correctamente!');
    }
}
