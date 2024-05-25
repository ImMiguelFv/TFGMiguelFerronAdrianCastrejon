// Obtener todas las imágenes seleccionables
const imagenesSeleccionables = document.querySelectorAll('.selecionables .selector');
const vistaPrevia = document.getElementById('preview');



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
// Verificar si la imagen de vista previa no tiene una ruta y hay al menos una imagen seleccionable
if (!vistaPrevia.getAttribute('src')) {
  // Obtener la ruta de la primera imagen seleccionable
  const primeraRuta = imagenesSeleccionables[0].getAttribute('src');
  // Establecer la ruta de la imagen de vista previa
  vistaPrevia.setAttribute('src', primeraRuta);
}



