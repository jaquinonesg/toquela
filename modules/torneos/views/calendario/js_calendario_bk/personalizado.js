// //****************************
// $(document).ready(function() {
//     var pe = new Personalizado();
//     pe.init();
// });

// var Personalizado = function() {
//     var base = this;
//     this.num_equipos = 0;
//     this.isgrupos = true;
//     this.numfases = 0;
//     this.arr_config_grupos = new Array();
//     this.is_generate_grupos = false;
//     this.torneo = "";
//     this.numfase = 0;
//     this.validagrupos = null;

//     var format_grupos = {
//         "grupo": 0,
//         "equipos": 0
//     };

//     this.init = function() {
//         this.readvars();
//         this.events();
//         this.validagrupos.init();
//     };

//     this.readvars = function() {
//         this.num_equipos = parseInt($("#num_participantes").val());
//         this.torneo = $("#_torneo").val();
//         this.numfase = parseInt($("#_fase").val());
//         this.validagrupos = new ValidateGrupos();
//     };

//     this.events = function() {
//         $("#btn_crear_fase").on('click', function() {
//             base.is_generate_grupos = false;
//             component.popupHtml("Crear fase", "popup_crear_fase_body", "popup_crear_fase_footer", true);
//             base.eventsCrearFase();
//         });

//         $(".btn_config_fase").on('click', function() {
//                 var pasa = base.getConfigFase($(this).attr("torneo"), $(this).attr("fase"));
//         });

//         //  lógica para flecha en accordion de grupos
//         $('.grupo-menu').click(function() {
//             var clase = $(this).attr('class');
//              if (clase == "accordion-toggle grupo-menu tmp-grupo-menu" || clase == "accordion-toggle grupo-menu tmp-grupo-menu collapsed") {
//                 var id = $(this).attr('href');
//                 $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-down');
//                 $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-up');
//                 // $('[href="'+id+'"]').removeClass('');
//                 $($('[href="' + id + '"]')).addClass('tmp');
//             } else {
//                 if (clase == 'accordion-toggle grupo-menu tmp-grupo-menu collapsed' || clase == "accordion-toggle grupo-menu tmp-grupo-menu tmp") {
//                     var id = $(this).attr('href');
//                     $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-up');
//                     $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-down');
//                 } else {
//                     var id = $(this).attr('href');
//                     $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-down');
//                     $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-up');
//                 }
//             }
//         });
//         //-----------------------------
//         $(document).on('click', '.btn_eliminar_fase', function() {
//             var torneo = $(this).attr("torneo");
//             var fase = $(this).attr("fase");
//             if (validate.isNumeric(torneo) && validate.isNumeric(fase)) {
//                 var func = function() {
//                     $.ajax({
//                         type: 'POST',
//                         url: base_url + '/torneos/calendario/eliminar_fase/',
//                         data: {
//                             'torneo': torneo,
//                             'fase': fase
//                         },
//                         beforeSend: function() {
//                             component.popupLoader("Configuración", "Espere un momento mientras se elimina la fase...");
//                         },
//                         success: function(data) {
//                             component.popupHtmlHide();
//                             if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                                 if (data.status) {
//                                     component.messageSimple("Configuración", data.message);
//                                     component.reload();
//                                 } else {
//                                     component.messageSimple("Configuración", data.message, "danger");
//                                 }
//                             }
//                         }
//                     });
//                 };
//                 component.messageAcept("Eliminar fase " + fase, "¿Está seguro de eliminar esta fase? Tenga en cuenta que no podrá recuperar esta información.", func, "danger");

//             } else {
//                 component.messageSimple("Configuración", "No se puede realizar la acción", "danger");
//             }
//         });
//         //-----------------------------
//         $(document).on('click', '.btn_actualizar_fase', function() {
//             base.validaUpdateFase($(this).attr("torneo"), $(this).attr("fase"), $(this).attr("tipo"));
//         });

//     };

