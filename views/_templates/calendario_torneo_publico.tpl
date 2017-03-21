<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
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
        {if $type==1}
            {if count($rounds)>0}
                </br><h3 class="text-verde">RONDAS</h3></br>
                {if $siguiente_ronda}
                    <button class="btn btn-default" data-code="{$tournament->codtournament}" id="siguiente_ronda">Generar Siguiente Ronda</button>
                    <div class="clear"></br></div>
                    {/if}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria.tpl"}
                </div>
            {/if}
        {elseif $type==2}
            {if count($rounds)>0}
                </br><h3 class="text-verde">GRUPOS</h3></br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar_grupos.tpl"}
                </div>
            {/if}
        {elseif $type==3}
            {if count($rounds)>0}
                </br><h3 class="text-verde">JORNADAS</h3></br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {include file=$_params.root|cat:"views/_templates/calendar.tpl"}
                </div>
            {/if}
        {/if}
    {/if}
</div>