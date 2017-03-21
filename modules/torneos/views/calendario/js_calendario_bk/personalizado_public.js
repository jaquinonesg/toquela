// //****************************
// $(document).ready(function() {
//     var pep = new PersonalizadoPublic();
//     pep.init();
// });

// var PersonalizadoPublic = function() {
//     var base = this;

//     this.init = function() {
//         this.events();
//     };

//     this.events = function() {
//             // click automatico para el boton de la ultima fase ue sale de primeras
//             $('#btn-posiciones-primera').click();
//         // $(document).on('click', '.btn_ver_resultado_fase', function() {
//         //     base.getResultPorFase($(this).attr("torneo"), $(this).attr("fase"));
//         // });
//         //--------------------
//         $(document).on('click', '.btn_result_parcial_calendar', function() {
//             base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"));
//         });
//         $(document).on('click', '.btn_result_parcial_resultados', function() {
//             base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"));
//         });
//         //--------------------
//         $(document).on('click', '.btn_result_fase_completa', function() {
//             base.getDataResultFaseCompleta($(this).attr("torneo"), $(this).attr("fase"));
//         });

//         $(document).on('click', '.btn_result_proxima_fecha', function() {
//             base.getProximaFecha($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"));
//         });

//         $(document).on('click', '.btn_mas_resultados', function() {
//             console.log('mas resultados');
//             base.getMoreResults($(this).attr("torneo"), $(this).attr("fase"));
//         });
//         $(document).on('click', '.btn_total_grupos', function() {
//             base.getDataPosicionesTotalesFase($(this).attr("torneo"), $(this).attr("fase"));
//         });
//         $(document).on('click', '.btn_result_detalle_partido', function() {
//          base.getMatchDetalle($(this).attr("cod-partido"),$(this).attr('data-calendar'));
//      });

//         //------nuevos eventos----
//         // $('.btn_ver_resultado_fase').click(function(){
//         // 	var id = $(this).attr('id');
//         // 	var num = id.split('-');
//         // 	var numero = num[num.length-1];
//         // 	$('.div-resultados-fase-'+numero).removeAttr('style');
//         // });

//         //  lógica para flecha en accordion de grupos
//         $('.grupo-menu').click(function() {
//             var clase = $(this).attr('class');
//             if (clase == "accordion-toggle grupo-menu tmp-grupo-menu" || clase == "accordion-toggle grupo-menu tmp-grupo-menu collapsed") {
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
// };

// this.getResultPorFase = function(torneo, fase) {
//     console.log("torneo: " + torneo + " fase: " + fase);
//     if (validate.isNumeric(torneo) && validate.isNumeric(fase)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/calendario/get_results_fase/',
//             data: {
//                 'torneo': torneo,
//                 'fase': fase
//             },
//             beforeSend: function() {
//                 component.popupLoader("Configuración", "Espere un momento...");
//             },
//             success: function(data) {
//                 console.log(data);
//                 component.popupHtmlHide();
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
//                     if (data.status) {
//                         $("#contend_fase_" + fase).html(data.html);
//                     } else {
//                         component.messageSimple("Configuración", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// this.getDataResult = function(torneo, ronda, fase) {
//     if (validate.isNumeric(torneo) && validate.isNumeric(ronda)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/clasificacion/resultados_public_round/' + torneo + '/' + ronda,
//             data: {
//                 "grupo": fase
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     if (data.status) {
//                         $("#modal-results-parcial .modal-body").html(data.html);
//                         $("#modal-results-parcial .modal-title").html('Grupo '+ronda);
//                         $('#modal-results-parcial').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Calendario", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// this.getDataResultFaseCompleta = function(torneo, fase) {
//     if (validate.isNumeric(torneo)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/clasificacion/resultados_public_round/' + torneo,
//             data: {
//                 "grupo": fase
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     if (data.status) {
//                         $("#modal-results-fase .modal-body").html(data.html);
//                         $("#modal-results-fase .modal-title").html('Fase '+fase);
//                         $('#modal-results-fase').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Calendario", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// this.getDataPosicionesTotalesFase = function(torneo, fase) {
//     if (validate.isNumeric(torneo)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/clasificacion/tablaPosicionesTotal/' + torneo +'/'+ fase,
//             data: {
//                 "grupo": fase
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     if (data.status) {
//                         $("#modal-total-posiciones .modal-body").html(data.html);
//                         $("#modal-total-posiciones .modal-title").html('Totales fase '+ fase);
//                         $('#modal-total-posiciones').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Calendario", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// this.getMoreResults = function(torneo, fase) {
//     if (validate.isNumeric(torneo)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/clasificacion/more_results_round/' + torneo,
//             data: {
//                 "grupo": fase
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     if (data.status) {
//                         $("#modal-more-results .modal-body").html(data.html);
//                         $("#modal-more-results .modal-title").html('Mas resultados');
//                         $('#modal-more-results').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Calendario", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// this.getProximaFecha = function(torneo, ronda, fase) {
//     console.log(torneo, ronda, fase);
//     if (validate.isNumeric(torneo) && validate.isNumeric(ronda)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/calendario/proximaFecha',
//             data: {
//                 "torneo": torneo,
//                 "round": ronda,
//                 "group": fase
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     if (data.status) {
//                         $("#modal-proxima-fecha .modal-body").html(data.html);
//                         $("#modal-proxima-fecha .modal-title").html('Proximas fechas del grupo ' + ronda);
//                         $('#modal-proxima-fecha').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Clasificacion", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };
// this.getMatchDetalle = function(cod_match, programeichon) {
//     console.log(programeichon);
//     if (validate.isNumeric(cod_match)) {
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/torneos/clasificacion/detallePartido',
//             data: {
//                 "codmatch": cod_match,
//                 "programado": programeichon
//             },
//             success: function(data) {
//                 if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
//                     var no = '';
//                     if(data.noprogramado){
//                         no = 'no programado';
//                     }
//                     if (data.status) {
//                         $("#modal-detalle-partido .modal-body").html(data.html);
//                         $("#modal-detalle-partido .modal-title").html('Partido '+no);
//                         $('#modal-detalle-partido').modal('show');
//                     } else {
//                         component.popupHtmlHide();
//                         component.messageSimple("Clasificacion", data.message, "danger");
//                     }
//                 }
//             }
//         });
//     }
// };

// };
