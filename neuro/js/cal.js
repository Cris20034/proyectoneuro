let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

const monthAndYear = document.getElementById("monthAndYear");

function showCalendar(month, year) {
    const firstDay = (new Date(year, month)).getDay();
    const daysInMonth = 32 - new Date(year, month, 32).getDate();

    const calendarBody = document.getElementById("calendar-body");
    calendarBody.innerHTML = "";

    monthAndYear.innerHTML = months[month] + " " + year;

    let date = 1;
    for (let i = 0; i < 6; i++) {
        const row = document.createElement("tr");

        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                const cell = document.createElement("td");
                cell.appendChild(document.createTextNode(""));
                row.appendChild(cell);
            } else if (date > daysInMonth) {
                break;
            } else {
                const cell = document.createElement("td");
                const cellText = document.createTextNode(date);
                cell.appendChild(cellText);

                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("today");
                }

                row.appendChild(cell);
                date++;
            }
        }

        calendarBody.appendChild(row);
    }
}

function nextMonth() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function prevMonth() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

showCalendar(currentMonth, currentYear);

document.addEventListener('DOMContentLoaded', function() {
    // Cambiar el tamaño del menú de navegación al hacer scroll
    window.onscroll = function() {
        var nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('small');
        } else {
            nav.classList.remove('small');
        }
    };

    // Mostrar/ocultar el menú hamburguesa
    const menuIcon = document.querySelector('.menu-icon');
    const navLinks = document.querySelector('.nav-links');

    menuIcon.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
});

