<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/administrador/update" method="post">
        <div class="flex flex-col">
            <label for="">Id del administrador</label>
            <input readonly value="<?php echo $administrador->id ?>" type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Nombre del administrador</label>
            <input type="text" value="<?php echo $administrador->nombre ?>" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Cedula del administrador</label>
            <input value="<?php echo $administrador->cedula ?>" type="text" name="cedula" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label required for="">Regional del administrador</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idRegional" id="">
                <option value="">Selecciona una Regional</option>
                <?php
                if (isset($regionales) && is_array($regionales)) {
                    foreach ($regionales as $key => $value) {
                        if ($administrador->fkIdRegional == $value->id) {
                            echo "<option value=".$value->id." selected>".$value->nombre."</option>";
                        }else{

                            echo "<option value=".$value->id.">".$value->nombre."</option>";
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
