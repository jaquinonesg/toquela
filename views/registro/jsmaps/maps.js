/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// Note that using Google Gears requires loading the Javascript
// at http://code.google.com/apis/gears/gears_init.js

var initialLocation;
var bogota = new google.maps.LatLng(4.6577, -74.085);
var grimorum = new google.maps.LatLng(4.7029647089410735, -74.0461731327133);
var browserSupportFlag = new Boolean();
var map;
var circulo;
var circulo2;
var marker;
var yaMarcador;
function cargarMapa(idContenedor, titulo, idLat, idLon, tipoClic, buscar, places, idRadio, editable, idZoom) {
    var myOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById(idContenedor), myOptions);
    var siPuso = false;
    if (yaMarcador == true) {
        marker.setMap(null);
    }

    yaMarcador = false;
    var hayLatLon = false;
    if (idLat != "" && idLon != "") {
        if ($("#" + idLat).val() != "" && $("#" + idLon).val() != "") {
            hayLatLon = true;
        }
    }
    if (hayLatLon == true) {
        try {
            var marcadorPrevio = new google.maps.LatLng($("#" + idLat).val(), $("#" + idLon).val());
            ponerMarcador(marcadorPrevio, titulo, idLat, idLon, true);
            siPuso = true;
            yaMarcador = true;
        } catch (e) {
            siPuso = false;
        }
    } else if (buscar.indexOf(":::") > 0) {
        ponerMarcadores(buscar);
    } else if (buscar.length > 0) {
        var auxBuscar = buscar.split(";;;");
        buscarDireccion(auxBuscar[0], auxBuscar[1], titulo, idLat, idLon);
    }



    if (siPuso == false) {

        /*
         // Try W3C Geolocation (Preferred)
         if(navigator.geolocation) {
         browserSupportFlag = true;
         navigator.geolocation.getCurrentPosition(function(position) {
         initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
         map.setCenter(initialLocation);
         }, function() {
         handleNoGeolocation(browserSupportFlag);
         });
         // Try Google Gears Geolocation
         } else if (google.gears) {
         browserSupportFlag = true;
         var geo = google.gears.factory.create('beta.geolocation');
         geo.getCurrentPosition(function(position) {
         initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
         map.setCenter(initialLocation);
         }, function() {
         handleNoGeoLocation(browserSupportFlag);
         });
         // Browser doesn't support Geolocation
         } else {
         browserSupportFlag = false;
         handleNoGeolocation(browserSupportFlag);
         }
         */
        map.setZoom(5);

        if (idZoom != "") {
            if ($("#" + idZoom).val() != "") {
                map.setZoom($("#" + idZoom).val());
            }
        }

        map.setCenter(bogota);
    }

    var centro = map.getCenter();

    switch (tipoClic) {
        case "sencillo":
            if (siPuso == true) {
                ponerMarcador(centro, titulo, idLat, idLon, false);
                map.setZoom(12);
            }
            google.maps.event.addListener(map, 'click', function(event) {
                ponerMarcador(event.latLng, titulo, idLat, idLon, false);
            });
            break;
        case "circuloDoble":
            var radioNueva = 2000;
            if (idRadio != "") {
                if ($("#" + idRadio).val() != "") {
                    radioNueva = parseInt($("#" + idRadio).val());
                }
            }
            if (siPuso == true) {
                map.setZoom(12);
            }
            var opcionesAlcance = {
                editable: editable,
                strokeColor: "#821E80",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#821E80",
                fillOpacity: 0.25,
                map: map,
                center: centro,
                radius: radioNueva
            }
            var opcionesAlcance2 = {
                editable: false,
                strokeColor: "#B3E3F8",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#B3E3F8",
                fillOpacity: 0.6,
                map: map,
                center: centro,
                radius: (radioNueva * (1 + toleranciaCobertura))
            }
            circulo2 = new google.maps.Circle(opcionesAlcance2);
            circulo = new google.maps.Circle(opcionesAlcance);

            google.maps.event.addListener(map, 'zoom_changed', function() {
                if (idZoom != "") {
                    $("#" + idZoom).val(map.getZoom());
                }
            });

            google.maps.event.addListener(circulo, 'center_changed', function() {
                var location = circulo.getCenter();
                var funcion = "nada";
                if (idLat != "") {
                    $("#" + idLat).val(location.lat());
                    funcion = $("#" + idLat).attr("enCambio");
                }
                if (idLon != "") {
                    $("#" + idLon).val(location.lng());
                    funcion = $("#" + idLon).attr("enCambio");
                }
                if (idZoom != "") {
                    $("#" + idZoom).val(map.getZoom());
                    funcion = $("#" + idZoom).attr("enCambio");
                }
                if ($.isFunction(window[funcion])) {
                    window[funcion].apply(null, null);
                }
                circulo2.setCenter(location);
            });
            google.maps.event.addListener(circulo, 'radius_changed', function() {
                if (idRadio != "") {
                    $("#" + idRadio).val(circulo.getRadius());
                    var funcion = $("#" + idRadio).attr("enCambio");
                    if ($.isFunction(window[funcion])) {
                        window[funcion].apply(null, null);
                    }
                    circulo2.setRadius((circulo.getRadius() * (1 + toleranciaCobertura)));
                }
            });
            if (idLat != "") {
                $("#" + idLat).val(centro.lat());
            }
            if (idLon != "") {
                $("#" + idLon).val(centro.lng());
            }
            if (idRadio != "") {
                $("#" + idRadio).val(radioNueva);
            }
            if (idZoom != "") {
                $("#" + idZoom).val(map.getZoom());
            }
            break;
        case "circulo":
            var radioNueva = 2000;
            if (idRadio != "") {
                if ($("#" + idRadio).val() != "") {
                    radioNueva = parseInt($("#" + idRadio).val());
                }
            }
            if (siPuso == true) {
                map.setZoom(12);
            }
            var opcionesAlcance = {
                editable: editable,
                strokeColor: "#821E80",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#821E80",
                fillOpacity: 0.25,
                map: map,
                center: centro,
                radius: radioNueva
            }
            circulo = new google.maps.Circle(opcionesAlcance);

            google.maps.event.addListener(map, 'zoom_changed', function() {
                if (idZoom != "") {
                    $("#" + idZoom).val(map.getZoom());
                }
            });
            google.maps.event.addListener(circulo, 'center_changed', function() {
                var location = circulo.getCenter();
                var funcion = "nada";
                if (idLat != "") {
                    $("#" + idLat).val(location.lat());
                    funcion = $("#" + idLat).attr("enCambio");
                }
                if (idLon != "") {
                    $("#" + idLon).val(location.lng());
                    funcion = $("#" + idLon).attr("enCambio");
                }
                if (idZoom != "") {
                    $("#" + idZoom).val(map.getZoom());
                    funcion = $("#" + idZoom).attr("enCambio");
                }
                if ($.isFunction(window[funcion])) {
                    window[funcion].apply(null, null);
                }
            });
            google.maps.event.addListener(circulo, 'radius_changed', function() {
                if (idRadio != "") {
                    $("#" + idRadio).val(circulo.getRadius());
                    var funcion = $("#" + idRadio).attr("enCambio");
                    if ($.isFunction(window[funcion])) {
                        window[funcion].apply(null, null);
                    }
                }
            });
            if (idLat != "") {
                $("#" + idLat).val(centro.lat());
            }
            if (idLon != "") {
                $("#" + idLon).val(centro.lng());
            }
            if (idRadio != "") {
                $("#" + idRadio).val(radioNueva);
            }
            if (idZoom != "") {
                $("#" + idZoom).val(map.getZoom());
            }
            break;
        case "poligono":
            break;

    }

    if (places.length > 0) {
        //buscarDirecciones("Banco","500");
        var servicio = new google.maps.places.PlacesService(map);
        var infowindow = new google.maps.InfoWindow();

        if (places.indexOf(":::") > 0) {
            var auxPlaces = places.split(":::");
            for (var ja = 0; ja < auxPlaces.length; ja++) {
                auxLugar = auxPlaces[ja].split(";;;");
                agregarControl(auxLugar[0], auxLugar[1], auxLugar[2], auxLugar[3], auxLugar[4], auxLugar[5], auxLugar[6]);
            }
        } else {
            auxLugar = places.split(";;;");
            agregarControl(auxLugar[0], auxLugar[1], auxLugar[2], auxLugar[3], auxLugar[4], auxLugar[5], auxLugar[6]);
        }

    }


    function crearControl(controlDiv, texto, tooltip, buscar, radio, centros) {
        // Set CSS styles for the DIV containing the control
        // Setting padding to 5 px will offset the control
        // from the edge of the map
        controlDiv.style.padding = '5px';

        // Set CSS for the control border
        var controlUI = document.createElement('DIV');
        controlUI.style.backgroundColor = 'white';
        controlUI.style.borderStyle = 'solid';
        controlUI.style.borderWidth = '2px';
        controlUI.style.cursor = 'pointer';
        controlUI.style.textAlign = 'center';
        controlUI.title = tooltip;
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior
        var controlText = document.createElement('DIV');
        controlText.style.fontFamily = 'Arial,sans-serif';
        controlText.style.fontSize = '12px';
        controlText.style.paddingLeft = '4px';
        controlText.style.paddingRight = '4px';
        controlText.innerHTML = texto;
        controlUI.appendChild(controlText);
        // Setup the click event listeners: simply set the map to Chicago
        google.maps.event.addDomListener(controlUI, 'click', function() {
            var ejeRadio = 200;
            if (centros == "mapa") {
                var centro = map.getCenter();
                //alert(centro.lat() + " - " + centro.lng());
                for (var ja = 1; ja <= radio; ja++) {
                    var request = {
                        location: centro,
                        radius: (ejeRadio * ja),
                        types: [buscar]
                    };

                    servicio.search(request, ponerPlaces);
                }
            } else {
                for (var je = 0; je < markersArray.length; je++) {
                    var centro = markersArray[je].getPosition();
                    for (var ja = 1; ja <= radio; ja++) {
                        var request = {
                            location: centro,
                            radius: (ejeRadio * ja),
                            types: [buscar]
                        };

                        servicio.search(request, ponerPlaces);
                    }
                }
            }
        });
    }

    function agregarControl(texto, tooltip, ubicacion, indice, buscar, radio, centros) {
        var nuevoControlDiv = document.createElement('DIV');
        var nuevoControl = new crearControl(nuevoControlDiv, texto, tooltip, buscar, radio, centros);

        nuevoControlDiv.index = indice;
        switch (ubicacion) {
            case "SupIzq":
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(nuevoControlDiv);
                break;
            case "IzqSup":
                map.controls[google.maps.ControlPosition.LEFT_TOP].push(nuevoControlDiv);
                break;
            case "Sup":
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(nuevoControlDiv);
                break;
            case "SupDer":
                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(nuevoControlDiv);
                break;
            case "DerSup":
                map.controls[google.maps.ControlPosition.RIGHT_TOP].push(nuevoControlDiv);
                break;
            case "Izq":
                map.controls[google.maps.ControlPosition.LEFT_CENTER].push(nuevoControlDiv);
                break;
            case "Der":
                map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(nuevoControlDiv);
                break;
            case "InfIzq":
                map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(nuevoControlDiv);
                break;
            case "IzqInf":
                map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(nuevoControlDiv);
                break;
            case "Inf":
                map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(nuevoControlDiv);
                break;
            case "InfDer":
                map.controls[google.maps.ControlPosition.BOTTOM_RIGHT].push(nuevoControlDiv);
                break;
            case "DerInf":
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(nuevoControlDiv);
                break;
        }

    }

    function ponerPlaces(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                crearMarcadorPlaces(place);
            }
        }
    }

    function crearMarcadorPlaces(place) {
        var placeLoc = place.geometry.location;
        var markerP = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(placeLoc.lat(), placeLoc.lng())
        });
        var image = new google.maps.MarkerImage(
                place.icon, new google.maps.Size(71, 71),
                new google.maps.Point(0, 0), new google.maps.Point(17, 34),
                new google.maps.Size(20, 20)
                );
        markerP.setIcon(image);
        google.maps.event.addListener(markerP, 'click', function() {
            infowindow.setContent(place.name);
            infowindow.open(map, this);
        });
    }

    function handleNoGeolocation(errorFlag) {
        if (errorFlag == true) {
            alert("Geolocation service failed.");
            initialLocation = bogota;
        } else {
            alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
            initialLocation = siberia;
        }
        map.setCenter(initialLocation);
    }

    function attachSecretMessage(marker, number) {
        var message = ["This", "is", "the", "secret", "message"];
        var infowindow2 = new google.maps.InfoWindow(
                {
                    content: message[number],
                    size: new google.maps.Size(50, 50)
                });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow2.open(map, marker);
        });
    }

    function buscarDireccion(direccion, ciudad, titulo, idLat, idLon) {
        var geocoder = new google.maps.Geocoder();
        //alert(direccion + " - " +ciudad);
        geocoder.geocode({
            'address': direccion,
            'region': ciudad
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                ponerMarcador(results[0].geometry.location, titulo, idLat, idLon, true);
            } else {
                //alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function buscarDirecciones(buscar, radio) {
        var geocoder = new google.maps.Geocoder();
        var centro = map.getCenter();
        var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(centro.lat() - 0.0000001, centro.lng() + 0.0000001),
                new google.maps.LatLng(centro.lat() + 0.0000001, centro.lng() - 0.0000001)
                );
        //alert(direccion + " - " +ciudad);
        geocoder.geocode({
            'address': buscar,
            'latLng': centro
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                for (ja = 0; ja < results.length; ja++) {
                    map.setCenter(results[ja].geometry.location);
                    var markerB = new google.maps.Marker({
                        position: results[ja].geometry.location,
                        map: map,
                        title: results[ja].formatted_address
                    });

                    //ponerMarcador(results[ja].geometry.location,results[ja].formatted_address,"","",false);
                }

            } else {
                //alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }
}

var markersArray = [];
function ponerMarcadores(datos) {
    if (markersArray.length > 0) {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
        markersArray = new Array();
    }
    var auxBuscar = datos.split(":::");
    for (var j = 0; j < auxBuscar.length; j++) {
        if (auxBuscar[j].length > 3) {
            var auxProyecto = auxBuscar[j].split(";;;");
            var ubicaPro = new google.maps.LatLng(auxProyecto[0], auxProyecto[1]);
            var nuevoMark = nuevoMarcador(ubicaPro, auxProyecto[2]);
            markersArray.push(nuevoMark);
        }
    }
//attachSecretMessage(marker, 1);        
}

function nuevoMarcador(ubicaPro, titulo) {
    var nuevoMark = new google.maps.Marker({
        position: ubicaPro,
        map: map
    });

    nuevoMark.setTitle(titulo);
    google.maps.event.addListener(nuevoMark, 'click', function() {
        //var auxTitulo=titulo.split("-");
        location.href = "../presentacion/visualizacion.php?idPro=" + titulo;
    });
    //markersArray.push(nuevoMark);
    return nuevoMark;
}


function ponerMarcador(location, titulo, idLat, idLon, centrar) {
    if (yaMarcador == true) {
        marker.setMap(null);
    }
    marker = new google.maps.Marker({
        position: location,
        map: map
    });
    yaMarcador = true;

    //alert(location.lat() + " - " + location.lng());
    if (idLat != "") {
        $("#" + idLat).val(location.lat());
    }
    if (idLon != "") {
        $("#" + idLon).val(location.lng());
    }

    if (centrar == true) {
        map.setCenter(location);
    }
    marker.setTitle(titulo);
    var funcion = "nada";
    if (idLat != "") {
        $("#" + idLat).val(location.lat());
        funcion = $("#" + idLat).attr("enCambio");
    }
    if (idLon != "") {
        $("#" + idLon).val(location.lng());
        funcion = $("#" + idLon).attr("enCambio");
    }
    if ($.isFunction(window[funcion])) {
        window[funcion].apply(null, null);
    }
//attachSecretMessage(marker, 1);        
}

function seleccionarUbicacion(lat, lng, titulo, idLat, idLon, tipoClic) {
    var nuevaPos = new google.maps.LatLng(lat, lng);
    map.setCenter(nuevaPos);
    if (map.getZoom() < 9) {
        map.setZoom(12);
    }
    switch (tipoClic) {
        case "sencillo":
            ponerMarcador(nuevaPos, titulo, idLat, idLon, false);
            break;
        case "circuloDoble":
        case "circulo":
            if (yaMarcador == true) {
                marker.setMap(null);
            }
            //circulo2.setCenter(nuevaPos);
            circulo.setCenter(nuevaPos);
            break;
    }

}

function iniciarLugares(idCampo, titulo, idLat, idLon, tipoMapa) {
    var field = jQuery('#' + idCampo);
    field.locationPicker({
        select: function(e, val) {
            seleccionarUbicacion(val.data.raw.geometry.location.lat, val.data.raw.geometry.location.lng, titulo, idLat, idLon, tipoMapa);
            //showData();
        }
    });
}

function getStringUbicacion(lat, lon) {
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, lon);
    if (geocoder) {
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    alert(results[0].formatted_address);
                    console.log(results[0].formatted_address);
                } else {
                    alert("No results found");
                }
            } else {
                alert("Geocoder failed due to: " + status);
            }
        });
    }
}


