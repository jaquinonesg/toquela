<?php /* Smarty version Smarty-3.1.8, created on 2016-01-24 10:28:13
         compiled from "/var/www/toquela/views/layout/print/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58244910656a4ed8d372fa9-34768762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d742d1685e9cc674e140607e6928680a41609c' => 
    array (
      0 => '/var/www/toquela/views/layout/print/template.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58244910656a4ed8d372fa9-34768762',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'css' => 0,
    'js' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a4ed8d43b032_20088045',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a4ed8d43b032_20088045')) {function content_56a4ed8d43b032_20088045($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_params']->value['configs']['titulo'])===null||$tmp==='' ? "-" : $tmp);?>
</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <!--bootstrap-->
        <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/default.css" rel="stylesheet"/>
        <!--bootstrap-->

        <link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/reset.css" rel="stylesheet" type="text/css" /><!-- CSS RESET -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/css.css" rel="stylesheet" type="text/css" /> <!-- CSS ALL SITE -->
        <!--link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/common.css" /--> <!-- Fichas juega - busca - -->
        <!--link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/style5.css" /--><!-- IDEM arriba -->
        <?php if (isset($_smarty_tpl->tpl_vars['_params']->value['css'])&&count($_smarty_tpl->tpl_vars['_params']->value['css'])){?>
            <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_params']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (strpos($_tmp1,"Mobil")){?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" media="screen and (max-width: 980px)" rel="stylesheet" type="text/css" />
                <?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if (strpos($_tmp2,"Tablet")){?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" media="screen and (max-width: 1024px)" rel="stylesheet" type="text/css" />
                <?php }else{ ?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" type="text/css" rel="stylesheet"/>
                <?php }}?>
            <?php } ?>
        <?php }?> 

        <!-- JQUERY-->
        <!-- FIXED HTML5-->
        <script type="text/javascript">
            var base_url = "<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
";
        </script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-1.9.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-1.9.0.min.js"><\/script>');</script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/plugins.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/main.js"></script>

        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/underscore.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/backbone.js"></script>

        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/modernizr.custom.79639.js"></script> 
    <!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/fancybox/jquery.easing-1.3.pack.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/jquery.cycle.all.latest.js"></script>

    <!--bootstrap-->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/jquery.vibrating.notices.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/default.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/functions.js"></script>
    <!--bootstrap-->

    <?php if (isset($_smarty_tpl->tpl_vars['_params']->value['js'])&&count($_smarty_tpl->tpl_vars['_params']->value['js'])){?>
        <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_params']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
            <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"></script>
        <?php } ?>
    <?php }?>

</head>
<!-- START -->
<!-- HEADER-->
<body>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!-- Modal Bootstrap -->
    <span id="_popup_formulario_contend"></span>
    <span id="_popup_html_big_contend"></span>
    <span id="_message_simple_contend"></span>
    <!-- Modal Bootstrap -->
    <!--  display none Bootstrap -->
    <div class="display_none">
        <img class="loader-small" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
        <span id="_body_popup_loader">
            <!--p>[TEXTO]</p></br>
            <div class="text-center">
                <img class="loader-medium" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
            </div-->
        </span>
        <span id="_body_message_acept">
            <!--p>[TEXTO]</p-->
        </span>
        <span id="_footer_message_acept">
            <!--button type="button" id="_btn_aceptar_message_acept" class="btn [CLASS_BTN]">Aceptar</button>
            <button type="button" id="_btn_cancel_message_acept" class="btn [CLASS_BTN]">Cancelar</button-->
        </span>
        <span id="_message_simple_template">
            <!--div class="modal [CLASS_MODAL] fade" id="_message_simple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title">[TITULO]</h4>
                        </div>
                        <div class="modal-body">
                            <p>[TEXTO]</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="_btn_aceptar" class="btn [CLASS_BTN]">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div-->
        </span>
        <span id="_popup_html_big_template">
            <!--div class="modal [CLASS_MODAL] fade" id="_popup_html_big" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="[CLASS_TAMANO]">
                    <div class="modal-content">
                        <div class="modal-header">
                            [BUTTONCLOSE]
                            <h4 class="modal-title">[TITULO]</h4>
                        </div>
                        <div class="modal-body">
                            [BODY]
                        </div>
                        [FOOTER]
                    </div>
                </div>
            </div-->
        </span>
        <span id="_popup_formulario_template">
            <!--div class="modal [CLASS_MODAL] fade" id="_popup_formulario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title">[TITULO]</h4>
                        </div>
                        <div class="modal-body">
                            [HTML]
                        </div>
                    </div>
                </div>
            </div-->
        </span>

        <span id="_init_session_user_template">
            <!--div id="msg_init_session"></div>
            <form class="form-inline text-center" id="_frm_init_session_user" enctype="multipart/form-data" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/login/verificar" role="form">
                <label class="sr-only" for="_txt_user_email">Correo electrónico</label>
                <input type="email" class="form-control" id="_txt_user_email" name="username" placeholder="Correo electrónico" required="">
                </br>
                </br>
                <label class="sr-only" for="_txt_session_pass">Contraseña</label>
                <input type="password" class="form-control" id="_txt_user_pass" name="password" placeholder="Contraseña" required="">
                </br>
                </br>
                <button type="submit" name="submit" id="_btn_session_user" class="btn btn-green">Enviar</button>
            </form-->
        </span>
        <span id="_register_template">
            <!--img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Login-Social-Network.png" alt="Login with Facebook or Twitter" width="354" height="71" border="0" usemap="#MapSocial" class="Log-Social" title="Login with Facebook or Twitter" />
            <div class="clear"><br></div>
            <form class="form-inline text-center" enctype="multipart/form-data" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modal/saveregister" role="form">
                <label class="sr-only" for="regis_name">Nombres</label>
                <input type="text" class="form-control" name="name" id="regis_name" placeholder="Nombres" autofocus required="">
                </br>
                </br>
                <label class="sr-only" for="regis_lastname">Apellidos</label>
                <input type="text" class="form-control" name="lastname" id="regis_lastname" placeholder="Apellidos" autofocus required="">
                </br>
                </br>
                <label class="sr-only" for="regis_email">Correo Electr&oacute;nico</label>
                <input type="email" class="form-control" name="email" id="regis_email" placeholder="Correo Electr&oacute;nico" autofocus required="">
                </br>
                </br>
                <label class="sr-only" for="regis_password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="regis_password" placeholder="Contraseña" autofocus required="">
                </br>
                </br>
                <button type="submit" name="submit" class="btn btn-green">Enviar</button>
                </form-->
        </span>
    </div>
    <!--  display none Bootstrap -->
</body>
</html>

<?php }} ?>