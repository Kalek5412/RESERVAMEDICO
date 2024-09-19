@extends('layouts.admin')
@section('content')

    <div  class="container">
        <h1>listado de secretarias</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">Secretarias registrados</h3>

              <div class="card-tools">
                <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary">
                  Nuevo secreatria
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
                        <th scope="col">dni</th>
                        <th scope="col">celular</th>
                        <th scope="col">fecha nacimiento</th>
                        <th scope="col">direccion</th>
                        <th scope="col">email</th>
                        <th scope="col">acciones</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                    <?php $i=1 ?>
                      @foreach($secretarias as $secretaria)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$secretaria->nombres}}</td>
                        <td>{{$secretaria->apellidos}}</td>
                        <td>{{$secretaria->dni}}</td>
                        <td>{{$secretaria->celular}}</td>
                        <td>{{$secretaria->fecha_nacimiento}}</td>
                        <td>{{$secretaria->direccion}}</td>
                        <td>{{$secretaria->user->email}}</td>
                        <td style="align-items: center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{url('admin/secretarias/'.$secretaria->id)}}" type="button" class="btn btn-success btn-sm mr-1"><i class="bi bi-eye"></i></a>
                              <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}" type="button" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil"></i></a>
                              <a href="{{url('admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                              "info": "Mostrando _START_ a _END_ de _TOTAL_ Secretarias",
                              "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                              "infoFiltered": "(Filtrado de _MAX_ total Secretarias)",
                              "infoPostFix": "",
                              "thousands": ",",
                              "lengthMenu": "Mostrar _MENU_ Secretarias",
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