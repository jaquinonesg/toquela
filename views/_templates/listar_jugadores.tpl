<div class="listar_jugadores">
    <div class="clear"><br></div>
        {if $is_buscador_jugadores}
        <form id="_buscador_jugadores" class="text-center">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                <label for="txt_bus_jugador" class="control-label">BUSCAR JUGADOR</label>
                <input type="text" class="form-control" id="txt_bus_jugador"/>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
                <label for="sel_jugador_genero" class="control-label">GÉNERO</label>
                <select class="form-control" id="sel_jugador_genero">
                    <option value="" selected="">Todos</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Indefinido</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 40px;"><span class="icon-cancha"></span></div>
                <label for="sel_posicion_futbol" class="control-label">POSICIÓN</label>
                <select class="form-control" id="sel_posicion_futbol">
                    <option value="" selected="">Todas</option>
                    {foreach from=$posiciones item=posicion}
                        <option value="{$posicion.cod_virtues}">{$posicion.name}</option>
                    {/foreach}
                </select>
            </div>
            <div class="clear"><br></div>
        </form>
    {/if}
    {if isset($jugadores)}
        <div id="_jugadores_pagination" class="text-center">
            {foreach from=$jugadores item=jugador}
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 container-jugador">
                    <a class="link" href="{$_params.site}/perfil?cod={$jugador->coduser}" style="text-decoration: none;">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong>{$jugador->name} {$jugador->lastname}</strong></p>
                            <div class="img_jugador">
                                {if isset($jugador->photo)}
                                    <img src="{$_params.site}/{$jugador->photo}" accesskey="" alt="" title=""/>
                                {else}
                                    <img src="{$_params.site}/public/img/no_user_image.jpg" accesskey="" alt="" title=""/>
                                {/if}
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-users" style="font-size: 16px;"></span>&nbsp;&nbsp;{$jugador->sex}</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-titular" style="font-size: 20px;"></span>&nbsp;&nbsp;{$jugador->positiongame}</p>
                        </div>
                    </a>
                    <br><br>
                </div>
            {/foreach}
            {if $is_paginator}
                <div class="clear"></div>
                {$htmlpaginator}
            {/if}
        </div>
        {if $init_js_paginator}
            <script type="text/javascript">
                $(document).ready(function() {
                   var paginajugadores = new PaginarJugadores("pagina_jugadores", "_jugadores_pagination", "_buscador_jugadores", "{$_params.site}/jugadores/paginajugadores");
                });
            </script>
        {/if}
    {else}
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay jugadores.</p>
            <br>
            <br>
            <br>
        </div>
    {/if}
    <br>
</div>