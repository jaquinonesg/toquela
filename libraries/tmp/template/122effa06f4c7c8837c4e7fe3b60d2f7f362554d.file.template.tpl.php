<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 15:33:18
         compiled from "/var/www/toquela/views/layout/empty/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18198423055622ef89476b93-94936715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '122effa06f4c7c8837c4e7fe3b60d2f7f362554d' => 
    array (
      0 => '/var/www/toquela/views/layout/empty/template.tpl',
      1 => 1446180634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18198423055622ef89476b93-94936715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622ef894a6213_76576529',
  'variables' => 
  array (
    'template' => 0,
    '_params' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622ef894a6213_76576529')) {function content_5622ef894a6213_76576529($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['template']->value)){?>
    <?php $_smarty_tpl->tpl_vars['template'] = new Smarty_variable(((($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/")).($_smarty_tpl->tpl_vars['template']->value)).(".tpl"), null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>