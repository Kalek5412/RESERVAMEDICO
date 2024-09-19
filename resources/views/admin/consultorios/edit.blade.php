@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Modificar consultorio</h1>
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
                <form action="{{url('admin/consultorios',$consultorio->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{$consultorio->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ubicacion</label>
                                <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" required>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">capacidad</label><b>*</b>
                                <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control">
                                    <option value="A" @selected($consultorio->estado == 'ACTIVO')>ACTIVO</option>
                                    <option value="N" @selected($consultorio->estadi == 'NO_ACTIVO')>NO ACTIVO</option>
                                </select>
                            </div>
                        </div>  
                       
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection