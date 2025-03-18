
<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full flex flex-col">
    <a class="bg-[#3eaa36] px-[10px] rounded-full text-[white] font-bold text-xl w-[50px] h-[50px] flex items-center justify-center mb-2" href="/asistencia/new">+</a>
    <?php
    if(isset($errors)){
        echo "<div class='text-red-500'>";
        echo $errors;
        echo "</div>";
    }
    ?>
    <div class='border-2 border-[#3eaa36] w-full'>
        <div class='flex w-full'>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Id</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Fecha</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Competencia</h2>
            <h2 class="w-[40%] text-center py-2 bg-[#3eaa36] font-bold text-[#fff]">Acciones</h2>
        </div>
        <?php
            if (empty($asistencias)) {
                echo "<br>No se encuentran asistencias en la base de datos";
            } else {
                foreach ($asistencias as $key => $value) {
                    
                    echo "<div class='flex'>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->id</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->fecha</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->nombreCompetencia</span>
                        <div class='buttons w-[40%] h-[40px] text-center overflow-hidden border-t-2 border-t-[#3eaa36] py-2'>
                            <a class='p-2 py-1 text-[#fff] bg-blue-400 rounded-full' href='/asistencia/viewOne/$value->id'>Abrir</a>
                        </div>
                    </div>";
                }
            }
        ?>
    </div>
</div>