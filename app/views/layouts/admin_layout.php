<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="logo">
                    <img src="" alt="">
                    <span class="logo-text">Asistencias</span>
                </div>
                <nav class="menu">
                    <ul>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="header-container">
                    <button class="menu-toggle" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1><?php echo $titulo; ?></h1>
                    <div class="search-container">
                        <input placeholder="buscar..." type="text">
                    </div>
                    <div class="header-icons">
                        <a href="#" class="theme-toggle" title="Cambiar tema">
                            <i class="fas fa-moon"></i>
                        </a>
                        <a href="#" title="Notificaciones">
                            <i class="fas fa-bell"></i>
                        </a>
                        <a href="#" title="Perfil de usuario">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </div>
                </div>
            </header>
            <div class="data-container">
                <div class="content">
                    <?php include_once $content; ?>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            document.querySelector(".sidebar").classList.toggle("collapsed");
        });

        document.addEventListener("DOMContentLoaded", function () {
        const themeToggle = document.querySelector(".theme-toggle");
        const menuToggle = document.querySelector(".menu-toggle");
        const icon = themeToggle.querySelector("i");
        const body = document.body;

        // Si no hay una preferencia guardada, establece el tema en "light"
        if (!localStorage.getItem("theme")) {
            localStorage.setItem("theme", "light");
        }

        // Aplicar el tema según la preferencia guardada
        if (localStorage.getItem("theme") === "dark") {
            body.classList.add("dark-mode");
            icon.classList.replace("fa-moon", "fa-sun");
            menuToggle.style.color = "white";
        } else {
            body.classList.remove("dark-mode");
            icon.classList.replace("fa-sun", "fa-moon");
            menuToggle.style.color = "#333";
        }

        // Evento para alternar el tema
        themeToggle.addEventListener("click", function () {
            body.classList.toggle("dark-mode");

            if (body.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
                icon.classList.replace("fa-moon", "fa-sun");
                menuToggle.style.color = "white";
            } else {
                localStorage.setItem("theme", "light");
                icon.classList.replace("fa-sun", "fa-moon");
                menuToggle.style.color = "#333";
            }
        });
    });


    </script>
</body>
</html>
