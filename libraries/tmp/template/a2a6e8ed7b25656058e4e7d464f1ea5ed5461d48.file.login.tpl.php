<?php /* Smarty version Smarty-3.1.8, created on 2015-05-12 13:22:44
         compiled from "/var/www/html/toquela/views/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1278820866555244f4224360-06408246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2a6e8ed7b25656058e4e7d464f1ea5ed5461d48' => 
    array (
      0 => '/var/www/html/toquela/views/login/login.tpl',
      1 => 1416600464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278820866555244f4224360-06408246',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_555244f423f3f7_52074705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555244f423f3f7_52074705')) {function content_555244f423f3f7_52074705($_smarty_tpl) {?><div class="login">
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