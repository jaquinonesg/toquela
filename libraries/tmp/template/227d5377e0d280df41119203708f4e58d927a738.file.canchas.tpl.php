<?php /* Smarty version Smarty-3.1.8, created on 2015-05-13 15:52:39
         compiled from "C:\xampp\htdocs\toquela\views\canchas\canchas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233265553b997d54e83-17087734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '227d5377e0d280df41119203708f4e58d927a738' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\canchas\\canchas.tpl',
      1 => 1400276606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233265553b997d54e83-17087734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5553b997db6d28_75708130',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5553b997db6d28_75708130')) {function content_5553b997db6d28_75708130($_smarty_tpl) {?><div class="canchas">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark">
            <span class="glyphicon glyphicon-default icon-cancha" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CANCHAS</strong>
        </h4>
        <?php $_smarty_tpl->tpl_vars['is_buscador_canchas'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_canchas.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>