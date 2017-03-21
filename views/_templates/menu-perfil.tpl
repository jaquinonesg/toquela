<div class="clear"><br></div>
    {if $menu}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5;display: inline-block;">
                {if isset($user->photoprofile)}
                    <a class="previa" href="{$_params.site}/{$user->photoprofile->path}" target="_blank">
                        <img class="img-thumbnail img-perfil" src="{$_params.site}/{$user->photoprofile->path}" alt="Imagen perfil {$user->name} {$user->lastname}" title="Imagen perfil {$user->name} {$user->lastname}"/>
                    </a>
                {else}
                    <a class="previa" href="{$_params.site}/public/img/no_user_image.jpg" target="_blank">
                        <img class="img-thumbnail img-perfil" src="{$_params.site}/public/img/no_user_image.jpg" alt="Imagen perfil {$user->name} {$user->lastname}" title="Imagen perfil {$user->name} {$user->lastname}"/>
                    </a>
                {/if}
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="display: inline-block;margin-left: 15px;">
                <div style="font-size: 35px;">{$user->name} {$user->lastname}</div><br>
                <a class="text-gray-dark" href="{$_params.site}/perfil/" title="Editar mi perfil">
                    <span class="icon-cog" style="font-size: 30px;"></span>
                </a>&nbsp;&nbsp;
                <a class="text-gray-dark" href="{$_params.site}/perfil/{$user->coduser}-{$user->username}" title="Perfil público">
                    <span class="icon-camiseta" style="font-size: 30px;"></span>
                </a>&nbsp;&nbsp;
                <!-- {if $user->nummsg > 0}
                    <a class="text-gray-dark" href="{$_params.site}/perfil/mismensajes" title="Mensajes">
                        <span class="glyphicon glyphicon-envelope" style="font-size: 30px;"></span>
                        <span class="burbuja">&nbsp;{$user->nummsg}</span>
                    </a>&nbsp;&nbsp;
                {else}
                    <a class="text-gray-dark" href="{$_params.site}/perfil/mismensajes" title="Mensajes">
                        <span class="glyphicon glyphicon-envelope" style="font-size: 30px;"></span>
                    </a>&nbsp;&nbsp;
                {/if} -->
                {if $user->notify > 0}
                    <a class="text-gray-dark" href="{$_params.site}/perfil/misnotificaciones" title="Notificaciones">
                        <span class="glyphicon icon-earth" style="font-size: 30px;"></span>
                        <span class="burbuja">&nbsp;{$user->notify}</span>
                    </a>&nbsp;&nbsp;
                {else}
                    <a class="text-gray-dark" href="{$_params.site}/perfil/misnotificaciones" title="Notificaciones">
                        <span class="glyphicon icon-earth" style="font-size: 30px;"></span>
                    </a>&nbsp;&nbsp;          
                {/if}
                <div class="clear"><br></div>
                <div>
                
                    <!-- <div><span class="icon-guayo" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;NIVEL DE JUEGO: </span>{$user->levelgame->name}</div> -->
                    <br>
                    <div><span class="icon-cancha" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;POSICIÓN: </span>{$user->positiongame->name}</div>
                    <br>
                    <!-- <div><span class="icon-location" style="font-size: 28px; margin-top: 5px;"></span><span class="text-gray-dark">&nbsp;&nbsp;LOCALIDAD: </span>{$user->locality->name|default: "Sin localidad"}</div>
                    <br>
                    <div><img src="{$_params.site}/public/files/fans_icons/{$user->fan->icon}" style="width: 26px; margin-top: 5px;" /><span class="text-gray-dark">&nbsp;&nbsp;HINCHA: </span>{$user->fan->name}</div> -->
                </div> 
            </div>
        </div>
        <div class="clear"><br></div>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_perfil">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="_menu_perfil">
                <ul class="nav navbar-nav">
                    <li {if $menu_perfil == 0} class="active" {/if}><a href="{$_params.site}/perfil/">MI PERFIL</a></li>
                    <!--li {if $menu_perfil == 1} class="active" {/if}><a href="{$_params.site}/perfil/miscanchas">Mis canchas</a></li-->
                    <li {if $menu_perfil == 2} class="active" {/if}><a href="{$_params.site}/equipos/misequipos">MIS EQUIPOS</a></li>
                    <li {if $menu_perfil == 3} class="active" {/if}><a href="{$_params.site}/perfil/fotos">FOTOS</a></li>
                    <li {if $menu_perfil == 4} class="active" {/if}><a href="{$_params.site}/perfil/videos">VIDEOS</a></li>
                    <li {if $menu_perfil == 5} class="active" {/if}><a href="{$_params.site}/perfil/estadisticas">ESTADÍSTICAS</a></li>
                    <!-- <li {if $menu_perfil == 6} class="active" {/if}><a href="{$_params.site}/perfil/misamigos">AMIGOS</a></li>
                    <li {if $menu_perfil == 7} class="active" {/if}><a href="{$_params.site}/perfil/actividades">ACTIVIDADES</a></li> -->
