
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
$(document).ready(
        function() {
            init();
            //--------------------------------------------------------------
            $(document).on('change', '#slc_ciudades', function() {
                var value_select = $(this).val();
                if (value_select == "") {
                    alert('Por favor seleccione una ciudad valida.');
                } else {
                    buscarGeo(value_select);
                }
            });
            //--------------------------------------------------------------
            $(document).on('change', '#slc_buscas', function() {
                var value_select = $(this).val();
                if (value_select == "") {
                    alert('Por favor seleccione una opción válida.');
                } else {
                    if (value_select == 2) {
                        getJugadores();
                    }
                    if (value_select == 3) {
                        getComplejos();
                    }
                }
            });
            //--------------------------------------------------------------

        });

function init() {
    //cargarMapa("mapaToquela", "", "lat", "lon", "", "", "", "radio", false, "zoom");
    //setAutocomplete();
}

//---------------------------------------------------------------
function setAutocomplete() {
    var name_user = "";
    $("#filtro").autocomplete({
        source: base_url + "/index/get_coindencias/",
        minLength: 3,
        select: function(event, ui) {
            $("#filtro").val(ui.item.label);
            cod_user = ui.item.value;
            name_user = ui.item.label;
            separaUserComplex(cod_user);

        },
        close: function(event, ui) {
            $("#filtro").val(name_user);
        }
    });
}

//---------------------------------------------------------------
function separaUserComplex(codifi) {
    var pes = codifi.substr(0, 2);
    var cod = codifi.substr(2, codifi.lenght);
    if (pes == "U_") {
        getJugador(cod);
    }
    if (pes == "C_") {
        getComplejo(cod);
    }
//    alert("pes: " + pes + ", cod: " + cod);
}

//---------------------------------------------------------------
function getJugadores() {
    $.ajax({
        dataType: "json",
        async: true,
        type: 'POST',
        url: base_url + '/index/get_jugadores/',
        success: function(succesData) {
            if ((succesData != null) || (succesData != "")) {
                for (var a = 0; a < succesData.length; a++) {
                    setMarkerJugador(succesData[a].latitude, succesData[a].longitude, succesData[a].name, succesData[a].address, succesData[a].coduser, succesData[a].username, false);
                }
            }
        },
        timeout: 10000,
        error: function() {
            alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
        }
    });
}

//---------------------------------------------------------------
function getJugador(val) {
    $.ajax({
        dataType: "json",
        async: true,
        type: 'GET',
        url: base_url + '/index/get_jugador_map/' + val,
        success: function(succesData) {
            if ((succesData != null) || (succesData != "")) {
                for (var a = 0; a < succesData.length; a++) {
                    setMarkerJugador(succesData[a].latitude, succesData[a].longitude, succesData[a].name, succesData[a].address, succesData[a].coduser, succesData[a].username, true);
                }
            }
        },
        timeout: 10000,
        error: function() {
            alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
        }
    });
}

//---------------------------------------------------------------
function getComplejos() {
    $.ajax({
        dataType: "json",
        async: true,
        type: 'POST',
        url: base_url + '/index/get_complejos/',
        success: function(succesData) {
            if ((succesData != null) || (succesData != "")) {
                for (var a = 0; a < succesData.length; a++) {
                    setMarkerComplejo(succesData[a].lat, succesData[a].lng, succesData[a].name, succesData[a].address, succesData[a].codcomplex, false);
                }
            }
        },
        timeout: 10000,
        error: function() {
            alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
        }
    });
}

//---------------------------------------------------------------
function getComplejo(val) {
    $.ajax({
        dataType: "json",
        async: true,
        type: 'POST',
        url: base_url + '/index/get_complex_map/' + val,
        success: function(succesData) {
            if ((succesData != null) || (succesData != "")) {
                for (var a = 0; a < succesData.length; a++) {
                    setMarkerComplejo(succesData[a].lat, succesData[a].lng, succesData[a].name, succesData[a].address, succesData[a].codcomplex, true);
                }
            }
        },
        timeout: 10000,
        error: function() {
            alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
        }
    });
}
