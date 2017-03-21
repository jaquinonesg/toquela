<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
{$menu_perfil = 7} 
{include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
<div class="configurar">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-cog" style="font-size: 30px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>CONFIGURAR TORNEO</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {if isset($has_matches)}
                <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Información</p></div>
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <p style="font-size: 15px;">
                        <strong>Tenga en cuenta que ya se ha configurado el torneo!</strong> si vuelve a generar o modificar información, podría perder la configuración almacenada anteriormente. 
                        <a href="{$_params.site}/torneos/calendario/index/?torn={$tournament->codtournament}">Ir al calendario</a>
                    </p>
                </div>
            </div>
            {/if}
            {if $error_number == 1}
            <div class="alert alert-warning">
                Debe terminar de completar todos los equipos que participaran en el torneo. 
                <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
                    Click aquí
                </a>
            </div>
            {else if $error_number == 2}
            <div class="alert alert-danger">
                <p>La configuración de este torneo no se puede realizar surgió un error en la carga de los datos.</p>
            </div>
            {else}
            {if $type_tournament == 1}
            <script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario.js"></script>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="clear"></br></div>
                <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Sistema eliminación directa</p></div>
                <br/>
                <a href="{$_params.site}/torneos/calendario/index/?torn={$tournament->codtournament}">
                    <button class="btn btn-default">&nbsp;Volver al Calendario&nbsp;</button>
                </a>
                {if isset($tablero_torneo)}
                {if $ismatches}
                {if $reconfig}
                <button class="btn btn-default" id="re_config_elimin" data-code="{$tournament->codtournament}">&nbsp;Modificar&nbsp;</button>
                {/if}
                <div class="clear"></br></div>
                {$tablero_torneo}
                {else}
                <button class="btn btn-default" id="order_eliminatoria" data-code="{$tournament->codtournament}">&nbsp;Orden aleatorio&nbsp;</button>
                <div class="clear"></br></div>
                {$tablero_torneo}
            </br>
            <button class="btn btn-default" id="save_calendar_eliminatoria" data-code="{$tournament->codtournament}">&nbsp;&nbsp; GUARDAR &nbsp;&nbsp;</button>
            {/if}
            {else}
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Hubo un error en la generación del torneo por eliminatoria.</p>
                <p>El número de equipos debe ser multiplo de 4 para poder organizar el torneo por eliminación directa...</p>
            </div>
            {/if}
        </div>
        {elseif $type_tournament == 2}
        <script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/gruposeliminatoria.js"></script>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </br>
        <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Sistema Grupos y Eliminación directa</p></div>
        <br/>
        <div class="alert alert-danger hide" id="error_save">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span></span>
        </div>
        <div class="alert alert-success hide" id="success_save">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span></span>
        </div>
    </div>
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button class="btn btn-default" id="btn_gen_ge" code="{$tournament->codtournament}" numgr="{$config_ge->grupos}" numpargr="{$config_ge->participantes}">Generar al azar</button>
        <!--button class="btn btn-default" id="btn_gen_elimin" code="{$tournament->codtournament}" numgr="{$config_ge->grupos}" numpargr="{$config_ge->participantes}">Generar Eliminatoria</button-->
    </div>
    <div class="clear"></br></div>
    <input type="hidden" value="1" name="type_system" id="typesystem">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <b>Total Participantes: {count($teams)}</b>
        <span class="glyphicon"><img src="{$_params.site}/public/img/icons/jornadas.png" /></span>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <b>Participantes por grupo: {$config_ge->participantes}</b>
        <span class="glyphicon"><img src="{$_params.site}/public/img/icons/resultados.png" /></span>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            <div>Grupos: <b id="number_rounds" number-teams="{count($teams)}">{$config_ge->grupos}</b></div>
            <span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor">
        <div id="calendardata">
            {$html_fase_grupos}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <div id="contend-elimin">
            {$html_fase_eliminatoria}
        </div>
    </br>
    <button class="btn btn-default" id="save_ge" data-code="{$tournament->codtournament}" numgr="{$config_ge->grupos}" numpargr="{$config_ge->participantes}">
        &nbsp;&nbsp; GUARDAR &nbsp;&nbsp;
    </button>
</div>
{elseif $type_tournament == 3}
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario.js"></script>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
</br>
<div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Sistema de todos contra todos</p></div>
<br/>
<div class="alert alert-danger hide" id="error_save">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    <span></span>
</div>
<div class="alert alert-success hide" id="success_save">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    <span></span>
</div>
</div>
<div class="clear"></br></div>
<form  role="form">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button class="btn btn-default" id="generate" data-code="{$tournament->codtournament}">Generar calendario al azar</button>
    </div>
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_1">
            <input type="radio" name="type_system" value="1" id="type_1" checked=""> Solo ida
            <span class="glyphicon"><img src="{$_params.site}/public/img/icons/jornadas.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            {if count($teams)<31}
            <input type="radio" name="type_system" value="2" id="type_2"> Ida y vuelta
            {/if}
            <span class="glyphicon"><img src="{$_params.site}/public/img/icons/resultados.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            <div>Jornadas : <b id="number_rounds" number-teams="{count($teams)}">{count($teams)}</b></div>
            <span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora.png" /></span>
        </label>
    </div>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    <div id="calendar"></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
</br>
<button class="btn btn-default" id="save_calendar" data-code="{$tournament->codtournament}">
    &nbsp;&nbsp; GUARDAR &nbsp;&nbsp;
</button>
</div>
{elseif $type_tournament == 4}
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/personalizado.js"></script>
<!--  display none -->
<div class="display_none">
    <span id="popup_crear_fase_body">
                <!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 20px;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-record resalta"></span>&nbsp;Escoger tipo de fase.</p>
                    <div style="margin-left: 20px;">
                        <button class="btn tipo_de_fase" id="btn_por_grupos">Por grupos</button>&nbsp;&nbsp;
                        <button class="btn tipo_de_fase" id="btn_por_eliminacion">Por Eliminación</button>
                    </div>
                    </div>
                    <div id="contend_por_grupos">
                    <div class="div-title-torneo" style="margin-left: 0;">
                    <p style="font-size: 20px;text-align: center;">Fase por grupos</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 20px;margin-bottom: 0px;margin-top: 10px;"><span class="glyphicon glyphicon-record resalta"></span>&nbsp;Ingresar numero de grupos.</p>
                    <div id="mensaje_crear_fase">
                    </div>
                        <br>
                        <div style="margin-left: 20px;">
                        <input type="text" class="form-control" id="num_grupos" style="width: 150px; display: inline-block;" maxlength="2" onkeypress="validate.validateInsertNumeric()" placeholder="Número de grupos"/><br>
                        <div class="radio">
                            <label>
                                <input type="radio" class="_idavuelta" name="idavuelta" value="0" checked>
                                Ida
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" class="_idavuelta" name="idavuelta" value="1">
                                Ida y vuelta
                            </label>
                        </div>
                        </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <button class="btn btn-primary btn_crear_fase" id="btn_generar_por_grupos" style="float: right; margin-right: 36px;"><span class="glyphicon glyphicon-chevron-right resalta"></span>&nbsp;Generar Configuración</button>
                        </div>
                        <span id="config_por_grupos">
                        </span>
                    </div>
                    <div id="contend_por_eliminacion" style="display: none">
                        <div class="div-title-torneo" style="margin-left: 0;">
                            <p style="font-size: 20px;text-align: center;">Por eliminación</p>
                        </div>
                        <p style="font-size: 20px;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-record resalta"></span>&nbsp;Escoger número de equipos.</p>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="contend_rango_select">
                        </div>
                    </div-->
                </span>
                <span id="popup_crear_fase_footer">
                    <!--div id="mensaje_generar_fase" class="text-left">
                        </div>
                        <button type="button" class="btn btn-default" id="btn_save_fase">Guardar fase</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button-->
                        </span>
                    </div>
                    <!--  display none -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    </br>
                    <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center" style="font-size: 20px;">Sistema Personalizado</p></div>
                    <br/>
                    <input type="hidden" id="num_participantes" value="{$tournament->numberparticipants}">
                    <input type="hidden" id="_torneo" value="{$tournament->codtournament}">
                    <input type="hidden" id="_fase" value="{$num_fases}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 18px;margin-bottom: 10px;" class="text-center"><span class="glyphicon glyphicon-record resalta"></span>&nbsp;Aquí puede crear una fase para el torneo.</p>
                    <center>
                    <button class="btn btn-primary btn_crear_fase" id="btn_crear_fase" code="{$tournament->codtournament}" ><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Crear Fase</button>
                    </center>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!-- {include file=$_params.root|cat:"views/_templates/info_config_calendario.tpl"} -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="contend-fases">
                        <div class="clear"></br></div>
                        {if isset($fases)}
                        <div class="text-center div-title-torneo" style="margin-left: 0; margin-bottom: 10px;"><p style="font-size: 20px;">Fases creadas<p></div>
                        {foreach from=$fases item=fase key=index}
                        <div class="fase-config">
                            <div class="panel-group" id="accordion-fase-{$index}">
                                <div class="panel panel-default panel-categoria">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle btn_config_fase tmp-grupo-menu" data-toggle="collapse" data-parent="#accordion-fase-{$index}" href="#collapse-{$index}" torneo="{$tournament->codtournament}" fase="{$fase->number}">
                                                <span class="glyphicon icon-cog"></span>&nbsp;&nbsp;Configurar {$fase->name}&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-{$index}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div id="contend_fase_{$fase->number}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--                         <br>
                            <p>
                                <button class="btn btn-default btn_config_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}">Configurar {$fase->name}</button>
                                <button class="btn btn-default btn_config_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}">Configurar {$fase->name}</button>
                            </p>
                            <br>
                            <div id="contend_fase_{$fase->number}">
                            </div> -->
                        </div>
                        {/foreach}
                        {/if}
                        <div class="clear"></br></div>
                    </div>
                </div>
                <div class="clear"></br></div>
                {/if}
                {/if}
            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
    </div>
