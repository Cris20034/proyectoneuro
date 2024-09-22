// Script para el menú desplegable
document.addEventListener('DOMContentLoaded', function () {
  // Código para el menú hamburguesa
  const menuIcon = document.querySelector('.menu-icon');
  const navLinks = document.querySelector('.nav-links');

  menuIcon.addEventListener('click', function () {
      if (navLinks.style.display === 'block') {
          navLinks.style.display = 'none';
      } else {
          navLinks.style.display = 'block';
      }
  });
});

// Script para mostrar los detalles de los servicios y el calendario
const botonesVerMas = document.querySelectorAll('.ver-mas');

botonesVerMas.forEach(boton => {
  boton.addEventListener('click', () => {
      const detalles = boton.parentNode.querySelector('.detalles');
      detalles.style.display = 'block';

      // Ocultar otros detalles (opcional)
      const otrosDetalles = document.querySelectorAll('.detalles:not(.show)');
      otrosDetalles.forEach(detalle => {
          detalle.style.display = 'none';
      });

      // Inicializar el calendario (si aún no está inicializado)
      const calendarEl = detalles.querySelector('#calendar');
      if (!calendarEl.calendar) {
          const calendar = new FullCalendar.Calendar(calendarEl, {
              // Configuración del calendario
              initialView: 'dayGridMonth',
              selectable: true,
              headerToolbar: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay'
              },
              events: [
                  // Aquí puedes añadir eventos de ejemplo
                  { title: 'Clase de Yoga', start: '2024-09-25' },
                  { title: 'Masajes Relajantes', start: '2024-09-30' }
              ]
          });
          calendar.render();
          calendarEl.calendar = calendar;  // Guarda la instancia del calendario
      }
  });
});


