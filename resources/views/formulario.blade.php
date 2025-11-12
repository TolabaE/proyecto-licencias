@extends('app')


@section('contenido')
    <section class="d-flex justify-content-center">
        <form class="m-4 p-5 rounded-4 text-white bg-primary" method="post" action="/cargar">
            @csrf
            <b class="text-center fs-4">Crear nueva licencia</b>
            <p>complete los campos para registrar una nueva licencia</p>
            <div class="d-flex gap-3 flex-column">
                <label for="DNI">Ingrese su DNI:
                <input type="number" name="dni" placeholder="Ej:12345546" required>
                </label>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Inicio: </label>
                        <input type="date" name="fechaInicio" required>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Termino: </label>
                        <input type="date" name="fechaFin" required>
                    </div>
                </div>
                <select name="tipo"  required >
                    <option value="">Seleccione el tipo</option>
                    <option value="licencia extraordinaria" >Licencia Ordinaria</option>
                    <option value="licencia Ordinaria">Licencia Extraordinaria</option>
                </select>
                <label for="">Provincia:</label>
                <select name="provincia" required>
                    <option value="">Seleccione una provincia</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Entre Rios">Entre Rios</option>
                    <option value="Salta">Salta</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Cordoba">Cordoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="Misiones">Misiones</option>
                    <option value="Neuquen">Neuquen</option>
                    <option value="La Pampa">La pampa</option>
                    <option value="Rio Negro">Rio Negro</option>
                    <option value="Jujuy">Jujuy</option>
                    <option value="Formosa">Formosa</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Luis">San Luis</option>
                    <option value="Santiago del Estero">Santiago del Estero</option>
                    <option value="Santa Fe">Santa Fe</option>
                    <option value="Tucuman">Tucuman</option>
                    <option value="Tierra del Fuego">Tierra del Fuego</option>
                    <option value="Ciudad Autonoma de Buenos Aires">Ciudad autonoma de buenos aires</option>
                </select>
                <div class="d-flex flex-column gap-2">
                    <label for="direccion">Localidad: </label>
                    <input type="text" placeholder="Ej:La plata" name="localidad">
                    <label for="direccion">Direccion: </label>
                    <input type="text" placeholder="Ej: Av corrientes 2400" name="direccion">
                    <label for="OD">Orden del dia: </label>
                    <input type="text" placeholder="Entre 6 y 10 caracteres" name="ordenDia"
                </div>
                <input type="submit" class="btn btn-danger" value="Enviar" >
            </div>
        </form>
    </section>

    <script>
        


    </script>

@endsection