//     this.getConfigFase = function(torneo, fase) {
//         if (validate.isNumeric(torneo) && validate.isNumeric(fase)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/get_config_fase/',
//                 data: {
//                     'torneo': torneo,
//                     'fase': fase
//                 },
//                 beforeSend: function() {
//                     if(validate.isEmpty($("#contend_fase_" + fase).html())){
//                         component.popupLoader("Configuración", "Espere un momento...");
//                     }
//                 },
//                 success: function(data) {
//                     component.popupHtmlHide();
//                     if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                         if (data.status) {
//                             if(validate.isEmpty($("#contend_fase_" + fase).html())){
//                                 $("#contend_fase_" + fase).html(data.html);
//                                 base.validagrupos.events();
//                             }
//                         } else {
//                             component.messageSimple("Configuración", data.message, "danger");
//                         }
//                     }
//                 }
//             });
//         }
//     };

//     this.validaUpdateFase = function(torneo, fase, tipo) {
//         if (validate.isNumeric(torneo) && validate.isNumeric(fase) && validate.isNumeric(tipo)) {
//             switch (tipo) {
//                 case "1":
//                     var aux_partido = "";
//                     var arr_partidos = new Array();
//                     var team1 = "";
//                     var team2 = "";
//                     $(".round tr td select[fase='" + fase + "'][change='true']").each(function() {
//                         if ($(this).attr("partido") == aux_partido) {
//                             team2 = $(this).val();
//                             var obj = {
//                                 'cod_match': $(this).attr("partido"),
//                                 'team_local': team1,
//                                 'team_visitant': team2
//                             };
//                             arr_partidos.push(obj);
//                         } else {
//                             team1 = $(this).val();
//                             aux_partido = $(this).attr("partido");
//                         }
//                     });
//                     this.updateFase(arr_partidos);
//                     break;
//                 case "2":
//                     var aux_partido = "";
//                     var arr_partidos = new Array();
//                     var team1 = "";
//                     var team2 = "";
//                     $(".eliminatoria select[fase='" + fase + "'][change='true']").each(function() {
//                         if ($(this).attr("partido") == aux_partido) {
//                             team2 = $(this).val();
//                             var obj = {
//                                 'cod_match': $(this).attr("partido"),
//                                 'team_local': team1,
//                                 'team_visitant': team2
//                             };
//                             arr_partidos.push(obj);
//                         } else {
//                             team1 = $(this).val();
//                             aux_partido = $(this).attr("partido");
//                         }
//                     });
//                     this.updateFase(arr_partidos);
//                     break;
//                 default:
//                     component.messageSimple("Configuración", "Surgió un error, el tipo de fase no está dentro de la configuración, por favor recargue la página.", "danger");
//                     break;
//             }
//         }
//     };

//     this.updateFase = function(arr_partidos) {
//         if (arr_partidos.length > 0) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/update_arr_matches/',
//                 data: {
//                     'arr': arr_partidos
//                 },
//                 beforeSend: function() {
//                     component.popupLoader("Configuración", "Espere un momento...");
//                 },
//                 success: function(data) {
//                     component.popupHtmlHide();
//                     if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                         if (data.status) {
//                             component.messageSimple("Configuración", data.message);
//                             component.reload();
//                         } else {
//                             component.messageSimple("Configuración", data.message, "danger");
//                         }
//                     }
//                 }
//             });
//         }
//     };

//     this.eventsCrearFase = function() {
//         $("#btn_save_fase").on('click', function() {
//             if (base.isgrupos) {
//                 base.saveFaseGrupos($("._idavuelta:checked").val());
//             } else {
//                 var objaux = {
//                     "size": $("#select_rango_eliminacion").val()
//                 };
//                 base.saveFaseEliminacion(objaux);
//             }
//             return false;
//         });
//         //--------------------
//         $("#btn_por_grupos").on('click', function() {
//             base.isgrupos = true;
//             $("#contend_por_grupos").show();
//             $("#contend_por_eliminacion").hide();

