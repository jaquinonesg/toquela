<link href="{$_params.site}/views/equipos/css/perfilequipo.css" type="text/css" rel="stylesheet">
<script src="{$_params.site}/public/js/postular_mis_equipos_en_equipos.js"></script>
<div class="perfil-partido">
    {if !isset($teamRival)}
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                    <h2 class="text-gray-dark" style="font-size: 30px;"><strong>{$teamLocal->name}</strong></h2><br>
                            {if isset($teamLocal->pathTeam)}
                        <img class="img-responsive img-thumbnail" src="{$_params.site}/public{$teamLocal->pathTeam}" alt="Foto perfil Equipo {$teamLocal->name}" title="Foto perfil Equipo {$teamLocal->name}"/><br/>
                    {else}
                        <img class="img-responsive img-thumbnail" src="{$_params.site}/public/img/fotoequipo.jpg" alt="Foto perfil Equipo {$teamLocal->name}" title="Foto perfil Equipo {$teamLocal->name}"/><br/>
                    {/if}
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="z-index: 0;">
                    <br>
                    <br>
                    <br>
                    <p><span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{$teamLocal->footballType}</p>
                    <div class="clear"><br></div>
                    <p>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        {if {$teamLocal->typeGenre} == 'MALE'}
                            Masculino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'FEMALE'}
                            Femenino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'MIXED'}
                            Mixto
                        {/if}
                    </p>
                    {if isset($postulados)}
                        <button class="btn btn-primary btn-modal-postulate" data-toggle="modal" data-target="#postulados" style="margin-left: 2%;">
                            Ver equipos postulados
                        </button>
                    {/if}
                    <div class="clear"><br></div>
                        {if isset($user) eq true}
                            {if count($postulados)<5}
                            <button id="btn-postulate-teams" class="btn btn-primary" style="margin-left: 2%;">
                                Postular equipos
                            </button>
                        {/if}
                    {/if}

                    <div class="clear"><br></div>
                </div>
                <div class="clear"><br></div>
            </div>
        </div>
    </div>
{else}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <h2 class="text-gray-dark" style="font-size: 30px;"><strong>{$teamLocal->name}</strong></h2><br>
                        {if isset($teamLocal->pathTeam)}
                    <img class="img-responsive img-thumbnail" src="{$_params.site}/public{$teamLocal->pathTeam}" alt="Foto perfil Equipo {$teamLocal->name}" title="Foto perfil Equipo {$teamLocal->name}"/><br/>
                {else}
                    <img class="img-responsive img-thumbnail" src="{$_params.site}/public/img/fotoequipo.jpg" alt="Foto perfil Equipo {$teamLocal->name}" title="Foto perfil Equipo {$teamLocal->name}"/><br/>
                {/if}
                <p class="attrs-team hidden-sm hidden-md hidden-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{$teamLocal->footballType}
                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        {if {$teamLocal->typeGenre} == 'MALE'}
                            Masculino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'FEMALE'}
                            Femenino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'MIXED'}
                            Mixto
                        {/if}
                    </span>
                </p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
                <p class="versus">VS</p>
                <p class="info-match"><strong class="text-gray-dark">Descripción </strong></p><p>{$teamLocal->description}</p>
                <p class="info-match"><strong class="text-gray-dark">Fecha y hora </strong></p><p>{$teamLocal->datetimegame}</p>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <h2 class="text-gray-dark" style="font-size: 30px;"><strong>{$teamRival->nameTeam}</strong></h2><br>
                        {if isset($teamRival->pathTeam)}
                    <img class="img-responsive img-thumbnail" src="{$_params.site}/public{$teamRival->pathTeam}" alt="Foto perfil Equipo {$teamRival->nameTeam}" title="Foto perfil Equipo {$teamRival->nameTeam}"/><br/>
                {else}
                    <img class="img-responsive img-thumbnail" src="{$_params.site}/public/img/fotoequipo.jpg" alt="Foto perfil Equipo {$teamRival->nameTeam}" title="Foto perfil Equipo {$teamRival->nameTeam}"/><br/>
                {/if}
                <p class="attrs-team hidden-sm hidden-md hidden-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{$teamRival->footballType}
                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        {if {$teamRival->typeGenre} == 'MALE'}
                            Masculino
                        {/if}
                        {if {$teamRival->typeGenre} == 'FEMALE'}
                            Femenino
                        {/if}
                        {if {$teamRival->typeGenre} == 'MIXED'}
                            Mixto
                        {/if}
                    </span>
                </p>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-md-offset-1 col-lg-offset-1 init hidden-xs">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <p class="attrs-team hidden-xs visible-sm visible-md visible-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{$teamLocal->footballType}
                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        {if {$teamLocal->typeGenre} == 'MALE'}
                            Masculino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'FEMALE'}
                            Femenino
                        {/if}
                        {if {$teamLocal->typeGenre} == 'MIXED'}
                            Mixto
                        {/if}
                    </span>
                </p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center"></div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <p class="attrs-team hidden-xs visible-sm visible-md visible-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong>{$teamRival->footballType}
                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        {if {$teamRival->typeGenre} == 'MALE'}
                            Masculino
                        {/if}
                        {if {$teamRival->typeGenre} == 'FEMALE'}
                            Femenino
                        {/if}
                        {if {$teamRival->typeGenre} == 'MIXED'}
                            Mixto
                        {/if}
                    </span>
                </p>
            </div>
        </div> 
    </div>
{/if}
</div>
<input id="cod_team" value="{$teamLocal->codteammanager}" style="display: none;"/>
<input id="cod_game" value="{$teamLocal->codgames}" style="display: none;"/>
{if $postulado !== ""}
    <input id="cod_postulate" value="{$postulado}" style="display: none;"/>
{/if}
<input id="cod_selected" value="" style="display: none;"/>
<input id="cod_selected_acept" value="" style="display: none;"/>

<div class="modal-postulate-teams">
    {include file=$_params.root|cat:"views/equipos/sections/postular_equipo.tpl"}
</div>

{if isset($postulados)}
    <div class="modal fade modal-postulateds" id="postulados" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                    <h4 class="modal-title" id="myModalLabel">Postulados al partido</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <span class="t-options">Equipos Postulados</span>
                    </p>
                    {foreach from=$postulados item=postulado}
                        {if $postulado->isMyTeam eq true}
                            <p class="p-postulated">
                                <a id="{$postulado->codteam}" class="delete-postulated" data-code="{$postulado->codpostulategame}">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                <span class="name-postulated">{$postulado->name}</span>
                            </p>
                        {else}
                            <p class="p-postulated">
                                <span  id="{$postulado->codteam}" class="span-postulated glyphicon glyphicon-hand-right"></span>{$postulado->name}
                            </p>   
                        {/if}
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
{/if}

<div class="modal fade modal-postulateds" id="aceptar_postulado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                <h4 class="modal-title" id="myModalLabel">Aceptar postulado</h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Quiere jugar con este equipo?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="acept_postulate_team">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-postulateds" id="rechazar_postulado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                <h4 class="modal-title" id="myModalLabel">Rechazar postulado</h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Quiere rechazar este equipo?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="reject_postulate_team">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</div>

