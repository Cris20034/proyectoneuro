//_____________________________________________________________________________________________________-
//<!-- Añadir script jQuery para habilitar submenús -->

  $(document).ready(function () {
    // Almacena el submenú abierto actualmente
    let activeSubMenu = null;

    $('.dropdown-submenu a.dropdown-toggle').on("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      // Cierra el submenú activo si hay uno abierto
      if (activeSubMenu && activeSubMenu !== $(this).next('.dropdown-menu')) {
        activeSubMenu.hide();
      }

      // Alterna el submenú actual
      $(this).next('.dropdown-menu').toggle();
      activeSubMenu = $(this).next('.dropdown-menu').is(':visible') ? $(this).next('.dropdown-menu') : null;
    });

    // Cierra el submenú cuando se hace clic en otro lugar
    $(document).on('click', function (e) {
      if (activeSubMenu && !$(e.target).closest('.dropdown-menu').length) {
        activeSubMenu.hide();
        activeSubMenu = null;
      }
    });
  });


//_________________________________________________________________________________

  document.addEventListener("DOMContentLoaded", function () {
    var toggleMenu = document.getElementById("toggleMenu");
    var collapsedMenu = document.getElementById("collapsedMenu");

    // Mover elementos de la lista de navegación al menú colapsado
    var navBase = document.getElementById("nav_base");
    collapsedMenu.appendChild(navBase);

    // Mostrar u ocultar menú colapsado al hacer clic en el botón de hamburguesa
    toggleMenu.addEventListener("click", function () {
      collapsedMenu.style.display = (collapsedMenu.style.display === "block") ? "none" : "block";
    });
  });


//_________________________________________________________________________________

