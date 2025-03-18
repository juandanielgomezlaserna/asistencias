<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/competencia/create" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>HoraIncio</label>
            <input type="time" name="horaInicio" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>HoraFin</label>
            <input type="time" name="horaFin" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label>Id Intructor</label>
            <input type="number" name="idInstructor" value="<?php echo $idInstructor?>" class="rounded-[0.5rem] py-1 text-center"></input>
        </div>
        
        <div class="flex flex-col">
            <label required for="">Ficha</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idFicha" id="">
                <option value="">Selecciona una Ficha</option>
                <?php
                if (isset($fichas) && is_array($fichas)) {
                    foreach ($fichas as $key => $value) {
                        echo "<option value=".$value->id.">".$value->ficha." - ".$value->nombrePrograma."</option>";
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

