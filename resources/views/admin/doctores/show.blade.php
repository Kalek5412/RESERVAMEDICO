@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>doctor: {{$doctor->nombres}}</h1>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <p>{{$doctor->nombres}}</p>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p>{{$doctor->apellidos}}</p>
                            </div>
                        </div>       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <p>{{$doctor->telefono}}</p>
                            </div>
                        </div>             
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">licencia</label><b>*</b>
                                <p>{{$doctor->licencia_medica}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">especialidad</label>
                                <p>{{$doctor->especialidad}}</p>
                            </div>
                        </div>    
   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <p>{{$doctor->user->email}}</p>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">cancelar</a>
                                
                            </div>
                        </div>
                    </div>
                
            </div> 
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection