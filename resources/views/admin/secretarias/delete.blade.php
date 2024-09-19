@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Eliminar secretaria</h1>
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
                <form action="{{url('admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" disabled>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <input type="text" value="{{$secretaria->dni}}" name="dni" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" disabled>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
                                @error('email')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                      
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Cancelar</a>
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