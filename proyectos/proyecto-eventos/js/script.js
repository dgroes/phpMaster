document.addEventListener('DOMContentLoaded', function () {
  console.log('DOMContentLoaded: El contenido ha sido cargado');

  // Obtener referencia al elemento del calendario
  var calendarEl = document.getElementById('calendar');
  console.log('calendarEl:', calendarEl); // Verificar si calendarEl está obteniendo el elemento correctamente

  // Crear instancia de FullCalendar
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: "es",
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,list'
    },
    events: {
      url: 'controllers/calendarioController.php', // URL para obtener los eventos en formato JSON
      method: 'GET' // Método de solicitud HTTP
    },
    eventColor: '#a0a5d6', // Cambiar color de fondo de los eventos
    eventTextColor: '#191624', // Cambiar color del texto de los eventos
    eventClick: function (info) {
      // Mostrar detalles del evento en un modal al hacer clic en él
      mostrarModal(info.event);
    }
  });

  console.log('calendar:', calendar); // Verificar si la instancia de FullCalendar se está creando correctamente

  // Agregar el calendario al DOM
  calendar.render();

  // Función para mostrar modal con detalles del evento
  function mostrarModal(evento) {
    var modal = document.getElementById('eventoModal');
    modal.style.display = 'block';

    // Rellenar el modal con los detalles del evento   evento.extendedProps.time;
    document.getElementById('eventoTitulo').innerText = evento.title;
    document.getElementById('eventoDescripcion').innerText = evento.extendedProps.descripcion;
    document.getElementById('eventoFecha').innerText = 'Fecha: ' + evento.start.toLocaleDateString();
    document.getElementById('eventoHora').innerText = 'Hora: ' + evento.extendedProps.time;
    document.getElementById('eventoUbicacion').innerText = 'Ubicación: ' + evento.extendedProps.location;
    document.getElementById('eventoOrganizador').innerText = 'Organizador: ' + evento.extendedProps.organizer;

    // Cerrar el modal cuando se hace clic en el botón de cerrar
    var closeBtn = document.getElementsByClassName('close')[0];
    closeBtn.onclick = function () {
      modal.style.display = 'none';
    }

    // Cerrar el modal cuando se hace clic fuera de él
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  }
});
