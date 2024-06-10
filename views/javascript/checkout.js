function validarSeleccion() {
    var radios = document.getElementsByName('direccion');
    var seleccionado = false;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            seleccionado = true;
            break;
        }
    }
    var botonCompra = document.getElementById('botonCompra');
    botonCompra.disabled = !seleccionado;
}
