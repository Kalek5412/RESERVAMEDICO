<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor','consultorio')->get();
        $consultorios=Consultorio::all();
        return view('admin.horarios.index', compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores=Doctor::all();
        $consultorios=Consultorio::all();
        $horarios=Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create', compact('doctores','consultorios','horarios'));
    }

    public function datosConsultorio($id){
       try{
        $horarios=Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
        //print_r($horarios);
        return view('admin.horarios.datosConsultorio',compact('horarios'));
       }catch(\Exception $exception){
        return response()->json(['msj'=>'Error']);
       } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request -> validate([
        'dia'=>'required',
        'hora_inicio'=>'required|date_format:H:i',
        'hora_fin'=>'required|date_format:H:i|after:hora_inicio',
        'consultorio_id'=>'required|exists:consultorios,id',
       ]);
       $horarioExistente=Horario::where('dia',$request->dia)->
       where('consultorio_id',$request->consultorio_id)->
        where(function($query) use ($request){
            $query->where(function($query) use ($request){
                $query->where('hora_inicio','>=',$request->hora_inicio)->
                where('hora_inicio','<',$request->hora_fin);
            })->orWhere(function($query) use ($request){
                $query->where('hora_fin','>',$request->hora_inicio)->
                where('hora_fin','<=',$request->hora_fin);
                })->orWhere(function($query) use ($request){
                    $query->where('hora_inicio','<',$request->hora_inicio)->
                    where('hora_fin','>',$request->hora_fin);
                    });
        })->exists();

        if($horarioExistente){
            return redirect()->back()->withInput()
            ->with('msj','ocupado el horario mrd')
            ->with('icon','error');
        }

       Horario::create($request->all());
       return redirect()-> route('admin.horarios.index')
       ->with('msj','se registro correctamente!')
       ->with('icon','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = horario::findOrFail($id);
        
        return view('admin.horarios.show',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = horario::findOrFail($id);
        return view('admin.horarios.edit',compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $horario=Horario::find($id);
        $request->validate([
            'dia'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required'
        ]);
        Horario::update($request->all());
        return redirect()-> route('admin.horarios.index')
        ->with('msj','se Actualizo al horario correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
