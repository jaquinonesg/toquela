{$inter = true}
{$class_inter = "verde"}
{$class_collapse = "collapse"}
{$aux_round = 0}
{foreach from=$matches_ronda name=foo item=match key=count}
{if $match->round == $aux_round}
{$irpartido = ""}
{$title = ""}
{$class_no_calendar = ""}
{$irlocal = $match->teamlocal|cat:"-"|cat:$urlencode->encodeStringToUrl($match->local)}
{$irvisitant = $match->teamvisitant|cat:"-"|cat:$urlencode->encodeStringToUrl($match->visitant)}
{if $public}
{if isset($match->date) && isset($match->hour)}
{*<button class="btn btn-default btn_detalle_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>*}
{$title = $match->local|cat:" VS "|cat:$match->visitant}
{else}
{$title = "No se ha programado calendario para este partido"}
{$class_no_calendar = "no-programado"}
{/if}
{else}
{if isset($match->date) && isset($match->hour)}
{if isset($match->teamlocal) && isset($match->teamvisitant)}
{$irpartido = $_params.base|cat:"/torneos/partido/index/"|cat:$match->codmatch}
{$title = $match->local|cat:" VS "|cat:$match->visitant}
{/if}
{else}
{$title = "No se ha programado calendario para este partido"}
{$class_no_calendar = "no-programado"}
{/if}
{/if}
<tr class="all-match {$class_no_calendar} btn_result_detalle_partido" cod-partido="{$match->codmatch}" data-target="#modal-detalle-partido" data-calendar="{$class_no_calendar}">
        <td style='vertical-align: middle;'>
            <div class="contador-partido"># {($count+1)}</div>
            <p class="text-right">{$match->local}</p>
        </td>
        <td>
            {$result_aux = ""}
            {if $match->scorelocal < 0}
            {$result_aux = "W"}
            {else}
            {$result_aux = $match->scorelocal}
            {/if}
            <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="{$match->teamlocal}" value="{$result_aux}" disabled="disabled"/>
            {$result_aux = ""}
            {if $match->scorevisitant < 0}
            {$result_aux = "W"}
            {else}
            {$result_aux = $match->scorevisitant}
            {/if}
            <input type="text" class="form-control input-resultado" code="{$match->teamvisitant}" value="{$result_aux}" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
        </td>
        <td style='vertical-align: middle;'>
            <p class="text-left">{$match->visitant}</p>
        </td>
        <td style='vertical-align: middle;'>
            <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
            <span>{if isset($match->numjornada)}
                {$match->numjornada}
                {/if}</span>
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
            <div class="panel-heading">
                <div class="btns-actions">
                    {if $public}
                    
                    {else}
                    <a href="{$_params.site}/torneos/calendario/informacion/{$tournament->codtournament}/{$match->round}/{$match->group}" style="float: right;">
                        <button class="btn btn-primary btn-modi-info" title="Configurar Calendario Ronda {$match->round}">Configurar Calendario</button>
                    </a>
                    {if !$smarty.foreach.foo.last}
                    <button class="btn btn-primary gen_siguiente_ronda" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" style="float: right; margin-right: 2px;">Actualizar Siguiente Ronda</button>
                    {/if}
                    {/if}
                    <button class="btn btn-primary btn_result_proxima_fecha" style="float: right; margin-right: 2px;" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" data-target="#modal-results-parcial">Próxima fecha</button>
                </div>
                <a class="accordion-toggle grupo-menu tmp-grupo-menu" title="Grupo {$match->round}" data-toggle="collapse" data-parent="#accordion{$acordion_parent}" href="#collapse_{$acordion_parent}{$count}">Grupo {$match->round} {if isset($arr_enun[$match->round])} &nbsp;:&nbsp; {$arr_enun[$match->round]} {/if} &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down" style="padding-right: 46%;"></span>
                </a>
                <div class="clear"></div>
            </div>
            <div id="collapse_{$acordion_parent}{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                <div class="panel-body">
                    <table class="table table-striped my_rounds" data-round="{$match->round}">
                        <thead>
                            <tr>
                                <th style="text-align: right;">Local</th>
                                <th class="text-center" title="Resultado parcial del partido">R</th>
                                <th style="text-align: left;">Visitante</th>
                                <th class="text-center" title="Jornada partido">J</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            {$irpartido = ""}
                            {$title = ""}
                            {$class_no_calendar = ""}
                            {$irlocal = $match->teamlocal|cat:"-"|cat:$urlencode->encodeStringToUrl($match->local)}
                            {$irvisitant = $match->teamvisitant|cat:"-"|cat:$urlencode->encodeStringToUrl($match->visitant)}
                            {if $public}
                            {if isset($match->date) && isset($match->hour)}
                            {*<button class="btn btn-default btn_detalle_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>*}
                            {$title = $match->local|cat:" VS "|cat:$match->visitant}
                            {else}
                            {$title = "No se ha programado calendario para este partido"}
                            {$class_no_calendar = "no-programado"}
                            {/if}
                            {else}
                            {if isset($match->date) && isset($match->hour)}
                            {if isset($match->teamlocal) && isset($match->teamvisitant)}
                            {$irpartido = $_params.base|cat:"/torneos/partido/index/"|cat:$match->codmatch}
                            {$title = $match->local|cat:" VS "|cat:$match->visitant}
                            {/if}
                            {else}
                            {$title = "No se ha programado calendario para este partido"}
                            {$class_no_calendar = "no-programado"}
                            {/if}
                            {/if}
                            <tr class="all-match {$class_no_calendar} btn_result_detalle_partido" cod-partido="{$match->codmatch}" data-target="#modal-detalle-partido" data-calendar="{$class_no_calendar}">
                                    <td style='vertical-align: middle;'>
                                        <div class="contador-partido"># {($count+1)}</div>
                                        <p class="text-right">{$match->local}</p>
                                    </td>
                                    <td>
                                        {$result_aux = ""}
                                        {if $match->scorelocal < 0}
                                        {$result_aux = "W"}
                                        {else}
                                        {$result_aux = $match->scorelocal}
                                        {/if}
                                        <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="{$match->teamlocal}" value="{$result_aux}" disabled="disabled"/>
                                        {$result_aux = ""}
                                        {if $match->scorevisitant < 0}
                                        {$result_aux = "W"}
                                        {else}
                                        {$result_aux = $match->scorevisitant}
                                        {/if}
                                        <input type="text" class="form-control input-resultado" code="{$match->teamvisitant}" value="{$result_aux}" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
                                    </td>
                                    <td style='vertical-align: middle;'>
                                        <p class="text-left">{$match->visitant}</p>
                                    </td>
                                    <td style='vertical-align: middle;'>
                                        <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
                                        <span>{if isset($match->numjornada)}
                                            {$match->numjornada}
                                            {/if}</span>
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
                    <div class="panel-heading">
                        <div class="btns-actions">
                            {if $public}
                            
                            {else}
                            <a href="{$_params.site}/torneos/calendario/informacion/{$tournament->codtournament}/{$match->round}/{$match->group}" style="float: right;">
                                <button class="btn btn-primary btn-modi-info" title="Configurar Calendario Ronda {$match->round}">Configurar Calendario</button>
                            </a>
                            {if !$smarty.foreach.foo.last}
                            <button class="btn btn-primary gen_siguiente_ronda" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" style="float: right; margin-right: 2px;">Actualizar Siguiente Ronda</button>
                            {/if}
                            {/if}
                            <button class="btn btn-primary btn_result_proxima_fecha" style="float: right; margin-right: 2px;" round="{$match->round}" fase="{$match->group}" torneo="{$tournament->codtournament}" data-target="#modal-results-parcial">Próxima fecha</button>
                        </div>
                        <a class="accordion-toggle grupo-menu tmp-grupo-menu" title="Grupo {$match->round}" data-toggle="collapse" data-parent="#accordion{$acordion_parent}" href="#collapse_{$acordion_parent}{$count}">Grupo {$match->round} {if isset($arr_enun[$match->round])} &nbsp;:&nbsp; {$arr_enun[$match->round]} {/if} &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div id="collapse_{$acordion_parent}{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                        <div class="panel-body">
                            <table class="table table-striped my_rounds" data-round="{$match->round}">
                                <thead>
                                    <tr>
                                        <th style="text-align: right;">Local</th>
                                        <th class="text-center" title="Resultado parcial del partido">R</th>
                                        <th style="text-align: left;">Visitante</th>
                                        <th class="text-center" title="Jornada partido">J</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    {$irpartido = ""}
                                    {$title = ""}
                                    {$class_no_calendar = ""}
                                    {$irlocal = $match->teamlocal|cat:"-"|cat:$urlencode->encodeStringToUrl($match->local)}
                                    {$irvisitant = $match->teamvisitant|cat:"-"|cat:$urlencode->encodeStringToUrl($match->visitant)}
                                    {if $public}
                                    {if isset($match->date) && isset($match->hour)}
                                    {*<button class="btn btn-default btn_detalle_calendario" partido="{$match->codmatch}" torneo="{$tournament->codtournament}" title="+ Info">+ Info</button>*}
                                    {$title = $match->local|cat:" VS "|cat:$match->visitant}
                                    {else}
                                    {$title = "No se ha programado calendario para este partido"}
                                    {$class_no_calendar = "no-programado"}
                                    {/if}
                                    {else}
                                    {if isset($match->date) && isset($match->hour)}
                                    {if isset($match->teamlocal) && isset($match->teamvisitant)}
                                    {$irpartido = $_params.base|cat:"/torneos/partido/index/"|cat:$match->codmatch}
                                    {$title = $match->local|cat:" VS "|cat:$match->visitant}
                                    {/if}
                                    {else}
                                    {$title = "No se ha programado calendario para este partido"}
                                    {$class_no_calendar = "no-programado"}
                                    {/if}
                                    {/if}
                                    <tr class="all-match {$class_no_calendar} btn_result_detalle_partido" cod-partido="{$match->codmatch}" data-target="#modal-detalle-partido" data-calendar="{$class_no_calendar}">
                                            <td style='vertical-align: middle;'>
                                                <div class="contador-partido"># {($count+1)}</div>
                                                <p class="text-right">{$match->local}</p>
                                            </td>
                                            <td>
                                                {$result_aux = ""}
                                                {if $match->scorelocal < 0}
                                                {$result_aux = "W"}
                                                {else}
                                                {$result_aux = $match->scorelocal}
                                                {/if}
                                                <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="{$match->teamlocal}" value="{$result_aux}" disabled="disabled"/>
                                                {$result_aux = ""}
                                                {if $match->scorevisitant < 0}
                                                {$result_aux = "W"}
                                                {else}
                                                {$result_aux = $match->scorevisitant}
                                                {/if}
                                                <input type="text" class="form-control input-resultado" code="{$match->teamvisitant}" value="{$result_aux}" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
                                            </td>
                                            <td style='vertical-align: middle;'>
                                                <p class="text-left">{$match->visitant}</p>
                                            </td>
                                            <td style='vertical-align: middle;'>
                                                <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
                                                <span>{if isset($match->numjornada)}
                                                    {$match->numjornada}
                                                    {/if}</span>
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


