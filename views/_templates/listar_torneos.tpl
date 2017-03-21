<div class="listar_torneos">
    <div class="clear"><br></div>
        {if $is_buscador_torneos}
        <form id="_buscador_torneos" class="text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                <label for="txt_bus_torneo" class="control-label">BUSCAR TORNEO</label>
                <input type="text" class="form-control" id="txt_bus_torneo"/>
            </div>
            <div class="clear"><br></div>
                
            {*<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 40px;"><span class="icon-cog"></span></div>
                <label for="sel_torneo_tipo" class="control-label">TIPO</label>
                <select class="form-control" id="sel_torneo_tipo">
                    <option value="" selected="">Todos</option>
                    {foreach from=$tipos_torneos item=tipo}
                        <option value="{$tipo}">{$tipo}</option>
                    {/foreach}
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="icon-camiseta"></span></div>
                <label for="txt_num_participantes" class="control-label">NÚMERO PARTICIPANTES</label>
                <input type="text" class="form-control numeric" id="txt_num_participantes" data-toggle="tooltip" data-placement="bottom" title="Torneos con participantes menores a este número"/>
            </div>
            <div class="clear"><br></div>*}
        </form>
    {/if}
    {if isset($tournaments)}
        <div id="_torneos_pagination" class="text-center">
            {foreach from=$tournaments item=torneo}
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-torneo">
                    <a class="link" href="{$_params.site}/torneos/tablero/publico_temp/{$torneo->codtournament}" style="text-decoration: none;">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong>{$torneo->name}</strong></p>
                            <div class="img_torneo">
                                {if isset($torneo->poster)}
                                    <img src="{$_params.site}/public{$torneo->poster}" accesskey="" alt="Imagen del torneo {$torneo->name}" title="Imagen del torneo {$torneo->name}"/>
                                {else}
                                    <img src="{$_params.site}/public/img/no_torneos.jpg" accesskey="" alt="Imagen del torneo {$torneo->name}" title="Imagen del torneo {$torneo->name}"/>
                                {/if}
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-cog" style="font-size: 20px;"></span>&nbsp;&nbsp;{$torneo->type}</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-camiseta" style="font-size: 20px;"></span>&nbsp;&nbsp;Participantes: {$torneo->numberparticipants}</p>
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
                    var paginatorneos = new PaginarTorneos("pagina_torneos", "_torneos_pagination", "_buscador_torneos", "{$_params.site}/torneo/search_torneos");
                });
            </script>
        {/if}
    {else}
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay torneos.</p>
            <br>
            <br>
            <br>
        </div>
    {/if}
    <br>
</div>