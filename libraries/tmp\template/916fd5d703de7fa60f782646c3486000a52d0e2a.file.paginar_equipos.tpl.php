<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 19:38:37
         compiled from "/var/www/toquela/views/_templates/paginar_equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7788674625622efe22a3192-23135828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '916fd5d703de7fa60f782646c3486000a52d0e2a' => 
    array (
      0 => '/var/www/toquela/views/_templates/paginar_equipos.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7788674625622efe22a3192-23135828',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622efe22c87e8_16490512',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622efe22c87e8_16490512')) {function content_5622efe22c87e8_16490512($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ***************************************** -->
<div class="text-center">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/paginator_person.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><?php }} ?>