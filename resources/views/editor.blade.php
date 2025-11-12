@extends('app')

@section('contenido')

    <section class="d-flex justify-content-center">
        <form class="m-4 p-5 rounded-4 text-white bg-primary bg-opacity-75" method="post" action="/update">
            @csrf
            <div class="text-center">
                <b class="text-center fs-4">Modificar la licencia</b>
            </div>
            <p>complete los campos que desea actualizar</p>
            <div class="d-flex gap-3 flex-column">
                <label for="DNI">Ingrese su DNI:
                <input type="number" name="dni" placeholder="Ej:12345546" required value="<?php echo htmlspecialchars($licencia['dni']); ?>">
                </label>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Inicio: </label>
                        <input type="date" name="fechaInicio" required value="<?php echo htmlspecialchars($licencia['fechaInicio']); ?>">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="date_start">Fecha de Termino: </label>
                        <input type="date" name="fechaFin" required value="<?php echo htmlspecialchars($licencia['fechaFin']); ?>">
                    </div>
                </div>
                <select name="tipo"  required >
                    <option value="">Seleccione el tipo</option>
                    <option value="licencia Ordinaria"
                        <?php if ($licencia['tipo'] == 'Licencia Ordinaria') {echo 'selected';} ?> >Licencia Ordinaria</option>
                    <option value="licencia Extraordinaria"
                        <?php if ($licencia['tipo'] == 'Licencia Extraordinaria'){ echo 'selected';} ?> >Licencia Extraordinaria</option>
                </select>
                <label for="">Provincia:</label>
                <select name="provincia" required>
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
                    <label for="direccion">Localidad: </label>
                    <input type="text" placeholder="Ej:La plata" name="localidad" value="<?php echo htmlspecialchars($licencia['localidad']); ?>">
                    <label for="direccion">Direccion: </label>
                    <input type="text" placeholder="Ej: Av corrientes 2400" name="direccion" value="<?php echo htmlspecialchars($licencia['direccion']); ?>">
                    <label for="OD">Orden del dia: </label>
                    <input type="text" placeholder="Entre 6 y 10 caracteres" name="ordenDia" value="<?php echo htmlspecialchars($licencia['ordenDia']); ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Actualizar" >
            </div>
        </form>
    </section>

@endsection
