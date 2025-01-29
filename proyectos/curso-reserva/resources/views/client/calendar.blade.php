@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Calendario de Reservas</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cliente</a></li>
                        <li class="breadcrumb-item active">Calendario</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ver Reservas</h4>
                </div>

                <div class="card-body">
                    <div id="calendar">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtiene el elemento del DOM donde se mostrará el calendario
        var calendarE1 = document.getElementById('calendar');

        // Inicializa el calendario con FullCalendar
        var calendar = new FullCalendar.Calendar(calendarE1, {
            initialView: 'dayGridMonth', // Vista inicial del calendario (vista por mes)
            locale: 'es', // Establece el idioma en español
            headerToolbar: { // Configura las opciones de navegación en el calendario
                left: 'prev,next today', // Botones prev, next y today a la izquierda
                center: 'title', // Título del calendario (mes o día actual) en el centro
                right: 'dayGridMonth,timeGridWeek,timeGridDay', // Vistas disponibles: mes, semana, día a la derecha
            },
            buttonText: { // Traduce los textos de los botones
                today: 'Hoy', // Texto para el botón "Hoy"
                month: 'Mes', // Texto para la vista mensual
                week: 'Semana', // Texto para la vista semanal
                day: 'Día', // Texto para la vista diaria
            },
            // Carga los eventos desde la ruta especificada (datos dinámicos desde el backend)
            events: '{{ route("client.fullcalendar") }}',
            // Función que se ejecuta después de que un evento ha sido montado en el calendario
            eventDidMount: function(info) {
                // Cambia el color de fondo si el evento tiene un color definido
                if (info.event.backgroundColor) {
                    info.el.style.backgroundColor = info.event.backgroundColor;
                }

                // Cambia el color del borde si el evento tiene un color de borde definido
                if (info.event.borderColor) {
                    info.el.style.borderColor = info.event.borderColor;
                }
            }
        });

        // Renderiza el calendario en la página
        calendar.render();
    });
</script>
@endpush
