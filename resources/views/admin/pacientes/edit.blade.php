@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Modificar paciente</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-success card-outline ">
            <div class="card-header">
              <h3 class="card-title">Edite los datos</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/pacientes',$paciente->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control" required>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <input type="text" value="{{$paciente->dni}}" name="dni" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Numero de seguro</label>
                                <input type="text" value="{{$paciente->num_seguro}}" name="num_seguro" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-3">  
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">genero</label>
                                <select name="genero" id="" class="form-control">
                                    @if($paciente->genero=='M')
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                    @else
                                    <option value="F">FEMENINO</option>
                                    <option value="M">MASCULINO</option>
                                    @endif
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" value="{{$paciente->celular}}" name="celular" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" value="{{$paciente->correo}}" name="correo" class="form-control" required>
                                @error('correo')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">G. sangre</label>
                                <select name="grupo_sanguineo" id="" class="form-control">
                                 
                                    <option value="O" @selected($paciente->grupo_sanguineo == 'O')>O</option>
                                    <option value="A" @selected($paciente->grupo_sanguineo == 'A')>A</option>
                                    <option value="B" @selected($paciente->grupo_sanguineo == 'B')>B</option>
                              
                                
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">Aergias</label>
                                <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control" required>
                            </div>
                        </div>                         
                 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">contacto Emer</label>
                                <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control" required>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Observacionesr</label>
                                <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control">
                            </div>
                        </div> 
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-success">editar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection