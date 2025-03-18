<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full flex flex-col">
    <a class="bg-[#3eaa36] px-[10px] rounded-full text-[white] font-bold text-xl w-[50px] h-[50px] flex items-center justify-center mb-2" href="/centro/new">+</a>
    <div class='border-2 border-[#3eaa36] w-full'>
        <div class='flex w-full'>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Id</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Nombre</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Coordinador id</h2>
            <h2 class="w-[40%] text-center py-2 bg-[#3eaa36] font-bold text-[#fff]">Acciones</h2>
        </div>
        <?php
            if (empty($centros)) {
                echo "<br>No se encuentran centros en la base de datos";
            } else {
                foreach ($centros as $key => $value) {
                    
                    echo "<div class='flex'>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->id</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->nombre</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->fkIdCoordinador</span>
                        <div class='buttons w-[40%] h-[40px] text-center overflow-hidden border-t-2 border-t-[#3eaa36] py-2'>
                            <a class='p-2 py-1 text-[#fff] bg-blue-400 rounded-full' href='/centro/view/$value->id'>Consultar</a>
                            <a class='p-2 py-1 text-[#fff] bg-green-500 rounded-full' href='/centro/edit/$value->id'>Editar</a>
                            <a class='p-2 py-1 text-[#fff] bg-red-600 rounded-full' href='/centro/delete/$value->id'>Eliminar</a>
                        </div>
                    </div>";
                }
            }
        ?>
    </div>
</div>
