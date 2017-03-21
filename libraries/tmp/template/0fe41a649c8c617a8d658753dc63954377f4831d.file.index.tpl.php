<?php /* Smarty version Smarty-3.1.8, created on 2015-05-15 10:14:30
         compiled from "C:\xampp\htdocs\toquela\modules\usuarios\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2690555560d569e5d29-19848525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fe41a649c8c617a8d658753dc63954377f4831d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\usuarios\\views\\index\\index.tpl',
      1 => 1416847376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2690555560d569e5d29-19848525',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55560d56a51585_58906552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55560d56a51585_58906552')) {function content_55560d56a51585_58906552($_smarty_tpl) {?><div class="jugadores">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-user" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>ADMINISTRAR USUARIOS</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php $_smarty_tpl->tpl_vars['is_buscador_jugadores'] = new Smarty_variable(true, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_usuarios.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div><?php }} ?>