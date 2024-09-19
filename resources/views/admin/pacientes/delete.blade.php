@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Eliminar paciente</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-danger card-outline ">
            <div class="card-header">
              <h3 class="card-title">seguro de eliminer los datos?</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/pacientes',$paciente->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <p>{{$paciente->nombres}}</p>
                                
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p>{{$paciente->apellidos}}</p>    
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <p>{{$paciente->dni}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Numero de seguro</label>
                                <p>{{$paciente->num_seguro}}</p>                        
                            </div>
                        </div>    
                        <div class="col-md-3">  
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <p>{{$paciente->fecha_nacimiento}}</p>                      
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">genero</label>
                                <p>@if($paciente->genero=='M') MASCULINO @else FEMENINO @endif</p>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <p>{{$paciente->celular}}</p>                          
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <p>{{$paciente->correo}}</p>             
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <p>{{$paciente->direccion}}</p>                           
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">G. sangre</label>
                                <p>{{$paciente->grupo_sanguineo}}</p>                    
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">Aergias</label>
                                <p>{{$paciente->alergias}}</p>
            
                            </div>
                        </div>                         
                 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">contacto Emer</label>
                                <p>{{$paciente->contacto_emergencia}}</p>
                                
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Observacionesr</label>
                                <p>{{$paciente->observaciones}}</p>
                                
                            </div>
                        </div> 
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/pacientes/index')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection