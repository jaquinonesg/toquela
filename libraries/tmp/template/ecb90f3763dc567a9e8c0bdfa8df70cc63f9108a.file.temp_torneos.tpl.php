<?php /* Smarty version Smarty-3.1.8, created on 2015-10-24 15:58:29
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\torneo\sections\temp_torneos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29772562bf0f5433205-56178306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecb90f3763dc567a9e8c0bdfa8df70cc63f9108a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\torneo\\sections\\temp_torneos.tpl',
      1 => 1442433094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29772562bf0f5433205-56178306',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562bf0f54f6720_64634957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562bf0f54f6720_64634957')) {function content_562bf0f54f6720_64634957($_smarty_tpl) {?><div class="torneos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark">
            <span class="glyphicon glyphicon-default icon-trophy" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TORNEOS</strong>
            <!-- <span style="float: right;font-size: 19px;text-align: right;"><br>QUIERE ORGANIZAR Y GESTIONAR SU TORNEO EN EL LINEA <br> ESCRIBANOS A contactenos@toquela.com Y LE DIREMOS COMO.</span> -->
        </h4>
        <?php $_smarty_tpl->tpl_vars['is_buscador_torneos'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['init_js_paginator'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_torneos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>