document.addEventListener('DOMContentLoaded', function () {
  console.log('DOMContentLoaded: El contenido ha sido cargado');

  var calendarEl = document.getElementById('calendar');
  console.log('calendarEl:', calendarEl); // Verifica si calendarEl está obteniendo el elemento correctamente

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
    eventColor: '#a0a5d6',
    eventTextColor: '#191624',
    eventClick: function (info) {
      // Aquí puedes acceder a los datos del evento haciendo referencia a 'info.event'
      // Por ejemplo, para mostrar el título del evento en un modal
      alert('Título del evento: ' + info.event.title);

      // Si prefieres mostrar los detalles del evento en otro elemento de la página, puedes hacer algo como:
      // document.getElementById('detalleEvento').innerHTML = 'Título: ' + info.event.title + ', Descripción: ' + info.event.extendedProps.descripcion;
    }

  });

  console.log('calendar:', calendar); // Verifica si la instancia de FullCalendar se está creando correctamente

  // Agregar un listener para el evento 'loading'
  calendar.on('loading', function (isLoading) {
    if (isLoading) {
      console.log('Cargando eventos...');
    } else {
      console.log('Eventos cargados.');
    }
  });

  // Agregar un listener para el evento 'eventDataTransform'
  calendar.on('eventDataTransform', function (data) {
    console.log('Datos transformados:', data);
  });

  // Agregar un listener para el evento 'eventDidMount'
  calendar.on('eventDidMount', function (info) {
    console.log('Evento montado:', info.event);
  });

  // Agregar un listener para el evento 'eventRender'
  calendar.on('eventRender', function (info) {
    console.log('Evento renderizado:', info.event);
  });

  calendar.render();
});
