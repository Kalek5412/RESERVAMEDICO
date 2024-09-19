@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-danger card-outline ">
            <div class="card-header">
              <h3 class="card-title">¿seguro de elimianr el registro?</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('/admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre usuario</label>
                                <input type="text" value="{{$usuario->name}}" name="name" class="form-control" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" value="{{$usuario->email}}" name="email" class="form-control" disabled>
                                @error('email')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                            
          
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/usuarios/index')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                       </div>
                </form>
   
            </div>
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection