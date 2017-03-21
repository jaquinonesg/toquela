{include file=$_params.root|cat:"views/_templates/popup_detalla_partido.tpl"}
{foreach from=$fases item=fase key=indexfase}
    {if $fase->type == 1}
        {if isset($fase->matches)}
        <div class="alert alert-default fade in fase-resultados">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
            <button id="btn-fase-{$fase->number}" class="btn btn-default btn_ver_resultado_fase" orneo="{$tournament->codtournament}" fase="{$fase->number}">Ver {$fase->name}</button>
            <div class="div-resultados-fase div-resultados-fase-{$fase->number}" style="display: none;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="float: left; margin-bottom: 1.5%;">
                        <button class="btn btn-primary btn_result_fase_completa" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-results-fase">Totales fase {$fase->number}</button>
                    </div>
                </div>
                </p>
                {$acordion_parent = $indexfase}
                {$matches_jornadas = $fase->matches}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
                    {include file=$_params.root|cat:"views/_templates/calendar_result_aux.tpl"}
                </div>
            </div>
        </div>
            
        {/if}
    {elseif $fase->type == 2}
        {if isset($fase->matches)}
        <div class="alert alert-default fade in fase-resultados">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
            <button id="btn-fase-{$fase->number}" class="btn btn-default btn_ver_resultado_fase" torneo="61" fase="2">Ver {$fase->name}</button>
            <div class="div-resultados-fase div-resultados-fase-{$fase->number}" style="display: none;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div style="float: left; margin-bottom: 1.5%;">
                        <button class="btn btn-primary btn_result_fase_completa" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}" data-target="#modal-results-fase">Totales fase {$fase->number}</button>
                    </div>
                </div>
                </p>
                {$acordion_parent = $indexfase}
                {$matches_jornadas = $fase->matches}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
                    {include file=$_params.root|cat:"views/_templates/calendar_result_aux.tpl"}
                </div>
            </div>
        </div>
        {/if}
    {/if}
{/foreach}