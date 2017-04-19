window.onload = function() {
    var req = new XMLHttpRequest();
    var url = "php/mostrar.php";
    req.open('GET', url, true);

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {

            var principal = document.getElementById('principal');
            var info = JSON.parse(req.responseText);
            for (var dato in info) {
                var element = info[dato];
                alert(element.nombre);
            }

            //principal.appendChild(div);
        }
    }
    req.send();
}