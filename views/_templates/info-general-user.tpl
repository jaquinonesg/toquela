<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
        <div class="perfil_2">
            {if isset($user->photoprofile)}
                <img class="img-responsive img-thumbnail" src="{$_params.site}/{$user->photoprofile->path}" alt="Imagen de perfil de usuario" title="Imagen de perfil de usuario"/>
            {else}
                <img class="img-responsive img-thumbnail" src="{$_params.site}/public/img/no_user_image.jpg" alt="Imagen de perfil de usuario" title="Imagen de perfil de usuario"/>
            {/if}
        </div>
        <br/>
        {if $publicprofile eq true}
            <div style="width: 293px;">
                <form enctype="multipart/form-data" action="{$_params.site}/perfil/uploadattachment" method="POST">
                    <input type="file" name="new_photo">       
                    <button type="submit" name="profile" value=true>Cambiar foto de perfil</button>
                </form>
            </div>
        {/if}
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <h1 class="Titulo-Nombre">{$user->name} {$user->lastname}</h1><br>
        <p>
        <p><strong>{$user->city}</strong></p>
        <br>
        <a href="{$_params.site}/perfil/{$user->coduser}-{$user->username}">
            <button class="btn btn-default">Ver Perfil</button>
        </a>
        <a href="{$_params.site}/perfil/">
            <button class="btn btn-default">Editar Perfil</button>
        </a>
        </p>	
    </div>
    <div class="clear"></div>
</div>
<!-- BARRA DE PORCENTAJE-->
{*<div id="porcentaje">
<!--<div class="Por-Left"></div>
<div class="Por-Right"></div>
<!--<p>Su perfíl está un 70% completo</p>-->
</div>*}
{*
<div id="Cont-Cali">
<ul id="Pos">
<li> 
<img src="{$_params.site}/public/img/Loguito-lista.png" width="24" height="18" style="float:left"/> NIVEL DE JUEGO: {$user->levelgame->name} 
</li>
<li>
<img src="{$_params.site}/public/img/Loguito-lista.png" width="24" height="18" style="float:left"/> POSICIÓN<BR> DE JUEGO: {$user->positiongame->name}
</li>
<li>
<img src="{$_params.site}/public/img/Loguito-lista.png" width="24" height="18" style="float:left"/> LOCALIDAD: {$user->locality->name}
</li>
</ul>
<!--
<div class="Numero-Nivel">
<p>90</p>
<a href="javascript:;"  class="pc" >Perfil Completo</a>
</div>
-->
</div>
*}

<!--div class="Gen_">
    <div class="nivelJ">
        <div class="prim"><img src="{$_params.site}/public/img/Loguito-lista.png"><span>NIVEL DE JUEGO</span></div>
        <div class="prev">{$user->levelgame->name}</div>
        <div><img src="{$_params.site}/public/img/Loguito-lista.png"><span>POSICIÓN</span></div>
        <div class="prev">{$user->positiongame->name}</div>
        <div><img src="{$_params.site}/public/img/Loguito-lista.png"><span>LOCALIDAD</span></div>
        <div class="prev">{$user->locality->name}</div>
    </div> 
</div-->