@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Nueva Reserva</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reserva</a></li>
                        <li class="breadcrumb-item active">Nueva Reserva</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Crear Nueva Reservasss</h4>
                </div>

                <div class="card-body">
                    <form class="row gy-4" id="reservationForm">
                        @csrf

                        {{-- Nombre del Usuario --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="user" class="form-label">{{ __('Usuario') }}</label>
                                <input id="user" type="text"
                                    class="form-control @error('reservation_date') is-invalid @enderror"
                                    value="{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}" readonly>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        {{-- Nombre del Consultor --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="consultant_id" class="form-label">{{ __('Consultor') }}</label>
                                <select class="form-select @error('consultant_id') is-invalid @enderror" id="consultant_id"
                                    name="consultant_id" required
                                    value="{{ old('consultant_id') }}>
                                    <option value=""
                                    readonly>{{ __('Seleccionar un consultor') }}-</option>
                                    @foreach ($consultants as $consultant)
                                        <option value="{{ $consultant->id }}">{{ $consultant->nombres }}
                                            {{ $consultant->apellidos }}</option>
                                    @endforeach
                                </select>
                                @error('consultant_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Fecha de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="reservation_date" class="form-label">{{ __('Fecha de Reservación') }}</label>
                                <input type="date" class="form-control @error('reservation_date') is-invalid @enderror"
                                    id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}"
                                    required>
                                @error('reservation_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hora de inicio la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="start_time" class="form-label">{{ __('Hora de inicio') }}</label>
                                <select class="form-select @error('start_time') is-invalid @enderror" id="start_time"
                                    name="start_time" required>
                                    <option value="" readonly>{{ __('Seleccionar una Hora') }}</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hora de fin de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end_time" class="form-label">{{ __('Hora de Fin') }}</label>
                                <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                                    id="end_time" name="end_time" value="{{ old('end_time') }}" required readonly>
                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Estado de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="reservation_status" class="form-label">{{ __('Estado de la Reserva') }}</label>
                                <select class="form-select @error('reservation_status') is-invalid @enderror"
                                    id="reservation_status" name="reservation_status" required>
                                    <option value="" readonly>{{ __('Seleccionar un estado') }}</option>
                                    <option value="confirmada">Confirmada</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                                @error('reservation_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Total a pagar --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="total_amount" class="form-label">{{ __('Total a pagar (USD)') }}</label>
                                <input type="text" class="form-control @error('total_amount') is-invalid @enderror"
                                    id="total_amount" name="total_amount" value="50.000" required readonly>
                                @error('total_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Metodo de pago --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="payment_status" class="form-label">{{ __('Metodo de Pago') }}</label>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    {{-- Paypal --}}
    <script src="https://www.paypal.com/sdk/js?client-id=AcymNlz1q-u6xvO2kLtSxcyp53V851J87KkbL6St3_-rf7x433Wh5SQDSOk-wninfemJtcithHQH3T2x&currency=USD"></script>

    {{-- <script>
        const today = new Date().toISOString().split('T')[0]; // Fecha actual
        document.getElementById('reservation_date').setAttribute('min', today); // Fecha mínima

        const pricePerHour = 50; // Define el precio por hora

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '50.00',
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                console.log(data);
                return actions.order.capture().then(function(details) {
                    console.log(details);
                    alert("Pago completado por " + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container'); // Renderiza el botón de PayPal en el contenedor


        document.getElementById('start_time').addEventListener('change', function() {
            const startTime = this.value;

            if (startTime) {
                // Convertir la hora de inicio a un objeto Date
                const startDate = new Date(`1970-01-01T${startTime}:00`);

                // Añadir una hora
                startDate.setHours(startDate.getHours() + 1);

                // Formatear la nueva hora como HH:MM
                const endTime = startDate.toTimeString().slice(0, 5);

                // Establecer el valor de end_time
                document.getElementById('end_time').value = endTime;

                // Calcular el total (en este caso siempre será 1 hora, pero puedes ajustar según el tiempo)
                const total = pricePerHour; // Siempre será 1 hora, así que multiplica por el precio

                document.getElementById('total_amount').value = total.toFixed(2); // Actualizar el total
            } else {

                // Limpiar el campo end_time si no se selecciona una hora
                document.getElementById('end_time').value = "";
                document.getElementById('total_amount').value = "";
            }
        });
    </script> --}}
    <script>
        // Obtiene la fecha actual en formato YYYY-MM-DD y la establece como mínimo en el campo de fecha de reserva
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('reservation_date').setAttribute('min', today);

        const pricePerHour = 50; // Define el precio por hora

        // Evento cuando el usuario selecciona la hora de inicio
        document.getElementById('start_time').addEventListener('change', function() {
            const startTime = this.value; // Obtiene el valor de la hora de inicio seleccionada

            if (startTime) {
                // Convierte la hora de inicio en un objeto Date (usando una fecha ficticia)
                const startDate = new Date(`1970-01-01T${startTime}:00`);
                // Añade una hora al objeto Date
                startDate.setHours(startDate.getHours() + 1);
                // Formatea la nueva hora como HH:MM
                const endTime = startDate.toTimeString().slice(0, 5);
                // Establece el valor del campo de hora de finalización
                document.getElementById('end_time').value = endTime;

                // Calcula el total por una hora (puedes ajustar si hay múltiplos de horas)
                const total = pricePerHour; // Para este caso, el total es el precio por una hora
                document.getElementById('total_amount').value = total.toFixed(2); // Establece el total formateado
            } else {
                // Si no se selecciona una hora, limpia los campos de hora de finalización y total
                document.getElementById('end_time').value = "";
                document.getElementById('total_amount').value = "";
            }
        });

        // Inicializa el botón de PayPal al cargar el DOM
        document.addEventListener('DOMContentLoaded', function() {
            paypal.Buttons({
                // Método que se ejecuta cuando se crea una orden de pago
                createOrder: function(data, actions) {
                    var consultantId = document.getElementById('consultant_id').value;
                    var reservationDate = document.getElementById('reservation_date').value;
                    var startTime = document.getElementById('start_time').value;
                    var totalAmount = document.getElementById('total_amount').value;

                    // Validación para verificar que todos los campos obligatorios estén completos
                    if (!consultantId || !reservationDate || !startTime || !totalAmount) {
                        Swal.fire({
                            icon: 'warning', // Muestra una advertencia si faltan campos
                            title: 'Campos Incompletos',
                            text: 'Por Favor, completa todos los campos obligatorios',
                        });
                        return false; // Detiene el proceso si hay campos incompletos
                    }

                    // Crea la orden de PayPal con el monto total
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: totalAmount // Monto total de la orden
                            }
                        }]
                    });
                },
                // Método que se ejecuta cuando el pago ha sido aprobado
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Realiza una solicitud POST al servidor para completar la reserva
                        return fetch('/paypal', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Añade el token CSRF para la seguridad de Laravel
                            },
                            body: JSON.stringify({
                                orderID: data.orderID, // ID de la orden de PayPal
                                details: details, // Detalles del pago de PayPal
                                user_id: {{ auth()->user()->id }}, // ID del usuario autenticado
                                consultant_id: document.getElementById('consultant_id').value, // ID del consultor
                                reservation_date: document.getElementById('reservation_date').value, // Fecha de la reserva
                                start_time: document.getElementById('start_time').value, // Hora de inicio de la reserva
                                end_time: document.getElementById('end_time').value, // Hora de fin de la reserva
                                total_amount: document.getElementById('total_amount').value, // Monto total de la reserva
                            })
                        }).then(function(response) {
                            if (response.ok) {
                                // Si la respuesta es exitosa, muestra un mensaje de éxito
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Pago Completado',
                                    text: 'Pago Completado y reserva creada correctamente',
                                }).then(function() {
                                    window.location.href = '/client/reservations'; // Redirige a la página de reservas del cliente
                                });
                            } else {
                                // Si hay un error en el pago, muestra un mensaje de error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error al procesar el pago',
                                });
                            }
                        });
                    });
                }
            }).render('#paypal-button-container'); // Renderiza el botón de PayPal en el contenedor
        });
    </script>

@endpush
