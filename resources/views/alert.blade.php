@extends('app')


@section('contenido')

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
@endsection