//         });
//         //--------------------
//         $("#btn_por_eliminacion").on('click', function() {
//             base.isgrupos = false;
//             $("#contend_por_grupos").hide();
//             if (base.validaEliminacion()) {
//                 $("#contend_por_eliminacion").show();
//                 $("#contend_rango_select").html(base.maquetaSelectEliminacion(base.rangoEliminacion(base.num_equipos)));
//             }
//         });
//         //--------------------
//         $("#btn_generar_por_grupos").on('click', function() {
//             $("#config_por_grupos").html("");
//             if (base.validaGrupos()) {
//                 base.is_generate_grupos = true;
//                 var html = base.maquetaConfigGrupos(base.generateGrupos(parseInt($("#num_grupos").val())));
//                 $("#config_por_grupos").html(html);
//             }

//         });
//     };

//     this.saveFaseEliminacion = function(config) {
//         if (validate.isNumeric(this.torneo)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/generate/',
//                 data: {
//                     'code': base.torneo,
//                     'fase': (base.numfase + 1),
//                     'type': 2,
//                     'config': config
//                 },
//                 beforeSend: function() {
//                     component.popupHtmlHide();
//                     component.popupLoader("Configuración", "Espere un momento mientras se guarda la fase...");
//                 },
//                 success: function(data) {
//                     component.popupHtmlHide();
//                     if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                         if (data.status) {
//                             component.messageSimple("Configuración", data.message);
//                             component.reload();
//                         } else {
//                             component.messageSimple("Configuración", data.message, "danger");
//                         }
//                     }
//                 }
//             });
//         }
//         return false;
//     };

//     this.saveFaseGrupos = function(idavuelta) {
//         if (base.is_generate_grupos) {
//             var config_grupos = base.getConfigGrupos();
//             if (validate.isEmpty(config_grupos) && validate.isNumeric(idavuelta)) {
//                 component.alertComponent("La configuración actual supera el número de equipos del torneo, por favor inténtelo de nuevo.", "mensaje_generar_fase", "danger");
//                 return false;
//             } else {
//                 if (validate.isNumeric(this.torneo)) {
//                     $.ajax({
//                         type: 'POST',
//                         url: base_url + '/torneos/calendario/generate/',
//                         data: {
//                             'code': base.torneo,
//                             'fase': (base.numfase + 1),
//                             'type': 1,
//                             'config': config_grupos,
//                             'idavuelta': idavuelta
//                         },
//                         beforeSend: function() {
//                             component.popupHtmlHide();
//                             component.popupLoader("Configuración", "Espere un momento mientras se guarda la fase...");
//                         },
//                         success: function(data) {
//                             console.log(data);
//                             component.popupHtmlHide();
//                             if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                                 if (data.status) {
//                                     component.messageSimple("Configuración", data.message);
//                                     component.reload();
//                                 } else {
//                                     component.messageSimple("Configuración", data.message, "danger");
//                                 }
//                             }
//                         }
//                     });
//                 }
//             }
//         } else {
//             component.alertComponent("Debe generar la configuración por grupos para poder guardar esta fase.", "mensaje_generar_fase", "danger");
//         }
//         return false;
//     };

//     this.validaGrupos = function() {
//         $("#mensaje_crear_fase").html("");
//         if (validate.isEmpty($("#num_grupos").val())) {
//             component.alertComponent("Por favor ingrese número de grupos.", "mensaje_crear_fase", "danger");
//             return false;
//         }
//         /*if (validate.isEmpty($("#num_equipos_grupo").val())) {
//          component.alertComponent("Por favor ingrese número de equipos por grupo.", "mensaje_crear_fase", "danger");
//          return false;
//          }*/
//         var num_grupos = parseInt($("#num_grupos").val());
//         if (num_grupos >= base.num_equipos) {
//             component.alertComponent("El número de grupos no puede igualar o superar el número de equipos del torneo.", "mensaje_crear_fase", "danger");
//             return false;
//         }
//         if (num_grupos > (base.num_equipos / 2)) {
//             component.alertComponent("El número de grupos no puede superar la mitad del número de equipos. El resultado de la fase sería ilógico.", "mensaje_crear_fase", "danger");
//             return false;
//         }
//         /*var num_equipos = parseInt($("#num_equipos_grupo").val());
//          if (num_equipos > base.num_equipos) {
//          component.alertComponent("El número de equipos no puede superar el total de equipos del torneo.", "mensaje_crear_fase", "danger");
//          return false;
//          }
//          if ((num_equipos * num_grupos) > base.num_equipos) {
//          component.alertComponent("Esta configuración entre grupos y equipos no se puede realizar ya que supera el número de equipos participantes.", "mensaje_crear_fase", "danger");
//          return false;
//          }*/
//         return true;
//     };

