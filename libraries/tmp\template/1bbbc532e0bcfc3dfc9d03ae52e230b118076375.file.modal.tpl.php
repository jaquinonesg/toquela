<?php /* Smarty version Smarty-3.1.8, created on 2015-11-04 19:27:12
         compiled from "/var/www/toquela/views/modal/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91405575627b2af12aa52-56962209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bbbc532e0bcfc3dfc9d03ae52e230b118076375' => 
    array (
      0 => '/var/www/toquela/views/modal/modal.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91405575627b2af12aa52-56962209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5627b2af147ff6_57194205',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5627b2af147ff6_57194205')) {function content_5627b2af147ff6_57194205($_smarty_tpl) {?><div id="Cont-Form">
    <h1 class="Titulo-Form">FORMULARIO DE REGISTRO</h1>
    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Logo-Toquela.png" alt="Login with Facebook or Twitter" width="354" height="71" border="0" usemap="#Map" class="Log-Social" title="Login with Facebook or Twitter" />
    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Login-Social-Network.png" alt="Login with Facebook or Twitter" width="354" height="71" border="0" usemap="#MapSocial" class="Log-Social" title="Login with Facebook or Twitter" />
    <form enctype="multipart/form-data" method="post" name="" id="Formulario" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modal/saveregister" >
        <div class="Cont-Cas">
            <input name="name" type="text"  id="" class="input_" value="" placeholder="Nombre" autofocus/>
        </div>
        <div class="Cont-Cas">
            <input name="lastname" type="text"  id="" class="input_" value="" placeholder="Apellidos" autofocus/>
        </div>        
        <div class="Cont-Cas">
            <input name="email" type="text"  id="" class="input_" value="" placeholder="Correo Electr&oacute;nico"/>
        </div>
        <div class="Cont-Cas">
            <input name="password" type="password"  id="" class="input_" value="" placeholder="Password"/>
        </div>
        <!-- Submit Button-->
        <input name="" style="margin-top: 115px;" type="submit" class="Send_" id="" value="ENVIAR" />
        <!-- E-mail verification. Do not edit -->
    </form>    
</div>

<!-- ACÁ PONER SCRIPTS PARA LOGUEO A TRAVÉS DE REDES SOCIALES -->

<?php }} ?>