@extends('app')

@section('contenido')

<p><a href="/tabla" class=" p-2">ver licencias en tablas html</a></p>
<div id="tablaLicencia"></div>


<script>
    $(document).ready(function(){
        const urlController = "{{ route('list') }}";
        const urlEliminarLicencia = "{{ route('destroy') }}";
        const urlActualizarLicencia = "{{ route('update') }}";
        const urlCrearLicencia = "{{ route('create')}}";
        
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
                createAction:function(posdata,jtParams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            method:"post",
                            url:urlCrearLicencia,
                            async:true,
                            type:"json",
                            data:posdata,
                            success:function(res){
                                if (res.Result == "OK") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Licencia Cargada",
                                        text: "¡Proceso realizado exitosamente!",
                                        confirmButtonText: "OK",
                                    })
                                }
                                $("#tablaLicencia").jtable("load")
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                },
                updateAction:function(posdata,jtparams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            method:"post",
                            url:urlActualizarLicencia,
                            async:true,
                            type:"json",
                            data:posdata,
                            success:function(res){
                                if (res.Result == "OK") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Licencia actualizada",
                                        text: "¡Proceso realizado exitosamente!",
                                        confirmButtonText: "OK",
                                    })
                                    $("#tablaLicencia").jtable("load")
                                }
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                },
                deleteAction:function(posdata,jtparams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            method:"post",
                            url:urlEliminarLicencia,
                            async:true,
                            data:posdata,
                            success:function(res){
                                console.log(res.Result);
                                Swal.fire({
                                    icon: "success",
                                    title: "Licencia Eliminada",
                                    text: "¡Proceso realizado exitosamente!",
                                    confirmButtonText: "OK",
                                })
                                $("#tablaLicencia").jtable("load")
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                },
            },
            fields:{
                dni:{
                    title:"DNI",
                    display:function(res){
                        return res.record.dni
                    },
                    validation:{
                        required:true,
                        minlength: 8,
                        maxlength: 9
                    }
                },
                fechaInicio:{
                    title:"Fecha inicio",
                    display:function(res){
                        return res.record.fechaInicio
                    },
                    type: 'date',
                    validation:{
                        required:true
                    }
                },
                fechaFin:{
                    title:"Fecha Fin",
                    display:function(res){
                        return res.record.fechaInicio
                    },
                    type: 'date',
                    validation:{
                        required:true
                    }
                },
                tipo:{
                    title:"Tipo",
                    display:function(res){
                        return res.record.tipo
                    },
                    options: { 'Licencia Extraordinaria': 'Licencia Extraordinaria', 'Licencia Ordinaria': 'Licencia Ordinaria' },
                    validation:{
                        required:true
                    }
                },
                provincia:{
                    title:"Provincia",
                    display:function(res){
                        return res.record.provincia
                    },
                    validation:{
                        required:true
                    }
                },
                ordenDia:{
                    title:"Orden (OD)",
                    display:function(res){
                        return res.record.ordenDia
                    },
                    validation:{
                        required: true,
                        minlength: 6,
                        maxlength: 10
                    }
                },
                localidad:{
                    title:"localidad",
                    list:false,
                    display:function(res){
                        return res.record.localidad
                    }
                },
                direccion:{
                    title:"direccion",
                    list:false,
                    display:function(res){
                        return res.record.direccion
                    }
                },
                id:{
                    key: true,
                    create: false,
                    edit: false,
                    list: false,
                    display:function(res){
                        return res.record.id
                    }
                }
            },
            formCreated: function (event, data) {
                console.log(data);
                data.form.validationEngine();
            },
            //Validate form when it is being submitted
            formSubmitting: function (event, data) {
                return data.form.validationEngine('validate');
            },
            //Dispose validation logic when form is closed
            formClosed: function (event, data) {
                data.form.validationEngine('hide');
                data.form.validationEngine('detach');
            }
        })

        $("#tablaLicencia").jtable("load")

    })


</script>


@endsection

