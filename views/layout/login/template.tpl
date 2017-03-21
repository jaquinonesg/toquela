<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Administrador de canchas</title>


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

        <script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>


        {if isset($_params.js) && count($_params.js)}
            {foreach item=js from=$_params.js}
                <script type="text/javascript" src="{$js}"></script>
            {/foreach}
        {/if}


        {literal}
            <style>
                body {margin:0;padding:0; background:#DBDBD8;}
                #cabeza {
                    width:100%;
                    float:left;
                    background:#D3D2CE;
                    padding-bottom:20px;
                    border-bottom:5px solid #004731;
                }
                #cabeza .In { width:380px; height:93px; margin:20px auto;}
                #Cuerpo {
                    width:100%;
                    float:left;
                    background:url(/public/img/Back-Main.png) repeat;
                }

                #Cuerpo .Cont-Form {
                    width:500px;
                    height:170px;
                    margin:20px auto;
                    background:#fff;
                }

                #Cuerpo .Form	{
                    width:300px;
                    float:left;
                    margin:15px;
                }

                .Cont_All {
                    width:465px;
                    float:left;	
                    margin-top:20px;
                }

                .Label {
                    width:300px;
                    float:left;	
                    margin:5px;

                    font-family:Arial, Helvetica, sans-serif;
                    font-size:14px;
                    color:#000;
                }
                .Casiillero3 {
                    float:left;
                    margin:10px 0 0 375px;

                    font-family:Arial, Helvetica, sans-serif;
                    font-size:14px;
                    color:#000;	
                }

            </style>
        {/literal}

    </head>

    <body>
        <div id="cabeza">
            <div class="In">	
                <img src="{$params.site}/public/img/Logo-Toquela.png" width="380" height="93" alt="Tóquela" title="Tóquela" class="Logo" />
            </div>
        </div>
        <div id="Cuerpo">

            {include file=$_contenido}


        </div>
    </body>
</html>