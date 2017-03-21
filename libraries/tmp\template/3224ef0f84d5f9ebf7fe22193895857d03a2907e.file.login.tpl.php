<?php /* Smarty version Smarty-3.1.8, created on 2015-11-04 19:55:41
         compiled from "/var/www/toquela/views/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13569050875622ed24546e77-76108056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3224ef0f84d5f9ebf7fe22193895857d03a2907e' => 
    array (
      0 => '/var/www/toquela/views/login/login.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13569050875622ed24546e77-76108056',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622ed2455edb2_42262795',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622ed2455edb2_42262795')) {function content_5622ed2455edb2_42262795($_smarty_tpl) {?><div class="login">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <br>
            <br>
            <br>
            <div class="text-center wel caja_azul">
                <p style="font-size: 30px;">Usuario y/o contraseñas invalidas</p>
                <br>
                <button class="btn btn-default" id="_btn_ingresar_log" style="height: 60px;">&nbsp;&nbsp;INGRESAR&nbsp;&nbsp;</button>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var initComponentSession = function() {
            component.popupForm("Inicio de Sesión", "_init_session_user_template");
        };
        //component.messageSimple("Alerta...", 'Usuario y/o contraseñas incorrectas');
        component.messageAcept("Alerta...", 'Usuario y/o contraseñas incorrectas.', initComponentSession);
        //---------------------------------------------------
        $(document).on('click', '#_btn_ingresar_log', function() {
            component.popupForm("Inicio de Sesión", "_init_session_user_template");
        });
    });
</script>
<?php }} ?>