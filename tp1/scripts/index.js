$(document).ready( inicializar);

function inicializar() {
    $('#agregar').on('click', function() {
        window.location.href = 'agregarEmpleado.html';
    })
    $('#mostrar').on('click', function() {
        window.location.href = 'mostrar.html';
    })
    $('#modificar').on('click', function() {
        window.location.href = 'modificar.html';
    })

}