<script src="{$_params.site}/public/js/crear_partidos.js"></script>
<br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
    {if $postula}
    {if isset($user->coduser)}
    <div style="position: absolute;right: 0;top: 0;z-index: 10;">
        <a class="popup" href="#popup_postula">
            <button class="btn btn-default" style="padding: 25px;font-size: 20px;" data-team="{$team->codteam}">Postularme al equipo</button>
        </a>
    </div>
    {/if}
    {/if}
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
        <h2 class="text-gray-dark" style="font-size: 30px;"><strong>{$team->name|upper}</strong></h2><br>
        {if $ph_principal->path != ""}
            <img class="img-responsive img-thumbnail" src="{$_params.site}/public{$ph_principal->path}" alt="Foto perfil Equipo {$team->name}" title="Foto perfil Equipo {$team->name}"/><br/>
        {else}
            <img class="img-responsive img-thumbnail" src="{$_params.site}/public/img/fotoequipo.jpg" alt="Foto perfil Equipo {$team->name}" title="Foto perfil Equipo {$team->name}"/><br/>
        {/if}
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="z-index: 0;">
        <br>
        <br>
        <br>
        <p><span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{if isset($type->name)}{$type->name}{else}No tiene tipo de juego{/if}</p>
        <div class="clear"><br></div>
        <p>
            <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
            {if $team->type == 'MALE'}
                Masculino
            {/if}
            {if $team->type == 'FEMALE'}
                Femenino
            {/if}
            {if $team->type == 'MIXED'}
                Mixto
            {/if}
        </p>
        <div class="clear"><br></div>
        {if isset($user->coduser) && isset($MyTeam)}
        <button type="button" class="btn btn-primary btn_enviar_msg_team efect-hover">Enviar mensaje grupal</button>
        {include file=$_params.root|cat:"views/equipos/sections/popupmsgteam.tpl"}
        {/if}

        <div class="clear"><br></div>
<!--             {if isset($MyTeam)}
            <button type="button" class="btn btn-primary btn_create-match" data-toggle="modal" data-target="#_popup_html_big">Crear partido</button>
        {/if} -->
        <div class="clear"><br></div>
    </div>
    <div class="clear"><br></div>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_equipo">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="_menu_equipo">
            <ul class="nav navbar-nav">
                <li {if $menu_equipo == 0} class="active" {/if}>
                    <a href="{$_params.site}/equipos/perfil-equipo/{$team->url}"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;INFORMACIÓN</a>
                </li>
                <li {if $menu_equipo == 1} class="active" {/if}>
                    <a href="{$_params.site}/equipos/estadistica/{$team->url}"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;ESTADÍSTICAS</a>
                </li>
                {if $iscreator}
                <li {if $menu_equipo == 2} class="active" {/if}>
                    <a href="{$_params.site}/equipos/editar-equipo/{$team->url}"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;EDITAR</a>
                </li>
                {/if}
                {*<li {if $menu_equipo == 3} class="active" {/if}>
                    <a href="{$_params.site}/equipos/mis_partidos/{$team->url}"><span class="glyphiconglyphicon-list-alt"></span>&nbsp;&nbsp;PARTIDOS</a>
                </li>*}
            </ul>
        </div>
    </nav>
    <input id="cod_team" value="{$team->codteam}" style="display: none;"/>
    {if isset($MyTeam)}
        <div class="modal-crear-partido">
            {include file=$_params.root|cat:"views/equipos/sections/crear_partido.tpl"}
        </div>
    {/if}
    <input type="text" id="team_local" value="{$team->codteam}" style="display: none;"/>
</div>