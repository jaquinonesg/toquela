<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Bienvenido a su administrador</title>

        <link href="{$_params.site}/public/css/canchas-admin/css.css" rel="stylesheet" type="text/css" />
        <link href="{$_params.site}/public/css/canchas-admin/reset.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link href="{$_params.site}/public/css/theme.css" rel="stylesheet" type="text/css"/>
        <link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />


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

        <script type="text/javascript" >
            var base_url = '{$_params.site}';
            var url_site = '{$_params.base}';
            var controller = '{$_params.controller}';
            {if isset($_params.user)}
            var user_global = parseInt('0');
            {/if}
        </script>
        <script type="text/javascript" src="{$_params.site}/public/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/backbone.js"></script>

        <script src="{$_params.site}/public/js/plugins.js"></script>
        <script src="{$_params.site}/public/js/main.js"></script>

        {if $_params.configs.view == 'sections/cancha' || $_params.configs.view == 'sections/agenda'}
            <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
            <script type="text/javascript" src="{$_params.site}/public/js/modernizr.custom.79639.js"></script> 
        {literal}<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->{/literal}
        <script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.easing-1.3.pack.js"></script>
    {/if}






    {if isset($_params.js) && count($_params.js)}
        {foreach item=js from=$_params.js}
            <script type="text/javascript" src="{$js}"></script>
        {/foreach}
    {/if}


</head>

<body>
    <header>
        <div class="Inhead">
            <a href="index.php">
                <img src="{$_params.site}/public/img/Logo-Toquela.png" width="380" height="93" alt="Toquela | Su comunidad de fÃºtbol en la web" title="Toquela | Su comunidad de fÃºtbol en la web" class="logo" />
            </a>

            <div class="Welcome_User">
                <p>BIENVENIDO</p>
            </div>	
        </div>
    </header>
    <!-- MAIN-->
    <div id="Main">
        <section>
            <div id="Bienvenida">
                

            </div>
            {include file=$_contenido}
            <!-- ANUNCIOS -->                             
            <div style="width:250px; height:150px; border:solid 5px #fff; float:left; margin:50px;">
                <img src="{$_params.site}/public/img/ff02.jpg" width="250" height="150" /> 
            </div>
            <div style="width:250px; height:150px; border:solid 5px #fff; float:left; margin:50px;">
                <img src="{$_params.site}/public/img/ff03.jpg" width="250" height="150" /> 
            </div>                        
            <div style="width:250px; height:150px; border:solid 5px #fff; float:left; margin:50px;">
                <img src="{$_params.site}/public/img/ff04.jpg" width="250" height="150" /> 
            </div>                                     
        </section>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="Foot">
            <img src="{$_params.site}/public/img/Logo-Footer.png" width="225" height="65" class="Logo-Footer" alt="Toquela | Su comunidad de fÃºtbol en la web" title="Toquela | Su comunidad de fÃºtbol en la web"/>
            <div id="Cont-Info-Foot">
                <div class="Cont-Uno">
                    <ul id="Datos-Contacto" style="width:160px;">
                        <li style="font-size:16px;">ENCUÉNTRANOS</li>
                        <li style="width:160px;"><span style="color:#064730">&bull;</span> Bogota - Colombia</li>                                                            
                        <li style="width:160px;"><span style="color:#064730">&bull;</span> -</li>
                        <li style="width:160px;"><span style="color:#064730">&bull;</span> -</li>
                    </ul>
                    <ul id="Datos-Contacto">
                        <li style="font-size:16px;">CONTÁCTANOS</li>
                        <li><span style="color:#064730">&bull;</span> Fb: Tóquela</li>
                        <li><span style="color:#064730">&bull;</span> Tw: Tóquela</li>          
                        <li><span style="color:#064730">&bull;</span> contactenos@toquela.com</li>                                                                                          
                    </ul>

                    <div class="Cont-Dos">
                        <img src="{$_params.site}/public/img/Logo-INNPULSA.png" alt="" width="337" height="49" border="0" usemap="#Map2" style="float:left;" title="" />
                    </div>
                </div>
                <div class="Cont-Tres">
                    <ul id="Mapa">
                        <li style="font-size:16px;">MAPA DE SITIO</li>
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Inicio</a></li>
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Partidos</a></li>
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Canchas</a></li>
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Equipos</a></li>                        
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Torneos</a></li>                                                
                        <li><a href="javascript:;"><span style="color:#064730">&bull;</span> Jugadores</a></li>                                                                        
                    </ul>
                </div>                                
            </div>	
            <img src="{$_params.site}/public/img/Zocalo-End.png" alt="" width="1110" height="32" border="0" usemap="#Map" style="float:left;margin-top:30px;" title=""/>
        </div>

    </footer>


</body>
</html>
