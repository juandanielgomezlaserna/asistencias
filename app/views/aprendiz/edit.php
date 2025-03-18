<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/aprendiz/update" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Id del aprendiz</label>
            <input value="<?php echo $aprendiz->id ?>" readonly type="number" name="id" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="txtNombre">Nombre del aprendiz</label>
            <input value="<?php echo $aprendiz->nombre ?>" type="text" name="nombre" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label>Cédula</label>
            <input value="<?php echo $aprendiz->cedula ?>" type="text" name="cedula" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col hidden">
            <label>Estado</label>
            <input value="<?php echo $aprendiz->estado ?>" type="text" readonly value="Activo" name="estado" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col gap-2">
            <label>Ficha</label>
            <input class="filtrar rounded-[0.5rem] py-1 text-center" placeholder="filtar ficha" type="text">
            <select class="rounded-[0.5rem] py-1 text-center" name="idFicha" id="txtIdRegional">
                <?php
                if (isset($fichas) && is_array($fichas)) {
                    foreach ($fichas as $key => $value) {
                        if ($aprendiz->fkIdficha == $value->id) {
                            echo "<option selected class='ficha' value=".$value->id.">".$value->ficha." - ".$value->nombrePrograma."</option>";
                        }else{
                            echo "<option class='ficha' value=".$value->id.">".$value->ficha." - ".$value->nombrePrograma."</option>";
                        }
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

<script>
    //Elements
    const inpt = document.querySelector(".filtrar")
    const fichas = document.querySelectorAll(".ficha")

    //Event
    inpt.addEventListener("input", function(){
        for (let i = 0; i < fichas.length; i++) {
            if (inpt.value != "") {
                if (fichas[i].textContent.includes(`${inpt.value}`) || fichas[i].textContent.toLocaleLowerCase().includes((`${inpt.value}`).toLowerCase())) {
                    fichas[i].classList.remove("hidden")
                }else{
                    fichas[i].classList.add("hidden")
                }
            }else{
                fichas[i].classList.remove("hidden")
            }
        }
    })
</script>
