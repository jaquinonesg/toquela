<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario.js"></script>
<style type="text/css">
    .div-acordion-grupos{
        margin-top: 20px;
    }
</style>
<div class="calendario">
    {$menu_perfil = 4} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    {if $error_number != 1}
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <a href="{$_params.site}/torneos/calendario/configurar/{$tournament->codtournament}">
            <button class="btn btn-primary btn-crear-torneo"><span class="icon-cog"></span> CONFIGURAR TORNEO</button>
            </a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Calendario</strong></p>
        </div>
    </div>
    {/if}
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
                {if $error_number == 1}
                </br>
                <div class="alert alert-warning">
                    Debe terminar de completar todos los equipos que participaran en el torneo. 
                    <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
                    Click aquí
                    </a>
                </div>
                {else}
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial.tpl"}
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_total.tpl"}
                {if $type==1}
                </br>
                <h3 class="text-verde"><strong>RONDAS ELIMINACIÓN DIRECTA</strong></h3>
                </br>
                {*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
                <div class="clear"></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
                </div>
                {elseif $type==2}
                {if isset($matches_jornadas)}
                <script type="text/javascript">
                    $(document).ready(function() {
                        var td = new TodosContraTodos();
                        td.init();
                    
                        var gep = new GruposEliminatoriaPublic();
                        gep.init();
                    });
                </script>
                {*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
                <div class="clear"></br></div>
                <h3 class="text-verde"><strong>FASE DE GRUPOS</strong></h3>
                </br>
                {$acordion_parent = 1}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion1">
                    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
                </div>
                </br>
                <h3 class="text-verde"><strong>FASE DE ELIMINACIÓN</strong></h3>
                </br>
                <button class="btn btn-default" id="btn_result_fase_grupos" torneo="{$tournament->codtournament}" grupo="1">Resultados Fase Grupos</button>
                <button class="btn btn-default" id="btn_update_elim" torneo="{$tournament->codtournament}" grupo="1">Actualizar Eliminatoria</button>
                <div class="clear"></br></div>
                {$acordion_parent = 2}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion2">
                    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
                </div>
                {/if}
                {elseif $type==3}
                <script type="text/javascript">
                    $(document).ready(function() {
                        var td = new TodosContraTodos();
                        td.init();
                    });
                </script>
                </br>
                <h3 class="text-verde"><strong>JORNADAS TODOS CONTRA TODOS</strong></h3>
                </br>
                {*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
                <div class="clear"></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
                </div>
                <div class="filter-padding" style="margin-top: 20px;">
                    {include file=$_params.root|cat:"views/_templates/form_filters.tpl"}
                </div>
                <!-- popup de resultado parcial, tabla de posiciones -->
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"}

                <!-- popup de proxima fecha -->
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_proxima_fecha.tpl"}
                {elseif $type==4}
                <script type="text/javascript">
                    $(document).ready(function() {
                        var td = new TodosContraTodos();
                        td.init();
                        var dp = new DetallaPartido();
                        var filters = new FiltersTorneo();
                    });
                </script>
                {*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
                <h3 class="text-verde text-center"><strong><span class="glyphicon glyphicon-list-alt"></span>&nbsp; FASES PERSONALIZADO</strong></h3>
                </br>
                {include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
                <div class="filter-padding">
                    {include file=$_params.root|cat:"views/_templates/form_filters.tpl"}
                </div>
                <!-- popup de resultado parcial, tabla de posiciones -->
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"}
                <!-- popup de proxima fecha -->
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_proxima_fecha.tpl"}

                <!-- popup de detalle partido -->
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_detalle_partido_calendario.tpl"}
                {/if}
                {/if}
            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>