<!DOCTYPE html>
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
        <link type="text/css" href="{$_params.site}/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link type="text/css" href="{$_params.site}/public/css/default.css" rel="stylesheet"/>
        <!--bootstrap-->

        <link href="{$_params.site}/public/css/reset.css" rel="stylesheet" type="text/css" /><!-- CSS RESET -->
        <link rel="stylesheet" href="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link href="{$_params.site}/public/css/css.css" rel="stylesheet" type="text/css" /> <!-- CSS ALL SITE -->

        {if $is_jqueryui}
            <link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
            <link href="{$_params.site}/public/css/theme.css" rel="stylesheet" type="text/css"/>
        {/if}

<!--link rel="stylesheet" type="text/css" href="{$_params.site}/public/css/common.css" /--> <!-- Fichas juega - busca - -->
<!--link rel="stylesheet" type="text/css" href="{$_params.site}/public/css/style5.css" /--><!-- IDEM arriba -->
        {if isset($_params.css) && count($_params.css)}
            {foreach item=css from=$_params.css}
                {if {$css}|strpos:"Mobil"}
                    <link href="{$css}" media="screen and (max-width: 980px)" rel="stylesheet" type="text/css" />
                    {elseif  {$css}|strpos:"Tablet"}
                        <link href="{$css}" media="screen and (max-width: 1024px)" rel="stylesheet" type="text/css" />
                    {else}
                        <link href="{$css}" type="text/css" rel="stylesheet"/>
                    {/if}
                {/foreach}
            {/if} 

            <!-- JQUERY-->
            <!-- FIXED HTML5-->
            <script type="text/javascript">
                var base_url = "{$_params.site}";
            </script>
            <script src="{$_params.site}/public/js/vendor/modernizr-2.6.2.min.js"></script>
            <script src="{$_params.site}/public/js/vendor/jquery-1.9.0.min.js"></script>
            <script>window.jQuery || document.write('<script src="{$_params.site}/public/js/vendor/jquery-1.9.0.min.js"><\/script>');</script>
            <script src="{$_params.site}/public/js/plugins.js"></script>
            <script src="{$_params.site}/public/js/main.js"></script>

            <script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/vendor/backbone.js"></script>

            {if $is_jqueryui}
                <script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui.js"></script>
            {/if}
            <!-- había un problema con este de abajo -->
            <!--   <script src="http://http://cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script> -->
            <!-- y lo actualízo para que sirva -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script>
            <!-- por este DE arriba =D -->
            <script type="text/javascript" src="{$_params.site}/public/js/modernizr.custom.79639.js"></script> 
            {literal}<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->{/literal}
            <script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.easing-1.3.pack.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/jquery.cycle.all.latest.js"></script>

            <!--bootstrap-->
            <script type="text/javascript" src="{$_params.site}/public/js/bootstrap.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/jquery.vibrating.notices.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/default.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/functions.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/collapse.js"></script>
            <!--bootstrap-->

            {if isset($_params.js) && count($_params.js)}
                {foreach item=js from=$_params.js}
                    <script type="text/javascript" src="{$js}"></script>
                {/foreach}
            {/if}



            {literal}
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
        {/literal}
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <!-- START -->
    <!-- HEADER-->
    <body>
    	
        <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header" style="{if $soybanner}display: none{/if}">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-perfil-contacto">
                    <ul id="Menu">
                        {if isset($user->coduser)}
                            <li>
                                <div class="btn_green_prin _data_perfil text-left">
                                    <p>{$user->name} {$user->lastname}</p>        
                                    <p>
                                        <a href="{$_params.site}/perfil"><button type="button" class="btn btn-link">Mi Perfil</button></a>
                                        <a href="{$_params.site}/login/close_session"><button type="button" class="btn btn-link">Cerrar</button></a>
                                    </p>       
                                </div>
                            </li>
                        {else}
                            <li><div class="btn_green_prin" id="_btn_ingresar">INGRESAR</div></li>
                            <li><a class="btn_green_prin" href="{$_params.site}/registro/">REGISTRO</a></li>
                        {/if}
                        {*<li><a class="btn_green_prin" href="mailto:contactenos@toquela.com">CONTACTO</a></li> *}
                    </ul>
                </div>
                <div class="container-fluid container-menu-principal">
                    <div class="navbar-header col-xs-12 col-sm-2 col-md-2 col-lg-2">
                        <button type="button" class="navbar-toggle text-gray-dark" data-toggle="collapse" data-target="#default-menu-principal">
                            <span class="sr-only"></span>
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </button>
                        <a class="navbar-brand text-center" href="{$_params.site}/">
                            <img style="width: 130px;" src="{$_params.site}/public/img/logo_dark_beta.png" alt="Toquela | Su comunidad de fútbol en la web" title="Toquela | Su comunidad de fútbol en la web"  />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="default-menu-principal">
                        <ul class="nav navbar-nav col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            {*<li><a class="opaco no_dispon" href="#"><span class="icon-futbol"></span> PARTIDOS</a></li>
                            <li><a class="opaco no_dispon" href="#"><span class="icon-cancha"></span> CANCHAS</a></li>*}
                            {if $user->codrole == 2 || $user->codrole == 3}
                            <li><a href="{$_params.site}/administrar/"><span class="glyphicon glyphicon-pencil"></span> ADMINISTRAR SITIO</a></li>
                            {/if}
                            <li><a href="{$_params.site}/torneo/"><span class="icon-trophy"></span> TORNEOS</a></li>
                            <li><a href="{$_params.site}/equipos/"><span class="icon-users"></span> EQUIPOS</a></li>
                            <li><a href="{$_params.site}/jugadores/" class="_fin_menu"><span class="icon-user"></span> JUGADORES</a></li>
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
            {include file=$_contenido}
        </div>
        <!-- FOOTER -->
        <footer class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear footer">
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 refooter">
                <div class="footer-contend">
                    <p>CONTÁCTENOS</p></br>
                    <p>contactenos@toquela.com</p>
                    <p>Bogotá – Colombia</p></br>
                    <a href="https://www.facebook.com/ToquelaOficial?ref=hl" title="Facebook"><img src="{$_params.site}/public/img/facebook.png" title="Facebook" alt="Facebook"/></a>
                    <a href="https://twitter.com/@Toquela" title="Twitter"><img src="{$_params.site}/public/img/twitter.png"  title="Twitter" alt="Twitter"/></a>
                </div>
            </div>
            <div class="clear"></div>
            <img id="logo-impulsa" src="{$_params.site}/public/img/img_ejemplo/logo_impulsa.jpg" />
            <div class="footer-derechos">
                <p>2013 TÓQUELA – todos los derechos reservados – Prohibida su reproducción parcial o total.</p>
                <a href="{$_params.site}/terminos_condiciones">Términos y Condiciones</a>
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
            <img class="loader-small" src="{$_params.site}/public/img/loader.gif"/>
            <span id="_body_popup_loader">
                <!--p>[TEXTO]</p></br>
                <div class="text-center">
                    <img class="loader-medium" src="{$_params.site}/public/img/loader.gif"/>
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
                <form class="form-inline text-center" id="_frm_init_session_user" enctype="multipart/form-data" method="POST" action="{$_params.site}/login/verificar" role="form">
                    <label class="sr-only" for="_txt_user_email">Correo electrónico</label>
                    <input type="text" class="form-control" id="_txt_user_email" name="username" placeholder="Correo electrónico o documento" required="">
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
                {*<img src="{$_params.site}/public/img/Login-Social-Network.png" alt="Login with Facebook or Twitter" width="354" height="71" border="0" usemap="#MapSocial" class="Log-Social" title="Login with Facebook or Twitter" />
                <div class="clear"><br></div>*}
                <!--form class="form-inline text-center" enctype="multipart/form-data" method="POST" action="{$_params.site}/modal/saveregister" role="form">
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
            <a id="single_image" href="{$_params.site}/modal"></a>
        </div>
        {*<map name="MapSocial" id="MapSocial">
        <area shape="rect" coords="8,34,164,59" href="{$_params.site}/socialnet/facebook" />
        <area shape="rect" coords="185,33,343,61" href="{$_params.site}/socialnet/twitter" />
        </map>*}
        <map name="Map">
            <area shape="rect" coords="934,6,1104,24" href="http://www.imaginamos.com/"/>
        </map>
        <map name="Map2">
            <area shape="rect" coords="222,6,335,46" href="http://www.innpulsacolombia.com/"/>
        </map>
    </body>
</html>

