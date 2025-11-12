
@extends('app')


@section('contenido')
<div>
    <div>
        @if($response['status'] == 500)
            <p class="text-danger">Ha ocurrido un error!</p>
        @else
            <p>la fecha debe tener algun error mal cargado.</p>
        @endif
    </div>
</div>
<script>
    // Swal.fire({
    //     icon: "error",
    //     title: "ups algo salio mal!",
    //     text: "ah ocurrido un error al cargar el registro, vuelve a intentarlo",
    //     confirmButtonText: "OK",
    // }).then((response)=>{
    //     if (response.isConfirmed) {
    //         window.location.href = "/registro";
    //     }else{
    //         window.location.href = "/registro";
    //     }
    // })
    console.log("hola esta linea se ejecuta del error")
</script>
@endsection
