<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Bienvenido a su administrador</title>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link href="{$_params.site}/public/css/canchas-admin/css.css" rel="stylesheet" type="text/css" />
        <link href="{$_params.site}/public/css/theme.css" rel="stylesheet" type="text/css"/>

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
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


        {if isset($_params.js) && count($_params.js)}
            {foreach item=js from=$_params.js}
                <script type="text/javascript" src="{$js}"></script>
            {/foreach}
        {/if}

        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>


    </head>

    <body>
        <input type="text" id="datepicker"/>


    </body>
</html>