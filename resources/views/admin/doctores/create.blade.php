@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Registrar nueva doctor</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">Complete los datos</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/doctores/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                
                            </div>
                        </div>                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">licencia</label><b>*</b>
                                <input type="text" value="{{old('licencia_medica')}}" name="licencia_medica" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                            </div>
                        </div>    

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Verifica Password</label>
                                <input type="password" name="password_confirmation" class="form-control" >
                            </div>
                        </div>                        
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection