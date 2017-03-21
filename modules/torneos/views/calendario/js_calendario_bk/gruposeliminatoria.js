// //****************************
// $(document).ready(function() {
//     var ge = new GruposEliminatoria();
//     ge.init();
// });

// //****************************
// var AleatorioOrdenado = function(mini, maxi) {
//     this.min = parseInt(mini);
//     this.max = parseInt(maxi);
//     this.cartilla = new Array(this.max + 1);


//     this.init = function() {
//         for (var i = 0; i < this.cartilla.length; i++) {
//             this.cartilla[i] = this.numeroAleatorio();
//             if (this.comprobarRepetido(this.cartilla[i], i)) {
//                 i--;
//             }
//         }
//         //this.imprimirArray(this.cartilla);
//         return this.cartilla;
//     };

//     this.numeroAleatorio = function() {
//         return Math.floor(Math.random() * (this.max - (this.min - 1))) + this.min;
//     };

//     this.comprobarRepetido = function(nuevoNumero, paso) {
//         for (var j = 0; j < this.cartilla.length; j++) {
//             if (j != paso) {
//                 if (this.cartilla[j] == nuevoNumero) {
//                     return true;
//                     break;
//                 }
//             }
//         }
//         return false;
//     };

//     this.imprimirArray = function(arr) {
//         for (var i = 0; i < arr.length; i++) {
//             console.log(" " + arr[i]);
//         }
//     };
// };

// var GruposEliminatoria = function() {
//     var base = this;
//     this.gencomplete = false;
//     this. ordamiento = null;
    
//     this.init = function() {
//         this.events();
//         this.ordamiento = new OrdenaSelects();
//         this.ordamiento.init();
//     };

//     this.events = function() {
//         $("#save_ge").on('click', function() {
//             if (base.validateSection()) {
//                 base.save(parseInt($(this).attr('data-code')));
//                 //base.saveEliminnatoria(parseInt($(this).attr('data-code')));
//             }
//         });
//         $("#btn_gen_ge").on('click', function() {
//             base.generate_ge(parseInt($(this).attr('code')), parseInt($(this).attr('numgr')), parseInt($(this).attr('numpargr')));
//         });
//         $("#btn_gen_elimin").on('click', function() {
//             base.generate_elimin(parseInt($(this).attr('code')), parseInt($(this).attr('numgr')), parseInt($(this).attr('numpargr')));
//         });
//         this.gencomplete = true;
//     };

//     this.validateSection = function() {
//         if (!this.gencomplete) {
//             component.messageSimple("Eliminación directa", "No se han completado todos los datos para la configuración del torneo.", "danger");
//             return false;
//         }
//         return true;
//     };

//     this.generate_elimin = function(code, numgr, numpargr) {
//         var value = parseInt($("#typesystem").val());
//         if (_.isNumber(value) && _.isNumber(code) && _.isNumber(numgr)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/generate_elimin/',
//                 data: {
//                     'code': code,
//                     'numgr': numgr,
//                     'numpargr': numpargr,
//                     'double': value
//                 },
//                 beforeSend: function() {
//                     component.popupLoader("Configuración", "Espere un momento mientras se genera la eliminación directa...");
//                 },
//                 success: function(data) {
//                     if (data.hasOwnProperty('html')) {
//                         $("#contend-elimin").empty().html(data.html);
//                         base.gencomplete = true;
//                         component.popupHtmlHide();
//                     }
//                 }
//             });
//         }
//     };

//     this.saveEliminnatoria = function(code) {
//         var code = parseInt($(".eliminatoria").attr("code"));
//         var matches = [];
//         var select_local = null;
//         var select_visitante = null;
//         $(".eliminatoria .partidos").each(function() {
//             select_local = null;
//             select_visitante = null;
//             //console.log("numero: " + $(this).attr("num") + " ronda: " + $(this).attr("round"));
//             select_local = $(this).find(".select-local");
//             select_visitante = $(this).find(".select-visitante");
//             if ((select_local.length > 0) && (select_visitante.length > 0)) {
//                 var obj = {
//                     'round': $(this).attr("round"),
//                     'team1': select_local.val(),
//                     'team2': select_visitante.val()
//                 };
//                 matches.push(obj);
//             } else {
//                 var obj = {
//                     'round': $(this).attr("round"),
//                     'team1': "NULL",
//                     'team2': "NULL"
//                 };
//                 matches.push(obj);
//             }
//         });
//         console.log(matches);
//         console.log("code: " + code);
//         if ((matches.length > 0) && _.isNumber(code)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/save_eliminatoria/',
//                 data: {
//                     'matches': matches,
//                     'code': code
//                 },
//                 beforeSend: function() {
//                     component.popupLoader("Eliminación directa", "Espera un momento mientras se envía la eliminación directa.");
//                 },
//                 success: function(data) {
//                     component.popupHtmlHide();
//                     console.log(data);
//                     setTimeout(function() {
//                         if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                             if (data.status) {
//                                 component.messageSimple("Eliminación directa", data.message);
//                                 component.reload();
//                             } else {
//                                 component.messageSimple("Eliminación directa", data.message, "danger");
//                             }
//                         }
//                     }, 2000);
//                 }
//             });
//         } else {
//             component.messageSimple("Eliminación directa", "No se han completado todos los datos para la configuración de la eliminación directa.", "danger");
//         }
//     };

