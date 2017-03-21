<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:30:48
         compiled from "C:\xampp\htdocs\html\toquela\views\layout\empty\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2683056304f78b8e9c0-45475421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5568da91002b1e201a1ff41b6b71a6cf2042f9b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\layout\\empty\\template.tpl',
      1 => 1445040287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2683056304f78b8e9c0-45475421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template' => 0,
    '_params' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f78c03ce7_96771003',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f78c03ce7_96771003')) {function content_56304f78c03ce7_96771003($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['template']->value)){?>
    <?php $_smarty_tpl->tpl_vars['template'] = new Smarty_variable(((($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/")).($_smarty_tpl->tpl_vars['template']->value)).(".tpl"), null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>