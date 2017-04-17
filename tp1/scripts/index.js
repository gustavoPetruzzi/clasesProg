window.onload = function() {
    var agregarEmpleado = document.getElementById('agregar');
    var mostrarEmpleados = document.getElementById('mostrar');
    var modificarEmpleados = document.getElementById('modificar');

    agregarEmpleado.addEventListener('click', function() {
        window.location.href = 'agregarEmpleado.html';
    });
    mostrarEmpleados.addEventListener('click', function() {
        window.location.href = 'mostrar.html';
    })
    modificarEmpleados.addEventListener('click', function() {
        window.location.href = modificar.html;
    })

}