<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario_public.js"></script>
<span class="calendario">
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!--span class="glyphicon glyphicon-default text-center"><img src="{$_params.site}/public/img/icons/fecha_hora.png"/></span-->
        <h4 class="text-verde text-center"><strong>RESULTADOS</strong></h4>
        </br>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
        {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_detalle_calendario.tpl"}
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
                {include file=$_params.root|cat:"views/_templates/info_resultados.tpl"}
                <div class="clear"></br></div>
                    {$acordion_parent = 1}
                    {$public = true}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
                </div>
            {elseif $type==2}
                {include file=$_params.root|cat:"views/_templates/info_resultados.tpl"}
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
                {include file=$_params.root|cat:"views/_templates/info_resultados.tpl"}
                <div class="clear"></br></div>
                    {$public = true}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
                </div>
            {elseif $type==4}
                </br><h3 class="text-verde"><strong>FASES PERSONALIZADO</strong></h3></br>
                {$public = true}
                {include file=$_params.root|cat:"views/_templates/info_resultados.tpl"}
                {include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
            {/if}
        {/if}
    </div>
    <div class="clear"></br></div>
</span>