//     this.validaEliminacion = function() {
//         $("#mensaje_crear_fase").html("");
//         if (this.rangoEliminacion(this.num_equipos) == 0) {
//             component.alertComponent("Esta configuración de eliminación no se puede realizar ya que no tiene un rango de eliminación lógico.", "mensaje_crear_fase", "danger");
//             return false;
//         }
//         return true;
//     };

//     this.rangoEliminacion = function(num_participantes) {
//         if ((num_participantes >= 4) && (num_participantes < 8)) {
//             return 1;
//         } else if ((num_participantes >= 8) && (num_participantes < 16)) {
//             return 2;
//         } else if ((num_participantes >= 16) && (num_participantes < 32)) {
//             return 3;
//         } else if ((num_participantes >= 32) && (num_participantes < 64)) {
//             return 4;
//         } else if ((num_participantes >= 64) && (num_participantes <= 100)) {
//             return 5;
//         }
//         return 0;
//     };

//     this.generateGrupos = function(num_grupos, arr_param, sumatoria) {
//         if (arr_param == undefined) {
//             var arr_config = new Array();
//             for (var g = 1; g <= num_grupos; g++) {
//                 var aux_format = {
//                     "grupo": g,
//                     "equipos": 1
//                 };
//                 arr_config.push(aux_format);
//             }
//             return this.generateGrupos(num_grupos, arr_config, num_grupos);
//         } else {
//             for (var g = 1; g <= num_grupos; g++) {
//                 sumatoria++;
//                 if (sumatoria == base.num_equipos) {
//                     arr_param[(g - 1)].equipos = (arr_param[(g - 1)].equipos + 1);
//                     return arr_param;
//                 } else {
//                     arr_param[(g - 1)].equipos = (arr_param[(g - 1)].equipos + 1);
//                 }
//             }
//             return this.generateGrupos(num_grupos, arr_param, sumatoria);
//         }
//         return null;
//     };

//     /*this.generateGrupos = function(num_grupos, num_equipos) {
//      var arr_config = new Array();
//      var faltantes = this.num_equipos - (num_grupos * num_equipos);
//      for (var g = 1; g <= num_grupos; g++) {
//      var aux_format = {
//      "grupo": g,
//      "equipos": num_equipos
//      };
//      arr_config.push(aux_format);
//      }
//      if (faltantes > 0) {
//      arr_config = this.agregarFaltantes(arr_config, faltantes);
//      }
//      return arr_config;
//      };*/

//     this.agregarFaltantes = function(arr_config, faltantes) {
//         var index = 0;
//         for (var g = 1; g <= faltantes; g++) {
//             if (index < arr_config.length) {
//                 arr_config[index].equipos += 1;
//             } else {
//                 index = 0;
//                 arr_config[index].equipos += 1;
//             }
//             index++;
//         }
//         return arr_config;
//     };


//     this.maquetaConfigGrupos = function(arr_config) {
//         var html = "";
//         if (arr_config.length > 0) {
//             html = '<div class="clear"><br></div><div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 18px;">Mejor opción para los ' + this.num_equipos + ' equipos</p></div><br>';
//             for (var a = 0; a < arr_config.length; a++) {
//                 html += '<div class="alert alert-info">' +
//                         '<p><strong>Grupo:</strong>&nbsp;' + arr_config[a].grupo + '</p>' +
//                         '<p><strong>Número de equipos por el grupo ' + arr_config[a].grupo + ':</strong>&nbsp;<input type="number" class="form-control configrupos" grupo="' + arr_config[a].grupo + '" value="' + arr_config[a].equipos + '" style="width: 60px; display: initial;" maxlength="2"/><br></p>' +
//                         '</div>';
//             }
//         }
//         return html;
//     };

