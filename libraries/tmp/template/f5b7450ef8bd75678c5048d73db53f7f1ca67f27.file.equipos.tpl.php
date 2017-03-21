<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:21:41
         compiled from "C:\xampp\htdocs\toquela\views\equipos\equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320765554ba83b6a1c9-63936161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b7450ef8bd75678c5048d73db53f7f1ca67f27' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\equipos\\equipos.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320765554ba83b6a1c9-63936161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554ba83bdba66_42093025',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554ba83bdba66_42093025')) {function content_5554ba83bdba66_42093025($_smarty_tpl) {?><div class="equipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>EQUIPOS</strong></h4>
        <?php $_smarty_tpl->tpl_vars['if_crear_equipo'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['verpaginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_buscador_equipo'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>