

//testimonios
function submitTestimonial() {
  // Obtener la calificación seleccionada
  const rating = document.querySelector('input[name="rating"]:checked');
  const testimonialText = document.getElementById('testimonial').value;

  if (rating && testimonialText.trim() !== "") {
      // Crear un contenedor para el testimonio
      const testimonialContainer = document.createElement('div');
      testimonialContainer.classList.add('testimonial-item');

      // Crear un elemento para mostrar la calificación
      const ratingDisplay = document.createElement('div');
      ratingDisplay.classList.add('rating-display');
      ratingDisplay.innerHTML = '&#9733;'.repeat(rating.value);
      testimonialContainer.appendChild(ratingDisplay);

      // Crear un elemento para el texto del testimonio
      const testimonialContent = document.createElement('p');
      testimonialContent.textContent = testimonialText;
      testimonialContainer.appendChild(testimonialContent);

      // Agregar el nuevo testimonio a la lista de testimonios
      document.getElementById('testimonial-list').appendChild(testimonialContainer);

      // Limpiar el formulario
      document.getElementById('testimonial').value = '';
      document.querySelectorAll('input[name="rating"]').forEach((input) => input.checked = false);
  } else {
      alert("Por favor, completa la calificación y el testimonio antes de enviar.");
  }
}

