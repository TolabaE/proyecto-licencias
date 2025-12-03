
@extends('app')

@section('contenido')
    <h2 class="text-center">Todos los registros de licencias</h2>
    <section class="p-4">
        <table class="table rounded-2 table-hover">
            <thead class="">
                <tr class="table-light font-light">
                    <th>DNI</th>
                    <th>fecha inicio</th>
                    <th>fecha fin</th>
                    <th>tipo</th>
                    <th>provincia</th>
                    <th>orden (OD)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- con un foreach intero sobre los registros y los muestro en pantalla -->
                @foreach ($registro as $usuario)
                    <tr>
                        <td> {{ $usuario['dni'] }} </td>
                        <td> {{ $usuario['fechaInicio'] }} </td>
                        <td> {{ $usuario['fechaFin'] }} </td>
                        <td> {{ $usuario['tipo'] }} </td>
                        <td> {{ $usuario['provincia'] }} </td>
                        <td> {{ $usuario['ordenDia'] }} </td>
                        <td class="d-flex gap-4">
                            <!-- llamo al controlador para actualizar una licencia pasando el id -->
                            <button class="btn btn-success"><a href="{{ route('actualizar',[ 'id'=> $usuario['id'] ]) }}" class="nav-link" >Modificar</a></button>
                            <!-- llamo al controlador para eliminar una licencia referenciando por id -->
                            <button class="btn btn-danger"><a href="{{ route('eliminar', ['id' => $usuario['id']]) }}" class="nav-link">Eliminar</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- aqui manejo las respuestas que me envian los controladores -->
    
    <!-- este alerta es cuando la licencia fue eliminada exitosamente -->
    @if($status == 'eliminar')
        <script>
            Swal.fire({
                icon: "success",
                title: "Licencia eliminada",
                text: "¡La licencia fue eliminada exitosamente!",
                confirmButtonText: "OK",
            })
        </script>
    @elseif($status == "actualizar")
    <script>
        Swal.fire({
            icon: "success",
            title: "Licencia actualizada",
            text: "¡Proceso realizado exitosamente!",
            confirmButtonText: "OK",
        }).then((response)=>{
            if (response.isConfirmed) {
                window.location.href = "/tabla";
            }else{
                window.location.href = "/tabla";
            }
        })
    </script>
    @endif
@endsection
