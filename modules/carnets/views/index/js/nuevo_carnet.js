//*****************nuevo carnet******************
var carnet = null;

$(document).ready(function() {
    var n = new NuevoCarnet();
    n.init();
});

var NuevoCarnet = function() {

    this.init = function() {
        carnet = new CarnetJS();
        carnet.init();
    };

};

var CarnetJS = function() {
    var base = this;

    this.aux_html_items = "";
    this.renderhtml = '';

    this.plantilla = {
        "torneo": "",
        "nombre": "",
        "id": "",
        "index": 0,
        "cod": "",
        "borderadius": 0.2116666666667,
        "bordegrosor": 0.02645833333333,
        "bordecolor": "#000000",
        "fondocara1": "",
        "fondocara2": "",
        "min_ancho_item": 89,
        "grids_default": 3,
        "ancho": 0,
        "alto": 0,
        "caras": 1,
        "orientacion": 1,
        "padding": 0.1,
        "fontsize": 15,
        "separacionitems": 0.1,
        "altoitems": 0.65,
        "padding_contenido": 0.1,
        "franjaancho": 0.8,
        "franjacolor": "#29624E",
        "fotoalto": 3.5,
        "fotoancho": 2.5,
        "islogo": false,
        "logoancho": 2.64,
        "logoalto": 0.74,
        "logofilename": "",
        "logoname": "",
        "colorfondo": "#FFFFFF",
        "data": null,
        "cods": null
    };

    this.formatdata = function() {
        this.htmlitems = "";
        this.sizeitem = 0;
        this.gridlibres = 0;
        this.idcontend = "";
        this.coditem = new Array();
        this.haveseparator = "0";
        this.save = false;
    };

    this.init = function() {
        this.events();
        if (this.validateTemplate("#plantilla_0")) {
            this.readTemplate("#plantilla_0");
            this.aux_html_items = $("#contend_items").html();
            this.construcTemplate();
        }
    };

    this.events = function() {
        //-----------------------------
        $("#btn_save_format").on('click', function() {
            base.reloadSave();
//            console.log(base.plantilla);
            base.saveFormat();
        });
        //-----------------------------
        $("#btn_clear_all").on('click', function() {
            base.clearAll();
        });
        //-----------------------------
        $("#btn_clear_separators").on('click', function() {
            base.clearSeparators();
        });
        //-----------------------------
        $("#btn_agregar_logo").on('click', function() {
            component.popupHtml("Cargar logo", "popup_agregar_logo_body", "popup_agregar_logo_footer");
        });
        //-----------------------------
        $(document).on('click', '#btn_subir_logo', function() {
            if (base.validateSubeLogo("file_logo")) {
                $("#form_agregar_logo").submit();
            }
        });

    };

    this.readTemplate = function(idplantilla) {
        this.plantilla.id = idplantilla;
        this.plantilla.torneo = $(idplantilla).attr("torneo");
        this.plantilla.nombre = $(idplantilla).attr("nombre");
        this.plantilla.index = parseInt($(idplantilla).attr("index"));
        this.plantilla.cod = $(idplantilla).attr("cod");
        this.plantilla.ancho = parseFloat($(idplantilla).attr("ancho"));
        this.plantilla.alto = parseFloat($(idplantilla).attr("alto"));
        this.plantilla.caras = parseInt($(idplantilla).attr("caras"));
        this.plantilla.orientacion = $(idplantilla).attr("orientacion");
        this.plantilla.padding = parseFloat($(idplantilla).attr("padding"));
        if ($(idplantilla).attr("islogo") == "true") {
            this.plantilla.islogo = true;
            if (!validate.isEmpty($(idplantilla).attr("logofilename"))) {
                this.plantilla.logofilename = $(idplantilla).attr("logofilename");
                this.plantilla.logoname = $(idplantilla).attr("logoname");
            }
        }
        if (validate.isEmpty($(idplantilla).attr("data"))) {
            this.plantilla.data = null;
        } else {
            this.plantilla.data = JSON.parse(decodeURIComponent($(idplantilla).attr("data")));
        }
        if (validate.isEmpty($(idplantilla).attr("cods"))) {
            this.plantilla.cods = null;
        } else {
            this.plantilla.cods = JSON.parse(decodeURIComponent($(idplantilla).attr("cods")));
        }
        if (validate.isNumeric($(idplantilla).attr("fontsize"))) {
            this.plantilla.fontsize = parseInt($(idplantilla).attr("fontsize"));
        }
    };

    this.construcTemplate = function(readformat) {
        if (readformat == undefined) {
            readformat = true;
        }
        console.log("readformat: " + readformat);
        $.ajax({
            type: 'POST',
            url: base_url + '/carnets/index/getrenderplantilla/',
            data: {
                'auxdata': encodeURIComponent(JSON.stringify(base.plantilla))
            },
            beforeSend: function() {
                component.popupLoader("Guardar plantila carnet", "Espere un momento mientras se carga la plantilla de este carnet...");
            },
            success: function(data) {
                component.popupHtmlHide();
                if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                    if (data.status) {
                        $(base.plantilla.id).html(data.html);
                        $('.item_in').tooltip();
                        if (validate.isEmpty(base.plantilla.data)) {
                            base.construcFormatSave(parseInt(data.numitems));
                        } else {
                            if (readformat) {
                                base.readFormatSave();
                                base.removeItemsExist();
                            }
                        }
                    }
                }
            }
        });
    };

    this.convertirAPixeles = function(centimentros) {
        //1 cm = 37.79527559055 px
        if (validate.isNumeric(centimentros) || validate.isDecimal(centimentros)) {
            return centimentros * 37.79527559055;
        }
        return 0;
    };

    this.convertirACentimentros = function(pixeles) {
        //1 px = 0.02645833333333 cm
        if (validate.isNumeric(pixeles) || validate.isDecimal(pixeles)) {
            return pixeles * 0.02645833333333;
        }
        return 0;
    };

    this.dragover = function(event) {
        event.preventDefault();
        $("#" + event.target.id).addClass("item_in_hover");
    };

    this.dragleave = function(event) {
        $("#" + event.target.id).removeClass("item_in_hover");
    };

    this.dragstart = function(event) {
        event.dataTransfer.setData("Text", event.target.id);
    };

    this.dragend = function(event) {
//        console.log("dragend: ", event.target.id);
    };

    this.drop = function(event) {
        event.preventDefault();
        var id_drag_element = event.dataTransfer.getData("Text");
        var contend = $("#" + event.target.id);
        contend.removeClass("item_in_hover");
        if (id_drag_element == "separator") {
            this.addSeparator(event.target.id);
            return true;
        }
        var drag_element = $("#" + id_drag_element);
        var auxcontend = drag_element.attr("auxcontend");
        var sizegrid = parseInt(drag_element.attr("sizegrid"));
        if (!validate.isEmpty(auxcontend)) {
            if (event.target.id == "removed") {
                this.removeElement(id_drag_element, drag_element);
                this.comprobarCambiosContend(auxcontend, sizegrid);
            } else {
                this.comprobarCambiosContend(auxcontend, sizegrid);
            }
        }
        var ocupado = contend.attr("ocupado");
        if (ocupado == "1") {
            var gridmax = parseInt(contend.attr("gridmax"));
            var gridlibres = parseInt(contend.attr("gridlibres"));
            var ancho = parseFloat(contend.attr("ancho"));
            if (gridlibres > 0) {
                var new_grid_ancho = this.getGridDivision(sizegrid, gridmax, gridlibres, ancho);
                if (new_grid_ancho > 0) {
                    this.removedTextSizeItemIn(event.target.id);
                    drag_element.css({"width": new_grid_ancho + "cm", "height": this.plantilla.altoitems + "cm", "text-overflow": "ellipsis", "white-space": "nowrap", "overflow": "hidden"});
                    contend.attr("gridlibres", (gridlibres - sizegrid));
                    event.target.appendChild(document.getElementById(id_drag_element));
                    this.readCods();
                    this.saveItemFormat(event.target.id, gridmax);
                    drag_element.attr("auxcontend", event.target.id);
                    return true;
                }
            }
        }
        return false;
    };

    this.reloadSave = function() {
        $(this.plantilla.id + " .item_in").each(function() {
            //console.log($(this).attr("id"));
            base.saveItemFormat($(this).attr("id"), parseInt($(this).attr("gridmax")));
        });
    };

    this.saveItemFormat = function(idcontend, gridmax) {
        var contend = $("#" + idcontend);
        var index = parseInt(contend.attr("index"));
        base.plantilla.data[index].coditem = [];
        var gridlibres = gridmax;
        $("#" + idcontend + " .item").each(function() {
            base.plantilla.data[index].coditem.push($(this).attr("cod"));
            gridlibres = (gridlibres - parseInt($(this).attr("sizegrid")));
        });
        this.plantilla.data[index].sizeitem = gridmax;
        this.plantilla.data[index].htmlitems = contend.html();
        this.plantilla.data[index].gridlibres = gridlibres;
        this.plantilla.data[index].idcontend = idcontend;
        this.plantilla.data[index].haveseparator = contend.attr("haveseparator");
        this.plantilla.data[index].save = true;
    };

    this.comprobarCambiosContend = function(idcontend, sizegrid) {
        var contendaux = $("#" + idcontend);
        var gridlibres = parseInt(contendaux.attr("gridlibres"));
        var gridmax = parseInt(contendaux.attr("gridmax"));
        if (gridlibres != gridmax) {
            gridlibres = (gridlibres + sizegrid);
            contendaux.attr("gridlibres", gridlibres);
            if (gridlibres == gridmax) {
                contendaux.append(this.getHtmlNumberSizeItem(gridmax));
                this.plantilla.data[parseInt(contendaux.attr("index"))] = new this.formatdata();
            }
        }
    };

    this.readCods = function() {
        this.plantilla.cods = new Array();
        $(".item_in .item").each(function() {
            base.plantilla.cods.push($(this).attr("cod"));
        });
    };

    this.removedTextSizeItemIn = function(idcontend) {
        $("#" + idcontend + " .text_size_item_in").remove();
    };

    this.removeItemsExist = function() {
        if (this.plantilla.cods.length > 0) {
            for (var a = 0; a < this.plantilla.cods.length; a++) {
                $('#contend_items .item[cod="' + this.plantilla.cods[a] + '"]').remove();
            }
        }
    };

    this.construcFormatSave = function(numconstruc) {
        this.plantilla.data = new Array();
        for (var a = 0; a < numconstruc; a++) {
            this.plantilla.data[a] = new this.formatdata();
        }
    };

    this.readFormatSave = function() {
        if (this.plantilla.data.length > 0) {
            var contendaux = null;
            for (var a = 0; a < this.plantilla.data.length; a++) {
                contendaux = $("#item_contend_" + a);
                if (this.plantilla.data[a].save) {
                    if (parseInt(contendaux.attr("gridmax")) == this.plantilla.data[a].sizeitem) {
                        contendaux.html(this.plantilla.data[a].htmlitems);
                        for (var b = 0; b < this.plantilla.data[a].coditem.length; b++) {
                            $('.item[cod="' + this.plantilla.data[a].coditem[b] + '"]').attr("auxcontend", this.plantilla.data[a].idcontend);
                        }
                        contendaux.attr("gridlibres", this.plantilla.data[a].gridlibres);
                    }
                }
                if (this.plantilla.data[a].haveseparator == "1") {
                    contendaux.addClass("add_separator");
                    contendaux.attr("haveseparator", "1");
                }
            }
        }
    };

    this.saveFormat = function() {
//        console.log(base.plantilla);
        $.ajax({
            type: 'POST',
            url: base_url + '/carnets/index/saveformatcarnet/',
            data: {
                'auxdata': encodeURIComponent(JSON.stringify(base.plantilla)),
                'data': encodeURIComponent(JSON.stringify(base.plantilla.data)),
                'cods': encodeURIComponent(JSON.stringify(base.plantilla.cods))
            },
            beforeSend: function() {
                component.popupLoader("Guardar plantila carnet", "Espere un momento mientras se guarda la plantilla de este carnet...");
            },
            success: function(data) {
                component.popupHtmlHide();
                if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                    if (data.status) {
                        component.messageSimple("Configuración", data.message);
                        component.reload();
                        return true;
                    } else {
                        component.messageSimple("Configuración", data.message, "danger");
                        return false;
                    }
                }
                component.messageSimple("Configuración", "Hubo un error al guardar la plantilla de este carnet. Por favor inténtelo de nuevo.", "danger");
                return false;
            }
        });
    };

    this.getHtmlNumberSizeItem = function(sizeitem) {
        return '<span class="text_size_item_in">' + sizeitem + '</span>';
    };

    this.addSeparator = function(idcontend) {
        var contendaux = $("#" + idcontend);
        if (contendaux.attr("separator") == "true") {
            var index = parseInt(contendaux.attr("index"));
            contendaux.attr("haveseparator", 1);
            this.plantilla.data[index].haveseparator = "1";
            contendaux.addClass("add_separator");
        }
    };



    this.removeElement = function(idelement, drag_element) {
        document.getElementById("contend_items").appendChild(document.getElementById(idelement));
        drag_element.attr("auxcontend", "");
        drag_element.removeAttr("style");
        this.readCods();
    };

    this.clearSeparators = function() {
        $(".add_separator").each(function() {
            var index = parseInt($(this).attr("index"));
            $(this).attr("haveseparator", 0);
            base.plantilla.data[index].haveseparator = "0";
            $(this).removeClass("add_separator");
        });
    };

    this.clearAll = function() {
        this.construcTemplate(false);
        $("#contend_items").html(this.aux_html_items);
    };

    this.getGridDivision = function(sizegrid, gridmax, gridlibres, ancho) {
        if ((sizegrid > gridmax) || (gridlibres <= 0)) {
            return 0;
        }
        switch (gridmax) {
            case 2:
                if ((sizegrid == gridmax) && (gridlibres == gridmax)) {
                    return ancho;
                } else if ((sizegrid < gridmax) && (gridlibres > 0)) {
                    return (ancho / gridmax);
                }
                break;
            case 3:
                if ((sizegrid == gridmax) && (gridlibres == gridmax)) {
                    return ancho;
                } else if ((sizegrid == 1) && (gridlibres >= 1)) {
                    return (ancho / gridmax);
                } else if ((sizegrid == 2) && (gridlibres >= 2)) {
                    return ((ancho / gridmax) * 2);
                }
                break;
        }
        return 0;
    };

    this.validateTemplate = function(idplantilla) {
        if (validate.isEmpty($(idplantilla).attr("torneo")) || !validate.isNumeric($(idplantilla).attr("torneo"))) {
            alert("Los parámetros del torneo no cargaron correctamente, falta el parametro torneo.");
            return false;
        }

        if (validate.isEmpty($(idplantilla).attr("nombre"))) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro nombre.");
            return false;
        }

        var index = parseInt($(idplantilla).attr("index"));
        if (!validate.isNumeric($(idplantilla).attr("index")) || (index != 0)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro index y debe ser entero positivo mayor o igual a 0.");
            return false;
        }

        var max_ancho = 12;
        var min_ancho = 8.5;
        var ancho = parseFloat($(idplantilla).attr("ancho"));
        if (!validate.isNumeric($(idplantilla).attr("ancho")) || !validate.isDecimal(ancho) && (ancho > max_ancho) && (ancho < min_ancho)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro ancho en cm, debe ser entero o decimal positivo mayor o igual a " + min_ancho + " y menor o igual a " + max_ancho + ".");
            return false;
        }

        var max_alto = 8;
        var min_alto = 5.4;
        var alto = parseFloat($(idplantilla).attr("alto"));
        if (!validate.isNumeric($(idplantilla).attr("alto")) || !validate.isDecimal(alto) || (alto > max_alto) || (alto < min_alto)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro alto en cm, debe ser entero o decimal positivo mayor o igual a " + min_alto + " y menor o igual a " + max_alto + ".");
            return false;
        }

        if (!validate.isNumeric($(idplantilla).attr("caras"))) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro caras, el carnet puede tener 1 o 2 caras.");
            return false;
        }
        var caras = parseInt($(idplantilla).attr("caras"));
        if (!validate.isInteger(caras)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro caras, el carnet puede tener 1 o 2 caras.");
            return false;
        }
        if ((caras == 1) || (caras == 2)) {
            caras = null;
        } else {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro caras, el carnet puede tener 1 o 2 caras.");
            return false;
        }

        var orientacion = $(idplantilla).attr("orientacion");
        if (validate.isEmpty(orientacion)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro orientacion, debe ser la letra 'v'=vertical o 'h'=horizontal.");
            return false;
        }
        if ((orientacion == "v") || (orientacion == "h")) {
            orientacion = null;
        } else {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro orientacion, debe ser la letra 'v'=vertical o 'h'=horizontal.");
            return false;
        }

        var padding = parseFloat($(idplantilla).attr("padding"));
        if (!validate.isNumeric($(idplantilla).attr("padding")) || !validate.isDecimal(padding) || (padding < 0) || (padding > 0.5)) {
            alert("Los parámetros de la plantilla no se cargaron correctamente, falta el parametro padding, este se debe ingresar de 0 a 0.5.");
            return false;
        }

        if (!validate.isEmpty($(idplantilla).attr("fontsize"))) {
            var min_fontsize = 10;
            var max_fontsize = 15;
            if (!validate.isNumeric($(idplantilla).attr("fontsize"))) {
                alert("Los parámetros de la plantilla no se cargaron correctamente, el parametro fontsize se debe ingresar entre " + min_fontsize + " y " + max_fontsize + ".");
                return false;
            }
            var fontsize = parseFloat($(idplantilla).attr("fontsize"));
            if (!validate.isDecimal(fontsize) || (fontsize < min_fontsize) || (fontsize > max_fontsize)) {
                alert("Los parámetros de la plantilla no se cargaron correctamente, el parametro fontsize se debe ingresar entre " + min_fontsize + " y " + max_fontsize + ".");
                return false;
            }
        }
        return true;
    };


    this.validateSubeLogo = function(idelement) {
        var idmsgalert = "msg_logo";
        var element = $("#" + idelement);
        if (validate.isEmpty($("#txt_name_logo").val())) {
            component.alertComponent("Por favor ingrese el nombre del logotipo.", idmsgalert, "danger");
            return false;
        }
        if (validate.isEmpty(element.val())) {
            component.alertComponent("Por favor seleccione una imagen en formato jpg o png.", idmsgalert, "danger");
            return false;
        }
        var file = element[0].files[0];
        if (!validate.validateExtencionesImg(file.name)) {
            component.alertComponent("Por favor seleccione una imagen en formato jpg o png.", idmsgalert, "danger");
            return false;
        }
//        var maxancho = 380;
//        var maxalto = 95;
////        var ancho = parseInt($(idelement).width());
////        var alto = parseInt($(idelement).height());
//
//        var img = document.getElementById(idelement);
//        var ancho = img.clientWidth;
//        var alto = img.clientHeight;
//
//        console.log(ancho, alto);
//        return false;
//        if ((ancho > maxancho) || (alto > maxalto)) {
//            component.alertComponent("Esta imagen no cumple con las dimensiones permitidas, por favor suba una acorde a las dimensiones nombradas anteriormente.", idmsgalert, "danger");
//            return false;
//        }
        return true;
    };


};


