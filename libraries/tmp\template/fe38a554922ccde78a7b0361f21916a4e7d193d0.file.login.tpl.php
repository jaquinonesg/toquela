<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 18:44:42
         compiled from "/var/www/toquela/modules/admin/views/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204887448756a01bea5d19f1-69091882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe38a554922ccde78a7b0361f21916a4e7d193d0' => 
    array (
      0 => '/var/www/toquela/modules/admin/views/login/login.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204887448756a01bea5d19f1-69091882',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a01bea5d53c0_69078831',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a01bea5d53c0_69078831')) {function content_56a01bea5d53c0_69078831($_smarty_tpl) {?><div class="Cont-Form">
    <div class="Cont_All">
        <label class="Label">* Cuenta de Email</label>
        <input id="email" class="Input" />
    </div>	
    <div class="Cont_All">
        <label class="Label">* Contraseña</label>
        <input id="password" class="Input" type="password" />
    </div>	
    <!-- Submit Button-->
    <input name="send" type="button" class="Casiillero3" id="send" value="INGRESAR" />
    <!-- E-mail verification. Do not edit -->
</div><?php }} ?>