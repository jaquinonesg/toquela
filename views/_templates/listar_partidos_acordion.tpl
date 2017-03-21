{if isset($matches)}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Local</th>
                <th></th>
                <th>Visitante</th>
                <th class="tabla-acciones">Estadisticas</th>
            </tr>
        </thead>
        <tbody>   
            {$inter = true}
            {$class_inter = "verde"}
            {$class_collapse = "collapse"}
            {foreach from=$matches item=match key=count}
                <tr class="tabla-acciones">
                    <td>{$match->namelocal}&nbsp;&nbsp;<span class="img-thumbnail" style="float: right;">&nbsp;&nbsp;{if $match->scorelocal < 0 }W{else}{$match->scorelocal}{/if}&nbsp;&nbsp;</span></td>
                    <td class="text-center"><span class="glyphicon glyphicon-resize-horizontal"></span></td>
                    <td>{$match->namevisitant}&nbsp;&nbsp;<span class="img-thumbnail" style="float: right;">&nbsp;&nbsp;{if $match->scorevisitant < 0}W{else}{$match->scorevisitant}{/if}&nbsp;&nbsp;</span></td>
                    <td class="text-center">
                        {if $onlyteam}
                            <button class="btn btn-primary btn-statistic-index" partido="{$match->codmatch}" equipo="{$codteam}">&nbsp;Estadísticas en este partido&nbsp;</button>
                        {else}
                            <button class="btn btn-primary btn-statistic-index" partido="{$match->codmatch}" usuario="{$coduser}">&nbsp;Mis estadísticas en este partido&nbsp;</button>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{else}
    <p class="text-center">No se han configurado partidos para este equipo.</p>
{/if}