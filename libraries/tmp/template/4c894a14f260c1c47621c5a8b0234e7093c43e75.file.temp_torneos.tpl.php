<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 15:36:10
         compiled from "C:\xampp\htdocs\toquela\views\torneo\sections\temp_torneos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:264805554b9d21cf615-91753136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c894a14f260c1c47621c5a8b0234e7093c43e75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\torneo\\sections\\temp_torneos.tpl',
      1 => 1435768788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264805554b9d21cf615-91753136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b9d2280131_65184054',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b9d2280131_65184054')) {function content_5554b9d2280131_65184054($_smarty_tpl) {?><div class="torneos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark">
            <span class="glyphicon glyphicon-default icon-trophy" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TORNEOS</strong>
            <span style="float: right;font-size: 19px;text-align: right;"><br>QUIERE ORGANIZAR Y GESTIONAR SU TORNEO EN EL LINEA <br> ESCRIBANOS A contactenos@toquela.com Y LE DIREMOS COMO.</span>
        </h4>
        <?php $_smarty_tpl->tpl_vars['is_buscador_torneos'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_torneos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>