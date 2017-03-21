$(document).ready(function() {
    var tp = new TorneoPublico();
    tp.init();
});

var TorneoPublico = function() {
    var base = this;
    this.carga_calendario = true;
    this.carga_resultado = true;
    this.contenido_calendario = "";
    this.contenido_resultado = "";

    this.init = function() {
        this.events();
        this.contenido_calendario = $("#contend-calendario").html();
        this.contenido_resultado = $("#contend-resultados").html();
    };

    this.events = function() {
        //-------------
        var pestana = base.getPestana();
        if(!pestana){
            var pestaNoFilter = base.getPestanaNoFilter();
        }
        console.log(pestaNoFilter + " -- " + pestana);
        if(pestaNoFilter == false && pestana == false || pestaNoFilter==0){
            var id_torneo = $("#_torneo").val();
            base.pes_home(id_torneo);
        }
        if(pestaNoFilter == 1){
            var id_torneo = $("#_torneo").val();
            base.pes_informacion(id_torneo);
        }
        if(pestaNoFilter == 2){
            var id_torneo = $("#_torneo").val();
            base.pes_equipos(id_torneo);
        }
        if(pestana == 3){
            base.pes_calendario();
        }
        if(pestana == 4){
            base.pes_resultados();
        }
        /*******click del menu publico****/
        $("#pes_home").on("click", function() {
            var id_torneo = $("#_torneo").val();
            base.pes_home(id_torneo);

        });
        $("#pes_informacion").on("click", function() {
            var id_torneo = $("#_torneo").val();
            base.pes_informacion(id_torneo);

            //chambonaso para que sirva el autocompletado al pasar de sección en sección
            location.reload();
        });
        $("#pes_equipos").on("click", function() {
            var id_torneo = $("#_torneo").val();
           base.pes_equipos(id_torneo);
           
           //chambonaso para que sirva el autocompletado del filtro al pasar de sección en sección
           location.reload();
        });
        $("#pes_calendario").click(function() {
           base.pes_calendario(true);
           
           //chambonaso para que sirva el autocompletado del filtro al pasar de sección en sección
           location.reload();
        });
        $("#pes_resultados").on("click", function() {
            base.pes_resultados(true);
            
            //chambonaso para que sirva el autocompletado del filtro al pasar de sección en sección
            location.reload();
        });
        $(document).on("click", ".pag_option", function() {
            base.getContendEquipos($(this).attr("index"), $("#_torneo").val(), parseInt($(".pag").attr("numpags")));
        });
        /*----- close clicks menu publico----*/

        /*click filtro en calendario*/
        $(document).on("click", '#btn-form-calendario',function(){
           base.pes_calendario(true);
        });
        $(document).on("click", '#btn-quit-form-calendario',function(){
           var id_torneo = $("#_torneo").val();
           base.quitFilterCalendar(id_torneo);
        });

        /*click filtro en resultados*/
        $(document).on("click", '#btn-form-resultados',function(){
           base.pes_resultados(true);
        });
        $(document).on("click", '#btn-quit-form-resultados',function(){
           var id_torneo = $("#_torneo").val();
           base.quitFilterResults(id_torneo);
        });


    };
 
    /*-----funciones para menu publico----*/
    this.pes_home = function(id_torneo){
        window.history.pushState('', '', id_torneo+'?pestana=0');
        $(".pesta").removeClass("active");
            $('#pes_home').addClass("active");
            $("#contend-informacion").hide();
            $("#contend-equipos").hide();
            $("#contend-calendario").html("");
            $("#contend-resultados").html("");
            $("#contend-home").show("slow");
    };
    this.pes_informacion = function(id_torneo){
        window.history.pushState('', '', id_torneo+'?pestana=1');
        $(".pesta").removeClass("active");
            $('#pes_informacion').addClass("active");
            $("#contend-equipos").hide();
            $("#contend-home").hide();
            $("#contend-calendario").html("");
            $("#contend-resultados").html("");
            $("#contend-informacion").show("slow");
    };
    this.pes_equipos = function(id_torneo){
        window.history.pushState('', '', id_torneo+'?pestana=2');
        $(".pesta").removeClass("active");
            $('#pes_equipos').addClass("active");
            $("#contend-informacion").hide();
            $("#contend-home").hide();
            $("#contend-calendario").html("");
            $("#contend-resultados").html("");
            $("#contend-equipos").show("slow");
    };
    this.pes_calendario = function(btnfiltrar){
        if(btnfiltrar){
            /*para cuando da click en filtrar*/
            var datosGet =  base.datosFiltro('pes_calendario', 3, btnfiltrar);
        }
        if(btnfiltrar !== true){
            /*para se recarga la pagina con los datos en la url*/
            var datosGet =  base.datosFiltro('pes_calendario', 3);
        }
        $(".pesta").removeClass("active");
        $('#pes_calendario').addClass("active");
        $("#contend-informacion").hide();
        $("#contend-equipos").hide();
         $("#contend-home").hide();
        $("#contend-resultados").html("");
        $("#contend-calendario").html(base.contenido_calendario);
        $("#contend-calendario").show("slow");
        base.getContendCalendario(datosGet);
    };
    this.pes_resultados = function(btnfiltrar){
        if(btnfiltrar){
            /*para cuando da click en filtrar*/
            var datosGet =  base.datosFiltro('pes_resultados', 4, btnfiltrar);
        }
        if(btnfiltrar !== true){
            /*para se recarga la pagina con los datos en la url*/
            var datosGet =  base.datosFiltro('pes_resultados', 4);
        }
        $(".pesta").removeClass("active");
        $('#pes_resultados').addClass("active");
        $("#contend-informacion").hide();
        $("#contend-equipos").hide();
        $("#contend-home").hide();
        $("#contend-calendario").html("");
        $("#contend-resultados").html(base.contenido_resultado);
        $("#contend-resultados").show("slow");

       base.getContendResultados(datosGet);
        };
    /*----close funcione menu publico---*/
    
    this.getContendEquipos = function(pag, torneo, numpags) {
        if (pag == "back") {
            var index = parseInt($(".pag_active").attr("index"));
            if (index > 1) {
                pag = (index - 1);
            }
        }
        if (pag == "next") {
            var index = parseInt($(".pag_active").attr("index"));
            if (index < numpags) {
                pag = (index + 1);
            }
        }
        if (validate.isNumeric(pag) && validate.isNumeric(torneo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/tablero/public_pag_equipos/',
                data: {
                    'pag': pag,
                    'torneo': torneo
                },
                beforeSend: function() {
                    $("#contend-equipos").html($("#_html_loader_public").val());
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            $("#contend-equipos").html(data.html);
                        } else {
                            component.messageSimple("Equipos", "Esta sección no se ha configurado por completo. Por favor inténtelo en otro momento.", "danger");
                        }
                    }
                }
            });
        }
    };

    this.getContendCalendario = function(obj) {
        var strGet = base.estructuraGet(obj, 3);
        window.history.pushState('', '', strGet);
        $.ajax({
            type: 'GET',
            data: obj,
            url: base_url + '/torneos/calendario/calendario_public',
            success: function(data) {
                if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                    if (data.status) {
                        $("#contend-calendario").html(data.html);
                        base.contenido_calendario = data.html;
                        base.carga_calendario = false;
                        init_calendario_public();

                        //valida si hay fases, si no pues muestra el mensajito
                        var htmlFases = $('#contend-calendario .acor').html();
                        if(htmlFases != null){
                            var faseLength = $('#contend-calendario .acor').length;
                            if(faseLength === 0){
                                component.messageSimple("Mensaje", 'No hay resultados según el filtro.', 'info');
                            }
                        }
                            // aqui borro los botones de tabla posiciones de calendario
                            $('#contend-calendario .btn_result_parcial_calendar').remove();
                    } else {
                        component.messageSimple("Calendario", "Esta sección no se ha configurado por completo. Por favor inténtelo en otro momento.", "danger");
                    }
                }
            }
        });
    };
    this.getContendResultados = function(obj) {
        var strGet = base.estructuraGet(obj, 4);
        window.history.pushState('', '', strGet);
        $.ajax({
            type: 'GET',
            data: obj,
            url: base_url + '/torneos/clasificacion/resultados_public',
            success: function(data) {
                if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                    if (data.status) {
                        $("#contend-resultados").html(data.html);
                        base.contenido_resultado = data.html;
                        base.carga_resultado = false;

                        var pep = new PersonalizadoPublic();
                        pep.init();
                        //valida si hay fases, si no pues muestra el mensajito
                        var htmlFases = $('#contend-resultados .fase-resultados').html();
                        if(htmlFases != null){
                            var faseLength = $('#contend-resultados .fase-resultados').length;
                            if(faseLength === 0){
                                component.messageSimple("Mensaje", 'No hay resultados según el filtro.', 'info');
                            }
                        }
                            // aqui borro los botones de proxima fecha de resultados
                            $('#contend-resultados .btn_result_proxima_fecha').remove();
                    } else {
                        component.messageSimple("Calendario", "Esta sección no se ha configurado por completo. Por favor inténtelo en otro momento.", "danger");
                    }
                }
            }
        });
    };
    /*funciones para funciones, oooooh bueno*/

    this.datosFiltro = function(type, pestana, btnfiltrar){
       //parametros
       /*
       **type = es para validar en que nombre de pestaña está
       **pestana = es el numero de la pestana
       **btnfiltrar = se envia true para cuando le da click en filtrar
       **btnquitfilter = para que devuelva el objeto vacío y se traiga los datos sin ningun criterio
       */
       if(type == 'pes_calendario' || type == 'pes_resultados'){
        var torn = $('#'+type).attr("torneo");
    }else{
        var torn = $('[name="torn"]').val();
    }
    if(btnfiltrar){
        var fase = $('[name="fase"]').val();
        var grupo = $('[name="grupo"]').val();
        var jornada = $('[name="jornada"]').val();
        var fechaA = $('[name="fechaA"]').val();
        var fechaB = $('[name="fechaB"]').val();
        var strfilter = $('#autocomplete-filter').val(); 
        var typefilter = $('[name="typefilter"]').val();
        var obj = {'torn':torn,'fase':fase,'grupo':grupo,'jornada':jornada, 'fechaA':fechaA,'fechaB':fechaB, 'strfilter':strfilter, 'typefilter':typefilter, 'pestana':pestana};
        return obj;
    }else{
        var fase = $('[name="fase"]').val();
        var grupo = $('[name="grupo"]').val();
        var jornada = $('[name="jornada"]').val();
        var fechaA = $('[name="fechaA"]').val();
        var fechaB = $('[name="fechaB"]').val();
        var strfilter = $('#autocomplete-filter').val(); 
        var typefilter = $('[name="typefilter"]').val();

        /*estructre = es la forma como debe de estar el objeto en la url*/
        var estructure = {'torn':'','fase':'','grupo':'','jornada':'', 'fechaA':'','fechaB':'', 'strfilter':'', 'typefilter':'', 'pestana':''};
        /*obj = son los datos que coge del formulario del filtro al dar click en filtrar*/
        var obj = {'torn':torn,'fase':fase,'grupo':grupo,'jornada':jornada, 'fechaA':fechaA,'fechaB':fechaB, 'strfilter':strfilter, 'typefilter':typefilter, 'pestana':pestana};
        /*objUrl = son los datos qque coge del la url*/
        var objUrl = base.getUrlVars();
            /*Es necesario que se envie un objeto de valores vacios como 'estructure', que es la estructura que debe tener, 
            **para mezclar 'obj', con 'objUrl', creando el objeto maestro, Buajajajaja
            **el objeto con nuevos valores
            */
            var objetoMesclado = base.mergeObjects(estructure, obj, objUrl);
            return objetoMesclado;
        }
    };

    this.estructuraGet = function(obj, pestana){
        var arrayTitulos = new Array();
        var arrayValores = new Array();
        $.each(obj, function(i,n) {
            arrayTitulos.push(i);
            arrayValores.push(n);
        });
        var stringGet = "";
        for(var i = 0; i<arrayTitulos.length; i++){
            if(i==0){
                stringGet += '?'+arrayTitulos[i]+'='+arrayValores[i]; 
            }else{
                if(arrayTitulos[i] == 'pestana'){
                    stringGet += '&'+arrayTitulos[i]+'='+pestana;
                }else{
                   stringGet += '&'+arrayTitulos[i]+'='+arrayValores[i]; 
                }
            }
        }
        var datosGet = stringGet.replace(/undefined/g,'');
        return datosGet;
    };

    /*esta sirve para saber en que pestaña hay que estár, para activar el menu en las secciones con flitro*/
    this.getPestana = function(){
        var href = window.location.href;
        var arrayHref= href.split('publico_temp/');
        /*validacion para cuando está viendo el torneo publico*/
        if(validate.isNumeric(arrayHref[1])){
            return false;
        }else{
            var arrayHref2= href.split('publico/');
            /*validacion para vcando está viendo el torneo publico desde el menu de torneos*/
            if(validate.isNumeric(arrayHref2[1])){
                return false;
            }else{
                var arrayHref5= href.split('?pestana=');
                if(arrayHref5.length == 2){
                    return false;
                }
                var arrayHref4= href.split('&');
                var getPestana = arrayHref4[8].split('=');
                var pestana = getPestana[1]; 
            }
        }
        return pestana;
    };

 /*esta sirve para saber en que pestaña hay que estár, para activar el menu en las secciones sin flitro*/
    this.getPestanaNoFilter = function(){
        var href = window.location.href;
        var arrayHref= href.split('publico_temp/');
        /*validacion para cuando está viendo el torneo publico*/
        if(validate.isNumeric(arrayHref[1])){
            return false;
        }else{
            var arrayHref2= href.split('publico/');
            /*validacion para vcando está viendo el torneo publico desde el menu de torneos*/
            if(validate.isNumeric(arrayHref2[1])){
                return false;
            }else{
                var arrayHref4= href.split('?pestana=');
                var pestana = arrayHref4[1]; 
            }
        }
        return pestana;
    };

    this.GetURLParameter = function(sParam){
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++){
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam){
                return sParameterName[1];
            }
        }
    };

    this.getUrlVars = function() {
    //esto devuelve el objeto de los valores que hay en la url
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    };

    this.quitFilterCalendar = function(id_torneo){
        var datosGet = {'torn':id_torneo,'fase':'','grupo':'','jornada':'', 'fechaA':'','fechaB':'', 'strfilter':'', 'typefilter':'', 'pestana':''}; 
        base.getContendCalendario(datosGet);
    };

    this.quitFilterResults = function(id_torneo){
        var datosGet = {'torn':id_torneo,'fase':'','grupo':'','jornada':'', 'fechaA':'','fechaB':'', 'strfilter':'', 'typefilter':'', 'pestana':''}; 
        base.getContendResultados(datosGet);
    };


    this.mergeObjects = function() {
        var obj = {}, key, i = 0;
        for (i = 0; i < arguments.length; i++) {
            for (key in arguments[i]) {
                if (arguments[i].hasOwnProperty(key)) {
                    obj[key] = arguments[i][key];
                }
            }
        }
        return obj;
    };

 // this.valoresGet = function(){
 //        //esto devuelve el arreglo de los valores que hay en la url
 //        var get = [];
 //        location.search.replace('?', '').split('&').forEach(function (val) {
 //            split = val.split("=", 2);
 //            get[split[0]] = split[1];
 //        });
 //        return get;
 //    };
};

