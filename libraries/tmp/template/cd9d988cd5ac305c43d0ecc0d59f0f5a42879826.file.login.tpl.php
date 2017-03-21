<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 15:35:35
         compiled from "C:\xampp\htdocs\toquela\views\login\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2094655526c70777e16-90640727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd9d988cd5ac305c43d0ecc0d59f0f5a42879826' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\login\\login.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2094655526c70777e16-90640727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55526c707ba477_79602756',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55526c707ba477_79602756')) {function content_55526c707ba477_79602756($_smarty_tpl) {?><div class="login">
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