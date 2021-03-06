<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="estadisticas">
    <script type="text/javascript">
        $(document).ready(function() {
            var estadisticas = new Estadisticas();
            estadisticas.init();
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {$menu_perfil = 5}
            {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
            <br>
            <span class="menu-estadistica">
                <ul class="nav nav-tabs">
                    <li class="text-center active" id="pes_general" style="width: 50%; cursor: pointer;"><a><strong>GENERAL</strong></a></li>
                    <li class="text-center" id="pes_torneos" style="width: 50%; cursor: pointer;"><a><strong>TORNEOS</strong></a></li>
                </ul>
            </span>
            <div id="contend-general">
                <div class="clear"><br></div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">GOLES MARCADOS</h2><br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center text-azul" style="position: relative; height: auto;">
                    <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-gol"></span></span>
                    <br>
                    <p style="font-size: 70px;">{$estadistica->goal}</p>
                    <p style="font-size: 25px;">Goles</p>
                    <br>
                </div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">TARJETAS</h2><br>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: auto;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-targetaamarilla"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$estadistica->yellow}</p>
                        <p style="font-size: 25px;">Tarjetas amarillas</p>
                        <br>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: auto;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-targetaroja"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$estadistica->red}</p>
                        <p style="font-size: 25px;">Tarjetas rojas</p>
                        <br>
                    </div>
                </div>
                <div class="clear"></div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">PARTIDOS</h2><br>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-pito"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$matches->totalplayed}</p>
                        <p style="font-size: 25px;">Partidos jugados</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-trophy"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$matches->totalwin}</p>
                        <p style="font-size: 25px;">Partidos ganados</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="glyphicon-thumbs-down" style="display: inline-table;margin-bottom: 4px;"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$matches->totallost}</p>
                        <p style="font-size: 25px;">Partidos perdidos</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-empate"></span></span>
                        <br>
                        <p style="font-size: 70px;">{$matches->totaldraw}</p>
                        <p style="font-size: 25px;">Partidos empatados</p>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="position: relative; height: auto;">
                    <button class="btn btn_blue_light" id="btn_mas_estadisticas">&nbsp;&nbsp;&nbsp;Ver mas estadisticas&nbsp;&nbsp;&nbsp;</button>
                </div>
                <div class="clear"><br></div>
            </div>
            <div id="contend-torneos" style="display: none;">
                <div class="clear"><br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {$inter = true}
                    {$class_inter = "verde"}
                    {$class_collapse = "collapse"}
                    {foreach from=$torneos name=foo item=torneo key=count}
                        {if $inter}
                            {$class_inter = "verde"}
                            {$inter = false}
                        {else}
                            {$class_inter = "azul"}
                            {$inter = true}
                        {/if}
                        <div class="panel panel-default {$class_inter}">
                            <div class="panel-heading">
                                <a class="accordion-toggle rango-torneo" style="display: inline-block;width: 49%;" data-toggle="collapse" torneo="{$torneo->codtournament}" index="{$count}" usuario="{$user->coduser}" data-parent="#accordion" href="#collapse_{$count}">
                                    <h4 class="panel-title" title="{$torneo->name}"><span class="glyphicon glyphicon-circle-arrow-right" id="glyphicon_{$count}"></span> &nbsp;&nbsp;{$torneo->name}</h4>
                                </a>
                                <div style="display: inline-block;width: 49%;" class="text-right">
                                    <button class="btn btn-primary btn-statistic-by-torneo" torneo="{$torneo->codtournament}" index="{$count}" usuario="{$user->coduser}">&nbsp;Mis estadísticas en este torneo&nbsp;</button>
                                </div>
                            </div>
                            <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                                <div class="panel-body" id="torneo_body_{$count}" style="padding-left: 25px; padding-top: 4px;">
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
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>
<div class="display_none">
    <span id="popup_mas_estadisticas">
        <!--div style="height: 300px;overflow-y: scroll;overflow-x: hidden;">
            <table class="table">
        {foreach from=$mas_estadisticas item=estadistica}
            <tr>
                <td>
                    <img class="img-thumbnail" src="{$_params.site}/public/files/icons_type_statistic/{$estadistica->icon}"/>&nbsp;&nbsp;{$estadistica->name}: &nbsp;&nbsp;{$estadistica->count}
                </td>
            </tr>
        {/foreach}
    </table>
</div-->
    </span>
    <span id="popup_estadisticas">
        <!--div class="contend-estadistica">
            <br>
            <br>
            <div class="text-center">
                <p>Cargando estadisticas...</p><br>
                <img class="loader-medium img-thumbnail" src="{$_params.site}/public/img/loader.gif"/>
            </div>
            <br>
            <br>
        </div-->
    </span>
</div>
