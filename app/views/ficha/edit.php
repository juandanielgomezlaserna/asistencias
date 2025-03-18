<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/ficha/update" method="post">
        <div class="flex flex-col">
            <label for="">Id de la ficha</label>
            <input readonly value="<?php echo $ficha->id ?>" type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Ficha</label>
            <input type="text" value="<?php echo $ficha->ficha ?>" name="ficha" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label required for="">Programa</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idPrograma" id="">
                <option value="">Selecciona un programa</option>
                <?php
                if (isset($programas) && is_array($programas)) {
                    foreach ($programas as $key => $value) {
                        if ($ficha->fkIdPrograma == $value->id) {
                            echo "<option value=".$value->id." selected>".$value->nombre."</option>";
                        }else{
                            echo "<option value=".$value->id.">".$value->nombre."</option>";
                        }
                    }
                }
                ?>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="">Cantidad de aprendices</label>
            <input value="<?php echo $ficha->cantAprendices ?>" type="number" name="cantAprendices" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>
