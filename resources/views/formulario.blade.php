@extends('app')


@section('contenido')
    <style>
        /* Estilos personalizados para asegurar que los mensajes de error se vean bien */
        .error {
            color: #b30326ff; /* Color de error (rojo) */
            font-size: 1rem;
            display: block; /* Ocupa su propia línea */
            font-weight: 500;
        }
    </style>
    <section class="d-flex justify-content-center">
        <form class="m-4 p-5 rounded-4 text-white bg-primary " method="post" action="/cargar" id="formValidacion">
            @csrf
            <div class="text-center">
                <b class="fs-4">Crear nueva licencia</b>
            </div>
            <p>complete los campos para registrar una nueva licencia</p>
            <div class="d-flex gap-3 flex-column">
                <label for="DNI">Ingrese su DNI:
                <input type="number" name="dni" placeholder="Ej:12345546">
                </label>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Inicio: </label>
                        <input type="date" name="fechaInicio">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Termino: </label>
                        <input type="date" name="fechaFin">
                    </div>
                </div>
                <select name="tipo">
                    <option value="">Seleccione el tipo</option>
                    <option value="Licencia Extraordinaria" >Licencia Ordinaria</option>
                    <option value="Licencia Ordinaria">Licencia Extraordinaria</option>
                </select>
                <label for="">Provincia:</label>
                <select name="provincia">
                    <option value="">Seleccione una provincia</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Entre Rios">Entre Rios</option>
                    <option value="Salta">Salta</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Cordoba">Cordoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="Mendoza">Mendoza</option>
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
                    <input type="text" placeholder="Entre 6 y 10 caracteres" name="ordenDia" id="idOrden">
                </div>
                <input type="submit" class="btn btn-danger" value="Enviar" >
            </div>
        </form>
    </section>

    <script>
        $(document).ready(function(){
            $('#formValidacion').validate({
                rules:{
                    ordenDia: {
                        required: true,
                        minlength: 6,
                        maxlength: 10
                    },
                    dni:{
                        required:true,
                        minlength: 8,
                        maxlength: 9
                    },
                    direccion:{
                        required:true
                    },
                    localidad:{
                        required:true
                    },
                    provincia:{
                        required:true
                    },
                    tipo:{
                        required:true
                    },
                    fechaInicio:{
                        required:true
                    },
                    fechaFin:{
                        required:true
                    }
                },
                messages: {
                    ordenDia: {
                        required: "campo incompleto",
                        minlength: "Tener al menos 6 caracteres.",
                        maxlength: "No exceder los 10 caracteres."
                    },
                    dni: {
                        required: "El DNI es un campo obligatorio",
                        //agregamos validacion del dni, en el servidor solo recibe esa longitud
                        minlength: "DNI debe tener al menos 8 caracteres.",
                        maxlength: "No exceder los 9 caracteres."
                    },
                    tipo: {
                        required: "Debe seleccionar un tipo de licencia"
                    },
                    direccion: {
                        required: "Ingrese la dirección"
                    },
                    localidad: {
                        required: "Especifique la localidad donde reside."
                    },
                    provincia: {
                        required: "Seleccione una provincia"
                    },
                    fechaInicio: {
                        required: "Indique fecha de inicio."
                    },
                    fechaFin: {
                        required: "Indique la fecha finalizacion."
                    }
                },
                errorClass: 'error' //con la clase css le definimos los estilos.
            })
        })
    
    </script>

@endsection
