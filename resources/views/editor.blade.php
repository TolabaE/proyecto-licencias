@extends('app')

@section('contenido')
    <section class="d-flex justify-content-center">
        <form class="m-4 p-5 rounded-4 text-white bg-primary" method="post" id="formEditar">
            @csrf
            <div class="text-center">
                <b class="text-center fs-4">Modificar la licencia</b>
            </div>
            <p>complete los campos que desea actualizar</p>
            <div class="d-flex gap-3 flex-column">
                <label for="DNI">Ingrese su DNI:
                <input type="number" name="dni" placeholder="Ej:12345546" value="<?php echo htmlspecialchars($licencia['dni']); ?>">
                </label>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Inicio: </label>
                        <input type="date" name="fechaInicio" value="<?php
                            $fecha = $licencia['fechaInicio'];
                            $fechaFormateada = substr($fecha,0,10);
                            echo htmlspecialchars($fechaFormateada); ?>">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Termino: </label>
                        <input type="date" name="fechaFin" value="<?php
                            $fecha = $licencia['fechaFin'];
                            $fechaFormateada = substr($fecha,0,10);//corta los primeros 9 numeros de la cadena => 2024-04-26T00:00:00.000Z
                            echo htmlspecialchars($fechaFormateada); ?>">
                    </div>
                </div>
                <!-- envio en un input oculto el valor del id -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($licencia['id']); ?>">
                <select name="tipo">
                    <option value="">Seleccione el tipo</option>
                    <option value="Licencia Ordinaria"
                        <?php if ($licencia['tipo'] == 'Licencia Ordinaria') {echo 'selected';} ?> >Licencia Ordinaria</option>
                    <option value="Licencia Extraordinaria"
                        <?php if ($licencia['tipo'] == 'Licencia Extraordinaria'){ echo 'selected';} ?> >Licencia Extraordinaria</option>
                </select>
                <label for="">Provincia:</label>
                <select name="provincia" >
                    <label for="provincia">País:</label>
                    <option value="">Seleccione una provincia</option>
                    <option value="Buenos Aires"
                        <?php if ($licencia['provincia'] == 'Buenos Aires') {echo 'selected';} ?>>Buenos Aires</option>
                    <option value="Entre Rios"
                        <?php if ($licencia['provincia'] == 'Entre Rios') {echo 'selected';} ?>>Entre Rios</option>
                    <option value="Salta"
                        <?php if ($licencia['provincia'] == 'Salta') {echo 'selected';} ?>>Salta</option>
                    <option value="Chaco"
                        <?php if ($licencia['provincia'] == 'Chaco') {echo 'selected';} ?>>Chaco</option>
                    <option value="Catamarca"
                        <?php if ($licencia['provincia'] == 'Catamarca') {echo 'selected';} ?>>Catamarca</option>
                    <option value="Chubut"
                        <?php if ($licencia['provincia'] == 'Chubut') {echo 'selected';} ?>>Chubut</option>
                    <option value="Cordoba"
                        <?php if ($licencia['provincia'] == 'Cordoba') {echo 'selected';} ?> >Cordoba</option>
                    <option value="Corrientes"
                        <?php if ($licencia['provincia'] == 'Corrientes') {echo 'selected';} ?> >Corrientes</option>
                    <option value="Mendoza"
                        <?php if ($licencia['provincia'] == 'Mendoza') {echo 'selected';} ?> >Mendoza</option>
                    <option value="Misiones"
                        <?php if ($licencia['provincia'] == 'Misiones') {echo 'selected';} ?> >Misiones</option>
                    <option value="Neuquen"
                        <?php if ($licencia['provincia'] == 'Neuquen') {echo 'selected';} ?> >Neuquen</option>
                    <option value="La Pampa"
                        <?php if ($licencia['provincia'] == 'La Pampa') {echo 'selected';} ?> >La pampa</option>
                    <option value="Rio Negro"
                        <?php if ($licencia['provincia'] == 'Rio Negro') {echo 'selected';} ?> >Rio Negro</option>
                    <option value="Jujuy"
                        <?php if ($licencia['provincia'] == 'Jujuy') {echo 'selected';} ?> >Jujuy</option>
                    <option value="Formosa"
                        <?php if ($licencia['provincia'] == 'Formosa') {echo 'selected';} ?> >Formosa</option>
                    <option value="San Juan"
                        <?php if ($licencia['provincia'] == 'San Juan') {echo 'selected';} ?> >San Juan</option>
                    <option value="San Luis"
                        <?php if ($licencia['provincia'] == 'San Luis') {echo 'selected';} ?> >San Luis</option>
                    <option value="Santiago del Estero"
                        <?php if ($licencia['provincia'] == 'Santiago del Estero') {echo 'selected';} ?> >Santiago del Estero</option>
                    <option value="Santa Fe"
                        <?php if ($licencia['provincia'] == 'Santa Fe') {echo 'selected';} ?> >Santa Fe</option>
                    <option value="Tucuman"
                        <?php if ($licencia['provincia'] == 'Tucuman') {echo 'selected';} ?> >Tucuman</option>
                    <option value="Tierra del Fuego"
                        <?php if ($licencia['provincia'] == 'Tierra del Fuego') {echo 'selected';} ?> >Tierra del Fuego</option>
                    <option value="Ciudad Autonoma de Buenos Aires"
                        <?php if ($licencia['provincia'] == 'Ciudad Autonoma de Buenos Aires') {echo 'selected';} ?> >Ciudad autonoma de buenos aires</option>
                </select>
                <div class="d-flex flex-column gap-2">
                    <label for="localidad">Localidad: </label>
                    <input type="text" placeholder="Ej:La plata" name="localidad" value="<?php echo htmlspecialchars($licencia['localidad']); ?>">
                    <label for="direccion">Direccion: </label>
                    <input type="text" placeholder="Ej: Av corrientes 2400" name="direccion" value="<?php echo htmlspecialchars($licencia['direccion']); ?>">
                    <label for="OD">Orden del dia: </label>
                    <input type="text" placeholder="Entre 6 y 10 caracteres" name="ordenDia" value="<?php echo htmlspecialchars($licencia['ordenDia']); ?>">
                </div>
                <input type="submit" class="btn btn-danger" value="Actualizar" >
            </div>
        </form>
    </section>

    <script>

    const rutaController = "{{ route('actualizar') }}";
    
    //para leer codigo jquery
    $(document).ready(function(){
        const validacion = $('#formEditar').validate({
            rules:{
                ordenDia: {
                    required: true,
                    minlength: 6,
                    maxlength: 10
                },
                dni:{
                    required:true
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
                    required: "El DNI es un campo obligatorio"
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

        $('#formEditar').on('submit',function(event){
            event.preventDefault();
            //el metodo validacion.form() retorna un booleano true si la validaciones son correctas.
            if(validacion.form() == true){
                let dataEditor = $(this).serialize();
                $.ajax({
                    url:rutaController,
                    data:dataEditor,
                    type:"POST",
                    success:function(res){
                        Swal.fire({
                            icon: "success",
                            title: "Licencia actualizada",
                            text: "¡Proceso realizado exitosamente!",
                            confirmButtonText: "OK",
                        }).then((response)=>{
                            //una vez cargada la licencia correctamente me retorne a la vista de las tablas
                            if (response.isConfirmed) {
                                window.location.href = "/tabla";
                            }else{
                                window.location.href = "/tabla";
                            }
                        })
                    },
                    error:(status,error)=>{
                        Swal.fire({
                            icon: "error",
                            title: "valores incompletos",
                            text: "el formulario debe tener un campo mal cargado, vuelve a intentar.",
                            confirmButtonText: "OK",
                        })
                        console.log(error)
                    }
                })
            }
        })
    });
    </script>
@endsection
