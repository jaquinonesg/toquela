<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:32:07
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\administrar\administrar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2698563041b7343df3-46174237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e79eb43a96019b3a89260f6e6a57b03c59121098' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\administrar\\administrar.tpl',
      1 => 1442433093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2698563041b7343df3-46174237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privilegios' => 0,
    'privilegio' => 0,
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041b73e0225_56659233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041b73e0225_56659233')) {function content_563041b73e0225_56659233($_smarty_tpl) {?><div class="administrar">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
				<span class="glyphicon glyphicon-pencil" style="font-size: 25px;"></span>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="title text-center"><strong>ADMINISTRAR</strong></p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 form-datos">
			<?php  $_smarty_tpl->tpl_vars['privilegio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['privilegio']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['privilegios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['privilegio']->key => $_smarty_tpl->tpl_vars['privilegio']->value){
$_smarty_tpl->tpl_vars['privilegio']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['privilegio']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['privilegio']->value['nombre']!='Administrador'){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
<?php echo $_smarty_tpl->tpl_vars['privilegio']->value['link'];?>
" target="blank">
				<div class="seccion">
					<p>
						<span class="glyphicon glyphicon-chevron-right resalta"></span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['privilegio']->value['nombre'];?>

					</p>
				</div>
			</a>
			<?php }?>
			<?php } ?>
		</div>
	</div>
</div><?php }} ?>