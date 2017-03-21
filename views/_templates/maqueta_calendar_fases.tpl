{include file=$_params.root|cat:"views/_templates/popup_detalla_partido.tpl"}
{foreach from=$fases item=fase key=indexfase}
    {if $fase->type == 1}
        {if isset($fase->matches)}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-fase-resultados">
            <div class="clear"></br></div>
            <h3 class="text-verde text-center" style="font-size: 18px;"><strong>{$fase->name}</strong></h3></br>
            {if $ver_total_fase}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                <div style="float: left; margin-bottom: 1.5%;">
                {if $fase->type != 2}
                    <button {if $indexfase+1 == count($fases)}id="btn-posiciones-primera"{/if} class="btn btn-primary btn_total_grupos" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-total-posiciones">Totales fase {$fase->number}</button>
                    <button class="btn btn-primary btn_tabla_reclasificacion" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Tabla de Reclasificación General {$fase->number}</button>
                {/if}
                </div>
                
            </div>
            {/if}
                    {$acordion_parent = $indexfase}
                    {$matches_jornadas = $fase->matches}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
                {include file=$_params.root|cat:"views/_templates/calendar_aux.tpl"}
            </div>
        </div>
        {/if}
    {elseif $fase->type == 2}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-fase-resultados">
        {if isset($fase->matches)}
        <div class="clear"></br></div>
        <h3 class="text-verde text-center" style="font-size: 18px;"><strong>{$fase->name}</strong></h3></br>
        {if $ver_total_fase}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
            <div style="float: left; margin-bottom: 1.5%;">
            {if $fase->type != 2}
                <button {if $indexfase+1 == count($fases)}id="btn-posiciones-primera"{/if} class="btn btn-primary btn_total_grupos" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-total-posiciones">Totales fase {$fase->number}</button>
                <button class="btn btn-primary btn_tabla_reclasificacion" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Tabla de Reclasificación General {$fase->number}</button>
            {/if}
            </div>
        </div>
        {/if}
        {$acordion_parent = $indexfase}
        {$matches_ronda = $fase->matches}
        {$arr_enun = $fase->arr_enun}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
            {include file=$_params.root|cat:"views/_templates/calendar_eliminatoria_aux.tpl"}
        </div>
        {/if}
    </div>
    {/if}
{/foreach}