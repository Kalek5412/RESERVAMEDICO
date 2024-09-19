@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Registrar nueva paciente</h1>
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
                <form action="{{url('admin/pacientes/create')}}" method="POST">
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
                                <label for="">DNI</label><b>*</b>
                                <input type="text" value="{{old('dni')}}" name="dni" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Numero de seguro</label>
                                <input type="text" value="{{old('num_seguro')}}" name="num_seguro" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">genero</label>
                                <select name="genero" id="" class="form-control">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
                                @error('correo')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">G. sangre</label>
                                <select name="grupo_sanguineo" id="" class="form-control">
                                    <option value="O">O</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">Aergias</label>
                                <input type="text" value="{{old('alergias')}}" name="alergias" class="form-control" required>
                            </div>
                        </div>                         
                 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">contacto Emer</label>
                                <input type="text" value="{{old('contacto_emergencia')}}" name="contacto_emergencia" class="form-control" required>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Observacionesr</label>
                                <input type="text" value="{{old('observaciones')}}" name="observaciones" class="form-control">
                            </div>
                        </div> 
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">cancelar</a>
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