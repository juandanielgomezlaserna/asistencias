<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/administrador/create" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>Cedula</label>
            <input type="text" name="cedula" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>Regional</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idRegional" id="txtIdRegional">
                <?php
                if (isset($regionales) && is_array($regionales)) {
                    foreach ($regionales as $key => $value) {
                        echo "<option value=".$value->id.">".$value->nombre."</option>";
                    }
                } else {
                    echo "Error";
                }
                ?>
            </select>
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>
