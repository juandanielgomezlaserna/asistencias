<form class="w-full" action="/asistencia/update" method="post">
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
            if (isset($asistencias) && count($asistencias) > 0) {
                foreach($asistencias as $asistencia){
                    echo "<div class='aprendiz flex w-full'>
                        <p class='w-[50%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$asistencia->nombreAprendiz</p>
                        <input class='hidden' type='text' value='$asistencia->idAprendiz' name='aprendiz$asistencia->idAprendiz'>";
                        if ($asistencia->cantHoras == 0) {
                            echo "<div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                            <input checked class='w-[20px] h-[20px]' type='radio' name='check$asistencia->idAprendiz' value='asisitio'>
                            </div>";
                        }else{
                            echo "<div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                            <input class='w-[20px] h-[20px]' type='radio' name='check$asistencia->idAprendiz' value='asisitio'>
                            </div>";
                        }
                        echo "<div class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                        <select name='cantHoras$asistencia->idAprendiz'>";
                        for ($i=0; $i < $cantHoras; $i++) {
                            if ($asistencia->cantHoras == $i) {
                                echo "<option selected value='$i'>$i</option>";
                            }else{
                                echo "<option value='$i'>$i</option>";
                            }
                        }
                        echo "</select>";
                        echo "</div>";
                        if ($asistencia->cantHoras == -1) {
                            echo "<div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                            <input checked class='w-[20px] h-[20px]' type='radio' name='check$asistencia->idAprendiz' value='excusa'>
                            </div>";
                        }else{
                            echo "<div class='w-[15%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>
                            <input class='w-[20px] h-[20px]' type='radio' name='check$asistencia->idAprendiz' value='excusa'>
                            </div>";
                        }
                        if ($asistencia->cantHoras == 0) {
                            $asistenciaTxt = "asistio";
                        }else if($asistencia->cantHoras == -1){
                            $asistenciaTxt = "excusa";
                        }else if($asistencia->cantHoras == $cantHoras){
                            $asistenciaTxt = "no asistio";
                        }else{
                            $asistenciaTxt = "cantHoras";
                        }
                        echo "<input class='hidden' name='asistencia$asistencia->idAprendiz' value='$asistenciaTxt'>
                        <input class='hidden' name='id$asistencia->idAprendiz' value='$asistencia->id'>
                    </div>";
                }
            }else{
                echo "Aún no hay aprendices en esta ficha";
            }
            ?>
        </div>
    </div>
    <script>
        const aprendices = document.querySelectorAll(".aprendiz")
    
        for (let i = 0; i < aprendices.length; i++) {
            let asistencia1 = aprendices[i].children[2].children[0]
            let asistencia2 = aprendices[i].children[3].children[0]
            let asistencia3 = aprendices[i].children[4].children[0]
            let asistencia4 = aprendices[i].children[5]
    
            asistencia1.addEventListener("change", function(){
                asistencia4.value = "asistio"
                asistencia2.value = 0
            })
            
            asistencia2.addEventListener("input", function(){
                asistencia4.value = "cantHoras"
                asistencia3.checked = false
                asistencia1.checked = false
                if (asistencia2.value == 0) {
                    asistencia4.value = "no asistio"
                }
            })
            
            asistencia3.addEventListener("change", function(){
                asistencia4.value = "excusa"
                asistencia2.value = 0
            })
        }
    </script>
</form>