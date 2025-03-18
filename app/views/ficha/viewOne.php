<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full items-center flex flex-col">
    <h2 class="text-[20px] font-bold">Datos de la ficha <?php echo $ficha->ficha ?></h2>
    <?php
        if($ficha && is_object($ficha)) {
            echo "<div class='flex w-full flex-col mt-5 self-start gap-2'>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>ID</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$ficha->id </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Ficha</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$ficha->ficha </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Programa</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$ficha->nombrePrograma</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Cantidad de aprendices</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$ficha->cantAprendices</p></span>
                </div>";
        }
    ?>
</div>