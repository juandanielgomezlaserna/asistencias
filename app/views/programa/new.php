<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/programa/create" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Nombre del programa</label>
            <input type="text" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label>centro</label>
            <input type="text" readonly value="<?php echo $idCentro ?>" name="idCentro" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>
