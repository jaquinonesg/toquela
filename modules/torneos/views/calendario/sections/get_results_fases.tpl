{if $fase->type == 1}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <button class="btn btn-primary btn_result_fase_completa" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}">Totales fase sd{$fase->number}</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <button class="btn btn-primary btn_mas_resultados" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}">Mas resultados</button>
            </div>
        </div>
    </div>
    <br>
    {$acordion_parent = $fase->number}
    {$matches_jornadas = $fase->matches}
    {$public = true}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$acordion_parent}">
        {include file=$_params.root|cat:"views/_templates/calendar_result_aux.tpl"}
    </div>
{elseif $fase->type == 2}
    <br>
    <div>
        {$fase->html} 
    </div>
{/if}