//     this.maquetaSelectEliminacion = function(rango) {
//         var html = "";
//         if (rango > 0) {
//             html = '<select class="form-control" id="select_rango_eliminacion">';
//             for (var a = 1; a <= rango; a++) {
//                 if (a == 1) {
//                     html += '<option value="4">4</option>';
//                 }
//                 if (a == 2) {
//                     html += '<option value="8">8</option>';
//                 }
//                 if (a == 3) {
//                     html += '<option value="16">16</option>';
//                 }
//                 if (a == 4) {
//                     html += '<option value="32">32</option>';
//                 }
//                 if (a == 5) {
//                     html += '<option value="64">64</option>';
//                 }
//             }
//             html += '</select>';
//         }
//         return html;
//     };

//     this.getConfigGrupos = function() {
//         var arr_config = new Array();
//         var suma_equipos = 0;
//         var thisvalidate = true;
//         $(".configrupos").each(function() {
//             var aux_format = {
//                 "grupo": $(this).attr("grupo"),
//                 "equipos": $(this).val()
//             };
//             suma_equipos += parseInt($(this).val());
//             if (suma_equipos > base.num_equipos) {
//                 thisvalidate = false;
//             }
//             arr_config.push(aux_format);
//         });
//         if (thisvalidate) {
//             return arr_config;
//         }
//         return null;
//     };

// };


// var ValidateGrupos = function() {
//     var base = this;

//     this.init = function() {
//         this.events();
//     };

//     this.events = function() {
//         $(".round select").on("change", function() {
//             base.realizarCambios($(this).attr("data-team"), $(this).val(), $(this).attr("fase"));
//         });
//         $(".eliminatoria select").on("change", function() {
//             base.roundCambioEliminacion($(this).attr("data-team"), $(this).val(), $(this).attr("fase"));
//         });
//     };

//     this.roundCambioEliminacion = function(actual, seleccionado, fase) {
//         var element1 = $(".eliminatoria select[fase='" + fase + "'][data-team='" + actual + "']");
//         var element2 = $(".eliminatoria select[fase='" + fase + "'][data-team='" + seleccionado + "']");
//         element1.attr("data-team", seleccionado);
//         $(".eliminatoria select[partido='" + element1.attr("partido") + "']").attr("change", "true");
//         element1.effect("highlight", {'color': '#66AFE9'}, 2000);
//         element2.val(actual);
//         element2.attr("data-team", actual);
//         $(".eliminatoria select[partido='" + element2.attr("partido") + "']").attr("change", "true");
//         element2.effect("highlight", {'color': '#66AFE9'}, 2000);
//     };

//     this.realizarCambios = function(actual, seleccionado, fase) {
//         var arr_elements = new Array();
//         $(".round select[fase='" + fase + "'][data-team='" + actual + "']").each(function() {
//             arr_elements.push($(this));
//         });
//         $(".round select[fase='" + fase + "'][data-team='" + seleccionado + "']").each(function() {
//             arr_elements.push($(this));
//         });
//         for (var a = 0; a < arr_elements.length; a++) {
//             $(".round select[partido='" + arr_elements[a].attr("partido") + "']").attr("change", "true");
//             if (arr_elements[a].attr("data-team") == actual) {
//                 arr_elements[a].val(seleccionado);
//                 arr_elements[a].attr("data-team", seleccionado);
//                 arr_elements[a].effect("highlight", {'color': '#66AFE9'}, 2000);
//             } else if (arr_elements[a].attr("data-team") == seleccionado) {
//                 arr_elements[a].val(actual);
//                 arr_elements[a].attr("data-team", actual);
//                 arr_elements[a].effect("highlight", {'color': '#66AFE9'}, 2000);
//             }
//         }
//     };


// };
