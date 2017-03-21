
{$inter = true}
{$class_inter = "verde"}
{$class_collapse = "collapse"}
{$aux_round = 0}

{foreach from=$matches_jornadas name=foo item=match key=count}
    {if $match->round == $aux_round}
        <tr>
            <td class="text-center">
                {($count+1)}
            </td>
            <td>
                {$match->local}
            </td>
            <td class="text-center">
                {if isset($match->numjornada)}
                    {$match->numjornada}
                {/if}
            </td>
            <td>
                {$match->visitant}
            </td>
            <td>
                {if $match->scorelocal < 0}
                    W
                {else}
                    {$match->scorelocal}
                {/if}
                -
                {if $match->scorevisitant < 0}
                    W
                {else}
                    {$match->scorevisitant}
                {/if}
            </td>
        </tr>
    {else}
        {if $inter}
            {$class_inter = "verde"}
            {$inter = false}
        {else}
            {$class_inter = "azul"}
            {$inter = true}
        {/if}
        {if $smarty.foreach.foo.first} 
            {*$class_collapse = "in"*}
            <div class="panel panel-default {$class_inter}">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{$acordion_parent}" href="#collapse_{$acordion_parent}{$count}">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="GRUPO {$match->round}">Jornada {$match->round}</h4>
                    </div>
                </a>
                <div id="collapse_{$acordion_parent}{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body">
                        <table class="table table-striped my_rounds" data-round="{$match->round}">
                            <thead>
                                <tr>
                                    <th class="text-center" title="Número del partido">#</th>
                                    <th>Local</th>
                                    <th class="text-center" title="Jornada partido">J</th>
                                    <th>Visitante</th>
                                    <th class="text-center" title="Resultado parcial del partido">
                                        Resultados
                                        <br>
                                        <button class="btn btn-primary btn_result_parcial" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" style="margin-top: 5px;">Tabla posiciones</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center">
                                        {($count+1)}
                                    </td>
                                    <td>
                                        {$match->local}
                                    </td>
                                    <td class="text-center">
                                        {if isset($match->numjornada)}
                                            {$match->numjornada}
                                        {/if}
                                    </td>
                                    <td>
                                        {$match->visitant}
                                    </td>
                                    <td>
                                        {if $match->scorelocal < 0}
                                            W
                                        {else}
                                            {$match->scorelocal}
                                        {/if}
                                        -
                                        {if $match->scorevisitant < 0}
                                            W
                                        {else}
                                            {$match->scorevisitant}
                                        {/if}
                                    </td>
                                </tr>
                            {else}
                                {$class_collapse = "collapse"}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--************************************************************-->
            <div class="panel panel-default {$class_inter}">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{$acordion_parent}" href="#collapse_{$acordion_parent}{$count}">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="Jornada {$match->round}">Jornada {$match->round}</h4>
                    </div>
                </a>
                <div id="collapse_{$acordion_parent}{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body">
                        <table class="table table-striped my_rounds" data-round="{$match->round}">
                            <thead>
                                <tr>
                                    <th class="text-center" title="Número del partido">#</th>
                                    <th>Local</th>
                                    <th class="text-center" title="Jornada partido">J</th>
                                    <th>Visitante</th>
                                    <th class="text-center" title="Resultado parcial del partido">
                                        Resultados
                                        <br>
                                        <button class="btn btn-primary btn_result_parcial" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" style="margin-top: 5px;">Tabla posiciones</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center">
                                        {($count+1)}
                                    </td>
                                    <td>
                                        {$match->local}
                                    </td>
                                    <td>
                                        {if isset($match->numjornada)}
                                            {$match->numjornada}
                                        {/if}
                                    </td>
                                    <td>
                                        {$match->visitant}
                                    </td>
                                    <td>
                                        {if $match->scorelocal < 0}
                                            W
                                        {else}
                                            {$match->scorelocal}
                                        {/if}
                                        -
                                        {if $match->scorevisitant < 0}
                                            W
                                        {else}
                                            {$match->scorevisitant}
                                        {/if}
                                    </td>
                                </tr>
                            {/if}
                        {/if}
                        {$aux_round = $match->round}
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>