<!--                     <li {if $menu_perfil == 8} class="active" {/if}><a href="{$_params.site}/perfil/partidos_perfil">PARTIDOS</a></li> -->
                </ul>
            </div>
        </nav>
    </div>
{else}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5; display: inline-block;">
                {if isset($userpublic->photoprofile)}
                    <a class="previa" href="{$_params.site}/{$userpublic->photoprofile->path}" target="_blank">
                        <img class="img-thumbnail img-perfil" src="{$_params.site}/{$userpublic->photoprofile->path}" width="150" alt="Imagen perfil {$userpublic->name} {$userpublic->lastname}" title="Imagen perfil {$userpublic->name} {$userpublic->lastname}"/>
                    </a>
                {else}
                    <a class="previa" href="{$_params.site}/public/img/no_user_image.jpg" target="_blank">
                        <img class="img-thumbnail img-perfil" src="{$_params.site}/public/img/no_user_image.jpg" width="150" alt="Imagen perfil {$userpublic->name} {$userpublic->lastname}" title="Imagen perfil {$userpublic->name} {$userpublic->lastname}"/>
                    </a>
                {/if}
            </div>
            <div style="display: inline-block;margin-left: 15px;">
                <div style="font-size: 35px;">{$userpublic->name} {$userpublic->lastname}</div><br>
                <!-- {if  $isfollower->isfollower == 0}
                {if $haySesion == true}
                <div><button type="button" data-accion="save" data-user="{$userpublic->coduser}-{$encodeurl->encodeStringToUrl($userpublic->username)}" class="btn btn_blue_light" id="btn_seguir">Seguir</button></div>
                {/if}
                {else}
                {if $haySesion == true}
                <div><button type="button" data-accion="delete" data-user="{$userpublic->coduser}-{$encodeurl->encodeStringToUrl($userpublic->username)}" class="btn btn-default" id="btn_seguir">Dejar de Seguir</button></div>
                {/if}
                {/if} -->
                <br>
                <!-- <div><span class="icon-guayo" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;NIVEL DE JUEGO: </span>{$userpublic->levelgame->name}</div> -->
                <br>
                <div><span class="icon-cancha" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;POSICIÓN: </span>{$userpublic->positiongame->name}</div>
                <br>
                <!-- <div><span class="icon-location" style="font-size: 28px; margin-top: 5px;"></span><span class="text-gray-dark">&nbsp;&nbsp;LOCALIDAD: </span>{$userpublic->locality->name}</div>
                <br>
                <div><img src="{$_params.site}/public/files/fans_icons/{$userpublic->fan->icon}" style="width: 26px; margin-top: 5px;" /><span class="text-gray-dark">&nbsp;&nbsp;HINCHA: </span>{$userpublic->fan->name}</div> -->
            </div>
        </div>
    </div>
{/if}