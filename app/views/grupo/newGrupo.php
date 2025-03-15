<div class="data-container">
    <form action="/grupo/create" method="post">
        <div class="form-group">
            <label for="">Ficha del grupo</label>
            <input type="number" name="ficha" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Cantidad de aprendices</label>
            <input type="number" name="cantAprendices" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <select name="estado" id="">
                <option value="">Estado...</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Fecha de inicio de la etapa lectiva</label>
            <input type="date" name="fechaIniLectiva" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Fecha de fin de la etapa lectiva</label>
            <input type="date" name="fechaFinLectiva" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Id del programa de formación</label>
            <input type="number" name="fkIdProgForm" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
