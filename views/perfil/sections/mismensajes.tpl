<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<div class="mismensajes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
        <h2 class="text-center"><strong class="text-gray-dark">HISTORIAL MENSAJES</strong></h2>
        <br> 
                <button type="button" class="btn btn_blue_light btn_enviar_msg_user">Nuevo Mensaje</button>
                {include file=$_params.root|cat:"views/perfil/sections/popupmsg.tpl"}
        {if isset($all_messages)}
            <div id="notificaciones_msg">
                <div class="clear"><br></div>
                <table class="table table-striped">
                    <tr>
                        <td width="321" align="center" valign="top"><strong>Usuario</strong></td>
                        <td width="321" align="center" valign="top"><strong>De</strong></td>
                        <td width="321" align="center" valign="top"><strong>Sin Leer</strong></td>
                        <td width="321" align="center" valign="top"><strong>Accion</strong></td>
                    </tr>
                    {foreach from=$all_messages item=m}   
                        <tr cod_from="{$m->from}">
                            <td align="center" valign="top"><img   accesskey=""width="50" height="40" src="{$_params.site}/{$m->path}"  /></td>
                            <td align="center" valign="top">{$m->name} {$m->lastname}</td>
                            <td align="center" valign="top">{$m->sinver}</td>
                            <td align="center" valign="top"> <button type="button" class="btn btn-info btn_ver_msg_user" data-user="{$m->from}">Ver</button>
                                {include file=$_params.root|cat:"views/perfil/sections/popupvermsg.tpl"}</td>
                        </tr>
                    {/foreach}
                </table>
            </div>
        {else}
            <p>En este momento no hay mensajes</p>
        {/if}
        <div class="clear"><br></div>
    </div>
</div>

