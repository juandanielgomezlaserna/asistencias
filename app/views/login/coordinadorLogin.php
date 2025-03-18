<div class="flex flex-col items-center justify-center h-[100vh] gap-5">
    <form action="/login/initCoordinador" method="post" class="flex flex-col bg-[#fffa] rounded-[0.5rem] shadow-[10px_10px_20px_5px_#000] p-5 px-[5rem] items-center justify-center gap-5">
        <h2 class="text-[25px] text-green-600 font-bold">Login Coordinador</h2>
        <div class="flex flex-col gap-2">
            <label class="text-[15px] px-2 font-bold" for="">Id</label>
            <input required type="number" name="id" placeholder="Id" class="bg-[#ccc] py-2 rounded-[0.5rem] px-5">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-[15px] px-2 font-bold" for="">Cédula</label>
            <input required type="number" name="cedula" placeholder="Cédula" class="bg-[#ccc] py-2 rounded-[0.5rem] px-5">
        </div>
        <div class="flex flex-col gap-2">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-green-800" type="submit">Ingresar</button>
        </div>
    </form>
    <?php 
    if(isset($errors)){
        echo "<div class='text-red-500'>";
        echo $errors;
        echo "</div>";
    }
    ?>
</div>