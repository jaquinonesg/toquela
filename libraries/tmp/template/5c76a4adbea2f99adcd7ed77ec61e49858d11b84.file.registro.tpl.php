<?php /* Smarty version Smarty-3.1.8, created on 2015-10-24 15:58:26
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\registro\registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19583562bf0f22a3fe1-23813171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c76a4adbea2f99adcd7ed77ec61e49858d11b84' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\registro\\registro.tpl',
      1 => 1442433094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19583562bf0f22a3fe1-23813171',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'error' => 0,
    '_params' => 0,
    'utilnovedades' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562bf0f2334885_61842914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562bf0f2334885_61842914')) {function content_562bf0f2334885_61842914($_smarty_tpl) {?><div class="row index">
    <!-- scripts maps -->
    <script type="text/javascript">
        var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='surgio_error'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "Surgió un error al ingresar el usuario, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_permisos'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Permisos.", "No tiene permisos para ingresar a la sección.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_captcha'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de CAPTCHA.", "Surgió un error al comprobar el CAPTCHA, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='existe_usuario'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "El email con el que intentó registrarse ya existe, por favor ingrese otro o inicie sesión.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_datos'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "No se enviaron los datos correctamente, todos los datos son obligatorios para el registro, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_email'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "El email ingresado no es válido, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
    </script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=false&language=es"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/registro/jsmaps/maps.js">
    </script>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/registro/jsmaps/controlmaps.js"></script>
    

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header-index">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 header-index-container">
        
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <img class="img-responsive" style="margin: 2px auto" width="300px" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Pelota_doble.png"/>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contenido">
                
        </div>
        <div class="clear"></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear section-novedades" style="display: none;">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 novedades-contend">
            
            <div class="clear separator_vertical" style="height: 30px;"><br></div>
            <div class="text-center text-gray-dark" id="title-novedades"><p>NOVEDADES</p></div>
            <br>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Liga de Fútbol de Bogotá.</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela1.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 1" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela1.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Torneo Relámpago de Fútbol 5, Inscripciones abiertas!</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela2.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 2" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela2.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Torneo Relámpago Fútbol 5.</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela3.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 3" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela3.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="clear"><br></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php }} ?>