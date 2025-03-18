
<div class="bg-[#fff] p-5 shadow-lg rounded-[0.5rem] w-full flex flex-col">
    <div class="flex items-center w-full justify-center">
        <label class="text-[20px] font-bold" for="">Filtrar por ultima fecha</label>
        <input class="border-[#3eaa36] border-2 w-[40%] h-[40px] text-center m-2" placeholder="Filtrar por ficha" type="date">
        <input class="check" type="checkbox">
    </div>
    <div class='border-2 border-[#3eaa36] w-full'>
        <div class='flex w-full'>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Fecha</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Horas</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Ficha</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Programa</h2>
            <h2 class="w-[20%] text-center border-r-2 border-r-[#3eaa36] py-2 bg-[#3eaa36] font-bold text-[#fff]">Aprendiz</h2>
        </div>
        <?php
            if (empty($reportes)) {
                echo "<br>No se encuentran reportes en la base de datos";
            } else {
                foreach ($reportes as $key => $value) {
                    
                    echo "<div class='reportes flex'>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2 fecha'>$value->ultimaFecha</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->cantHoras</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->numeroFicha</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->nombrePrograma</span>
                        <span class='w-[20%] h-[40px] text-center overflow-hidden border-r-2 border-r-[#3eaa36] border-t-2 border-t-[#3eaa36] py-2'>$value->nombreAprendiz</span>
                    </div>";
                }
            }
        ?>
    </div>
</div>
<script>
    //Elements
    const inpt = document.querySelector("input")
    const reportes = document.querySelectorAll(".reportes")
    const check = document.querySelector(".check")
    const fecha = document.querySelectorAll(".fecha")

    //Event
    inpt.addEventListener("input", function(){
        if(check.checked){
            for (let i = 0; i < reportes.length; i++) {
                if (inpt.value != "") {
                    fecha1 = new Date(fecha[i].textContent)
                    fecha2 = new Date(inpt.value)
                    if (fecha1.getTime() >= fecha2.getTime()) {
                        reportes[i].classList.remove("hidden")
                    }else{
                        reportes[i].classList.add("hidden")
                    }
                }else{
                    reportes[i].classList.remove("hidden")
                }
            }
        }
    })
</script>