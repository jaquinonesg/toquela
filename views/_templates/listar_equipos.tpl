{if !$sololista}
    <div class="clear"><br></div>
    <div class="contend_equipos list_equipos" panel="equipo">
        {if $if_crear_equipo}
            <div class="text-left">
                <a href="{$_params.site}/equipos/crear-equipo/">
                    <button type="button" class="btn btn_blue_light" style="width: 160px; height: 50px;">&nbsp;&nbsp;&nbsp;CREAR EQUIPO&nbsp;&nbsp;&nbsp;</button>
                </a>
                <div class="clear"><br></div>
            </div>
        {/if}
        {if $is_buscador_equipo}
            <form id="_buscador_equipo">
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

    {if isset($teams)}
        {if !$sololista}
            <div id="_equipos_pagination">
            {/if}
            <div class="maq_equipos" id="_contend_equipos">
                {foreach from=$teams item=team}
                    {$url = $team->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($team->name)}
                    {$urlimg = ""}
                    {if is_null($team->image) eq true}
                        {$urlimg = $_params.site|cat:"/public/img/fotoequipo.jpg"}
                    {else}
                        {$urlimg = $_params.site|cat:"/public"|cat:$team->image} 
                    {/if}
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-equipo">
                        {if $onlyperfil}
                            <a class="link" href="{$_params.site}/equipos/perfil-equipo/{$url}" style="text-decoration: none;">
                            {else}
                                {if ($team->status == 'CREATOR')||($team->status == 'CAPTAIN')}
                                    <a class="link" href="{$_params.site}/equipos/editar-equipo/{$url}" style="text-decoration: none;">
                                    {else} 
                                        <a class="link" href="{$_params.site}/equipos/perfil-equipo/{$url}" style="text-decoration: none;">
                                        {/if}
                                    {/if}
                                    <div class="recuadro">
                                        <div class="img_equipo">
                                            <img src="{$urlimg}" accesskey="" alt="{$team->description}" title="{$team->description}"/>
                                        </div>
                                        <h3 style="font-size:15px;"><strong>{$team->name}</strong></h3>
                                        <br>
                                        <p class="text-left" style="margin-left: 5px;"><span class="icon-guayo" style="font-size: 20px;"></span>&nbsp;&nbsp;{$team->futboltype}</p>
                                        <p class="text-left" style="margin-left: 5px;"><span class="icon-titular" style="font-size: 20px;"></span>&nbsp;&nbsp;{$team->tipo}</p>
                                        <br>
                                        {if !$onlyperfil}
                                            {if ($team->status == 'CREATOR')||($team->status == 'CAPTAIN')}
                                                <div class="text-right" style="position: absolute; width: 100%; bottom: 35px; right: 35px;">
                                                    <span class="icon-cog" style="font-size: 25px;"></span>
                                                </div>
                                            {/if}
                                        {/if}
                                    </div>
                                </a>
                                </div>
                            {/foreach}
                        {else}
                            <br>
                            <br>
                            <br>
                            <p>En este momento no hay equipos.</p>
                        {/if}
                        </div>
                        {if $verpaginator}
                            <div class="clear text-center">
                                {$htmlpaginator}
                            </div>
                        {/if}
                        {if !$sololista} 
                            </div>
                            <div class="clear"><br></div>
                            </div>
                            {if $verpaginator}
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var paginaequipos = new PaginarEquipos("pagina_equipos", "_equipos_pagination", "_buscador_equipo", "{$_params.site}/equipos/paginaequipos");
                                    });
                                </script>
                            {/if}
                        {/if}