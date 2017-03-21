var Complejos = (function() {
    var _self = null;
    var map = null;
    var marker = null;
    var add_marker = false;
    function Complejos() {
        _self = this;
        _self.initMap();
        _self.events();
        _self.objcomplex = {
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
    Complejos.prototype.events = function() {
        $("#create_complex").on('click', function() {
            _self.createComplex();
        });
        $(".delete_complex").on('click', function() {
            _self.deleteComplex($(this).attr('data-code'));
        });
    };
    //------
    Complejos.prototype.createComplex = function() {
        _self.objcomplex.name_complex = $("#name_complex").val();
        _self.objcomplex.email = $("#email").val();
        _self.objcomplex.description = $("#description").val();
        _self.objcomplex.phone = $("#phone").val();
        _self.objcomplex.address = $("#address").val();
        _self.objcomplex.lat = marker.position.k;
        _self.objcomplex.lng = marker.position.A;

        if (_self.validateComplejos(_self.objcomplex)) {
            var myData = new FormData();
            jQuery.each($('#foto_complex')[0].files, function(i, file) {
                myData.append('fotocomplex', file);
            });
            var properties = _self.objcomplex;
            for (var index in properties) {
                myData.append(index, properties[index]);
            }
            $.ajax({
                url: base_url + '/admin/canchas/createcomplex/',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: myData,
                beforeSend: function() {
                    component.popupLoader("Crear complejo", "Enviado información, espere un momento...");
                },
                success: function(data_success) {
                    console.log(data_success);
                    component.popupHtmlHide();
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            component.messageSimple("Crear complejo", data_success.message);
                        } else {
                            component.messageSimple("Crear complejo", data_success.message, "danger");
                        }
                    } else {
                        component.messageSimple("Crear complejo", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                    }
                },
                error: function() {
                    component.popupHtmlHide();
                    component.messageSimple("Crear complejo", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };
    //------
    Complejos.prototype.validateComplejos = function(objcomplex) {
        if (validate.isEmpty(objcomplex.name_complex)) {
            component.messageSimple("Crear complejo", "Por favor ingrese el nombre del complejo.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.email)) {
            component.messageSimple("Crear complejo", "Por favor ingrese un email o correo electrónico que permita contactar el complejo.", "danger");
            return false;
        }
        if (!validate.isEmail(objcomplex.email)) {
            component.messageSimple("Crear complejo", "El email o correo electrónico no es válido, por favor ingrese otro.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.phone)) {
            component.messageSimple("Crear complejo", "Por favor ingrese teléfono o celular de contacto.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.address)) {
            component.messageSimple("Crear complejo", "Por favor ingrese la dirección del complejo.", "danger");
            return false;
        }
        if (!add_marker) {
            component.messageSimple("Crear complejo", "Por favor ubique el complejo en el mapa haciendo click sobre el mismo.", "danger");
            return false;
        }
        if (validate.isEmpty(objcomplex.description)) {
            component.messageSimple("Crear complejo", "Ingrese una breve descripción del complejo deportivo.", "danger");
            return false;
        }
        if (validate.isEmpty($('#foto_complex').val())) {
            component.messageSimple("Crear complejo", "Por favor ingrese una imagen del complejo, puede ser en formato jpg, png o gif.", "danger");
            return false;
        }
        if (!validate.validateExtencionesImg(validate.getExtencion($('#foto_complex').val()))) {
            component.messageSimple("Crear complejo", "El formato de la imagen ingresada no es válido, por favor ingrese otra.", "danger");
            return false;
        }
        return true;
    };
    //------
    Complejos.prototype.deleteComplex = function(code) {
        console.log(code);
        if (validate.isNumeric(code)) {
            var elimin = function() {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/admin/canchas/deletecomplex/',
                    data: {'code': code},
                    success: function(data) {
                        console.log(data);
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if (data.status) {
                                component.messageSimple("Eliminar complejo", data.message);
                                component.reload();
                            } else {
                                component.messageSimple("Eliminar complejo", data.message, "danger");
                            }
                        }
                    },
                    error: function() {
                        component.messageSimple("Crear complejo", "Surgió un error al envío de la información, por favor inténtelo de nuevo.", "danger");
                    }
                });
            };
            component.messageAcept("Eliminar complejo", "¿Esta seguro(a) de eliminar el complejo?", elimin, "danger");
        }
    };
    //------
    Complejos.prototype.initMap = function() {
        var myLatLng = new google.maps.LatLng(4.598055599999999, -74.0758333);
        marker = new google.maps.Marker({
            position: myLatLng,
            title: 'Complejo',
            draggable: true,
            animation: google.maps.Animation.BOUNCE
        });
        map = new GMaps({
            div: '#map',
            center: myLatLng,
            zoom: 10,
            click: function(e) {
                //console.log(e.latLng);
                if (!add_marker) {
                    map.addMarker(marker);
                    add_marker = true;
                }
                if (!validate.isEmpty($("#name_complex").val())) {
                    var mytitle = $("#name_complex").val();
                    if (!validate.isEmpty($("#address").val())) {
                        mytitle = mytitle + " : " + $("#address").val();
                    }
                    marker.title = mytitle;
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
    return Complejos;
})();
