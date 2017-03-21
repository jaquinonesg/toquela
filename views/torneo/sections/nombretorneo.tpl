	
<section>
    <div id="Cont-Mis-Canchas">
        <div id="Torneo">
            <h1 class="NombreTorneo">Gran Torneo Gran</h1>
            <!-- BARRA TÍTULOS -->
            <div id="Cont-Jugadores" style="height:50px;">
                <div class="Cont-Players"><strong>IMAGEN DE JUGADOR</strong></div>
                <div class="Cont-Players"><strong>NOMBRE</strong></div>
                <div class="Cont-Players"><strong>CÉDULA</strong></div>
                <div class="Cont-Players"><strong>NOMBRE DE EQUIPO</strong></div>                                                                                    
            </div>

            {foreach from=$userteam item='user'}
                <div id="Cont-Jugadores">

                    <div class="Cont-Players">
                        <img {if $user->path == null}
                            src="{$_params.site}/public/img/users/generico.jpg" 
                            {else}
                                src="{$_params.site}/{$user->path}" 
                                {/if}

                                    width="200" height="150" />

                            </div>

                            <div class="Cont-Players">{$user->name|utf8_encode}</div>
                            <div class="Cont-Players">{$user->idho}</div>
                            <div class="Cont-Players">{$user->nameteam|utf8_encode}</div>                                                                                    
                        </div>
                        {/foreach}
                        </div>
                    </div>
                </section>