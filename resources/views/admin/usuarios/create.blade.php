@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Crear nuevo usuarios</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">Registrar datos</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/usuarios/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre usuario</label><b>*</b>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" name="email" class="form-control" required>
                                @error('email')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Verifica Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                       </div>
                </form>
   
            </div>
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection