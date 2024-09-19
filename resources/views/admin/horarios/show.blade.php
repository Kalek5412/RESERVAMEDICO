@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>horario: {{$horario->nombres}}</h1>
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
                                <label for="">Doctor</label><b>*</b>
                                <p>{{$horario->doctor->nombres}}</p>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <p>{{$horario->doctor->especialidad}}</p>
                            </div>
                        </div>       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Consultorio</label>
                                <p>{{$horario->consultorio->nombres}}</p>
                            </div>
                        </div>             
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">dia</label><b>*</b>
                                <p>{{$horario->dia}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Hora incio</label>
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>    
   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">hora fin</label>
                                <p>{{$horario->hora_fin}}</p>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">cancelar</a>
                                
                            </div>
                        </div>
                    </div>
                
            </div> 
            <!-- /.card-body -->
        </div>
           
    </div>
@endsection