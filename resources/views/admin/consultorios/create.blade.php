@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>Registrar nueva consultorio</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">Complete los datos</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <form action="{{url('admin/consultorios/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ubicacion</label>
                                <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">capacidad</label><b>*</b>
                                <input type="text" value="{{old('capacidad')}}" name="capacidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control">
                            </div>
                        </div>    
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control">
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="NO_ACTIVO">NO_ACTIVO</option>
                                </select>
                            </div>
                        </div>  
                       
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">cancelar</a>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
   
        </div>
            <!-- /.card-body -->
    </div>
           
    
@endsection