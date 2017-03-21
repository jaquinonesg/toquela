<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 12:57:21
         compiled from "C:\xampp\htdocs\toquela\views\partidos\partidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208605554e201682545-07744020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f72ca378f69fd67ccc0e8887ae00dd6f0dff0125' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\partidos\\partidos.tpl',
      1 => 1416600465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208605554e201682545-07744020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554e2016e7b49_35804768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554e2016e7b49_35804768')) {function content_5554e2016e7b49_35804768($_smarty_tpl) {?><div class="partidos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PARTIDOS PÚBLICOS</strong></h4>
        <?php $_smarty_tpl->tpl_vars['verpaginator'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_buscador_partido'] = new Smarty_variable(true, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_partidos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>