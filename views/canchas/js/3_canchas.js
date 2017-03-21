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
        lat = parseFloat($("#map").attr('data-lat'));
        lng = parseFloat($("#map").attr('data-lng'));
        //console.log(lat, lng);
        addMarker(lat, lng);
    };

    google.maps.event.addDomListener(window, 'load', initialize);

    var addMarker = function(lat, lng) {
        var location = new google.maps.LatLng(lat, lng);
        removeMarker();
        marker = new google.maps.Marker({
            position: location,
            map: map,
            title: $("#nombre_complejo").text(),
            animation: google.maps.Animation.BOUNCE
        });


    };

    var setLatLng = function(event) {
        lat = event.latLng.jb;
        lng = event.latLng.kb;
    };

    var removeMarker = function() {
        if (marker !== undefined && marker !== null) {
            marker.setMap(null);
        }
    };




});
