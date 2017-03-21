<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:31:46
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\login\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31989563041a2c24a72-48414159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3d5984079536b90efa845c933d6e9e6f6206c5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\login\\login.tpl',
      1 => 1442433094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31989563041a2c24a72-48414159',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041a2d073b8_77873549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041a2d073b8_77873549')) {function content_563041a2d073b8_77873549($_smarty_tpl) {?><div class="login">
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