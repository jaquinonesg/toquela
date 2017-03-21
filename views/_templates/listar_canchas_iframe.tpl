{literal}
    <style>
        .listar_canchas .img_canchas{
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 170px;
            background-color: #E5E5E5;
        }

        .listar_canchas .img_canchas img{
            width: 100%;
        }

        .listar_canchas input, select{
            max-width: 300px;
            margin: 0px auto;
        }

        .listar_canchas .recuadro{
            overflow: hidden;
            position: relative;
            width: 300px;
            height: 250px;
            font-size:13px;
        }

        .listar_canchas .recuadro:hover{
            background-color: #1A2E3E;
            color: #FFFFFF;
        }
    </style>
{/literal}
<div class="listar_canchas">
    <div class="clear"><br></div>
        {if $is_buscador_canchas}
        <form id="_buscador_canchas" class="text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                <label for="txt_bus_canchas" class="control-label">BUSCAR COMPLEJO</label>
                <input type="text" class="form-control" id="txt_bus_canchas"/>
            </div>
            <div class="clear"><br></div>
        </form>
    {/if}
    {if isset($complex)}
        <div id="_canchas_pagination" class="text-center">
            {foreach from=$complex item=canchas}
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 container-canchas iframe-canchas">
                    <a class="link link-cancha" href="{$_params.site}/admin/canchas/agenda/{$canchas->codcomplex}/loadiframe?game={$codgame}" style="text-decoration: none;">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong>{$canchas->name}</strong></p>
                            <div class="img_canchas">
                                {if isset($canchas->poster)}
                                    <img src="{$_params.site}/{$canchas->poster}" accesskey="" alt="Imagen del canchas {$canchas->name}" title="Imagen del canchas {$canchas->name}"/>
                                {else}
                                    <img src="{$_params.site}/public/img/no_canchas.jpg" accesskey="" alt="Imagen del canchas {$canchas->name}" title="Imagen del canchas {$canchas->name}"/>
                                {/if}
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-cog" style="font-size: 20px;"></span>&nbsp;&nbsp;{$canchas->type}</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-camiseta" style="font-size: 20px;"></span>&nbsp;&nbsp;Participantes: {$canchas->numberparticipants}</p>
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
                    var paginarCanchasIframe = new PaginarCanchasIframe("pagina_canchas", "_canchas_pagination", "_buscador_canchas", "{$_params.site}/complejos/search_canchas");
                });
            </script>
        {/if}
    {else}
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay canchas.</p>
            <br>
            <br>
            <br>
        </div>
    {/if}
    <br>
</div>