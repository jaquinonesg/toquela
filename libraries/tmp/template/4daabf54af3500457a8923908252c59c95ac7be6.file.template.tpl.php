<?php /* Smarty version Smarty-3.1.8, created on 2015-07-02 10:58:36
         compiled from "C:\xampp\htdocs\toquela_jorge\views\layout\default\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:716855955facd28e51-65451616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4daabf54af3500457a8923908252c59c95ac7be6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela_jorge\\views\\layout\\default\\template.tpl',
      1 => 1435839392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '716855955facd28e51-65451616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'is_jqueryui' => 0,
    'css' => 0,
    'js' => 0,
    'soybanner' => 0,
    'user' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55955facee6c47_70063180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55955facee6c47_70063180')) {function content_55955facee6c47_70063180($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Toquela | Su comunidad de fútbol en la web</title>
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

        <?php if ($_smarty_tpl->tpl_vars['is_jqueryui']->value){?>
            <link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/theme.css" rel="stylesheet" type="text/css"/>
        <?php }?>

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

            <?php if ($_smarty_tpl->tpl_vars['is_jqueryui']->value){?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui.js"></script>
            <?php }?>
            <!-- había un problema con este de abajo -->
            <!--   <script src="http://http://cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script> -->
            <!-- y lo actualízo para que sirva -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script>
            <!-- por este DE arriba =D -->
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
            <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/collapse.js"></script>
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



            
                <script type="text/javascript">
                //---------analytics
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments);
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m);
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                ga('create', 'UA-49559415-1', 'toquela.com');
                ga('send', 'pageview');
                //------------------
                ga('create', 'UA-43714867-1', 'toquela.com');
                ga('send', 'pageview');
                //---------analytics    
                var fb_param = {};
                fb_param.pixel_id = '6008953255817';
                fb_param.value = '0.00';
                fb_param.currency = 'COP';
                (function() {
                    var fpw = document.createElement('script');
                    fpw.async = true;
                    fpw.src = '//connect.facebook.net/en_US/fp.js';
                    var ref = document.getElementsByTagName('script')[0];
                    ref.parentNode.insertBefore(fpw, ref);
                })();
                </script>
                <noscript>
            <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6008953255817&amp;value=0&amp;currency=COP"/>
            </noscript>
        
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <!-- START -->
    <!-- HEADER-->
    <body>
    	
        <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header" style="<?php if ($_smarty_tpl->tpl_vars['soybanner']->value){?>display: none<?php }?>">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-perfil-contacto">
                    <ul id="Menu">
                        <?php if (isset($_smarty_tpl->tpl_vars['user']->value->coduser)){?>
                            <li>
                                <div class="btn_green_prin _data_perfil text-left">
                                    <p><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
</p>        
                                    <p>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil"><button type="button" class="btn btn-link">Mi Perfil</button></a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/login/close_session"><button type="button" class="btn btn-link">Cerrar</button></a>
                                    </p>       
                                </div>
                            </li>
                        <?php }else{ ?>
                            <li><div class="btn_green_prin" id="_btn_ingresar">INGRESAR</div></li>
                            <?php }?>
                            
                    </ul>
                </div>
                <div class="container-fluid container-menu-principal">
                    <div class="navbar-header col-xs-12 col-sm-2 col-md-2 col-lg-2">
                        <button type="button" class="navbar-toggle text-gray-dark" data-toggle="collapse" data-target="#default-menu-principal">
                            <span class="sr-only"></span>
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </button>
                        <a class="navbar-brand text-center" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/">
                            <img style="width: 130px;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/logo_dark_beta.png" alt="Toquela | Su comunidad de fútbol en la web" title="Toquela | Su comunidad de fútbol en la web"  />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="default-menu-principal">
                        <ul class="nav navbar-nav col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->codrole==2||$_smarty_tpl->tpl_vars['user']->value->codrole==3){?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/administrar/"><span class="glyphicon glyphicon-pencil"></span> ADMINISTRAR SITIO</a></li>
                            <?php }?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneo/"><span class="icon-trophy"></span> TORNEOS</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/"><span class="icon-users"></span> EQUIPOS</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/jugadores/" class="_fin_menu"><span class="icon-user"></span> JUGADORES</a></li>
                        </ul>
                    </div>
                </div>

                </dd>
                </dl>
            </div>
            <div class="clear"></div>
        </header>

        <!-- MAIN-->
        <div class="init">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <!-- FOOTER -->
        <footer class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear footer">
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 refooter">
                <div class="footer-contend">
                    <p>CONTÁCTENOS</p></br>
                    <p>contactenos@toquela.com</p>
                    <p>Bogotá – Colombia</p></br>
                    <a href="https://www.facebook.com/ToquelaOficial?ref=hl" title="Facebook"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/facebook.png" title="Facebook" alt="Facebook"/></a>
                    <a href="https://twitter.com/@Toquela" title="Twitter"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/twitter.png"  title="Twitter" alt="Twitter"/></a>
                </div>
            </div>
            <div class="clear"></div>
            <img id="logo-impulsa" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/logo_impulsa.jpg" />
            <div class="footer-derechos">
                <p>2013 TÓQUELA – todos los derechos reservados – Prohibida su reproducción parcial o total.</p>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/terminos_condiciones">Términos y Condiciones</a>
            </div>
            </br>
            </br>
        </footer>

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
                    <br>
                    <br>
                    <label class="sr-only" for="_txt_session_pass">Contraseña</label>
                    <input type="password" class="form-control" id="_txt_user_pass" name="password" placeholder="Contraseña" required="">
                    <div class="clear"><br></div>
                    <div class="text-left">
                    <a class="cursor" id="_olvide_pass">Olvide mi contraseña</a>
                    </div>
                    <br>
                    <button type="submit" name="submit" id="_btn_session_user" class="btn btn_blue_light">&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;</button>
                </form-->
            </span>
            <span id="_register_template">
                
                <!--form class="form-inline text-center" enctype="multipart/form-data" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
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
                    <button type="button" name="submit" class="btn btn-green">Registrarme</button>
                    </form-->
            </span>
        </div>
        <!--  display none Bootstrap -->
        <div style="display:none;">
            <a id="single_image" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modal"></a>
        </div>
        
        <map name="Map">
            <area shape="rect" coords="934,6,1104,24" href="http://www.imaginamos.com/"/>
        </map>
        <map name="Map2">
            <area shape="rect" coords="222,6,335,46" href="http://www.innpulsacolombia.com/"/>
        </map>
    </body>
</html>

<?php }} ?>