//jorge

function buscarGeo(buscar) {
    var geocoder = new google.maps.Geocoder();
    var centro = map.getCenter();
    //alert(direccion + " - " +ciudad);
    geocoder.geocode({
        'address': buscar,
        'latLng': centro
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            for (ja = 0; ja < results.length; ja++) {
                map.setCenter(results[ja].geometry.location);
                map.setZoom(11);
                var markerB = new google.maps.Marker({
                    position: results[ja].geometry.location,
                    map: map,
                    title: results[ja].formatted_address
                });
                return true;
            }
        } else {
            alert("No se pudo encontrar la ciudad.");
            return false;
        }
    });
}

function setMarkerJugador(lat, lon, titulo, direc, cod, usrname, enfocar) {
    var image_jugador = new google.maps.MarkerImage(
            base_url + '/public/img/marker_person.png',
            new google.maps.Size(40, 35),
            new google.maps.Point(0, 0),
            new google.maps.Point(0, 35)
            );
    var posicion = new google.maps.LatLng(lat, lon);
    var marker_jugador = new google.maps.Marker({
        map:map,
        title: titulo,
        icon: image_jugador,
        position: posicion,
        tooltip: 'Jugador.'
    });
    var infowindow = new google.maps.InfoWindow();
    infowindow.setContent("<p><strong>Jugador:</strong> <a target='_blank' href='" + base_url + "/perfil/" + cod + "-" + usrname + "'>" + titulo + "</a><br/><br/> <strong>Dirección:</strong> " + direc + "</p><br/>");
    google.maps.event.addListener(marker_jugador, 'click', function() {
        infowindow.open(map, marker_jugador);
    });
    if (enfocar) {
        map.setZoom(14);
        map.setCenter(posicion);
    }
}

function setMarkerComplejo(lat, lon, titulo, direc, cod, enfocar) {
    var image_cancha = new google.maps.MarkerImage(
            base_url + '/public/img/marker_canchas.png',
            new google.maps.Size(40, 35),
            new google.maps.Point(0, 0),
            new google.maps.Point(0, 35)
            );
    var posicion = new google.maps.LatLng(lat, lon);
    var marker_cancha = new google.maps.Marker({
        title: titulo,
        map: map,
        icon: image_cancha,
        position: posicion,
        tooltip: 'Cancha.'
    });
    var infowindow = new google.maps.InfoWindow();
    infowindow.setContent("<p><strong>Complejo:</strong> <a target='_blank' href='" + base_url + "/complejos/disponibilidad?complejo=" + cod + "'>" + titulo + "</a><br/><br/> <strong>Dirección:</strong> " + direc + "</p><br/>");
    google.maps.event.addListener(marker_cancha, 'click', function() {
        infowindow.open(map, marker_cancha);
    });
    if (enfocar) {
        map.setZoom(14);
        map.setCenter(posicion);
    }
}
