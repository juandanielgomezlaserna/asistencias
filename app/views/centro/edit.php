<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/centro/update" method="post">
        <div class="flex flex-col">
            <label for="">Id del centro</label>
            <input readonly value="<?php echo $centro->id ?>" type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Nombre del centro</label>
            <input type="text" value="<?php echo $centro->nombre ?>" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label for="">Regional</label>
            <input value="<?php echo $centro->fkIdRegional ?>" type="text" name="idRegional" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label required for="">Coodrinador</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idCoordinador" id="">
                <?php
                if (isset($coordinadores) && is_array($coordinadores)) {
                    foreach ($coordinadores as $key => $value) {
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