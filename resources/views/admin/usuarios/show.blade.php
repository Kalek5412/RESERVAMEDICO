@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">datos Registrados </h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre usuario</label>
                                <p>{{$usuario->name}}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">Correo</label>
                                <p>{{$usuario->email}}</p>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Regresar</a>                               
                            </div>
                        </div>
                       </div>
                </form>
   
            </div>
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection