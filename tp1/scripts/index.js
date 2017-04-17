window.onload = function() {
    var agregarEmpleado = document.getElementById('agregar');
    var mostrarEmpleados = document.getElementById('mostrar');
    //agregarEmpleado.addEventListener = agregarLink('agregarEmpleado.html');
    agregarEmpleado.addEventListener('click', function() {
        window.location.href = 'agregarEmpleado.html';
    });
    mostrarEmpleados.addEventListener('click', function() {
        window.location.href = 'mostrar.html';
    })

}