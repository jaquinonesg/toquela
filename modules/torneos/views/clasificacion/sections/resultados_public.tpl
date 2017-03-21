<link href="{$_params.site}/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>

<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<span class="clasificacion">
    <br><br>
    {if $error_number == 1}
    <div class="alert alert-warning">
        Debe terminar de completar todos los equipos que participaran en el torneo. 
        <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
            Click aquí
        </a>
    </div>
    {else}
    {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial.tpl"}
    {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_total.tpl"}
    {if $type == 1}
</br><h3 class="text-verde">Sistema eliminación directa</h3><br/>
{if isset($tablero_torneo)}
{$tablero_torneo}
{else}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert-danger">
        <p>Hubo un error al generar la grafica del torneo...</p>
        <p>El número de equipos debe ser multiplo de 4 para poder organizar el torneo por eliminación directa...</p>
    </div>
</div>
{/if}
{elseif ($type == 2)}
<table class="table">
    <tr>
        <th class="text-center" style="border-top: 0px;">Posición</th>
        <th style="border-top: 0px;">Nombre</th>
        <th style="border-top: 0px;">J</th>
        <th style="border-top: 0px;">G</th>
        <th style="border-top: 0px;">E</th>
        <th style="border-top: 0px;">P</th>
        <th style="border-top: 0px;">GC</th>
        <th style="border-top: 0px;">GF</th>
        <th style="border-top: 0px;">+/-</th>
        <th class="text-center" style="border-top: 0px;">Puntos</th>
    </tr>
    {foreach from=$teams item=team key=i}
    <tr>
        <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;{$i+1}</td>
        <td>{$team->name}</td>
        <td>{$team->J}</td>
        <td>{$team->G}</td>
        <td>{$team->E}</td>
        <td>{$team->P}</td>
        <td>{$team->GC}</td>
        <td>{$team->GF}</td>
        <td>{$team->DIF}</td>
        <td>{$team->Puntos}</td>
    </tr>
    {/foreach}
</table>
<div>
    <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
    <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
</div>
<br>
<span>
    {$previa_eliminacion}
</span>
{elseif ($type == 3)}
<table class="table">
    <tr>
        <th class="text-center" style="border-top: 0px;">Posición</th>
        <th style="border-top: 0px;">Nombre</th>
        <th style="border-top: 0px;">J</th>
        <th style="border-top: 0px;">G</th>
        <th style="border-top: 0px;">E</th>
        <th style="border-top: 0px;">P</th>
        <th style="border-top: 0px;">GC</th>
        <th style="border-top: 0px;">GF</th>
        <th style="border-top: 0px;">+/-</th>
        <th class="text-center" style="border-top: 0px;">Puntos</th>
    </tr>
    {foreach from=$teams item=team key=i}
    <tr>
        <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;{$i+1}</td>
        <td>{$team->name}</td>
        <td>{$team->J}</td>
        <td>{$team->G}</td>
        <td>{$team->E}</td>
        <td>{$team->P}</td>
        <td>{$team->GC}</td>
        <td>{$team->GF}</td>
        <td>{$team->DIF}</td>
        <td>{$team->Puntos}</td>
    </tr>
    {/foreach}
</table>
<div>
    <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
    <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
</div>
{elseif ($type == 4)}
<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
    });
</script>
<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
{$type_public_filter = 'form-resultados'}
{$public = true}
{*include file=$_params.root|cat:"views/_templates/info_calendario.tpl"*}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0 auto; text-align: center">
    <button class="btn btn-primary btn_mas_resultados" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Más estadísticas</button>
    
</div>
{$ver_total_fase = true}
{include file=$_params.root|cat:"views/_templates/maqueta_calendar_fases.tpl"}
<div class="filter-padding">
    {include file=$_params.root|cat:"views/_templates/form_filters_public.tpl"}
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
{/if}
{/if}
</span>