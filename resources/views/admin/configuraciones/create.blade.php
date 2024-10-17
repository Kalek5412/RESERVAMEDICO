@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Registrar nueva configuracion</h1>
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
                <form action="{{url('admin/configuraciones/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres de clinica</label><b>*</b>
                                <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                @error('nombre')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                
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
                                <label for="">correo</label><b>*</b>
                                <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">logo</label>
                                <input type="file"  class="form-control" >
                            </div>
                        </div>    
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">cancelar</a>
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