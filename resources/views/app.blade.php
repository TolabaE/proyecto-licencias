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
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <section>
        @yield('contenido')
    </section>
    <!-- agregado del paquete jquery validation por cdn para validar campos en el formulario -->
</body>
</html>