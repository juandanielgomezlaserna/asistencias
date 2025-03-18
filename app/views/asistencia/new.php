<div class="flex flex-col md:flex-row items-center bg-gray-100 p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
    <form action="/asistencia/newIndex" method="post">
        <div class="flex flex-col">
            <label for="txtNombre">Ingrese la fecha</label>
            <input type="date" name="fecha" class="rounded-[0.5rem] py-1 text-center">
        </div>
        <div class="flex flex-col">
            <label for="txtNombre">Ingrese la competencia</label>
            <select class="rounded-[0.5rem] py-1 text-center" name="idCompetencia" id="">
                <?php 
                if (isset($competencias) && count($competencias) > 0) {
                    foreach($competencias as $competencia) { 
                        echo "<option value=".$competencia->id.">".$competencia->nombre."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="w-full mt-5 flex items-center justify-center">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-[#3eaa36]" type="submit">Enviar</button>
        </div>
    </form>
</div>