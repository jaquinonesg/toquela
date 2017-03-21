<div class="mis_torneos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {include file=$_params.root|cat:"views/torneo/sections/slay_menu.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 torneos text-verde">
                </br><h4>TORNEOS</h4><span class="glyphicon" id="icon-camiseta"><img src="{$_params.site}/public/img/icons/camiseta.png"/></span>
                <div class="clear">
                    </br>
                    <a href="{$_params.site}/torneo/nuevo_torneo">
                        <button type="button" class="btn btn-default" id="nuevo_torneo" title="Nuevo Torneo">NUEVO TORNEO</button>
                    </a>
                    </br></br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    {$inter = true}
                    {$class_inter = "verde"}
                    {$class_collapse = "in"}
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
                                                    <a href="{$_params.site}/torneo/modificar_torneo/{$tournament->codtournament}" target="_blank">
                                                        <button type="button" class="btn btn-default" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                                    </a>
                                                    <a href="{$_params.site}/torneo/informacion_torneo/{$tournament->codtournament}" target="_blank">
                                                        <button type="button" class="btn btn-default" title="Información"><span class="glyphicon glyphicon-link"></span></button>
                                                    </a>
                                                    <a href="{$_params.site}/torneo/participantes/{$tournament->codtournament}" target="_blank">
                                                        <button type="button" class="btn btn-default" title="Asignar Participantes"><span class="glyphicon glyphicon-plus"></span></button>
                                                    </a>
                                                    {if $tournament->start == "" and $tournament->end == ""}    
                                                        <button type="button" class="btn btn-danger delete-torneo" data="{$tournament->codtournament}" title="Eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                                                    {/if}    

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
                </br>
            </div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>