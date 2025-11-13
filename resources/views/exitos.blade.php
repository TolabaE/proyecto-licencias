
@extends('app')


@section('contenido')
<script>
    Swal.fire({
        icon: "success",
        title: "Licencia enviada",
        text: "¡Nuevo usuario cargado exitosamente!",
        confirmButtonText: "OK",
    }).then((response)=>{
        if (response.isConfirmed) {
            window.location.href = "/registro";
        }else{
            window.location.href = "/registro";
        }
    })
    
</script>
@endsection
