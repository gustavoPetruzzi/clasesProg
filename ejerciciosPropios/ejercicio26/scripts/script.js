window.onload = function() {
        generador("idFilas");
        generador("idColumnas");
    }
function generador(id) {
        var select = document.getElementById(id);
        for (var index = 0; index < 50; index++) {
            var option = document.createElement('option');
            option.value = index + 1;
            option.innerHTML = index + 1;
            select.appendChild(option);
        }
    }