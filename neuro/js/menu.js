// Script para el menú desplegable (tu código)
document.addEventListener('DOMContentLoaded', function () {
    // ... (tu código existente) ...
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
        });
        calendar.render();
      }
    });
  });