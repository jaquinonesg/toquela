<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:32:16
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\_templates\info_calendario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29309563041c0a85750-73283449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47eb267229a3a08c09801b2b80d6197272f7797f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\_templates\\info_calendario.tpl',
      1 => 1442433092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29309563041c0a85750-73283449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config_calendar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041c0ac3f61_07095252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041c0ac3f61_07095252')) {function content_563041c0ac3f61_07095252($_smarty_tpl) {?><div class="alert alert-warning fade in" style="color: #000000;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
    <p style="color: #FF0000;"><span style="display: inline-block;background-color: #FF0000; width: 15px;height: 15px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;"></span> = No se ha programado calendario para el partido.</p>
    <?php if ($_smarty_tpl->tpl_vars['config_calendar']->value){?>
        <p style="color: #47AFC7;"><span style="display: inline-block;background-color: #47AFC7; width: 15px;height: 15px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;"></span> = La fecha ya se programó.</p>
    <?php }?>
    <p><strong>#</strong> = Número del partido</p>
    <p><strong>J</strong> = Jornada</p>
    <p><strong>R</strong> = Resultado parcial del partido</p>
    <p><strong>W</strong> = Pierde por W</p>
</div><?php }} ?>