var FiltersTorneo = function() {
    var _this = this;
    _this.class_filter = ".form-filter";
    function main() {
        _this.loadAutoCompleteFilter();
        _this.loadFechasFilter();
        _this.events();
    }

    _this.events = function() {
        $(_this.class_filter + " #typefilter").change(function() {
            _this.desbloqueaAutocomplete();
        });
        $(_this.class_filter + " #autocomplete-filter").keyup(function() {
            $(_this.class_filter + " #hid-strfilter").val($(this).val());
        });
    };

    _this.loadAutoCompleteFilter = function() {
        var lbl = null;
        $("#autocomplete-filter").autocomplete({
            source: function(request, response) {
                var typefilter = $(_this.class_filter + " #typefilter").val();
                var torn = $(_this.class_filter + " #torn").val();
                if (validate.isNumeric(typefilter)) {
                    $.ajax({
                        url: base_url + "/torneos/filters/autocomplete/",
                        dataType: "json",
                        data: {
                            term: request.term,
                            typefilter: typefilter,
                            torn: torn
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            delay: 400,
            minLength: 2,
            select: function(event, ui) {
                lbl = ui.item.label;
                $(this).val(lbl);
                $(_this.class_filter + " #hid-strfilter").val(lbl);
                _this.bloqueAutocomplete();
            },
            close: function(event, ui) {
                $(this).val(lbl);
                $(_this.class_filter + " #hid-strfilter").val(lbl);
            }
        });
        //--
        $(_this.class_filter + " #remove-autocomplete-filter").click(function() {
            _this.desbloqueaAutocomplete();
        });
    };

    _this.bloqueAutocomplete = function() {
        $("#autocomplete-filter").attr('disabled', 'disabled');
    };

    _this.desbloqueaAutocomplete = function() {
        $("#autocomplete-filter").val("");
        $(_this.class_filter + " #hid-strfilter").val("");
        $("#autocomplete-filter").removeAttr('disabled');
    };

    _this.loadFechasFilter = function() {
        $('.fechas_filter').datetimepicker({
            language: 'es',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    };

    main();
};
