<form class="form-horizontal" method="POST" id="datosEmpleado" onsubmit="return false;" >

    <div class="form-group">
        <label class="control-label">Nombre </label>
        <div class="input-group">
            <input name="Nombre" placeholder="Nombre" class="form-control" type="text" id="Nombre">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label"> Apellido </label>
        <div class="input-group">
            <input name="Apellido" placeholder="Apellido" class="form-control" type="text" id="Apellido">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label"> Dni </label>
        <div class="input-group">
            <input name="Dni" placeholder="Dni" class="form-control" type="text" id="Dni">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label"> Legajo </label>
        <div class="input-group">
            <input name="Legajo" placeholder="Legajo" class="form-control" type="text" id="Legajo">
        </div>
    </div>
    
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="sexo" value="F" required>
                Femenino
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sexo" value="M" required>
                Masculino
            </label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label"> Sueldo </label>
        <div class="input-group">
            <input name="Sueldo" placeholder="Sueldo" class="form-control" type="text" id="Sueldo">
        </div>
    </div>

    <label class="btn btn-default btn-file">
        Browse <input id="Foto" type="file" hidden>
    </label>
    <br>
    <button  class="btn btn-primary" type="submit"> Enviar </button>
</form>

