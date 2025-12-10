<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- importo la dependecia base de jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- todas las dependencias para instalar jtable -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .error {
            color: #b30326ff;
            font-size: 1rem;
            display: block;
            font-weight: 500;
        }
        </style>
    <title>Administrador Licencias</title>
</head>
<body class="bg-white">
    <nav class="d-flex align-items-center justify-content-between p-3 bg-primary">
        <div class="d-flex">
            <a href="/" class="nav-link text-white p-2 fs-4">Administrador Licencias "Ejercito Militar"</a>
        </div>
    </nav>
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
