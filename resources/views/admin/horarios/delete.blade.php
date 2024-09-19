@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Eliminar doctor</h1>
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
                <form action="{{url('admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" disabled>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$doctor->apellidos}}" name="apellidos" class="form-control" disabled>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">licencia</label><b>*</b>
                                <input type="text" value="{{$doctor->licencia_medica}}" name="licencia_medica" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" disabled>
                            </div>
                        </div>    
              
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" disabled>
                                @error('email')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                      
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
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