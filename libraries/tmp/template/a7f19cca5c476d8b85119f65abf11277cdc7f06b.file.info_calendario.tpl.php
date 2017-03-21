<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:30:25
         compiled from "C:\xampp\htdocs\html\toquela\views\_templates\info_calendario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2907556304f61718b08-42211649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7f19cca5c476d8b85119f65abf11277cdc7f06b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\_templates\\info_calendario.tpl',
      1 => 1445039367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2907556304f61718b08-42211649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config_calendar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f61720805_97419457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f61720805_97419457')) {function content_56304f61720805_97419457($_smarty_tpl) {?><div class="alert alert-warning fade in" style="color: #000000;">
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