// Obtener todas las imágenes seleccionables
const imagenesSeleccionables = document.querySelectorAll('.selecionables .selector');

// Agregar un evento clic a cada imagen seleccionable
imagenesSeleccionables.forEach(imagen => {
  imagen.addEventListener('click', () => {
    // Obtener la ruta de la imagen de la imagen seleccionada
    const nuevaRuta = imagen.getAttribute('src');
    
    // Obtener el elemento de la vista previa
    const vistaPrevia = document.getElementById('preview');
    
    // Cambiar la ruta de la imagen de la vista previa
    vistaPrevia.setAttribute('src', nuevaRuta);
  });
});

