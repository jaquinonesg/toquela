$(function() {

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
            addMarker(event.latLng.jb, event.latLng.kb);
            setLatLng(event);
        });
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
        lat = event.latLng.jb;
        lng = event.latLng.kb;
    };

    var removeMarker = function() {
        if (!_.isUndefined(marker) && !_.isNull(marker)) {
            marker.setMap(null);
        }
    };

    $("#create").on('click', function() {
        if (_.isNumber(lat) && _.isNumber(lng)) {
            var name = $("#name").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var description = $("#description").val();

            if (!_.isEmpty(name) && !_.isEmpty(address) && !_.isEmpty(phone) && !_.isEmpty(email) && !_.isEmpty(description)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/createcomplex/',
                    data: {
                        'name': name,
                        'address': address,
                        'phone': phone,
                        'email': email,
                        'description': description,
                        'lat': lat,
                        'lng': lng
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            alert(data.message);
                            if (data.status) {
                                window.location.href = data.url;
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

    });



});