@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1><b>Bienvenido:</b> {{ Auth::user()->email }} | <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }}
        </h1>
    </div>
    <hr>
    <div class="row">
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-file-person"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>
                        <p>Secretarias</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-person-circle"></i>
                    </div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>
                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-person-fill-check"></i>
                    </div>
                    <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_consultorios }}</h3>

                        <p>Consultorio</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-building-fill-add"></i>
                    </div>
                    <a href="{{ url('admin/consultorios') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.doctores.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_doctores }}</h3>
                        <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-person-lines-fill"></i>
                    </div>
                    <a href="{{ url('admin/doctores') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_horarios }}</h3>
                        <p>Horarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas bi bi-calendar2-week"></i>
                    </div>
                    <a href="{{ url('admin/horarios') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_eventos }}</h3>
                    <p>reserevas</p>
                </div>
                <div class="icon">
                    <i class="fas bi bi-calendar2-check"></i>
                </div>
                <a href="#" class="small-box-footer"> <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
    </div>
    @can('datosConsultorio')
        <div class="col-12">
            <div class="card card-primary card-outline ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de atencion de doctores</h3>
                        </div>
                        <div class="col-md-4">
                            <div style="float: right">
                                <label for="">consultorio</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                <option value="">Seleccionar cosnultorio</option>
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombres . ' ubicacion ' . $consultorio->ubicacion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <script>
                        $('#consultorio_select').on('change', function() {
                            var consultorio_id = $('#consultorio_select').val();
                            /*    var url="{{ route('admin.horarios.datosConsultorio', ':id') }}";
                                url=url.replace(':id',consultorio_id); */
                            if (consultorio_id) {
                                $.ajax({
                                    url: "{{ url('/consultorios/') }}" + '/' + consultorio_id,
                                    type: 'GET',
                                    success: function(data) {
                                        $('#consultorio_info').html(data);
                                    },
                                    error: function() {
                                        alert('error al obtener datos del cosnultorio');
                                    }
                                });
                            } else {
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

        <div class="col-12">
            <div class="card card-warning card-outline ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de citas medicas</h3>
                        </div>
                        <div class="col-md-4">
                            <div style="float: right">
                                <label for="">Doctores</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="doctor_id" id="doctor_select" class="form-control">
                                <option value="">Seleccionar doctor...</option>
                                @foreach ($doctores as $doctor)
                                    <option value="{{ $doctor->id }}">
                                        {{ $doctor->nombres . ' ' . $doctor->apellidos . ' ' . $doctor->especialidad }}
                                    </option>
                                @endforeach
                            </select>
                            <script>
                                $('#doctor_select').on('change', function() {
                                    var doctor_id = $('#doctor_select').val();
                                    var calendarEl = document.getElementById('calendar');
                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialView: 'dayGridMonth',
                                            locale: 'es',
                                            events: [
                                                
                                        ]
                                    });
                                if (doctor_id) {
                                    $.ajax({
                                        url: "{{ url('/cargar_reserva_doctores/') }}" + '/' + doctor_id,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            calendar.addEventSource(data);
                                        },
                                        error: function() {
                                            alert('error al obtener datos del doctor');
                                        }
                                    });
                                } else {
                                    $('#doctor_info').html('');
                                }
                                calendar.render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Registrar cita medica
                        </button>
                        <a href="{{ url('/admin/verReservas', Auth::user()->id) }}" class="btn btn-success ml-2"><i
                                class="bi bi-calendar2-check"></i> las reservas</a>
                        <form action="{{ url('/admin/eventos/create') }}" method="post">
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reserva Cita</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Doctor</label>
                                                        <select name="doctor_id" id="" class="form-control">
                                                            @foreach ($doctores as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->nombres }}
                                                                    {{ $doctor->apellidos }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Fecha reserva</label>
                                                        <input type="date" name="fecha_reserva" id="fecha_reserva"
                                                            value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const fechaReservaInput = document.getElementById('fecha_reserva');
                                                                //Escuchar el evento de cambio en el campo de fecha reserva
                                                                fechaReservaInput.addEventListener('change', function() {
                                                                    let selectedDate = this.value; //Obtener la Fecha seleccionada
                                                                    //Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                                                                    let today = new Date().toISOString().slice(0, 10);
                                                                    //Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                    if (selectedDate < today) {
                                                                        //Si es así, establecer la fecha seleccionada en null
                                                                        this.value = null;
                                                                        alert('No se puede reservar en una fecha pasada.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Hora reserva</label>
                                                        <input type="time" name="hora_reserva" id="hora_reserva"
                                                            class="form-control">

                                                        @error('hora_reserva')
                                                            <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                        @if ($message = Session::get('hora_reserva'))
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    $('#exampleModal').modal('show');
                                                                });
                                                            </script>
                                                            <small style="color: red">{{ $message }}</small>
                                                        @endif
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const horaReservaInput = document.getElementById('hora_reserva');
                                                                horaReservaInput.addEventListener('change', function() {
                                                                    let selectedTime = this.value;
                                                                    if (selectedTime) {
                                                                        selectedTime = selectedTime.split(':');
                                                                        selectedTime = selectedTime[0] + ':00';
                                                                        this.value = selectedTime;
                                                                    }
                                                                    if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                        //Si es así, establecer la fecha seleccionada en null
                                                                        this.value = null;
                                                                        alert('seelcciona la hora de 08-20:00.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    @endcan

    @if(Auth::check() && Auth::user()->doctor)
    
    <div class="col-12">
        <div class="card card-primary card-outline ">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="card-title">Calendario de reservas</h3>
                    </div>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <table id="example1" class="table  table-hover table-sm">
                    <thead style="text-align: center">
                        <tr>
                            <th scope="col">Nro</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha de reserva</th>
                            <th scope="col">Hora de reserva</th>
                     
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <?php $i = 1; ?>
                        @foreach ($eventos as $evento)
                            @if(Auth::user()->doctor->id == $evento->doctor_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $evento->user->name }} </td>
                                <td>{{ \Carbon\Carbon::parse($evento->end)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($evento->end)->format('H:i') }}</td>
           
                            </tr>
                            @endif
                
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ eventos",
                                "infoEmpty": "Mostrando 0 a 0 de 0 eventos",
                                "infoFiltered": "(Filtrado de _MAX_ total eventos)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ eventos",
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
     
    @endif



@endsection
