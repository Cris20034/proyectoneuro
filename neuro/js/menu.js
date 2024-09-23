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





