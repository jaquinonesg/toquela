{if isset($teams)}
    <div class="panel-group" id="torneo_{$codtournament}">
        {$inter = true}
        {$class_inter = "verde"}
        {$class_collapse = "collapse"}
        {foreach from=$teams name=foo item=team key=count}
            {if $inter}
                {$class_inter = "verde"}
                {$inter = false}
            {else}
                {$class_inter = "azul"}
                {$inter = true}
            {/if}
            <div class="panel panel-default {$class_inter}">
                <a class="accordion-toggle rango-equipo" data-toggle="collapse" equipo="{$team->codteam}" torneo="{$codtournament}" index="{$count}" data-parent="#torneo_{$codtournament}" href="#collapse_{$codtournament}_{$count}">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="{$team->name}"><span class="glyphicon glyphicon-circle-arrow-right" id="glyphicon_{$count}"></span> &nbsp;&nbsp;{$team->name}</h4>
                    </div>
                </a>
                <div id="collapse_{$codtournament}_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body" id="equipo_body_{$codtournament}_{$team->codteam}_{$count}">
                        <br>
                        <br>
                        <div class="text-center">
                            <img class="loader-medium img-thumbnail" src="{$_params.site}/public/img/loader.gif"/>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
{else}
    <p class="text-center">No se han encontrado equipos para este torneo.</p>
{/if}