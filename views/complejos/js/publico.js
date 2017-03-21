var PublicoCompejo = (function() {
    var _self = null;
    var map = null;
    var marker = null;
    var add_marker = false;
    function PublicoCompejo() {
        _self = this;
        _self.complex = $("#_complejo").val();
        _self.auxhtml = $("#contend-ver-cancha").html();
    }
    //------
    PublicoCompejo.prototype.events = function() {
        $(".ver_cancha").on('click', function() {
            _self.loadSeeCancha($(this).attr('data-code'));
        });
    };
    //------
    PublicoCompejo.prototype.loadSeeCancha = function(cancha) {
        $("#contend-ver-cancha").html(_self.auxhtml);
        $('#pop-ver-cancha').modal('show');
        if (validate.isNumeric(cancha)) {
            $.ajax({
                url: base_url + '/complejos/loadsubcomplex/',
                type: "POST",
                data: {cancha: cancha},
                success: function(data_success) {
                    if (data_success.hasOwnProperty("status") && data_success.hasOwnProperty("message")) {
                        if (data_success.status) {
                            $("#contend-ver-cancha").html(data_success.html);
                        }
                    }
                }
            });
        }
    };
    //------
    PublicoCompejo.prototype.initMap = function(lat, lng) {
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
            title: 'Point A',
            draggable: true
        });
        map = new GMaps({
            div: '#map',
            center: myLatLng,
            zoom: 10
        });
    };
    //------
    PublicoCompejo.prototype.addMarkerMap = function() {
        map.addMarker(marker);
        add_marker = true;
        map.setZoom(14);
    };
    //------

    return PublicoCompejo;
})();
