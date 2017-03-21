{foreach from=$fases item=fase key=indexfase}
    {if $fase->type == 1}
        {if isset($fase->matches)}
            <div class="clear"></br></div>
            <h3 class="text-verde"><strong>{$fase->name}</strong></h3></br>
                    {$acordion_parent = $indexfase}
                    {$matches_jornadas = $fase->matches}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
                {include file=$_params.root|cat:"views/_templates/clasification_aux.tpl"}
            </div>
        {/if}
    {elseif $fase->type == 2}
        {if isset($fase->matches)}
            <div class="clear"></br></div>
            <h3 class="text-verde"><strong>{$fase->name}</strong></h3></br>
                    {$acordion_parent = $indexfase}
                    {$matches_ronda = $fase->matches}
                    {$arr_enun = $fase->arr_enun}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion{$indexfase}">
                {include file=$_params.root|cat:"views/_templates/clasification_eliminatoria_aux.tpl"}
            </div>
        {/if}
    {/if}
{/foreach}