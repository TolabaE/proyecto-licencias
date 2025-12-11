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
            title:"Registro Licencias",
            actions:{
                listAction:function(postdata,jtParams){
                    return $.Deferred(function($dfd){
                        $.ajax({
                            type:"GET",
                            url:urlController,
                            dataType:"json",
                            success:function(res){
                                //una vez que obtengo las arreglo le paso al dfd.resolve espera 3 parametros.
                                // {
                                //     'Result': 'OK', // Debe ser 'OK' para mostrar los datos
                                //     'Records': $licencias,
                                //     'TotalRecordCount':count($licencias)
                                // };
                                $dfd.resolve(res)
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
                            dataType:"json",
                            data:posdata,
                            success:function(res){
                                if(res.Result == "OK") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Licencia Cargada",
                                        text: "¡Proceso realizado exitosamente!",
                                        confirmButtonText: "OK",
                                    })
                                    $("#tablaLicencia").jtable("load", function() {
                                        // Una vez que se carga, resuelve el deferred para que JTable no muestre error.
                                        $dfd.resolve(res);
                                    });
                                }else{
                                    $dfd.reject(res.Message || res.Record || 'Error al agregar una licencia.');
                                }
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                },
                updateAction:function(posdata,jtparams){
                    return $.Deferred(function($dfd){
                        //paso el token csrf en el cuerpo de la peticion nose tuve muchos problemas con este forma. asi que la pase al app.js y le agrege al headers
                        // const csrfToken = $('meta[name="csrf-token"]').attr('content');
                        // const dataToSend = posdata + "&_token=" + csrfToken; //Token en el Body
                        $.ajax({
                            method:"post",
                            url:urlActualizarLicencia,
                            async:true,
                            dataType:"json",
                            data:posdata,
                            success:function(res){
                                if(res.Result == "OK") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Licencia actualizada",
                                        text: "¡Proceso realizado exitosamente!",
                                        confirmButtonText: "OK",
                                    })
                                    $dfd.resolve(res);
                                }else{
                                    $dfd.reject(res.Message || res.Record || 'Error desconocido al actualizar.');
                                }
                            },
                            error:function(error){
                                $dfd.reject('Error en el servidor. Estado HTTP: ' + error.status);
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
                                Swal.fire({
                                    icon: "success",
                                    title: "Licencia Eliminada",
                                    text: "¡Proceso realizado exitosamente!",
                                    confirmButtonText: "OK",
                                })
                                $dfd.resolve(res);
                            },
                            error:function(error){
                                console.log(error);
                            }
                        })
                    })
                }
            },
            fields:{
                dni:{
                    title:"DNI",
                    display:function(res){
                        return res.record.dni
                    },
                    type:'number'
                },
                fechaInicio:{
                    title:"Fecha inicio",
                    display:function(res){
                        return res.record.fechaInicio
                    },
                    type: 'date',
                    displayFormat: 'yy-mm-dd',
                    dateSettings: {
                        dateFormat: 'dd/mm/yy', // Esto mostrará 2025-00-30 en el input
                    }
                },
                fechaFin:{
                    title:"Fecha Fin",
                    display:function(res){
                        return res.record.fechaFin
                    },
                    type: 'date',
                    displayFormat: 'yy-mm-dd',
                    dateSettings: {
                        dateFormat: 'YY-MM-DD',// Esto mostrará 2025-00-30 en el input
                    }
                },
                tipo:{
                    title:"Tipo",
                    display:function(res){
                        return res.record.tipo
                    },
                    options: { 'Licencia Ordinaria': 'Licencia Ordinaria', 'Licencia Extraordinaria': 'Licencia Extraordinaria' }
                },
                provincia:{
                    title:"Provincia",
                    display:function(res){
                        return res.record.provincia
                    },
                    options:{
                        'Buenos Aires':'Buenos Aires',
                        'Entre Rios':'Entre Rios',
                        'Chaco':'Chaco',
                        'Catamarca':'Catamarca',
                        'Chubut':'Chubut',
                        'Cordoba':'Cordoba',
                        'Corrientes':'Corrientes',
                        'Mendoza':'Mendoza',
                        'Misiones':'Misiones',
                        'Neuquen':'Neuquen',
                        'La pampa':'La pampa',
                        'Rio Negro':'Rio Negro',
                        'Jujuy':'Jujuy',
                        'Formosa':'Formosa',
                        'San Juan':'San Juan',
                        'San Luis':'San Luis',
                        'Santiago del Estero':'Santiago del Estero',
                        'Salta':'Salta',
                        'Santa Fe':'Santa Fe',
                        'Tucuman':'Tucuman',
                        'Tierra del Fuego':'Tierra del Fuego',
                        'Ciudad Autonoma de Buenos Aires':'Ciudad Autonoma de Buenos Aires'
                    }
                },
                ordenDia:{
                    title:"Orden (OD)",
                    display:function(res){
                        return res.record.ordenDia
                    },
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
            // formCreated:function(event,data){
            //     console.log(data.form)
            // }
        })

        $("#tablaLicencia").jtable("load")

    })


</script>


@endsection

