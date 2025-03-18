<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/competencia/update" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Id</label>
            <input readonly value="<?php echo $competencia->id ?>" type="text" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="txtNombre">Nombre</label>
            <input value="<?php echo $competencia->nombre ?>" type="text" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>Descripción</label>
            <input value="<?php echo $competencia->descripcion ?>" type="text" name="descripcion" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>HoraIncio</label>
            <input value="<?php echo $competencia->horaInicio ?>" type="time" name="horaInicio" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>HoraFin</label>
            <input value="<?php echo $competencia->horaFin ?>" type="time" name="horaFin" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label>Id Intructor</label>
            <input value="<?php echo $competencia->fkIdInstructor ?>" type="number" name="idInstructor" value="<?php echo $idInstructor?>" class="rounded-[0.5rem] py-1 text-center"></input>
        </div>
        
        <div class="flex flex-col">
            <label required for="">Ficha</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idFicha" id="">
                <option value="">Selecciona una Ficha</option>
                <?php
                if (isset($fichas) && is_array($fichas)) {
                    foreach ($fichas as $key => $value) {
                        if ($competencia->fkIdFicha == $value->id) {
                            echo "<option selected value=".$value->id.">".$value->ficha." - ".$value->nombrePrograma."</option>";
                        }else{
                            echo "<option value=".$value->id.">".$value->ficha." - ".$value->nombrePrograma."</option>";
                        }
                    }
                }
                ?>
            </select>
        </div>
        
    
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>

