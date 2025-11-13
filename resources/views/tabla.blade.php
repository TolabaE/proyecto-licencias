
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
                            <form action="{{ route('actualizar',[ 'id'=> $usuario['id'] ]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input class="btn btn-success" type="submit" value="Modificar"></input>
                            </form>
                            <!-- paso la ruta y el id al controlador donde voy a hacer el llamado a la api -->
                            <form action="{{ route('eliminar', ['id' => $usuario['id']]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Eliminar"></input>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
        </script>
    </section>
@endsection
