<?php /* Smarty version Smarty-3.1.8, created on 2016-03-04 05:17:47
         compiled from "/var/www/toquela/modules/administrador-canchas/views/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157836487156d960cb39fdc4-47068381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80cdaa9dadf789c5ccc1fa805c86e784b0b4398' => 
    array (
      0 => '/var/www/toquela/modules/administrador-canchas/views/login/login.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157836487156d960cb39fdc4-47068381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56d960cb464bb1_14043234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d960cb464bb1_14043234')) {function content_56d960cb464bb1_14043234($_smarty_tpl) {?><div class="Cont-Form">
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