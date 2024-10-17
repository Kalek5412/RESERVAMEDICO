@extends('layouts.admin')
@section('content')

  <div  class="row">
    <h1>listado de horarios</h1>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline ">
        <div class="card-header">
          <h3 class="card-title">horarioes registrados</h3>

          <div class="card-tools">
            <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
              Nuevo horario
            </a>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <table id="example1" class="table  table-hover table-sm">
                <thead style="text-align: center">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">dcotor</th>
                    <th scope="col">especialidad</th>
                    <th scope="col">consultorio</th>
                    <th scope="col">dia</th>
                    <th scope="col">hora inico</th>
                    <th scope="col">hora fin</th>
                    <th scope="col">acciones</th>
                  </tr>
                </thead>
                <tbody style="text-align: center">
                <?php $i=1 ?>
                  @foreach($horarios as $horario)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$horario->doctor->nombres}}</td>
                    <td>{{$horario->doctor->especialidad}}</td>
                    <td>{{$horario->consultorio->nombres}}</td>
                    <td>{{$horario->dia}}</td>
                    <td>{{$horario->hora_inicio}}</td>
                    <td>{{$horario->hora_fin}}</td>
                    <td style="align-items: center">
                      <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-success btn-sm mr-1"><i class="bi bi-eye"></i></a>
                          <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil"></i></a>
                          <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table> 
            <script>
              $(function () {
                  $("#example1").DataTable({
                      "pageLength": 10,
                      "language": {
                          "emptyTable": "No hay información",
                          "info": "Mostrando _START_ a _END_ de _TOTAL_ horarioes",
                          "infoEmpty": "Mostrando 0 a 0 de 0 horarioes",
                          "infoFiltered": "(Filtrado de _MAX_ total horarioes)",
                          "infoPostFix": "",
                          "thousands": ",",
                          "lengthMenu": "Mostrar _MENU_ horarioes",
                          "loadingRecords": "Cargando...",
                          "processing": "Procesando...",
                          "search": "Buscador:",
                          "zeroRecords": "Sin resultados encontrados",
                          "paginate": {
                              "first": "Primero",
                              "last": "Ultimo",
                              "next": "Siguiente",
                              "previous": "Anterior"
                          }
                      },
                      "responsive": true, "lengthChange": true, "autoWidth": false,
                      buttons: [{
                          extend: 'collection',
                          text: 'Reportes',
                          orientation: 'landscape',
                          buttons: [{
                              text: 'Copiar',
                              extend: 'copy',
                          }, {
                              extend: 'pdf'
                          },{
                              extend: 'csv'
                          },{
                              extend: 'excel'
                          },{
                              text: 'Imprimir',
                              extend: 'print'
                          }
                          ]
                      },
                          {
                              extend: 'colvis',
                              text: 'Visor de columnas',
                              collectionLayout: 'fixed three-column'
                          }
                      ],
                  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
              });
          </script> 
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-md-12">
      <div class="card card-primary card-outline ">
        <div class="card-header">
          <div class="row">
            <div class="col-md-4">
              <h3 class="card-title">Calendario de atencion</h3>
            </div>
            <div class="col-md-4">
              <div style="float: right">
                <label for="">consultorio</label>
              </div>
            </div>
            <div class="col-md-4">
              
              <select name="consultorio_id" id="consultorio_select" class="form-control">
                <option value="">Seleccionar cosnultorio</option>
                  @foreach($consultorios as $consultorio)
                      <option value="{{$consultorio->id}}">{{$consultorio->nombres." ubicacion ".$consultorio->ubicacion}}</option>
                  @endforeach
              </select>
            </div>
          </div>
 
       

        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <script>
              $('#consultorio_select').on('change',function(){
                var consultorio_id=$('#consultorio_select').val();
             /*    var url="{{route('admin.horarios.datosConsultorio',':id')}}";
                url=url.replace(':id',consultorio_id); */
                if(consultorio_id){
                  $.ajax({
                    url:"{{url('/admin/horarios/consultorios/')}}"+'/'+consultorio_id,
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

            <!--tabla-->
            <div id="consultorio_info">
            </div>
            <!--f-tbala-->
        </div>
  
      </div>
    </div>

          
  </div>
@endsection