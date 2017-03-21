{$inter = true}
{$class_inter = "verde"}
{$class_collapse = "in"}
{foreach from=$rounds name=foo item=round key=count}
    {if $inter}
        {$class_inter = "verde"}
        {$inter = false}
    {else}
        {$class_inter = "azul"}
        {$inter = true}
    {/if}
    {if $smarty.foreach.foo.first} 
        {$class_collapse = "in"}
    {else}
        {$class_collapse = "collapse"}
    {/if}
    <div class="panel panel-default {$class_inter}">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$count}">
            <div class="panel-heading">
                <h4 class="panel-title" title="Jornada {$round->number}">Grupo {$round->number}</h4>
            </div>
        </a>
        <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
            <div class="panel-body">
                <table class="table table-condensed round" data-round="{$round->number}">
                    <tbody>
                        {foreach from=$round->matches item=match}
                            <tr>
                                <td>
                                    <select class="form-control" data-width="170px" data-team="{$match->local->codteam}" data-name="{$match->local->name}">
                                        <option value="0">------</option>
                                        {foreach from=$teams item=team}
                                            {if $team->codteam == $match->local->codteam}
                                                <option value="{$team->codteam}" selected="">{$team->name}</option>
                                            {else}
                                                <option value="{$team->codteam}">{$team->name}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="no-back-popup swap" title="intercambia ida/vuelta" tabindex="-1">↔</a>
                                </td>
                                <td>
                                    {if $match->visitant->codteam == 0}
                                        {$match->visitant->name}
                                    {else}
                                        <select class="form-control" data-width="170px" data-team="{$match->visitant->codteam}" data-name="{$match->visitant->name}">
                                            <option value="0">------</option>
                                            {foreach from=$teams item=team}
                                                {if $team->codteam == $match->visitant->codteam}
                                                    <option value="{$team->codteam}" selected="">{$team->name}</option>
                                                {else}
                                                    <option value="{$team->codteam}">{$team->name}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{/foreach}



