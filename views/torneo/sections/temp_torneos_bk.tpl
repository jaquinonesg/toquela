<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="mis_torneos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-trophy" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TORNEOS</strong></h4>
            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                {$inter = true}
                {$class_inter = "verde"}
                {$class_collapse = "in"}
                {if isset($tournaments)}
                    {foreach from=$tournaments name=foo item=tournament key=count}
                        {if $inter}
                            {$class_inter = "verde"}
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
                                    <h4 class="panel-title" title="{$tournament->name}">{$tournament->name}</h4>
                                </div>
                            </a>
                            <div id="collapse_{$count}" class="panel-collapse {$class_collapse}" style="height: auto;">
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tipo</th>
                                                <th>Descripción</th>
                                                <th>Num participantes</th>
                                                <th class="tabla-acciones">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tabla-acciones">
                                                <td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{$tournament->type}</td>
                                                <td>{$tournament->description}</td>
                                                <td>{$tournament->numberparticipants}</td>
                                                <td>
                                                    <a href="{$_params.site}/torneos/tablero/publico_temp/{$tournament->codtournament}">
                                                        <button type="button" class="btn btn-default" title="Enlace publico."><span class="glyphicon glyphicon-globe"></span></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                {else}
                    <p>En este momento no hay torneos vigentes.</p>
                {/if}
            </div>
            </br>
        </div>
        <div class="clear"></br></div>
    </div>
</div>