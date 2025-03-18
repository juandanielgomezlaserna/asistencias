<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="flex w-full">
        <aside id="sidebar" class="w-[250px] bg-[#3eaa36] h-[100vh] text-[white] transform transition-transform duration-300 ease-in-out">
            <div class="my-[1rem] text-[1.5rem] font-bold flex justify-center items-center gap-5">
                <img class="w-[20%] h-[20%]" src="/img/logo.png" alt="">
                <span class="text-[20px]">Asistencias</span>
            </div>
            <div class="menu">
                <ul class="w-full py-[1rem]">
                    <?php if(isset($_SESSION["administrador"])){ ?>
                    <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/administrador/view">Administradores 🧑🏻‍💻</a></li>
                    <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/coordinador/view">Coordinadores 👨‍💼</a></li>
                    <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/centro/view">Centros 🏢</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION["coordinador"])){ ?>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/programa/view">Programas 🌟</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/ambiente/view">Ambientes 🏠</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/ficha/view">Fichas #️⃣</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/instructor/view">Instructores 👨🏻‍🏫</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/aprendiz/view">Aprendices 🧑🏻‍🎓</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION["instructor"])){ ?>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/competencia/view">Competencia 📚</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/asistencia/view">Asistencia 📋</a></li>
                        <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/asistencia/reporte">Reportes 📕</a></li>
                    <?php } ?>
                    <li><a class="flex justify-center w-full transition-all ease-in duration-200 hover:bg-[#fff] hover:text-[#000] p-5 text-[1rem] font-bold" href="/login/logout">Salir ⬅️</a></li>
                </ul>
            </div>
        </aside>
        <main class="w-full flex flex-col h-[100vh] transition-transform duration-300">
            <header class="w-full flex justify-center p-[1rem] shadow-[0_2px_0_#e5d6d6]">
                <div class="flex justify-between w-full">
                    <button class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="font-bold text-[1rem] "><?php echo $titulo ?></h1>
                </div>
            </header>
            <div class="bg-gray-300 m-5 h-full">
                <div class="p-[1rem] flex justify-center items-center">
                    <?php include_once $content ?>
                </div>
            </div>
        </main>
    </div>
    <script>
        const menuToggle = document.querySelector(".menu-toggle")
        const sidebar = document.getElementById("sidebar")

        menuToggle.addEventListener("click", function () {
            sidebar.classList.toggle("hidden")
        })
    </script>

</body>
</html>