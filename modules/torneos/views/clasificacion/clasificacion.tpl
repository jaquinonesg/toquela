<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<style type="text/css">
    .div-title-torneo .title{
     padding-top: 0px;
 }
 .div-acordion-grupos{
    margin-top: 20px;
}
</style>
<div class="resultados">
    {$menu_perfil = 5} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    {if $error_number != 1}
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <button class="btn btn-primary btn_mas_resultados" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> INFO</button>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Resultados</strong></p>
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
        </br><h3 class="text-verde"><strong>RONDAS ELIMINACIÓN DIRECTA</strong></h3></br>
        {include file=$_params.root|cat:"views/_templates/info_calendario.tpl"}
        <div class="clear"></br></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
            {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
        </div>
        {elseif $type==2}
        {if isset($matches_jornadas)}
        {literal}
        <script type="text/javascript">
            $(document).ready(function() {
                var td = new TodosContraTodos();
                td.init();

                var gep = new GruposEliminatoriaPublic();
                gep.init();
            });
        </script>
        {/literal}

        {include file=$_params.root|cat:"views/_templates/info_calendario.tpl"}
        <div class="clear"></br></div>
        <h3 class="text-verde"><strong>FASE DE GRUPOS</strong></h3></br>
        {$acordion_parent = 1}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion1">
            {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
        </div>
    </br><h3 class="text-verde"><strong>FASE DE ELIMINACIÓN</strong></h3></br>
    <button class="btn btn-default" id="btn_result_fase_grupos" torneo="{$tournament->codtournament}" grupo="1">Resultados Fase Grupos</button>
    <button class="btn btn-default" id="btn_update_elim" torneo="{$tournament->codtournament}" grupo="1">Actualizar Eliminatoria</button>
    <div class="clear"></br></div>
    {$acordion_parent = 2}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion2">
        {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
    </div>
    {/if}
    {elseif $type==3}
    {literal}
    <script type="text/javascript">
        $(document).ready(function() {
            var td = new TodosContraTodos();
            td.init();
        });
    </script>
    {/literal}
</br><h3 class="text-verde"><strong>JORNADAS TODOS CONTRA TODOS</strong></h3></br>
{*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
<div class="clear"></br></div>
{$public = true}
{include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
</div>
{elseif $type==4}
<style type="text/css">
    .acor tbody tr {
        cursor: pointer;
    }
</style>
{literal}
<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
    });
</script>
{/literal}
{*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
<h3 class="text-verde text-center"><strong><span class="glyphicon glyphicon-list-alt"></span>&nbsp; FASES PERSONALIZADO</strong></h3></br>
{$public = true}
{$ver_total_fase = true}
{include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
<div class="filter-padding">
    {include file=$_params.root|cat:"views/_templates/form_filters_clasification.tpl"}
</div>

<!-- popup de mas resultados -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_more_results.tpl"}

<!-- popup de resutados fase -->
<!-- {*include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_fase.tpl"*} -->

<!-- popup de posiciones por fase y por grupo -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_posiciones_fase.tpl"}

<!-- popup de resultado parcial, tabla de posiciones -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"}

<!-- popup de detalle partido -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_detalle_partido.tpl"}

<!-- popup de +info eliminacion directa -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_detalle_calendario.tpl"}
{/if}
{/if}
</div>
<div class="clear"></br></div>
</div>
<div class="clear"></br></div>
</div>
</div>