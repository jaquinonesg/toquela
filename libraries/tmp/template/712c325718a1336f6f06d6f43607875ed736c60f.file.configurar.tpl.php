<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 12:30:16
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\calendario\sections\configurar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:247935554b6f9dfb401-18412847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '712c325718a1336f6f06d6f43607875ed736c60f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\calendario\\sections\\configurar.tpl',
      1 => 1433176270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '247935554b6f9dfb401-18412847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b6fa11ec92_51776846',
  'variables' => 
  array (
    '_params' => 0,
    'has_matches' => 0,
    'tournament' => 0,
    'error_number' => 0,
    'type_tournament' => 0,
    'tablero_torneo' => 0,
    'ismatches' => 0,
    'reconfig' => 0,
    'config_ge' => 0,
    'teams' => 0,
    'html_fase_grupos' => 0,
    'html_fase_eliminatoria' => 0,
    'num_fases' => 0,
    'fases' => 0,
    'index' => 0,
    'fase' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b6fa11ec92_51776846')) {function content_5554b6fa11ec92_51776846($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(7, null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <?php if (isset($_smarty_tpl->tpl_vars['has_matches']->value)){?>
                <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Información</p></div>
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <p style="font-size: 15px;">
                        <strong>Tenga en cuenta que ya se ha configurado el torneo!</strong> si vuelve a generar o modificar información, podría perder la configuración almacenada anteriormente. 
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">Ir al calendario</a>
                    </p>
                </div>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['error_number']->value==1){?>
            <div class="alert alert-warning">
                Debe terminar de completar todos los equipos que participaran en el torneo. 
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/participantes/index/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    Click aquí
                </a>
            </div>
            <?php }elseif($_smarty_tpl->tpl_vars['error_number']->value==2){?>
            <div class="alert alert-danger">
                <p>La configuración de este torneo no se puede realizar surgió un error en la carga de los datos.</p>
            </div>
            <?php }else{ ?>
            <?php if ($_smarty_tpl->tpl_vars['type_tournament']->value==1){?>
            <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/calendario.js"></script>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="clear"></br></div>
                <div class="div-title-torneo" style="margin-left: 0;margin-bottom: 10px;"><p class="text-center"style="font-size: 20px;">Sistema eliminación directa</p></div>
                <br/>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    <button class="btn btn-default">&nbsp;Volver al Calendario&nbsp;</button>
                </a>
                <?php if (isset($_smarty_tpl->tpl_vars['tablero_torneo']->value)){?>
                <?php if ($_smarty_tpl->tpl_vars['ismatches']->value){?>
                <?php if ($_smarty_tpl->tpl_vars['reconfig']->value){?>
                <button class="btn btn-default" id="re_config_elimin" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">&nbsp;Modificar&nbsp;</button>
                <?php }?>
                <div class="clear"></br></div>
                <?php echo $_smarty_tpl->tpl_vars['tablero_torneo']->value;?>

                <?php }else{ ?>
                <button class="btn btn-default" id="order_eliminatoria" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">&nbsp;Orden aleatorio&nbsp;</button>
                <div class="clear"></br></div>
                <?php echo $_smarty_tpl->tpl_vars['tablero_torneo']->value;?>

            </br>
            <button class="btn btn-default" id="save_calendar_eliminatoria" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">&nbsp;&nbsp; GUARDAR &nbsp;&nbsp;</button>
            <?php }?>
            <?php }else{ ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Hubo un error en la generación del torneo por eliminatoria.</p>
                <p>El número de equipos debe ser multiplo de 4 para poder organizar el torneo por eliminación directa...</p>
            </div>
            <?php }?>
        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['type_tournament']->value==2){?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/gruposeliminatoria.js"></script>
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
        <button class="btn btn-default" id="btn_gen_ge" code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" numgr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->grupos;?>
" numpargr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->participantes;?>
">Generar al azar</button>
        <!--button class="btn btn-default" id="btn_gen_elimin" code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" numgr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->grupos;?>
" numpargr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->participantes;?>
">Generar Eliminatoria</button-->
    </div>
    <div class="clear"></br></div>
    <input type="hidden" value="1" name="type_system" id="typesystem">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <b>Total Participantes: <?php echo count($_smarty_tpl->tpl_vars['teams']->value);?>
</b>
        <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/jornadas.png" /></span>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <b>Participantes por grupo: <?php echo $_smarty_tpl->tpl_vars['config_ge']->value->participantes;?>
</b>
        <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/resultados.png" /></span>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            <div>Grupos: <b id="number_rounds" number-teams="<?php echo count($_smarty_tpl->tpl_vars['teams']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['config_ge']->value->grupos;?>
</b></div>
            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/fecha_hora.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor">
        <div id="calendardata">
            <?php echo $_smarty_tpl->tpl_vars['html_fase_grupos']->value;?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <div id="contend-elimin">
            <?php echo $_smarty_tpl->tpl_vars['html_fase_eliminatoria']->value;?>

        </div>
    </br>
    <button class="btn btn-default" id="save_ge" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" numgr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->grupos;?>
" numpargr="<?php echo $_smarty_tpl->tpl_vars['config_ge']->value->participantes;?>
">
        &nbsp;&nbsp; GUARDAR &nbsp;&nbsp;
    </button>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['type_tournament']->value==3){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/calendario.js"></script>
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
        <button class="btn btn-default" id="generate" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">Generar calendario al azar</button>
    </div>
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_1">
            <input type="radio" name="type_system" value="1" id="type_1" checked=""> Solo ida
            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/jornadas.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            <?php if (count($_smarty_tpl->tpl_vars['teams']->value)<31){?>
            <input type="radio" name="type_system" value="2" id="type_2"> Ida y vuelta
            <?php }?>
            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/resultados.png" /></span>
        </label>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
        <label for="type_2">
            <div>Jornadas : <b id="number_rounds" number-teams="<?php echo count($_smarty_tpl->tpl_vars['teams']->value);?>
"><?php echo count($_smarty_tpl->tpl_vars['teams']->value);?>
</b></div>
            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/fecha_hora.png" /></span>
        </label>
    </div>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    <div id="calendar"></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
</br>
<button class="btn btn-default" id="save_calendar" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
    &nbsp;&nbsp; GUARDAR &nbsp;&nbsp;
</button>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['type_tournament']->value==4){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/personalizado.js"></script>
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
                    <input type="hidden" id="num_participantes" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->numberparticipants;?>
">
                    <input type="hidden" id="_torneo" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    <input type="hidden" id="_fase" value="<?php echo $_smarty_tpl->tpl_vars['num_fases']->value;?>
">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 18px;margin-bottom: 10px;" class="text-center"><span class="glyphicon glyphicon-record resalta"></span>&nbsp;Aquí puede crear una fase para el torneo.</p>
                    <center>
                    <button class="btn btn-primary btn_crear_fase" id="btn_crear_fase" code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" ><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Crear Fase</button>
                    </center>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!-- <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_config_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="contend-fases">
                        <div class="clear"></br></div>
                        <?php if (isset($_smarty_tpl->tpl_vars['fases']->value)){?>
                        <div class="text-center div-title-torneo" style="margin-left: 0; margin-bottom: 10px;"><p style="font-size: 20px;">Fases creadas<p></div>
                        <?php  $_smarty_tpl->tpl_vars['fase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fase']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fase']->key => $_smarty_tpl->tpl_vars['fase']->value){
$_smarty_tpl->tpl_vars['fase']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['fase']->key;
?>
                        <div class="fase-config">
                            <div class="panel-group" id="accordion-fase-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
                                <div class="panel panel-default panel-categoria">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle btn_config_fase tmp-grupo-menu" data-toggle="collapse" data-parent="#accordion-fase-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" href="#collapse-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">
                                                <span class="glyphicon icon-cog"></span>&nbsp;&nbsp;Configurar <?php echo $_smarty_tpl->tpl_vars['fase']->value->name;?>
&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div id="contend_fase_<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--                         <br>
                            <p>
                                <button class="btn btn-default btn_config_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">Configurar <?php echo $_smarty_tpl->tpl_vars['fase']->value->name;?>
</button>
                                <button class="btn btn-default btn_config_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">Configurar <?php echo $_smarty_tpl->tpl_vars['fase']->value->name;?>
</button>
                            </p>
                            <br>
                            <div id="contend_fase_<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">
                            </div> -->
                        </div>
                        <?php } ?>
                        <?php }?>
                        <div class="clear"></br></div>
                    </div>
                </div>
                <div class="clear"></br></div>
                <?php }?>
                <?php }?>
            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
    </div>
<?php }} ?>