@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Modificar horario</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-success card-outline ">
            <div class="card-header">
              <h3 class="card-title">Edite los datos</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/horarios',$horario->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Doctor</label><b>*</b>
                                <input type="text" value="{{$horario->doctor->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Consultorio</label>
                                <input type="text" value="{{$horario->consultorio->nombres}}" name="nombres" class="form-control" required>
                
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">dia</label>
                            
                                <select name="dia" id="" class="form-control">
                                 
                                    <option value="LUNES" @selected($horario->dia == 'LUNES')>LUNES</option>
                                    <option value="MARTES" @selected($horario->dia == 'MARTES')>MARTES</option>
                                    <option value="MIERCOLES" @selected($horario->dia == 'MIERCOLES')>MIERCOLES</option>
                                    <option value="JUEVES" @selected($horario->dia == 'JUEVES')>JUEVES</option>
                                    <option value="VIERNES" @selected($horario->dia == 'VIERNES')>VIERNES</option>
                                    <option value="SABADO" @selected($horario->dia == 'SABADO')>SABADO</option>
                                    <option value="DOMINGO" @selected($horario->dia == 'DOMINGO')>DOMINGO</option>
                                </select>
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">hora inicio</label><b>*</b>
                                <input type="text" value="{{$horario->hora_inicio}}" name="hora_inicio" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">hora fin</label>
                                <input type="text" value="{{$horario->hora_fin}}" name="hora_fin" class="form-control" required>
                            </div>
                        </div>    
    
                              
                 
               
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizarr</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection