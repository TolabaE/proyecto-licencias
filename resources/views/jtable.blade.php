@extends('app')

@section('contenido')


<div id="tablaLicencia"></div>


<script>
    $(document).ready(function(){
        const urlController = "{{ route('licencias')}}"
        
        $("#tablaLicencia").jtable({
            title:"Registro Licencia",
            actions:{
                listAction:function(postdata,jtParams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            type:"GET",
                            url:urlController,
                            dataType:"json",
                            success:function(response){
                                let jtableResponse = {
                                'Result': 'OK', // Debe ser 'OK' para mostrar los datos
                                // Asumiendo que en response.result estan las listas de licencias cargadas.
                                'Records': response.result,
                                'TotalRecordCount':response.result.length
                            };
                                $dfd.resolve(jtableResponse)
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                },
                createAction:"",
                updateAction:"",
                deleteAction:"",

            },
            fields:{
                dni:{
                    title:"DNI",
                    display:function(res){
                        return res.record.dni
                    }
                },
                fechaInicio:{
                    title:"Fecha inicio",
                    display:function(res){
                        return res.record.fechaInicio
                    }
                },
                fechaFin:{
                    title:"Fecha Fin",
                    display:function(res){
                        return res.record.fechaInicio
                    }
                },
                tipo:{
                    title:"Tipo",
                    display:function(res){
                        return res.record.tipo
                    }
                },
                provincia:{
                    title:"Provincia",
                    display:function(res){
                        return res.record.provincia
                    }
                },
                ordenDia:{
                    title:"Orden (OD)",
                    display:function(res){
                        return res.record.ordenDia
                    }
                }
            }
        })

        $("#tablaLicencia").jtable("load")

    })


</script>


@endsection

