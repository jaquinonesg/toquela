<!DOCTYPE html>
<html>   

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Administrador</title>
        <meta name="viewport" content="width=device-width">

        <!-- CSS -->
        <!--<link href="{$_params.site}/public/css/css.css" rel="stylesheet" type="text/css" /> 
        <link href="{$_params.site}/public/css/reset.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{$_params.site}/public/css/common.css" /> 
        <link rel="stylesheet" type="text/css" href="{$_params.site}/public/css/style5.css" />
        <link rel="stylesheet" href="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        -->

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
        <script src="{$_params.site}/public/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="{$_params.site}/public/js/vendor/jquery-1.9.0.min.js"><\/script>');</script>
        <script src="{$_params.site}/public/js/plugins.js"></script>
        <script src="{$_params.site}/public/js/main.js"></script>

        <!--<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>-->
        <script type="text/javascript" src="{$_params.site}/public/js/modernizr.custom.79639.js"></script> 
        <script type="text/javascript" src="{$_params.site}/public/js/functions.js"></script> 
    {literal}<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->{/literal}
    <!--<script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="{$_params.site}/public/fancybox/jquery.easing-1.3.pack.js"></script>-->

    {if isset($_params.js) && count($_params.js)}
        {foreach item=js from=$_params.js}
            <script type="text/javascript" src="{$js}"></script>
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

</head>

<body>
    <header>
        <div class="Inhead">
            Encabezado
        </div>
    </header>
    <!-- MAIN-->
    <div id="Main">
        {include file=$_contenido}
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="Foot">
            Pie de la pagina
        </div>           
    </footer>
</body>