//     this.generate_ge = function(code, numgr, numpargr) {
//         var value = parseInt($("#typesystem").val());
//         if (_.isNumber(value) && _.isNumber(code) && _.isNumber(numgr)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/generate/',
//                 data: {
//                     'code': code,
//                     'numgr': numgr,
//                     'numpargr': numpargr,
//                     'double': value
//                 },
//                 beforeSend: function() {
//                     component.popupLoader("Configuración", "Espere un momento mientras se generan las jornadas del calendario...");
//                 },
//                 success: function(data) {
//                     console.log(data);
//                     if (data.hasOwnProperty('html')) {
//                         $("#calendardata").empty().html(data.html);
//                         $('#accordion').carousel();
//                         component.popupHtmlHide();
//                     }
//                 }
//             });
//         }
//     };

//     this.save = function(code) {
//         var matches = [];
//         var round = 0;
//         $("table.round tr").each(function(index, tr) {
//             var tds = $(tr).find('td');
//             if (_.size(tds.eq(2).find('select')) > 0) {
//                 var team1 = parseInt(tds.eq(0).find('select').val());
//                 var team2 = parseInt(tds.eq(2).find('select').val());
//                 var error = false;
//                 if (_.isEqual(team1, 0)) {
//                     tds.eq(0).find('select').css('border', '1px solid red');
//                     error = true;
//                 } else {
//                     tds.eq(0).find('select').css('border', '1px solid #cccccc');
//                 }
//                 if (_.isEqual(team2, 0)) {
//                     tds.eq(2).find('select').css('border', '1px solid red');
//                     error = true;
//                 } else {
//                     tds.eq(2).find('select').css('border', '1px solid #cccccc');
//                 }
//                 round = parseInt($(tr).parents('table.round').attr('data-round'));
//                 if (_.isNumber(team1) && _.isNumber(team2) && _.isNumber(round) && !error) {
//                     var obj = {
//                         'round': round,
//                         'team1': team1,
//                         'team2': team2,
//                         'group': '1'
//                     };
//                     matches.push(obj);
//                 }
//             }

//         });

//         var select_local = null;
//         var select_visitante = null;
//         $(".eliminatoria .partidos").each(function() {
//             select_local = null;
//             select_visitante = null;
//             //console.log("numero: " + $(this).attr("num") + " ronda: " + $(this).attr("round"));
//             select_local = $(this).find(".select-local");
//             select_visitante = $(this).find(".select-visitante");
//             if ((select_local.length > 0) && (select_visitante.length > 0)) {
//                 var obj = {
//                     'round': (round + parseInt($(this).attr("round"))),
//                     'team1': select_local.val(),
//                     'team2': select_visitante.val(),
//                     'group': '2'
//                 };
//                 matches.push(obj);
//             } else {
//                 var obj = {
//                     'round': (round + parseInt($(this).attr("round"))),
//                     'team1': "NULL",
//                     'team2': "NULL",
//                     'group': '2'
//                 };
//                 matches.push(obj);
//             }
//         });
//         var number = parseInt($("#number_rounds").text());
//         var total = Math.floor(number / 2) * number;

//         console.log(matches);

//         if ((matches.length > 0) && _.isNumber(code)) {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + '/torneos/calendario/savegruposeliminatoria/',
//                 data: {
//                     'matches': matches,
//                     'code': code
//                 },
//                 beforeSend: function() {
//                     //$("#success_save").addClass('hide');
//                     //$("#error_save").addClass('hide');
//                     component.popupLoader("Configuración", "Espere un momento mientras se guardan los grupos...");

//                 },
//                 success: function(data) {
//                     component.popupHtmlHide();
//                     console.log(data);
//                     if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                         if (data.status) {
//                             component.messageSimple("Configuración", data.message);
//                             $("#success_save span").html(data.message).parent().removeClass('hide');
//                             $("#save_calendar").attr("disabled", "disabled");
//                             return true;
//                         } else {
//                             component.messageSimple("Configuración", "Hubo un error al guardar los grupos. Por favor inténtelo de nuevo.", "danger");
//                             $("#error_save span").text(data.message).parent().removeClass('hide');
//                             return false;
//                         }
//                     }
//                     component.messageSimple("Configuración", "Surgio un error con el envio de los datos. Por favor inténtelo de nuevo.", "danger");
//                     return false;
//                 }
//             });
//         } else {
//             $("#error_save span").text("Se debe generar y completar el torneo para poder guardarlo.").parent().removeClass('hide');
//             component.messageSimple("Configuración", "Se debe generar y completar el torneo para poder guardarlo.", "danger");
//         }
//     };

// };


// var OrdenaSelects = function() {
//     var base = this;

//     this.init = function() {
//         this.events();
//     };

//     this.events = function() {
//         $("#calendardata .round select").on("change", function() {
//             base.realizarCambios($(this).attr("data-team"), $(this).val(), $(this).attr("grupo"));
//         });
//     };
    
//     this.realizarCambios = function(actual, seleccionado, grupo) {
//         var arr_elements = new Array();
//         $("#calendardata .round select[data-team='" + actual + "']").each(function() {
//             arr_elements.push($(this));
//         });
//         $("#calendardata .round select[data-team='" + seleccionado + "']").each(function() {
//             arr_elements.push($(this));
//         });
//         for (var a = 0; a < arr_elements.length; a++) {
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