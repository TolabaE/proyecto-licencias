
@extends('app')


@section('contenido')
<div>
    <div>
        @if($response['status'] == 500)
        <script>
            Swal.fire({
                icon: "error",
                title: "ups algo salio mal!",
                text: "Ah ocurrido un error",
                confirmButtonText: "OK",
            }).then((response)=>{
                if (response.isConfirmed) {
                    window.location.href = "/tabla";
                }else{
                    window.location.href = "/tabla";
                }
            })
        </script>
        @else
        <script>
            Swal.fire({
                icon: "error",
                title: "ups algo salio mal!",
                text: "el formulario debe tener un campo mal cargado, vuelve a intentar.",
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
    </div>
</div>

@endsection
