<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 20:47:23
         compiled from "/var/www/toquela/modules/torneos/views/calendario/sections/resultados_proxima_fecha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16266802485626eeab203b44-84018680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbc8515c397aba417084b04d404017de4f426aeb' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/calendario/sections/resultados_proxima_fecha.tpl',
      1 => 1445129466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16266802485626eeab203b44-84018680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'matches_by_date' => 0,
    'match_father' => 0,
    'index_h' => 0,
    'match' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626eeab24b694_09777481',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626eeab24b694_09777481')) {function content_5626eeab24b694_09777481($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['matches_by_date']->value[0])){?>
<?php  $_smarty_tpl->tpl_vars['match_father'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match_father']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['matches_by_date']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match_father']->key => $_smarty_tpl->tpl_vars['match_father']->value){
$_smarty_tpl->tpl_vars['match_father']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['match_father']->key;
?>
<div class="row proximas-fechas">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
        <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_smarty_tpl->tpl_vars['index_h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_father']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
 $_smarty_tpl->tpl_vars['index_h']->value = $_smarty_tpl->tpl_vars['match']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['index_h']->value==0){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fecha" style="border-bottom: 2px solid;">
            <p class="text-center">Fecha<span class="glyphicon glyphicon-arrow-right resalta" style="font-size: 14px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
</p>
        </div>
        <div class="titles">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center" style="padding-top: 8px;">Local</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center" style="padding-top: 8px;">Visitante</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center" style="padding-top: 8px;">Campo</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center" style="padding-top: 8px;">Hora</p>
            </div>
        </div>
        <?php }?>
        <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc">
        <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_smarty_tpl->tpl_vars['index_h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_father']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
 $_smarty_tpl->tpl_vars['index_h']->value = $_smarty_tpl->tpl_vars['match']->key;
?>
        <div class="row valor" num="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" title="<?php echo (($_smarty_tpl->tpl_vars['match']->value->local->name).(' VS ')).($_smarty_tpl->tpl_vars['match']->value->visitant->name);?>
">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!-- <div class="contador-partido"># <?php echo $_smarty_tpl->tpl_vars['index_h']->value+1;?>
</div> -->
                <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['match']->value->local->name;?>
</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['match']->value->visitant->name;?>
</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
                <p><?php echo $_smarty_tpl->tpl_vars['match']->value->complex->name;?>
</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center"><span class="glyphicon glyphicon-time resalta"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
</p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<?php }else{ ?>
<p class="text-center" style="font-size: 18px;">En este momento no hay fechas próximas para este grupo.</p>
<?php }?><?php }} ?>