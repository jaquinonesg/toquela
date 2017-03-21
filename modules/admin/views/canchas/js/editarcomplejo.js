var EditarComplejos = (function() {
    var _self = null;
    var map = null;
    var marker = null;
    var add_marker = false;
    function EditarComplejos() {
        _self = this;
        _self.objcomplex = {
            'complejo': $("#_complejo").val(),
            'name_complex': "",
            'email': "",
            'description': "",
            'phone': "",
            'address': "",
            'lat': null,
            'lng': null
        };
    }
    //------
    EditarComplejos.prototype.events = function() {
        $("#update_complex").on('click', function() {
            _self.updateComplex();
        });
        $(".delete_canchas").on('click', function() {
            _self.deleteCancha($(this).attr('data-code'));
        });
        $(".editar_canchas").on('click', function() {
            _self.loadEditCancha($(this).attr('data-code'));
        });
        $("#btn-agregar-cancha").on('click', function() {
            _self.agregarCancha();
        });
        $(document).on('click', "#btn-actualizar-cancha", function() {
            _self.actualizarCancha($("#contend-edit-cancha #_cancha").val());
        });
        $('.delete_foto_complex').on('click', function() {
            _self.deletephoto($(this).attr("index"));
        });
        $('#btn_subir_foto').on('click', function() {
            _self.subirFoto();
        });
    };
    //------
    EditarComplejos.prototype.updateComplex = function() {
        _self.objcomplex.name_complex = $("#name_complex").val();
        _self.objcomplex.email = $("#email").val();
        _self.objcomplex.description = $("#description").val();
        _self.objcomplex.phone = $("#phone").val();
        _self.objcomplex.address = $("#address").val();
        _self.objcomplex.lat = marker.position.k;
        _self.objcomplex.lng = marker.position.A;
        if (_self.validateEditarComplejos(_self.objcomplex)) {
            $.ajax({
                url: base_url + '/admin/canchas/updatecomplex/',
                type: "POST",
                data: _self.objcomplex,
                beforeSend: function() {
                    component.popupLoader("Actualizar complejo", "Enviado información, espere un momento...");
                },
                success: function(data_success) {
                    component.popupHtmlHide();
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            component.messageSimple("Actualizar complejo", data_success.message);
                            component.reload(500);
                        } else {
                            component.messageSimple("Actualizar complejo", data_success.message, "danger");
                        }
                    } else {
                        component.messageSimple("Actualizar complejo", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                    }
                },
                error: function() {
                    component.popupHtmlHide();
                    component.messageSimple("Actualizar complejo", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };
    //------
    EditarComplejos.prototype.validateSubirFoto = function() {
        if (validate.isEmpty($('#foto_complex').val())) {
            component.messageSimple("Agregar foto", "Por favor ingrese una imagen del complejo, puede ser en formato jpg, png o gif.", "danger");
            return false;
        }
        if (!validate.validateExtencionesImg(validate.getExtencion($('#foto_complex').val()))) {
            component.messageSimple("Agregar foto", "El formato de la imagen ingresada no es válido, por favor ingrese otra.", "danger");
            return false;
        }
        return true;
    };
    //------
    EditarComplejos.prototype.subirFoto = function() {
        if (_self.validateSubirFoto() && validate.isNumeric(_self.objcomplex.complejo)) {
            var auxdata = {
                complejo: _self.objcomplex.complejo
            };
            var myData = new FormData();
            if (!validate.isEmpty($("#foto_complex").val())) {
                jQuery.each($('#foto_complex')[0].files, function(i, file) {
                    myData.append('fotocomplex', file);
                });
            }
            var properties = auxdata;
            for (var index in properties) {
                myData.append(index, properties[index]);
            }
            $.ajax({
                url: base_url + '/admin/canchas/addphotocomplex/',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: myData,
                beforeSend: function() {
                    component.popupLoader("Agregar foto", "Enviado información, espere un momento...");
                },
                success: function(data_success) {
                    component.popupHtmlHide();
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            component.messageSimple("Agregar foto", data_success.message);
                            component.reload(1000);
                        } else {
                            component.messageSimple("Agregar foto", data_success.message, "danger");
                        }
                    } else {
                        component.messageSimple("Agregar foto", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                    }
                },
                error: function() {
                    component.popupHtmlHide();
                    component.messageSimple("Agregar foto", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };
    //------
    EditarComplejos.prototype.agregarCancha = function() {
        if (_self.validateNuevaCancha("new-cancha") && validate.isNumeric(_self.objcomplex.complejo)) {
            var auxdata = {
                name: $("#new-cancha #name_cancha").val(),
                complejo: _self.objcomplex.complejo
            };
            var myData = new FormData()
            if (!validate.isEmpty($("#new-cancha #foto_cancha").val())) {
                jQuery.each($('#new-cancha #foto_cancha')[0].files, function(i, file) {
                    myData.append('fotocancha', file);
                });
            }
            var properties = auxdata;
            for (var index in properties) {
                myData.append(index, properties[index]);
            }
            $.ajax({
                url: base_url + '/admin/canchas/addsubcomplex/',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: myData,
                beforeSend: function() {
                    component.alertComponent("Enviado información, espere un momento...", "message-new-cancha", "loader");
                },
                success: function(data_success) {
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            $('#pop-agregar-cancha').modal('hide');
                            component.reload(500);
                        } else {
                            component.alertComponent(data_success.message, "message-new-cancha", "danger");
                        }
                    } else {
                        component.alertComponent("Surgió un error al envío de la información, por favor inténtelo de nuevo.", "message-new-cancha", "danger");
                    }
                },
                error: function() {
                    $('#pop-agregar-cancha').modal('hide');
                    component.messageSimple("Agregar cancha", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };
    //------
    EditarComplejos.prototype.actualizarCancha = function(cancha) {
        if (_self.validateNuevaCancha("contend-edit-cancha") && validate.isNumeric(_self.objcomplex.complejo) && validate.isNumeric(cancha)) {
            var auxdata = {
                name: $("#contend-edit-cancha #name_cancha").val(),
                complejo: _self.objcomplex.complejo,
                cancha: cancha
            };

            var myData = new FormData();
            if (!validate.isEmpty($("#contend-edit-cancha #foto_cancha").val())) {
                jQuery.each($('#contend-edit-cancha #foto_cancha')[0].files, function(i, file) {
                    myData.append('fotocancha', file);
                });
            }
            var properties = auxdata;
            for (var index in properties) {
                myData.append(index, properties[index]);
            }
            $.ajax({
                url: base_url + '/admin/canchas/updatesubcomplex/',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: myData,
                beforeSend: function() {
                    component.alertComponent("Enviado información, espere un momento...", "message-edit-cancha", "loader");
                },
                success: function(data_success) {
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            $('#pop-editar-cancha').modal('hide');
                            component.reload(1000);
                        } else {
                            component.alertComponent(data_success.message, "message-edit-cancha", "danger");
                        }
                    } else {
                        component.alertComponent("Surgió un error al envío de la información, por favor inténtelo de nuevo.", "message-edit-cancha", "danger");
                    }
                },
                error: function() {
                    $('#pop-editar-cancha').modal('hide');
                    component.messageSimple("Agregar cancha", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };
    //------
    EditarComplejos.prototype.loadEditCancha = function(cancha) {
        if (validate.isNumeric(cancha)) {
            $.ajax({
                url: base_url + '/admin/canchas/load_edit_cancha/',
                type: "POST",
                data: {cancha: cancha},
                success: function(data_success) {
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            $("#message-edit-cancha").html("");
                            $("#contend-edit-cancha").html(data_success.html);
                            $('#pop-editar-cancha').modal('show');
                        }
                    }
                }
            });
        }
    };
    //------
    EditarComplejos.prototype.clearFormCancha = function() {
        $("#new-cancha #name_cancha").val("");
        $("#new-cancha #foto_complex").val("");
    };
    //------
    EditarComplejos.prototype.validateNuevaCancha = function(idcontend) {
        var mesageid = "message-new-cancha";
        if (idcontend == "contend-edit-cancha") {
            mesageid = "message-edit-cancha";
        }
        if (validate.isEmpty($("#" + idcontend + " #name_cancha").val())) {
            component.alertComponent("Por favor ingrese un nombre para la cancha.", mesageid, "danger");
            return false;
        }
        return true;
    };
    //------
    EditarComplejos.prototype.validateEditarComplejos = function(objcomplex) {
        if (validate.isEmpty(objcomplex.name_complex)) {
            component.messageSimple("Actualizar complejo", "Por favor ingrese el nombre del complejo.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.email)) {
            component.messageSimple("Actualizar complejo", "Por favor ingrese un email o correo electrónico que permita contactar el complejo.", "danger");
            return false;
        }
        if (!validate.isEmail(objcomplex.email)) {
            component.messageSimple("Actualizar complejo", "El email o correo electrónico no es válido, por favor ingrese otro.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.phone)) {
            component.messageSimple("Actualizar complejo", "Por favor ingrese teléfono o celular de contacto.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.address)) {
            component.messageSimple("Actualizar complejo", "Por favor ingrese la dirección del complejo.", "danger");
            return false;
        }
        if (!add_marker) {
            component.messageSimple("Actualizar complejo", "Por favor ubique el complejo en el mapa haciendo click sobre el mismo.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.description)) {
            component.messageSimple("Actualizar complejo", "Ingrese una breve descripción del complejo deportivo.", "danger");
            return false;
        }
        return true;
    };
    //------
    EditarComplejos.prototype.deleteCancha = function(code) {
        if (validate.isNumeric(code)) {
            var elimin = function() {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/admin/canchas/deletesubcomplex/',
                    data: {'code': code},
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if (data.status) {
                                component.messageSimple("Eliminar cancha", data.message);
                                component.reload(1000);
                            } else {
                                component.messageSimple("Eliminar cancha", data.message, "danger");
                            }
                        } else {
                            component.messageSimple("Eliminar cancha", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                        }
                    },
                    error: function() {
                        component.messageSimple("Eliminar cancha", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                    }
                });
            };
            component.messageAcept("Eliminar cancha", "¿Esta seguro(a) de eliminar la cancha?", elimin, "danger");
        }
    };
    //------
    EditarComplejos.prototype.initMap = function(lat, lng, titulo) {
        lat = parseFloat(lat);
        lng = parseFloat(lng);
        var myLatLng = null;
        if (validate.isNumeric(lat) && validate.isNumeric(lng)) {
            myLatLng = new google.maps.LatLng(lat, lng);
        } else {
            myLatLng = new google.maps.LatLng(4.598055599999999, -74.0758333);
        }
        marker = new google.maps.Marker({
            position: myLatLng,
            title: titulo,
            draggable: true,
            animation: google.maps.Animation.BOUNCE
        });
        map = new GMaps({
            div: '#map',
            center: myLatLng,
            zoom: 10,
            click: function(e) {
                if (!add_marker) {
                    map.addMarker(marker);
                    add_marker = true;
                }
                marker.setPosition(e.latLng);
            }
        });

        $('#ir_dir').click(function(e) {
            e.preventDefault();
            GMaps.geocode({
                address: $('#buscar').val().trim(),
                callback: function(results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.setZoom(14);
                    }
                }
            });
        });
    };
    //------
    EditarComplejos.prototype.addMarkerMap = function() {
        map.addMarker(marker);
        add_marker = true;
        map.setZoom(14);
    };
    //------
    EditarComplejos.prototype.deletephoto = function(index) {
        if (validate.isNumeric(index)) {
            var func = function() {
                $("#form_delete_photo-" + index).submit();
                component.popupLoader("Mis Fotos", "Por favor espere un momento...");
            };
            component.messageAcept("Mis Fotos", "¿Está seguro de eliminar esta foto?", func, "danger");
        }
    };
    //------

    return EditarComplejos;
})();
