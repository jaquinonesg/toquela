<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 14:40:11
         compiled from "/var/www/toquela/views/jugadores/jugadores.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16757918315626989b724182-20649063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a7314bd39df067fb3bc0a45cb338b451cf5bb10' => 
    array (
      0 => '/var/www/toquela/views/jugadores/jugadores.tpl',
      1 => 1445129468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16757918315626989b724182-20649063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626989b787a61_16254975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626989b787a61_16254975')) {function content_5626989b787a61_16254975($_smarty_tpl) {?><div class="jugadores">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-user" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JUGADORES</strong></h4>
        <?php $_smarty_tpl->tpl_vars['is_buscador_jugadores'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_jugadores.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>