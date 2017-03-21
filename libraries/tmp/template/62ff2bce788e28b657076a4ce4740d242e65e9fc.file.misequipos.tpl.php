<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:18:02
         compiled from "C:\xampp\htdocs\toquela\views\equipos\sections\misequipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:278755554baffd6ad84-31271314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62ff2bce788e28b657076a4ce4740d242e65e9fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\equipos\\sections\\misequipos.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278755554baffd6ad84-31271314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554baffde60d6_52908092',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554baffde60d6_52908092')) {function content_5554baffde60d6_52908092($_smarty_tpl) {?><div class="misequipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(2, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php $_smarty_tpl->tpl_vars['if_crear_equipo'] = new Smarty_variable(true, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
      
        </div>
    </div>
</div><?php }} ?>