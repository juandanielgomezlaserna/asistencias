

<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full items-center flex flex-col">
    <h2 class="text-[20px] font-bold">Datos de la competencia <?php echo $competencia->nombre ?></h2>
    <?php
        if($competencia && is_object($competencia)) {
            echo "<div class='flex w-full flex-col mt-5 self-start gap-2'>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>ID</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->id </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Nombre</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->nombre </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Descripcion</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->descripcion</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Hora de inicio</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->horaInicio</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Hora de fin</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->horaFin</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Instructor</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->nombreInstructor</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Ficha</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$competencia->numeroFicha</p></span>
                </div>";
        }
    ?>
</div>
