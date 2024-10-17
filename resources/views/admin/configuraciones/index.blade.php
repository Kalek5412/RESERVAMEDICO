@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>listado de Configuracion</h1>
    </div>
    <hr>
    <div class="flex-container">
        <div class="card card-primary card-outline ">
            <div class="card-header">
                <h3 class="card-title">configuraciones registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/configuraciones/create') }}" class="btn btn-primary">
                       registrar
                    </a>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <table id="example1" class="table  table-hover table-sm">
                    <thead style="text-align: center">
                        <tr>
                            <th scope="col">nro</th>
                            <th scope="col">Hospital/clinica</th>

                            <th scope="col">direccion</th>
                            <th scope="col">telefono</th>
                            <th scope="col">correo</th>
                            <th scope="col">logo</th>
                        
                            <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <?php $i = 1; ?>
                        @foreach ($configuraciones as $configuracion)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $configuracion->nombre }} </td>
                                <td>{{ $configuracion->direccion }}</td>
                                <td>{{ $configuracion->telefono }}</td>
                                <td>{{ $configuracion->correo }}</td>
                                <td>{{ $configuracion->logo }}</td>
                                <td style="align-items: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('admin/configuraciones/' . $configuracion->id) }}" type="button"
                                            class="btn btn-success btn-sm mr-1"><i class="bi bi-eye"></i></a>
                                        <a href="{{ url('admin/configuraciones/' . $configuracion->id . '/edit') }}"
                                            type="button" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil"></i></a>
                                        <a href="{{ url('admin/configuraciones/' . $configuracion->id . '/confirm-delete') }}"
                                            type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ configuraciones",
                                "infoEmpty": "Mostrando 0 a 0 de 0 configuraciones",
                                "infoFiltered": "(Filtrado de _MAX_ total configuraciones)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ configuraciones",
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
        </div>
    </div>
@endsection
