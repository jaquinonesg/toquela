<div class="misactividades">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        {$menu_perfil = 7}
        {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
        <h2 class="text-center"><strong class="text-gray-dark">ACTIVIDADES</strong></h2><br> 
        {if isset($actividadestorneo)||($actividadesuserteam )}
            <div id="overflow" style="height: 300px; overflow-y: auto; padding: 1em;">
                <div class="contend_actividades" id="misactivi">
                    <div class="clear"><br></div>
                    <div class="itemactidades">
                        {foreach from=$actividadestorneo item=a}   

                            <a  class="text-gray" href="{$_params.site}/torneos/tablero/publico_temp/{$a->codtournament}#publicaciones-torneo" data-user="{$a->codnews}">
                                <img class="img-responsive" style="width: 8%;" src="{$_params.site}/{$a->path}"/>
                                <p>{$a->name} Escribio </p>
                                <p>{$a->messagetorneo}</p>
                                <p>En el torneo:<br>{$a->nametoreno}</p>
                            </a>

                            <div class="clear">
                                <br>
                                <br>
                            </div>
                        {/foreach}
                        {foreach from=$actividadesuserteam item=ac}   
                            <a  class="text-gray" href="{$_params.site}/equipos/perfil-equipo/{$ac->codteam}#msg_grupo" data-user="{$n->codnotification}">

                                <img class="img-responsive" style="width: 8%;" src="{$_params.site}/{$ac->path}"/>
                                <p>{$ac->name} Escribio </p>
                                <p>{$ac->text}</p>
                                <p>En el Equipo:<br>{$ac->nameteam}</p>
                            </a>
                            <div class="clear">
                                <br>
                                <br>
                            </div>
                        {/foreach}
                    </div>
                    <div id="paginador_activi" center><p display="none">{$paginacion->render()}</p></div>
                    {else}
                    <p>En este momento no hay actividades...</p>
                {/if}

                <div class="clear"><br></div>
            </div>
        </div>
    </div>
</div>




