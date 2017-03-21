{if !$sololista}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init partidos_publicos">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PARTIDOS PUBLICOS</strong></h4>
        <div class="clear"><br></div>
        <div class="contend_equipos list_equipos" panel="equipo">
            {if $is_buscador_partido}
                <form id="_buscador_partido_publico">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                        <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                        <label for="txt_bus_equipo" class="control-label">BUSCAR EQUIPO</label>
                        <input type="text" class="form-control" id="txt_bus_equipo"/>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                        <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
                        <label for="sel_equipo_genero" class="control-label">GÉNERO</label>
                        <select class="form-control" id="sel_equipo_genero">
                            <option value="" selected="">Todos</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">Mixto</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                        <div class="text-center" style="font-size: 40px;"><span class="icon-guayo"></span></div>
                        <label for="sel_tipo_futbol" class="control-label">TIPO FÚTBOL</label>
                        <select class="form-control" id="sel_tipo_futbol">
                            <option value="" selected="">Todos</option>
                            {foreach from=$types_futbol item=type}
                                <option value="{$type->codvirtues}">{$type->name}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="clear"></div>
                </form>
            {/if}
        {/if}

        {if isset($gamesPublic)}
            {if !$sololista}
                <div id="_partidos_publicos_pagination">
                {/if}
                <div class="maq_equipos" id="_contend_equipos">
                    {foreach from=$gamesPublic item=gamePublic}
                        {if $gamePublic->codcomplex}
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-equipo">
                                <a class="link" href="/toquela/partidos/deatalleDelPartido/{$gamePublic->codgames}" style="text-decoration: none;">
                                    <div class="recuadro">
                                        {if !isset($gamePublic->pathTeam)}
                                            <div class="img_equipo">
                                                <img src="{$_params.site}/public/img/fotoequipo.jpg" accesskey="">
                                            </div>
                                        {else}
                                            <div class="img_equipo">
                                                <img src="{$_params.site}/public{$gamePublic->pathTeam}" accesskey="">
                                            </div>  
                                        {/if}
                                        <div class="clear"><br></div>
                                        <h3 style="margin-left: 5px;" class="text-left"><span style="font-size: 16px;">Equipo creador: {$gamePublic->nameTeam}</span></h3>
                                        <br>
                                        <p class="text-left" style="margin-left: 5px;"><span style="font-size: 16px;">Fecha y hora: </span>{$gamePublic->datetimegame}</p>
                                        <br>
                                    </div>
                                </a>
                            </div>
                        {/if}
                    {/foreach}
                {else}
                    <br>
                    <br>
                    <br>
                    <p class="not-info">En este momento no hay partidos.</p>
                {/if}
            </div>
            {if $verpaginator}
                <div class="clear text-center">
                    {$htmlpaginator_public}
                </div>
            {/if}
            {if !$sololista && isset($gamesPublic)} 
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
    {if $verpaginator}
        <script type="text/javascript">
            $(document).ready(function() {
                var paginatorGamesPublic = new PaginatorGamesPublic('paginator_games_public', '_partidos_publicos_pagination', "_buscador_partido_publico", '{$_params.site}/equipos/get_games_public');
            });
        </script>
    {/if}
{/if}