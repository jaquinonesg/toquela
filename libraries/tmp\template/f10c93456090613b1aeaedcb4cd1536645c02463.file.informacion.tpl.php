<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 11:37:46
         compiled from "/var/www/toquela/modules/torneos/views/calendario/sections/informacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4575551075625080de0ae52-73846298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f10c93456090613b1aeaedcb4cd1536645c02463' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/calendario/sections/informacion.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4575551075625080de0ae52-73846298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5625080df0edc4_49880180',
  'variables' => 
  array (
    '_params' => 0,
    'menu_perfil' => 0,
    'round' => 0,
    'matches' => 0,
    'match' => 0,
    'class_program' => 0,
    'key' => 0,
    'result_aux' => 0,
    'complex' => 0,
    'c' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5625080df0edc4_49880180')) {function content_5625080df0edc4_49880180($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/calendario.js"></script>
<div class="informacion">
    <?php echo $_smarty_tpl->tpl_vars['menu_perfil']->value==4;?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init div-contenedor-partidos">
        <div class="clear"></br></div>
        <h4 class="text-verde"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;<strong>GRUPO <?php echo $_smarty_tpl->tpl_vars['round']->value;?>
</strong></h4>
        <br>
        <a href="#" target="_blank"></a>
        <?php $_smarty_tpl->tpl_vars['config_calendar'] = new Smarty_variable(true, null, 0);?>
        <!-- <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->
        <table class="table table-responsive table-hover" id="info_round">
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['matches']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['match']->key;
?>
                    <?php $_smarty_tpl->tpl_vars['class_program'] = new Smarty_variable("titulo-calendar", null, 0);?>
                    <?php if (empty($_smarty_tpl->tpl_vars['match']->value->date)||empty($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                        <?php $_smarty_tpl->tpl_vars['class_program'] = new Smarty_variable("titulo-calendar-noprogramdo", null, 0);?>
                    <?php }?>
                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class_program']->value;?>
">
                        <td>
                            <div class="contador-partido"># <?php echo ($_smarty_tpl->tpl_vars['key']->value+1);?>
</div>
                            <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['match']->value->local->name;?>
</p>
                        </td>
                        <td class="resultado" style="vertical-align: middle" title="R: Resultado parcial del partido">
                            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                            <?php if ($_smarty_tpl->tpl_vars['match']->value->scorelocal<0){?>
                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorelocal, null, 0);?>
                            <?php }?>
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <input type="text" class="form-control result_match input-resultado" name="result_team1" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled" readonly="readonly"/>
                            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                            <?php if ($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0){?>
                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorevisitant, null, 0);?>
                            <?php }?>
                            <input type="text" class="form-control result_match input-resultado" name="result_team2" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamvisitant;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled" readonly="readonly"/>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </td>
                        <td>
                            <p class="text-left"><?php echo $_smarty_tpl->tpl_vars['match']->value->visitant->name;?>
</p>
                        </td>
                    </tr>
                    <tr class="info-calendar" data-match="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" codlocal="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
" codvisitante="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
">
                        <td colspan="2" class="contain-time" style="vertical-align: middle">
                            <div class="form-group">
                                <p class="text-left">Fecha y hora del partido: </p>
                                <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p" title="<?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
" data-link-field="dtp_input<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <input class="form-control" size="16" type="text" value="<?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
" readonly name="date"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" name="date_time_hid" id="dtp_input<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
"/>
                                <br>
                                <p class="text-left">Lugar: </p>
                                <textarea class="form-control" maxlength="150" name="descriptionplace" placeholder="Lugar (Nombre lugar, direccíon, barrio, cancha, información adicional)" rows="4"><?php echo $_smarty_tpl->tpl_vars['match']->value->descriptionplace;?>
</textarea>
                            </div>
                        </td>
                        <td class="contain-selects" style="text-align: left;">
                            <div class="form-group">
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="margin: 0; padding: 0;">
                                    <p><a href='<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/complejos/' target='_blank'>Cancha: </a>
                                        <button type="button" class="btn btn-lg btn-default popover-dismiss btn-help" style="margin-top: -6px;" data-toggle="popover" data-placement="top" title="<a href='<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/complejos/' target='_blank'>Complejos Tóquela</a>" data-content="Aquí puede seleccionar complejos que están registrados en tóquela, estos tienen canchas que podrá asignar al partido <a href='<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/complejos/' target='_blank'>VER COMPLEJOS</a>.">
                                            <span class="glyphicon glyphicon-question-sign"></span>
                                        </button>
                                    </p>
                                    <select class="form-control selectpicker" name="complex">
                                        <option value="1">Sin cancha</option>
                                        <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['complex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['c']->value->codcomplex!=1){?>
                                                <?php if ($_smarty_tpl->tpl_vars['c']->value->codcomplex==$_smarty_tpl->tpl_vars['match']->value->codcomplex){?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->codcomplex;?>
" selected=""><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->codcomplex;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</option>
                                                <?php }?>
                                            <?php }?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin: 0; padding: 0; padding-left: 4px; text-align: center;">
                                    <p><strong>J</strong>ornada: </p>
                                    <input class="form-control numeric" title="Jornada" style="width: 40px; display: inline-block;" name="jornada" type="text" value="<?php echo $_smarty_tpl->tpl_vars['match']->value->numjornada;?>
" maxlength="3"/>        
                                </div>
                                <div class="clear"><br></div>
                                <p class="text-left">Arbitros, veedores o encargados:</p>
                                <textarea class="form-control" maxlength="150" name="arbitros" placeholder="Arbitros, veedores o encargados" rows="4"><?php echo $_smarty_tpl->tpl_vars['match']->value->arbitros;?>
</textarea>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <tbody>
        </table>
        <div class="btns-static-flotante" style="display: none">
                <button class="btn btn-default button_save_round">&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    <button class="btn btn-default">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
                </a>
        </div>
        <div class="btns-aparezcan" style="display: none">
            <button class="btn btn-default button_save_round">&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;</button>
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                <button class="btn btn-default">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
            </a>
        </div>
        <input type="hidden" id="rel" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
"/>
        <br>
        <div class="alert alert-info hide" id="sucess_round"></div>
        <div class="alert alert-danger hide" id="danger_round"></div>
        <div class="clear"></br></div>
    </div>
</div><?php }} ?>