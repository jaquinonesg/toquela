<section>
    <div id="Cont-Infor">
        <h1 class="Titulo-Nombre">{$team->name}</h1>
        <h2 class="Titulo-Cont">
            <a class="panel selectedGal" panel=equipo>Jugadores del equipo</a> / 
            <a class="panel" panel=poraceptar>Jugadores por aceptar</a> 
        </h2>
        <div class="paneles" panel=equipo>
            {if count($players)>0}
                <ul id="Mi-Cancha">
                    {foreach from=$players item=player}
                        <li class="cancha_pr">
                            <h3 class="Titulo-Cancha" style="margin-top:10px;font-size:18px;">{$player->name}</h3>
                            <div class="Img-Mi-Cancha">
                                <div class="perfil_1"></div>
                                <div class="perfil_2">
                                    <img 
                                        {if is_null($player->image) eq true}
                                            src="{$_params.site}/public/img/Img-Mi-Cancha.png" 
                                        {else}
                                            src="{$_params.site}/public/{$player->image->path}" 
                                        {/if}
                                        accesskey=""width="233" height="216" alt="{$player->description}" title="{$player->description}"/></div>
                            </div>
                            <span style="color:#064730">&bull;</span>{$player->lastname}<br><br>
                            <span style="color:#064730">&bull;</span>{$player->levelgame->name}<br><br>
                            <span style="color:#064730">&bull;</span>{$player->positiongame->name}<br><br>                            
                        </li>

                    {/foreach}
                </ul>
            {else}
                Sin jugadores 

            {/if}
        </div>


        <div class="paneles" panel=poraceptar>
            {if count($postulants)>0}
                <ul id="Mi-Cancha">
                    {foreach from=$postulants item=player} 
                        <li class="cancha_pr">
                            <h3 class="Titulo-Cancha" style="margin-top:10px;font-size:18px;">{$player->name}</h3>
                            <div class="Img-Mi-Cancha">
                                <div class="perfil_1"></div>
                                <div class="perfil_2">
                                    <img 
                                        {if is_null($player->image) eq true}
                                            src="{$_params.site}/public/img/Img-Mi-Cancha.png" 
                                        {else}
                                            src="{$_params.site}/{$player->image->path}" 
                                        {/if}
                                        accesskey=""width="233" height="216" alt="{$player->description}" title="{$player->description}"/></div>
                            </div>

                            <span style="color:#064730">&bull;</span>{$player->lastname}<br><br>
                            <span style="color:#064730">&bull;</span>{$player->levelgame->name}<br><br>
                            <span style="color:#064730">&bull;</span>{$player->positiongame->name}<br><br>
                            <form method="POST" enctype="multipart/form-data" action="{$_params.site}/equipos/judgment/{$team->codteam}-{$team->name}/{$player->coduser}-{$player->username}/">
                                <div>
                                    <button type="submit" name=request value='accept' class="btn">Aceptar</button> 
                                    <button type="submit" name=request value='refuse' class="btn">Rechazar</button>
                                </div>
                            </form>
                        </li>

                    {/foreach}
                </ul>
            {else}
                Sin jugadores 

            {/if}
        </div>
</section>
