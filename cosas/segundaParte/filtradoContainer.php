<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/filtrado.js"> </script>
</head>
<body>
    
    <div class="container">
        <select class="form-control" id="paises">
        </select>
        <button class="btn btn-primary btn-block" id="buscar"> Buscar </button> 
        <table class="table" id="principal">
        </table>
    </div>
    <div class="container" id="respuesta">
    </div>
</body>
</html>