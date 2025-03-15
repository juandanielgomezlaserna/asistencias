<div class="data-container">
    <form action="/grupo/update" method="post">
        <div class="form-group">
            <label for="">Id del grupo</label>
            <input readonly value="<?php echo $grupo->id ?>" type="number" name="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ficha del grupo</label>
            <input type="number" value="<?php echo $grupo->ficha ?>" name="ficha" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Cantidad de aprendices</label>
            <input value="<?php echo $grupo->cantAprendices ?>" type="number" name="cantAprendices" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <select name="estado" id="">
                <option value="">Estado...</option>
                <option <?php if($grupo->estado == "activo"){echo "selected";} ?> value="activo">Activo</option>
                <option <?php if($grupo->estado == "inactivo"){echo "selected";} ?> value="inactivo">Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Fecha de inicio de la etapa lectiva</label>
            <input value="<?php echo $grupo->fechaIniLectiva ?>" type="date" name="fechaIniLectiva" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Fecha de fin de la etapa lectiva</label>
            <input value="<?php echo $grupo->fechaFinLectiva ?>" type="date" name="fechaFinLectiva" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Id del programa de formación</label>
            <input value="<?php echo $grupo->fkIdProgForm ?>" type="number" name="fkIdProgForm" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
