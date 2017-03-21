<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <title>Toquela | Su comunidad de fútbol en la web</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <!-- CSS -->
        <link type="text/css" href="{$_params.site}/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link type="text/css" href="{$_params.site}/public/css/bootstrap-select.css" rel="stylesheet" media="screen"/>
        <link type="text/css" href="{$_params.site}/public/css/bootstrap-datetimepicker.min.css" />
        <link type="text/css" href="{$_params.site}/public/css/torneos.css" rel="stylesheet"/>
        <link type="text/css" href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" >

        {if isset($_params.css) && count($_params.css)}
            {foreach item=css from=$_params.css}
                <link href="{$css}" rel="stylesheet" type="text/css" />
            {/foreach}
        {/if} 

        <!--JS-->
        <script type="text/javascript">
            var base_url = "{$_params.site}";
            var url_site = '{$_params.base}';
            var controller = '{$_params.controller}';
        </script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/backbone.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/icanhaz.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/torneos.js"></script>

        {if isset($_params.js) && count($_params.js)}
            {foreach item=js from=$_params.js}
                <script type="text/javascript" src="{$js}"></script>
            {/foreach}
        {/if}

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="{$_params.site}/public/js/html5shiv.js"></script>
          <script src="{$_params.site}/public/js/respond.min.js"></script>
        <![endif]-->

        {include file=$_params.root|cat:"views/_templates/templates_client.tpl"}


    </head>
    <body>
        {include file=$_contenido}
    </body>
</html>