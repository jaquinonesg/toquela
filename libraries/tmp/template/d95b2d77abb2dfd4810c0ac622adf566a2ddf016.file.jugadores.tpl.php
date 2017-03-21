<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:18:32
         compiled from "C:\xampp\htdocs\toquela\views\jugadores\jugadores.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35185554baad2e3258-44395378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd95b2d77abb2dfd4810c0ac622adf566a2ddf016' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\jugadores\\jugadores.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35185554baad2e3258-44395378',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554baad3686f7_02557336',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554baad3686f7_02557336')) {function content_5554baad3686f7_02557336($_smarty_tpl) {?><div class="jugadores">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-user" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JUGADORES</strong></h4>
        <?php $_smarty_tpl->tpl_vars['is_buscador_jugadores'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_jugadores.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>