<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:16:53
         compiled from "C:\xampp\htdocs\toquela\views\layout\empty\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:416855527251b3dbd6-37389505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '771c1edd7f049ff2c25c124c4db34f56b2353095' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\layout\\empty\\template.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '416855527251b3dbd6-37389505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55527251baf1f7_57384347',
  'variables' => 
  array (
    'template' => 0,
    '_params' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55527251baf1f7_57384347')) {function content_55527251baf1f7_57384347($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['template']->value)){?>
    <?php $_smarty_tpl->tpl_vars['template'] = new Smarty_variable(((($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/")).($_smarty_tpl->tpl_vars['template']->value)).(".tpl"), null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>