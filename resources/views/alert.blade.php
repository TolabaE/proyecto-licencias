@extends('app')


@section('contenido')

@if($status == "eliminar")
    <script>
        Swal.fire({
            icon: "success",
            title: "Licencia eliminada",
            text: "¡La licencia fue eliminada exitosamente!",
            confirmButtonText: "OK",
        }).then((response)=>{
            if (response.isConfirmed) {
                window.location.href = "/tabla";
            }else{
                window.location.href = "/tabla";
            }
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
@elseif($status == "crear")
    <script>
        Swal.fire({
            icon: "success",
            title: "Licencia Cargada",
            text: "¡Proceso realizado exitosamente!",
            confirmButtonText: "OK",
        }).then((response)=>{
            if (response.isConfirmed) {
                window.location.href = "/registro";
            }else{
                window.location.href = "/registro";
            }
        })
    </script>
@endif

@endsection
