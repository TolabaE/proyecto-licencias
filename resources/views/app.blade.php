<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Administrador Licencias</title>
</head>
<body class="bg-white">
    <style>
        /* Estilos personalizados para asegurar que los mensajes de error se vean bien */
        .error {
            color: #b30326ff; /* Color de error (rojo) */
            font-size: 1rem;
            display: block; /* Ocupa su propia línea */
            font-weight: 500;
        }
    </style>
    <nav class="d-flex align-items-center justify-content-between p-3 bg-primary">
        <div class="d-flex">
            <a href="/" class="nav-link text-white p-2 fs-4">Administrador Licencias "Ejercito Militar"</a>
        </div>
    </nav>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary m-4">
            <a href="/registro" class="nav-link p-2">Crear Licencia</a>
        </button>
        <button class="btn btn-success m-4">
            <a href="/tabla" class="nav-link p-2">Ver licencias</a>
        </button>
    </div>
    <!-- agregado del paquete jquery validation por cdn para validar campos en el formulario -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <section>
        @yield('contenido')

    </section>
    <script>
        //creo la funcion loading
        function cargarLoading (){
            let timerInterval;
            Swal.fire({
                title: "Cargando licencias...",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
            //creo un loading que una vez en la pagina principal me redirecione a las tablas.
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "/tabla";//redirecciona a la vista tabla.
            }
            });
        }

        if (window.location.pathname === "/") {
            cargarLoading()
        }
    </script>
</body>
</html>
