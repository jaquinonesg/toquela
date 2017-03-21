<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/views/torneo/js/torneo.js"></script>
<script type="text/javascript" src="{$_params.site}/views/torneo/js/participantes.js"></script>
<div class="participantes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {include file=$_params.root|cat:"views/torneo/sections/slay_menu.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="asignar_equipos">
                    <span class="glyphicon" id="icon-jornada"><img src="{$_params.site}/public/img/icons/jornadas.png"/></span>
                    </br>
                    </br>
                    <h3 class="text-verde">ASIGNAR EQUIPOS</h3>
                    </br>
                    </br>
                    <form class="form-horizontal text-verde" role="form">
                        {for $var=1 to $tournament->numberparticipants}
                            <div class="form-group">
                                <label for="_equipo_{$var}" class="col-xs-12 col-sm-12 col-md-2 col-lg-2 control-label">{$var}) </label>
                                {$flag = true}
                                {foreach from=$teams item=team}
                                    {if $team->number == $var}
                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control autocomplete_team" value="{$team->name}" id="_equipo_{$var}" data-number="{$var}" data-code="{$team->codteam}" placeholder="Nombre del equipo"/>
                                                <span class="input-group-addon"><button type="button" class="close remove_team" data-code="{$team->codteam}" data-tournament="{$tournament->codtournament}" aria-hidden="true">&times;</button></span>
                                            </div>
                                        </div>
                                        {$flag = false}
                                    {/if}
                                {/foreach}
                                {if $flag}
                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                        <input type="text" class="form-control autocomplete_team" id="_equipo_{$var}" data-number="{$var}" placeholder="Nombre del equipo"/>
                                    </div>
                                {/if}
                            </div>
                        {/for}
                        </br>
                        <button type="button" class="btn btn-default" id="save_teams" data-code="{$tournament->codtournament}">GUARDAR</button>
                    </form>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="equipos-inscritos">
                    <div class="position_relative">
                        <span class="glyphicon" id="icon-jugador"><img src="{$_params.site}/public/img/icons/jugador.png"/></span>
                    </div>
                    </br>
                    </br>
                    <p class="number">{$num_players}</p>
                    <p>JUGADORES INSCRITOS</p>
                    </br>
                    <div class="position_relative">
                        <span class="glyphicon" id="icon-camiseta"><img src="{$_params.site}/public/img/icons/camiseta.png"/></span>
                    </div>
                    </br>
                    </br>
                    <p class="number">{$num_teams}</p>
                    <p>EQUIPOS INSCRITOS</p>
                    </br>
                    <div id="container-info-team">
                    </div>
                </div>
                <div class="clear"></br></div>
            </div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>





