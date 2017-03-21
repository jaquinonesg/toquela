<!DOCTYPE HTML>
<html>
    <head>
        <title>{$_params.configs.titulo|default: "-"}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
        <link type="text/css" href="{$_params.site}/public/css/reset.css" rel="stylesheet"/>
        <link type="text/css" href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet"/>
        <script type="text/javascript" >
            var base_url = '{$_params.site}';
            var url_site = '{$_params.base}';
            console.log(base_url , url_site);
        </script>

        <script type="text/javascript" src="{$_params.site}/public/js/jquery.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/functions.js"></script>
        {if isset($_params.css) && count($_params.css)}
            {foreach item=css from=$_params.css}
                <link href="{$css}" type="text/css" rel="stylesheet"/>
            {/foreach}
        {/if}
        {if isset($_params.js) && count($_params.js)}
            {foreach item=js from=$_params.js}
                <script src="{$js}" type="text/javascript"></script>
            {/foreach}
        {/if}
    </head>
    <body>
        <div id="contenedor">
            <header>
                <a href="{$_params.site}/generate/index"> <img src="{$_params.site}/public/img/logos/clean.png" /></a>
                <nav>
                    <a href="{$_params.site}/index">Mi Aplicación</a>
                    <a href="{$_params.site}/generate/controller">Controladores - Vistas</a>
                    <a href="{$_params.site}/generate/model">Modelos</a>
                    <a href="{$_params.site}/generate/api">Documentación</a>
                    <a href="{$_params.site}/generate/index">Inicio</a>
                </nav>
            </header>
            <section id="contenido">
                {include file=$_contenido}
            </section>

        </div>      
        <footer class="footer">
            Geek Framework 2013
        </footer>
    </body>
</html>