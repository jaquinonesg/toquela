<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 13:39:05
         compiled from "/var/www/toquela/views/equipos/equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13985992485623380aead2d6-27867848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffcc3e7c9642a89d356c557e539fb31798086342' => 
    array (
      0 => '/var/www/toquela/views/equipos/equipos.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13985992485623380aead2d6-27867848',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5623380aece065_46262403',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5623380aece065_46262403')) {function content_5623380aece065_46262403($_smarty_tpl) {?><div class="equipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>EQUIPOS</strong></h4>
        <?php $_smarty_tpl->tpl_vars['if_crear_equipo'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['verpaginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_buscador_equipo'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>