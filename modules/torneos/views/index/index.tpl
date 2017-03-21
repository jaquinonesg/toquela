<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="mis_torneos torneos">
    {if isset($tournament)}
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    {/if}
<!--     <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-btn-back-torneos">
        <a onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<span class="back">Ir atrás<span></a>
    </div> -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <a href="{$_params.site}/torneos/index/nuevo_torneo">
                <button type="button" class="btn btn-primary btn-crear-torneo" id="nuevo_torneo" title="Nuevo Torneo"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;CREAR TORNEO</button>
            </a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title"><strong>{$titulo}</strong></p>
        </div>
    </div>
    {if $rol == 'admin'}
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor acor-toneos" id="accordion">
            {$inter = true}
            {$class_inter = "verde"}
            {$class_collapse = "in"}
            {foreach from=$tournaments name=foo item=tournament key=count}
            {if $inter}
            {$class_inter = "azul"}
            {$inter = false}
            {else}
            {$class_inter = "azul"}
            {$inter = true}
            {/if}
            {if $smarty.foreach.foo.first} 
            {$class_collapse = "in"}
            {else}
            {$class_collapse = "collapse"}
            {/if}
            <div class="panel panel-default {$class_inter}">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$count}">
                    <div class="panel-heading">
                        <img src="{$_params.site}/public/img/icons/icon_torneo.png">
                        <span class="title-dos">{$tournament->name}</span>
                    </div>
                </a>
                <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="border-top: 0px;">Tipo</th>
                                    <th style="border-top: 0px;">Descripción</th>
                                    <th style="border-top: 0px;">Num participantes</th>
                                    <th class="tabla-acciones">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tabla-acciones">
                                    <td class="text-center"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{$tournament->type}</td>
                                    <td class="text-center">{$tournament->description}</td>
                                    <td class="text-center">{$tournament->numberparticipants}</td>
                                    <td class="text-center">
                                        <a href="{$_params.site}/torneos/index/modificar_torneo/{$tournament->codtournament}">
                                            <button type="button" class="btn btn-primary ir-torneo" title="Editar">Ir al torneo</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
    {else}

    <!-- ------------------------------------------------------------------------ -->
                            <!-- torneos maestro -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor acor-toneos" id="accordion">
            {foreach from=$tournaments name=foo item=tournament key=count}
            <div class="panel panel-default azul">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$count}">
                    <div class="panel-heading">
                        <span class="glyphicon icon-user resalta" style="font-size: 16px;"></span>
                        <span class="title-dos">{$tournament->nombre}</span>
                    </div>
                </a>
                <div id="collapse_{$count}" class="panel-collapse collapse" style="height: auto; padding-right: 15px;padding-left: 15px;margin-top: 15px;margin-bottom: 15px;">
                    {foreach from=$tournament->torneos item=torneo key=hcount}
                    <div class="panel azul">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_d" href="#collapse_{$count}{$hcount}">
                            <div class="panel-heading">
                                <img src="{$_params.site}/public/img/icons/icon_torneo.png">
                                <span class="title-dos">{$torneo->name}</span>
                            </div>
                        </a>
                        <div id="collapse_{$count}{$hcount}" class="panel-collapse collapse in" style="height: auto;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="border-top: 0px;">Tipo</th>
                                            <th style="border-top: 0px;">Descripción</th>
                                            <th style="border-top: 0px;">Num participantes</th>
                                            <th class="tabla-acciones">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tabla-acciones">
                                        <td class="text-center"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{$torneo->type}</td>
                                            <td class="text-center">{$torneo->description}</td>
                                            <td class="text-center">{$torneo->numberparticipants}</td>
                                            <td class="text-center">
                                                <a href="{$_params.site}/torneos/index/modificar_torneo/{$torneo->codtournament}">
                                                    <button type="button" class="btn btn-primary ir-torneo" title="Editar">Ir al torneo</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
            {/foreach}
        </div>
    </div>

    {/if}
</div>