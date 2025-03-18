<div class="flex flex-col items-center justify-center h-[100vh] gap-5">
    <form action="/login/init" method="post" class="flex flex-col bg-[#fffa] shadow-[10px_10px_20px_5px_#000] p-5 px-[5rem] items-center justify-center gap-5 rounded-[0.5rem]">
        <h2 class="text-[25px] text-green-600 font-bold">Iniciar Sesión</h2>
        <div class="flex flex-col gap-2">
            <label class="text-[15px] px-2 font-bold" for="">Tipo de usuario</label>
            <select class="bg-[#ccc] py-2 rounded-[0.5rem] px-5" required name="tipoUsuario" id="">
                <option value="instructor">Instructor</option>
                <option value="coordinador">Coordinador</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <button class="p-2 px-5 bg-[#222] text-[#fff] rounded-[1rem] hover:bg-green-800" type="submit">Ingresar</button>
        </div>
    </form>
</div>