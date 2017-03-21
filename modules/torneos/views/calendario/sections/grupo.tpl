<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario.js"></script>
<div class="configurar">
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="clear"></br></div>
            <h4 class="text-verde">CONFIGURAR CALENDARIO DEL GRUPO {$number_group} DEL TORNEO "{$tournament->name|upper}"</h4>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="clear"></br></div>

                <div class="panel-collapse">

                    <div class="alert alert-danger hide" id="error_save">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span></span>
                    </div>
                    <div class="alert alert-success hide" id="success_save">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span></span>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="border-top: 0px;">Grupo {$number_group}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$group item=team}
                                <tr data-team="{$team->codteam}">
                                    <td>
                                        {$team->name}
                                    </td>
                                </tr>
                            {/foreach}
                            <tr data-team="{$team->codteam}">
                                <td>
                                    <button class="btn btn-default" id="generate_calendar_group" data-tournament="{$tournament->codtournament}" data-number="{$number_group}">
                                        Generar calendario del grupo {$number_group}
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="calendar_generator_group"></div>
                </div>

                <div>
                    <button class="btn btn-default" id="save_calendar_group" data-group="{$number_group}" data-rounds="{count($group) - 1}" data-code="{$tournament->codtournament}">Guardar calendario</button>
                    <a href="{$_params.site}/torneos/calendario/configurar/{$tournament->codtournament}">
                        <button class="btn btn-link">Volver a selección de grupos</button>
                    </a>
                </div>

            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>