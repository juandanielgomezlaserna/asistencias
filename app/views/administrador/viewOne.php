<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full items-center flex flex-col">
    <h2 class="text-[20px] font-bold">Datos del administrador <?php echo $administrador->nombre ?></h2>
    <?php
        if($administrador && is_object($administrador)) {
            echo "<div class='flex w-full flex-col mt-5 self-start gap-2'>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>ID</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$administrador->id </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Nombre</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$administrador->nombre </p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Cedula</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$administrador->cedula</p></span>
                    <span class='w-full flex flex-col'><p class='font-bold bg-[#3eaa36] text-[white] text-center py-2 border-2 border-[#3eaa36]'>Regional</p> <p class='text-center py-2 border-2 border-[#3eaa36]'>$administrador->regionalNombre</p></span>
                </div>";
        }
    ?>
</div>