@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Listado de Reservas</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reservas</a></li>
                        <li class="breadcrumb-item active">Lista de Reservas</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Reservas</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('reservations.create') }}" class="btn btn-primary waves-effect waves-light">Nueva
                        Reserva</a>
                    <br>
                    <br>
                    <table id="revervacionesTabla" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Consultor</th>
                                <th>Fecha de reservación</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de termino</th>
                                <th>Estado de la reserva</th>
                                <th>Pago</th>
                                <th>Estado de pago</th>
                                <th>Motivo de cancelación</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->user->nombres }} {{ $reservation->user->apellidos }}</td>
                                    <td>{{ $reservation->consultant->nombres }} {{ $reservation->consultant->apellidos }}</td>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->start_time }}</td>
                                    <td>{{ $reservation->end_time }}</td>
                                    <td>{{ $reservation->reservation_status }}</td>
                                    <td>{{ $reservation->total_amount }}</td>
                                    <td>{{ $reservation->payment_status }}</td>
                                    <td>{{ $reservation->cancellation_reason }}</td>
                                    <td>
                                        {{-- Editar --}}
                                        <a href="#', $usuario->id) }}"
                                            class="btn btn-warning btn-sm">Editar
                                        </a>

                                        {{-- Eliminar --}}
                                        <button type="buttom" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        {{-- Tablas dinamicas --}}
        <script>
            $(document).ready(function() {
                $('#revervacionesTabla').DataTable();
            })
        </script>

        {{-- Mensaje de éxito dinamico con Toastify --}}
        @if (session('success'))
            {
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            </script>
            }
        @endif

        {{-- Alerta de confirmación de eliminación --}}
        <script>
            function confirmarEliminacion(usuarioId) {
                Swal.fire({
                    title: "¿Estás Seguro?",
                    text: "No podrás revertir esta acción!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Eliminar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + usuarioId).submit();
                    }
                });
            }
        </script>
    @endpush
