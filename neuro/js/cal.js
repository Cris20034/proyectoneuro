const timeSlots = [
  { time: '8:00 - 9:00', maxAppointments: 15, appointments: 0 },
  { time: '9:00 - 10:00', maxAppointments: 15, appointments: 0 },
];

function createSchedule() {
  const schedule = document.getElementById('schedule');
  schedule.innerHTML = ''; // Limpiar filas anteriores

  timeSlots.forEach(slot => {
      const row = document.createElement('tr');
      const cellTime = document.createElement('td');
      cellTime.textContent = slot.time;

      const cellStatus = document.createElement('td');
      cellStatus.className = slot.appointments < slot.maxAppointments ? 'available' : 'full';
      cellStatus.textContent = slot.appointments < slot.maxAppointments ? 'Disponible' : 'Lleno';
      
      cellStatus.onclick = () => {
          if (slot.appointments < slot.maxAppointments) {
              slot.appointments++;
              cellStatus.textContent = `Cita Agendada (${slot.appointments}/${slot.maxAppointments})`;
              if (slot.appointments === slot.maxAppointments) {
                  cellStatus.classList.remove('available');
                  cellStatus.classList.add('full');
              }
          } else {
              alert('Este horario ya está lleno.');
          }
      };

      row.appendChild(cellTime);
      row.appendChild(cellStatus);
      schedule.appendChild(row);
  });
}

document.getElementById('daySelect').addEventListener('change', function() {
  const selectedDay = this.value;
  const timeSlotsDiv = document.getElementById('timeSlots');
  
  if (selectedDay) {
      timeSlotsDiv.style.display = 'block';
      createSchedule();
  } else {
      timeSlotsDiv.style.display = 'none';
  }
});
