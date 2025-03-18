<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/coordinador/update" method="post">
        <div class="flex flex-col">
            <label for="">Id del coordinador</label>
            <input readonly value="<?php echo $coordinador->id ?>" type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Nombre del coordinador</label>
            <input type="text" value="<?php echo $coordinador->nombre ?>" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="">Cedula del coordinador</label>
            <input value="<?php echo $coordinador->cedula ?>" type="text" name="cedula" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label required for="">Regional del coordinador</label>
            <input readonly value="<?php echo $regionalId ?>" type="text" name="idRegional" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Guardar</button>
        </div>
    </form>
</div>
