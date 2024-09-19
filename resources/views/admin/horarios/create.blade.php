@extends('layouts.admin')
@section('content')

    <div  class="row">
        <h1>Registrar nueva horario</h1>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-primary card-outline ">
                <div class="card-header">
                  <h3 class="card-title">Complete los datos</h3>
                </div>
                <div class="card-body row" >
                    <div class="col-md-3">
                        <form action="{{url('admin/horarios/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">  
                                    <div class="form-group">
                                        <label for="">consultorio</label>
                                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                                            <option value="">Seleccionar cosnultorio</option>
                                            @foreach($consultorios as $consultorio)
                                                <option value="{{$consultorio->id}}">{{$consultorio->nombres." ubicacion ".$consultorio->ubicacion}}</option>
                                            @endforeach
                                        </select>
                                        <script>
                                            $('#consultorio_select').on('change',function(){
                                              var consultorio_id=$('#consultorio_select').val();
                                              var url="{{route('admin.horarios.datosConsultorio',':id')}}";
                                              url=url.replace(':id',consultorio_id);
                                              if(consultorio_id){
                                                $.ajax({
                                                  url:url,
                                                  type:'GET',
                                                  success:function(data){
                                                    $('#consultorio_info').html(data);
                                                  },
                                                  error:function(){
                                                    alert('error al obtener datos del cosnultorio');
                                                  }
                                                });
                                              }else{
                                                $('#consultorio_info').html('');
                                              }
                                            });
                                        </script>
                                    </div>
                                </div>   
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Dcotor</label><b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach($doctores as $doctor)
                                                <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos." ".$doctor->especialidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">dia</label><b>*</b>
                                        <select name="dia" id="" class="form-control">
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MEIRCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>
                                            <option value="SABADO">SABADO</option>
                                            <option value="DOMINGO">DOMINGO</option>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">HORA INICIO</label>
                                        <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                        
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">HORA FINAL</label>
                                        <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                        @error('hora_inicio')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>                    
                     
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/horarios')}}" class="btn btn-secondary">cancelar</a>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div id="consultorio_info">

                        </div>
                     
                    </div>
                </div> 
       
            </div>
        </div>      
    </div>
           
    
@endsection