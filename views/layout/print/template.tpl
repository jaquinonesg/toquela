<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{$_params.configs.titulo|default: "-"}</title>
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

        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
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
    <!--bootstrap-->

    {if isset($_params.js) && count($_params.js)}
        {foreach item=js from=$_params.js}
            <script type="text/javascript" src="{$js}"></script>
        {/foreach}
    {/if}

</head>
<!-- START -->
<!-- HEADER-->
<body>
    {include file=$_contenido}

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
            <!--img src="{$_params.site}/public/img/Login-Social-Network.png" alt="Login with Facebook or Twitter" width="354" height="71" border="0" usemap="#MapSocial" class="Log-Social" title="Login with Facebook or Twitter" />
            <div class="clear"><br></div>
            <form class="form-inline text-center" enctype="multipart/form-data" method="POST" action="{$_params.site}/modal/saveregister" role="form">
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

