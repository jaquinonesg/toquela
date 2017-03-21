{$inter = true}
{$class_inter = "verde"}
{$class_collapse = "in"}
{$aux_round = 0}
{foreach from=$matches_grupos name=foo item=match key=count}
    {if $match->round == $aux_round}
        <tr>
            <td class="text-center">
                {($count+1)}
            </td>
            <td>
                {$match->local}
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
            <td class="text-center">
                {if isset($match->numjornada)}
                    {$match->numjornada}
                {/if}
            </td>
            <td>
                {if $public}
                    {if isset($match->date) && isset($match->hour)}
                        <button class="btn btn-default btn_+ Info_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>
                    {else}
                        No se ha programado fecha
                    {/if}
                {else}
                    {if isset($match->date) && isset($match->hour)}
                        <button class="btn btn-default calendario_+ Info" data-toggle="popover" title="" data-placement="left" data-content="<p><strong>Fecha: </strong>{$match->date}</p><p><strong>Hora: </strong>{$match->hour}</p>" role="button" data-original-title="Partido # {($count+1)}"><span class="glyphicon glyphicon-calendar"></span></button>                      
                        &nbsp;&nbsp;&nbsp;
                        <a href="{$_params.site}/torneos/partido/index/{$match->codmatch}" target="_blank">
                            <button class="btn btn-default btns-irpartido" title="Ir al Partido">Ir al Partido</button>
                        </a>
                    {else}
                        No se ha programado fecha
                    {/if}
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
            {$class_collapse = "in"}
            <div class="panel panel-default {$class_inter}">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$count}">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="Grupo {$match->round}">Grupo {$match->round} {if isset($arr_enun[$match->round])} &nbsp;:&nbsp; {$arr_enun[$match->round]} {/if}</h4>
                    </div>
                </a>
                <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body">
                        <table class="table table-striped my_rounds" data-round="{$match->round}">
                            <thead>
                                <tr>
                                    <th class="text-center" title="Número del partido">#</th>
                                    <th>Local</th>
                                    <th>Visitante</th>
                                    <th class="text-center" title="Resultado parcial del partido">R</th>
                                    <th class="text-center" title="Jornada partido">J</th>
                                    <th class="text-center">
                                        {if $public}
                                            Información
                                        {else}
                                            <a href="{$_params.site}/torneos/calendario/informacion/{$tournament->codtournament}/{$match->round}">
                                                <button class="btn btn-primary btn-modi-info" title="Configurar Calendario grupo {$match->round}">Configurar Calendario</button>
                                            </a>
                                        {/if}
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
                                    <td class="text-center">
                                        {if isset($match->numjornada)}
                                            {$match->numjornada}
                                        {/if}
                                    </td>
                                    <td>
                                        {if $public}
                                            {if isset($match->date) && isset($match->hour)}
                                                <button class="btn btn-default btn_+ Info_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>
                                            {else}
                                                No se ha programado fecha
                                            {/if}
                                        {else}
                                            {if isset($match->date) && isset($match->hour)}
                                                <button class="btn btn-default calendario_+ Info" data-toggle="popover" title="" data-placement="left" data-content="<p><strong>Fecha: </strong>{$match->date}</p><p><strong>Hora: </strong>{$match->hour}</p>" role="button" data-original-title="Partido # {($count+1)}"><span class="glyphicon glyphicon-calendar"></span></button>                      
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="{$_params.site}/torneos/partido/index/{$match->codmatch}" target="_blank">
                                                    <button class="btn btn-default btns-irpartido" title="Ir al Partido">Ir al Partido</button>
                                                </a>
                                            {else}
                                                No se ha programado fecha
                                            {/if}
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
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$count}">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="Grupo {$match->round}">Grupo {$match->round} {if isset($arr_enun[$match->round])} &nbsp;:&nbsp; {$arr_enun[$match->round]} {/if}</h4>
                    </div>
                </a>
                <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body">
                        <table class="table table-striped my_rounds" data-round="{$match->round}">
                            <thead>
                                <tr>
                                    <th class="text-center" title="Número del partido">#</th>
                                    <th>Local</th>
                                    <th>Visitante</th>
                                    <th class="text-center" title="Resultado parcial del partido">R</th>
                                    <th class="text-center" title="Jornada partido">J</th>
                                    <th class="text-center">
                                        {if $public}
                                            Información
                                        {else}
                                            <a href="{$_params.site}/torneos/calendario/informacion/{$tournament->codtournament}/{$match->round}">
                                                <button class="btn btn-primary btn-modi-info" title="Configurar Calendario grupo {$match->round}">Configurar Calendario</button>
                                            </a>
                                        {/if}
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
                                    <td>
                                        {if isset($match->numjornada)}
                                            {$match->numjornada}
                                        {/if}
                                    </td>
                                    <td>
                                        {if $public}
                                            {if isset($match->date) && isset($match->hour)}
                                                <button class="btn btn-default btn_+ Info_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>
                                            {else}
                                                No se ha programado fecha
                                            {/if}
                                        {else}
                                            {if isset($match->date) && isset($match->hour)}
                                                <button class="btn btn-default calendario_+ Info" data-toggle="popover" title="" data-placement="left" data-content="<p><strong>Fecha: </strong>{$match->date}</p><p><strong>Hora: </strong>{$match->hour}</p>" role="button" data-original-title="Partido # {($count+1)}"><span class="glyphicon glyphicon-calendar"></span></button>                      
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="{$_params.site}/torneos/partido/index/{$match->codmatch}" target="_blank">
                                                    <button class="btn btn-default btns-irpartido" title="Ir al Partido">Ir al Partido</button>
                                                </a>
                                            {else}
                                                No se ha programado fecha
                                            {/if}
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


