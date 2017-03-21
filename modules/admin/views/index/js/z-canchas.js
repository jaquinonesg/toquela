$(function() {

    $(".sub_complex[data-code=" + $("#add_schedule").attr('data-sub') + "]").addClass('complex_selected');

    var map = null, marker = null, lat = null, lng = null;

    var initialize = function() {

        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(4.60971, -74.08175),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            }
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        google.maps.event.addListener(map, 'click', function(event) {
            addMarker(event.latLng.ob, event.latLng.pb);
            setLatLng(event);
        });
        lat = parseFloat($("#map").attr('data-lat'));
        lng = parseFloat($("#map").attr('data-lng'));
        addMarker(lat, lng);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                if (_.isNull(lat) || _.isNull(lng)) {
                    addMarker(position.coords.latitude, position.coords.longitude);
                }
            }, function(error) {
                console.log("Something went wrong: ", error);
            }, {
                timeout: (5 * 1000),
                maximumAge: (1000 * 60 * 15),
                enableHighAccuracy: true
            });
        } else {
            alert("El navegador no tiene soporte de geolocalización");
        }

    };

    google.maps.event.addDomListener(window, 'load', initialize);

    var addMarker = function(lat, lng) {
        var location = new google.maps.LatLng(lat, lng);
        removeMarker();
        marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true,
            title: 'Mi ubicación',
            animation: google.maps.Animation.BOUNCE
        });

        google.maps.event.addListener(marker, 'dragend', function(event) {
            setLatLng(event);
        });
    };

    var setLatLng = function(event) {
        lat = event.latLng.ob;
        lng = event.latLng.pb;
    };

    var removeMarker = function() {
        if (!_.isUndefined(marker) && !_.isNull(marker)) {
            marker.setMap(null);
        }
    };

    $("#update").on('click', function() {
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(code)) {

            if (_.isNumber(lat) && _.isNumber(lng)) {
                var name = $("#name").val();
                var address = $("#address").val();
                var phone = $("#phone").val();
                var email = $("#email").val();
                var description = $("#description").val();

                if (!_.isEmpty(name) && !_.isEmpty(address) && !_.isEmpty(phone) && !_.isEmpty(email) && !_.isEmpty(description)) {
                    $.ajax({
                        type: 'POST',
                        url: base_url + '/administrador-canchas/index/updatecomplex/',
                        data: {
                            'name': name,
                            'address': address,
                            'phone': phone,
                            'email': email,
                            'description': description,
                            'lat': lat,
                            'lng': lng,
                            'code': code
                        },
                        success: function(data) {
                            if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                                alert(data.message);
                                if (data.status) {
                                    window.location.reload();
                                }
                            }
                        }
                    });
                } else {
                    alert("Todos los campos son obligatorios.");
                }
            } else {
                alert("Debe seleccionar una ubicación en el mapa.");
            }
        }
    });

    $("#img_complex").on('change', function() {
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(code)) {
            try {
                new FileModel({
                    auto: true,
                    selector: '#img_complex',
                    url: base_url + '/administrador-canchas/file/uploadphoto/',
                    extensions: ['.jpg', '.png', '.jpeg'],
                    properties: {
                        'code': code
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            alert(data.message);
                            if (data.status) {
                                window.location.reload();
                            }
                        }
                    }
                });
            } catch (error) {
                alert(error.message);
            }
        }
    });

    $(".delete_img").on('click', function() {
        if (confirm("¿Esta seguro(a) que desea eliminar la imagen?")) {
            var complex = parseInt($(this).attr('data-complex'));
            var attachment = parseInt($(this).attr('data-code'));
            if (_.isNumber(complex) && _.isNumber(attachment)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/file/deletephoto/',
                    data: {
                        complex: complex,
                        attachment: attachment
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            alert(data.message);
                            if (data.status) {
                                window.location.reload();
                            }
                        }
                    }
                });
            }
        }
    });

    $(".sub_complex").on('click', function() {
        var code = parseInt($(this).attr('data-code'));
        if (!$(this).hasClass('complex_selected')) {
            $(".sub_complex").removeClass('complex_selected');
            $(this).addClass('complex_selected');

            if (_.isNumber(code)) {
                setSchedule(code);
            }
        }
    });

    var setSchedule = function(code) {
        var day = $("#disponibility").val();


        $.ajax({
            type: 'POST',
            url: base_url + '/administrador-canchas/index/subcomplex/',
            data: {
                'code': code,
                'day': day
            },
            success: function(data) {
                if (data.hasOwnProperty('html') && data.hasOwnProperty('status')) {
                    $("#add_schedule").attr('data-sub', code);
                    $("#Listado-Calendario").html(data.html);
                }
            }
        });
    };



    $("#add_schedule").on('click', function() {
        var sub = parseInt($(this).attr('data-sub'));
        var complex = parseInt($(this).attr('data-complex'));

        var day = $("#disponibility").val();
        var start = $("#start").val();
        var end = $("#end").val();
        var price = parseFloat($.trim($("#precio").val().replace(/[^\d\.\-\ ]/g, '')));

        if (!_.isEmpty(day) && !_.isEmpty(start) && !_.isEmpty(end) && _.isNumber(price)) {
            if (_.isNumber(sub) && _.isNumber(complex)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/addschedule/',
                    data: {
                        'day': day,
                        'start': start,
                        'end': end,
                        'price': price,
                        'sub': sub,
                        'complex': complex
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                            alert(data.message);
                            if (data.status) {
                                setSchedule(sub);
                            }
                        }
                    }
                });
            }
        }

    });

    var FileModel = Backbone.Model.extend({
        defaults: function() {
            return {
                'auto': false,
                'nameSend': 'document',
                'url': null,
                'selector': null,
                'response': null,
                'errors': [],
                'extensions': '*',
                'properties': {},
                'before': function() {
                },
                'success': function() {
                },
                'error': function() {
                }
            };
        },
        initialize: function() {
            if (!window.FormData) {
                throw new Error('El navegador no dispone de la tecnólogia necesaria para subir archivos, por favor intente con otro navegador.');
            }
            if (_.isNull(this.get('url')) || _.isNull(this.get('selector')) || !_.isFunction(this.get('before')) || !_.isFunction(this.get('success'))) {
                throw new Error('Parametros invalidos para inicialización.');
            }
            if (this.get('auto')) {
                this.send();
            }
        },
        validateExtensions: function(extension) {
            if (_.isArray(this.get('extensions'))) {
                var extensions = this.get('extensions');
                for (var i = 0; i < extensions.length; i++) {
                    if (extensions[i] === extension) {
                        return true;
                    }
                }
            } else if (_.isString(this.get('extensions')) && this.get('extensions') === "*") {
                return true;
            }
            return false;
        },
        error: function(name) {
            var temporal = this.get('errors');
            if (_.isArray(temporal)) {
                temporal.push(name);
                this.set('errors', temporal);
            }
        },
        send: function() {
            var formData = new FormData();
            var model = this;
            $(this.get('selector')).each(function(index, element) {
                if (!_.isEmpty($(element).val())) {
                    var file = element.files[0];
                    var extension = (file.name.substring(file.name.lastIndexOf("."))).toLowerCase();
                    if (model.validateExtensions(extension)) {
                        formData.append(model.get('nameSend') + '[]', file);
                    } else {
                        model.error(file.name);
                    }
                }
            });
            if (!_.isNull(this.get('properties')) && _.isObject(this.get('properties'))) {
                var properties = this.get('properties');
                for (var index in properties) {
                    formData.append(index, properties[index]);
                }
            }
            formData.append('name_files', this.get('nameSend'));
            var response = this.get('response');
            var errors = this.get('errors');
            if (errors.length > 0) {
                var string = "";
                for (var i = 0; i < errors.length; i++) {
                    string += errors[i] + ' ,';
                }
                var text = 'Extensión invalida para los archivos: ' + string.substring(0, string.length - 1)
                if (!_.isNull(response)) {
                    $(response).empty().append(text);
                } else {
                    throw new Error(text);
                }
            }
            if (errors.length === 0) {
                $.ajax({
                    url: this.get('url'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: this.get('before'),
                    success: this.get('success'),
                    error: this.get('error')
                });
            }
        }
    });

    $("body").on('click', '.delete_schedule', function() {
        if (confirm("¿Esta seguro(a) que desea eliminar el horario?")) {
            var code = parseInt($(this).attr('data-code'));
            if (_.isNumber(code)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/deleteschedule/',
                    data: {
                        'code': code
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if (data.status) {
                                var tmp = parseInt($("#add_schedule").attr('data-sub'));
                                if (_.isNumber(tmp)) {
                                    setSchedule(tmp);
                                }
                            }
                        }
                    }
                });
            }
        }
    });

    $("#disponibility").on('change', function() {
        var day = $("#disponibility").val();
        var sub = parseInt($("#add_schedule").attr('data-sub'));
        if (!_.isEmpty(day) && _.isNumber(sub)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/index/changeday/',
                data: {
                    day: day,
                    code: sub
                },
                success: function(data) {
                    if (data.hasOwnProperty('html') && data.hasOwnProperty('status')) {
                        $("#Listado-Calendario").html(data.html);
                    }
                }
            });
        }
    });

    $("#precio").priceFormat({
        prefix: '$ ',
        centsSeparator: '.',
        thousandsSeparator: ',',
        centsLimit: 0
    });

    $("a.previa").fancybox({
        'titleShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'easingIn': 'easeOutBack',
        'easingOut': 'easeInBack'
    });
});