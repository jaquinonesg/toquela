<link href="{$_params.site}/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario_public.js"></script>
<span class="calendario">
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
        {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_total.tpl"}
        {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial.tpl"}
        {if $error_number == 1}
    </br>
    <div class="alert alert-warning">
        No se ha terminado de completar todos los equipos que participaran en el torneo.
    </div>
    {else}
    {if $type==1}
</br><h3 class="text-verde"><strong>RONDAS ELIMINATORIA</strong></h3></br>
{include file=$_params.root|cat:"views/_templates/info_calendario.tpl"}
<div class="clear"></br></div>
{$acordion_parent = 1}
{$public = true}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
</div>
{elseif $type==2}
{include file=$_params.root|cat:"views/_templates/info_calendario.tpl"}
<div class="clear"></br></div>
<h3 class="text-verde"><strong>FASE DE GRUPOS</strong></h3></br>
{$acordion_parent = 1}
{$public = true}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion1">
    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
</div>
</br><h3 class="text-verde"><strong>FASE DE ELIMINACIÓN</strong></h3></br>
<div class="clear"></br></div>
{$acordion_parent = 2}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion2">
    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
</div>
{elseif $type==3}
</br><h3 class="text-verde"><strong>JORNADAS TODOS CONTRA TODOS</strong></h3></br>
{include file=$_params.root|cat:"views/_templates/info_calendario.tpl"}
<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
{$type_public_filter = 'form-calendario'}
{include file=$_params.root|cat:"views/_templates/form_filters_public.tpl"}
<div class="clear"></br></div>
{$public = true}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
</div>
{elseif $type==4}
<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
        var dp = new DetallaPartido();
    });
</script>
<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
{$type_public_filter = 'form-calendario'}
</br><h3 class="text-verde"><strong>FASES PERSONALIZADO</strong></h3></br>
{$public = true}
{*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
{include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
<div class="filter-padding">
    {include file=$_params.root|cat:"views/_templates/form_filters_public.tpl"}
</div>
<!-- popup de resultado parcial, tabla de posiciones -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"}

<!-- popup de proxima fecha -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_proxima_fecha.tpl"}

{/if}
{/if}
<!-- popup de detalle partido -->
{include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_detalle_partido.tpl"}
</div>
<div class="clear"></br></div>
</span>