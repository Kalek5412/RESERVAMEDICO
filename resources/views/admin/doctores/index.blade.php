@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>listado de doctores</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">doctores registrados</h3>

              <div class="card-tools">
                <a href="{{url('admin/doctores/create')}}" class="btn btn-primary">
                  Nuevo doctor
                </a>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
              @if($message=Session::get('msj'))
                <script>
                  Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{$message}}",
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>
              @endif
                <table id="example1" class="table  table-hover table-sm">
                    <thead style="text-align: center">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombres</th>
                        <th scope="col">apellidos</th>
                        <th scope="col">telefono</th>
                        <th scope="col">licencia_medica</th>
                        <th scope="col">especialidad</th>
                        <th scope="col">email</th>
                        <th scope="col">acciones</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                    <?php $i=1 ?>
                      @foreach($doctors as $doctor)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$doctor->nombres}}</td>
                        <td>{{$doctor->apellidos}}</td>
                        <td>{{$doctor->telefono}}</td>
                        <td>{{$doctor->licencia_medica}}</td>
                        <td>{{$doctor->especialidad}}</td>
                        <td>{{$doctor->user->email}}</td>
                        <td style="align-items: center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{url('admin/doctores/'.$doctor->id)}}" type="button" class="btn btn-success btn-sm mr-1"><i class="bi bi-eye"></i></a>
                              <a href="{{url('admin/doctores/'.$doctor->id.'/edit')}}" type="button" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil"></i></a>
                              <a href="{{url('admin/doctores/'.$doctor->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                              "info": "Mostrando _START_ a _END_ de _TOTAL_ doctores",
                              "infoEmpty": "Mostrando 0 a 0 de 0 doctores",
                              "infoFiltered": "(Filtrado de _MAX_ total doctores)",
                              "infoPostFix": "",
                              "thousands": ",",
                              "lengthMenu": "Mostrar _MENU_ doctores",
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
@endsection