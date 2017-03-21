<?php /* Smarty version Smarty-3.1.8, created on 2015-07-02 10:58:38
         compiled from "C:\xampp\htdocs\toquela_jorge\views\layout\empty\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:372755955faebaf557-19761767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '064cd7a0400e41e0929b2f7d68a1c6f3c33f777f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela_jorge\\views\\layout\\empty\\template.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '372755955faebaf557-19761767',
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
  'unifunc' => 'content_55955faec3f8b3_59653809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55955faec3f8b3_59653809')) {function content_55955faec3f8b3_59653809($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['template']->value)){?>
    <?php $_smarty_tpl->tpl_vars['template'] = new Smarty_variable(((($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/")).($_smarty_tpl->tpl_vars['template']->value)).(".tpl"), null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>