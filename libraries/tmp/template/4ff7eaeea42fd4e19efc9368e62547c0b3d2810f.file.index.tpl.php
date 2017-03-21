<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:32:08
         compiled from "C:\xampp\htdocs\html\coparevistastage\modules\torneos\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18260563041b8beb116-39751485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ff7eaeea42fd4e19efc9368e62547c0b3d2810f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\modules\\torneos\\views\\index\\index.tpl',
      1 => 1443927643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18260563041b8beb116-39751485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'titulo' => 0,
    'rol' => 0,
    'tournaments' => 0,
    'inter' => 0,
    'class_inter' => 0,
    'count' => 0,
    'class_collapse' => 0,
    'hcount' => 0,
    'torneo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041b8d5a460_48047205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041b8d5a460_48047205')) {function content_563041b8d5a460_48047205($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="mis_torneos torneos">
    <?php if (isset($_smarty_tpl->tpl_vars['tournament']->value)){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
<!--     <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-btn-back-torneos">
        <a onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<span class="back">Ir atrás<span></a>
    </div> -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index/nuevo_torneo">
                <button type="button" class="btn btn-primary btn-crear-torneo" id="nuevo_torneo" title="Nuevo Torneo"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;CREAR TORNEO</button>
            </a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title"><strong><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</strong></p>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['rol']->value=='admin'){?>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor acor-toneos" id="accordion">
            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
            <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("in", null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['tournament'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tournament']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tournaments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tournament']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tournament']->key => $_smarty_tpl->tpl_vars['tournament']->value){
$_smarty_tpl->tpl_vars['tournament']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['tournament']->key;
 $_smarty_tpl->tpl_vars['tournament']->index++;
 $_smarty_tpl->tpl_vars['tournament']->first = $_smarty_tpl->tpl_vars['tournament']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['tournament']->first;
?>
            <?php if ($_smarty_tpl->tpl_vars['inter']->value){?>
            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("azul", null, 0);?>
            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(false, null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("azul", null, 0);?>
            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?> 
            <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("in", null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
            <?php }?>
            <div class="panel panel-default <?php echo $_smarty_tpl->tpl_vars['class_inter']->value;?>
">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                    <div class="panel-heading">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/icon_torneo.png">
                        <span class="title-dos"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
</span>
                    </div>
                </a>
                <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse <?php echo $_smarty_tpl->tpl_vars['class_collapse']->value;?>
" style="height: auto;">
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
                                    <td class="text-center"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['tournament']->value->type;?>
</td>
                                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->description;?>
</td>
                                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->numberparticipants;?>
</td>
                                    <td class="text-center">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index/modificar_torneo/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                            <button type="button" class="btn btn-primary ir-torneo" title="Editar">Ir al torneo</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php }else{ ?>

    <!-- ------------------------------------------------------------------------ -->
                            <!-- torneos maestro -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor acor-toneos" id="accordion">
            <?php  $_smarty_tpl->tpl_vars['tournament'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tournament']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tournaments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tournament']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tournament']->key => $_smarty_tpl->tpl_vars['tournament']->value){
$_smarty_tpl->tpl_vars['tournament']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['tournament']->key;
 $_smarty_tpl->tpl_vars['tournament']->index++;
 $_smarty_tpl->tpl_vars['tournament']->first = $_smarty_tpl->tpl_vars['tournament']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['tournament']->first;
?>
            <div class="panel panel-default azul">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                    <div class="panel-heading">
                        <span class="glyphicon icon-user resalta" style="font-size: 16px;"></span>
                        <span class="title-dos"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->nombre;?>
</span>
                    </div>
                </a>
                <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse collapse" style="height: auto; padding-right: 15px;padding-left: 15px;margin-top: 15px;margin-bottom: 15px;">
                    <?php  $_smarty_tpl->tpl_vars['torneo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['torneo']->_loop = false;
 $_smarty_tpl->tpl_vars['hcount'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tournament']->value->torneos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['torneo']->key => $_smarty_tpl->tpl_vars['torneo']->value){
$_smarty_tpl->tpl_vars['torneo']->_loop = true;
 $_smarty_tpl->tpl_vars['hcount']->value = $_smarty_tpl->tpl_vars['torneo']->key;
?>
                    <div class="panel azul">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_d" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
<?php echo $_smarty_tpl->tpl_vars['hcount']->value;?>
">
                            <div class="panel-heading">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/icon_torneo.png">
                                <span class="title-dos"><?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
</span>
                            </div>
                        </a>
                        <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
<?php echo $_smarty_tpl->tpl_vars['hcount']->value;?>
" class="panel-collapse collapse in" style="height: auto;">
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
                                        <td class="text-center"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['torneo']->value->type;?>
</td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['torneo']->value->description;?>
</td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['torneo']->value->numberparticipants;?>
</td>
                                            <td class="text-center">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index/modificar_torneo/<?php echo $_smarty_tpl->tpl_vars['torneo']->value->codtournament;?>
">
                                                    <button type="button" class="btn btn-primary ir-torneo" title="Editar">Ir al torneo</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php }?>
</div><?php }} ?>