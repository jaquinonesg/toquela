<!DOCTYPE HTML>
<html>
    <head>
        <title>{$_params.configs.titulo|default: "-"}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta name="description" content="{$_params.config.m_description}" />
        <meta name="keywords" content="{$_params.configs.m_keywords}" />
        <script type="text/javascript" >
            var base_url = '{$_params.site}';
            var url_site = '{$_params.base}';
            var controller = '{$_params.controller}';
        </script>
        <link type="text/css" href="{$_params.site}/public/css/reset.css" rel="stylesheet"/>
        <link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="{$_params.site}/public/css/default.css" rel="stylesheet" type="text/css">
        <link href="{$_params.site}/public/css/tablet.css" media="screen and (max-width: 1024px)" rel="stylesheet" type="text/css" />
        <link href="{$_params.site}/public/css/mobil.css" media="screen and (max-width: 980px)" rel="stylesheet" type="text/css" />

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


        <script type="text/javascript" src="{$_params.site}/public/js/jquery.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/underscore.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/backbone.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/functions.js"></script>

        {if isset($_params.js) && count($_params.js)}
            {foreach item=js from=$_params.js}
                <script type="text/javascript" src="{$js}"></script>
            {/foreach}
        {/if}


    </head>

    <body>
        <header>
            <section>
                <div></div>                
            </section>
        </header>
        <div id="contenedor">
            <section id="contenido">
                {include file=$_contenido}
                hernan
            </section>
        </div>

        <footer>
            <section>
                <div class="pie">
                    Acerca de <span> - </span>Términos y condiciones<span> - </span> Contacto <span> - </span> Ayuda </div>
            </section>
        </footer>
    </body>       
</html>