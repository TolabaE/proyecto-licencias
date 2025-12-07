@extends('app')

@section('contenido')


<div id="tablaLicencia"></div>


<script>
    $(document).ready(function(){

        $("#tablaLicencia").jtable({
            title:"Registro Licencia",
            actions:{
                listAction:function(postdata,jtParams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            type:"GET",
                            url:"http://localhost:5800/",
                            async:true,
                            dataType:"json",
                            success:function(response){
                                console.log(response);
                                $dfd.resolve(response)
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                }
            },
            field:{
                dni:{
                    title:"DNI",
                    display:function(response){
                        return response.record.dni
                    }
                }
            }
        })

        $("#tablaLicencia").jtable("load")

    })


</script>


@endsection

