@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Modificar doctor</h1>
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
                <form action="{{url('admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$doctor->apellidos}}" name="apellidos" class="form-control" required>
                
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{$doctor->telefono}}" name="telefono" class="form-control" required>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">licencia medica</label><b>*</b>
                                <input type="text" value="{{$doctor->licencia_medica}}" name="licencia_medica" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">especialidad</label>
                                <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" required>
                            </div>
                        </div>    
             
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Verifica Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>                        
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizarr</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection