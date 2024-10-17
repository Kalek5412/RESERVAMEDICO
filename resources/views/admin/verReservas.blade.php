@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>listado de Reservas</h1>
    </div>
    <hr>
    <div class="flex-container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
                <h3 class="card-title">listado de reservas</h3>
            </div>
            <div class="card-body" style="display: block;">
                <table id="example1" class="table  table-hover table-sm">
                    <thead style="text-align: center">
                        <tr>
                            <th scope="col">Nro</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">fecha reserva</th>
                            <th scope="col">hora reserva</th>
                            <th scope="col">fecha registro</th>
                            <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <?php $i = 1; ?>
                        @foreach ($eventos as $evento)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $evento->doctor->nombres.' '.$evento->doctor->apellidos }} </td>
                                <td>{{ $evento->doctor->especialidad  }}</td>
                                <td>{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($evento->end)->format('H:i') }}</td>
                                <td>{{ $evento->created_at }}</td>


                                <td style="align-items: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                         <form action="{{url('/admin/eventos/destroy',$evento->id)}}" id="formulario{{$evento->id}}" 
                                                onclick="preguntar{{$evento->id}}(event)" method="POST">                   
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form> 
                                            <script>
                                                function preguntar{{$evento->id}}(event){
                                                
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "Seguro de eliminar la reserva?",
                                                        text:"Si elimina el resgitro, otro usuario podra reservas esta hora",
                                                        icon:"question",
                                                        showDenyButton: true,
                                                        showCancelButton: false,
                                                        confirmButtonText: "Eliminar",
                                                        denyButtonText: `Cancelar`
                                                    }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                        if (result.isConfirmed) {
                                                       
                                                            var form = $('#formulario{{$evento->id}}');
                                                            form.submit(); 
                                                         
                                                        } 
                                                    });
                                                }
                                            </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 reservas",
                                "infoFiltered": "(Filtrado de _MAX_ total reservas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ reservas",
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
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    }, {
                                        extend: 'csv'
                                    }, {
                                        extend: 'excel'
                                    }, {
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }]
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
