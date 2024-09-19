@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Secretaria: {{$secretaria->nombres}}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-info card-outline ">
            <div class="card-header">
              <h3 class="card-title">datos Registrados </h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
             
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <p>{{$secretaria->nombres}}</p>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p>{{$secretaria->apellidos}}</p>
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <p>{{$secretaria->dni}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Celular</label>
                                <p>{{$secretaria->celular}}</p>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <p>{{$secretaria->fecha_nacimiento}}</p>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <p>{{$secretaria->direccion}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <p>{{$secretaria->user->email}}</p>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">cancelar</a>
                                
                            </div>
                        </div>
                    </div>
                
            </div> 
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection