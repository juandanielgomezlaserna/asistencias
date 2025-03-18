<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/programa/update" method="post">
        <div class="flex flex-col">
            <label for="">Id del programa</label>
            <input readonly value="<?php echo $programa->id ?>" type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Nombre del programa</label>
            <input type="text" value="<?php echo $programa->nombre ?>" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label for="">centro del programa</label>
            <input readonly value="<?php echo $idCentro ?>" type="text" name="idCentro" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>
