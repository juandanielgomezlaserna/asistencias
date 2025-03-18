<form class="w-full" action="/asistencia/create" method="post">
    <div class="w-full p-5 flex flex-col">
        <div class="flex items-center border-2 border-[#3eaa36] bg-[#3eaa36] b-2 pb-4">
            <div class=" w-[90%] flex flex-col">
                <h3 class="text-[25px] text-center font-bold text-[#fff]"><?php echo $info->nombrePrograma." ".$info->numeroFicha ?></h3>
                <h2 class="font-bold text-center text-[#fff]"><?php echo $info->nombreCompetencia ?></h2>
                <p class=" text-center text-[#fff]"><?php echo $info->descripcion ?></p>
                <p class=" text-center text-[#fff]">Fecha: <?php echo $fecha ?></p>
                <input class='hidden' type='text' name='idCompetencia' value='<?php echo $idCompetencia ?>'>
                <input class='hidden' type='text' name='cantHoras' value='<?php echo $cantHoras ?>'>
                <input class='hidden' type='date' name='fecha' value='<?php echo $fecha ?>'>
            </div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-white roundend hover:bg-green-600"><i class="fa-solid fa-floppy-disk"></i></button>
        </div>
        <div class="mt-2 border-2 border-[#3eaa36]">
            <div class='flex w-full'>
                <h2 class="w-[50%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Nombre</h2>
                <h2 class="w-[15%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">✅</h2>
                <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">🕜</h2>
                <h2 class="w-[15%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">📋</h2>
            </div>
            <?php
            if (isset($aprendices) && count($aprendices) > 0) {
                foreach($aprendices as $aprendiz){
                    echo "<div class='aprendiz flex w-full'>
                        <p class='w-[50%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$aprendiz->nombre</p>
                        <input class='hidden' type='text' value='$aprendiz->id' name='aprendiz$aprendiz->id'>
                        <div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                        <input class='w-[20px] h-[20px]' type='radio' name='check$aprendiz->id' value='asisitio'>
                        </div>
                        <div class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                        <select name='cantHoras$aprendiz->id'>";
                        for ($i=0; $i < $cantHoras; $i++) { 
                            echo "<option value='$i'>$i</option>";
                        }
                        echo "</select>
                        </div>
                        <div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                        <input class='w-[20px] h-[20px]' type='radio' name='check$aprendiz->id' value='excusa'>
                        </div>
                        <input class='hidden' name='asistencia$aprendiz->id' value='no asistio'>
                    </div>";
                }
            }else{
                echo "Aún no hay aprendices en esta ficha";
            }
            ?>
        </div>
    </div>
</form>
<script>
    const aprendices = document.querySelectorAll(".aprendiz")

    for (let i = 0; i < aprendices.length; i++) {
        const asistencia1 = aprendices[i].children[2].children[0]
        const asistencia2 = aprendices[i].children[3].children[0]
        const asistencia3 = aprendices[i].children[4].children[0]
        const asistencia4 = aprendices[i].children[5]

        asistencia1.addEventListener("change", function(){
            asistencia4.value = "asistio"
            asistencia2.value = 0
        })
        
        asistencia2.addEventListener("input", function(){
            asistencia4.value = "cantHoras"
            asistencia2.checked = false
            asistencia1.checked = false
        })
        
        asistencia3.addEventListener("input", function(){
            asistencia4.value = "excusa"
            asistencia2.value = 0
        })
    }
</script>