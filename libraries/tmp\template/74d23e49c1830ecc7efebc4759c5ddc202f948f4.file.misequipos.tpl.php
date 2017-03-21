<?php /* Smarty version Smarty-3.1.8, created on 2016-01-21 17:51:01
         compiled from "/var/www/toquela/views/equipos/sections/misequipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1932072914562a8e042bc981-51071111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74d23e49c1830ecc7efebc4759c5ddc202f948f4' => 
    array (
      0 => '/var/www/toquela/views/equipos/sections/misequipos.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1932072914562a8e042bc981-51071111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562a8e04308d41_96691140',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562a8e04308d41_96691140')) {function content_562a8e04308d41_96691140($_smarty_tpl) {?><div class="misequipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(2, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php $_smarty_tpl->tpl_vars['if_crear_equipo'] = new Smarty_variable(true, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
      
        </div>
    </div>
</div><?php }} ?>