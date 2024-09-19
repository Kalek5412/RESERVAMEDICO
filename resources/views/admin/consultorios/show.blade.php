@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>consultorio: {{$consultorio->nombres}}</h1>
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
                            <p>{{$consultorio->nombres}}</p>
                        </div>
                    </div>    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Ubicacion</label>
                            <p>{{$consultorio->ubicacion}}</p>
            
                        </div>
                    </div>                  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">capacidad</label><b>*</b>
                            <p>{{$consultorio->capacidad}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">  
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <p>{{$consultorio->telefono}}</p>
                        </div>
                    </div>    
                    <div class="col-md-4">  
                        <div class="form-group">
                            <label for="">Especialidad</label>
                            <p>{{$consultorio->especilidad}}</p>
                        </div>
                    </div> 
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <p>@if($consultorio->estado=='A') ACTIVO @else NO ACTIVO @endif</p>
                        </div>
                    </div>  
                   
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Regresar</a>
                            
                        </div>
                    </div>
                </div>
            </div> 
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection