<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$_params.site}/views/equipos/css/perfilequipo.css" />
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui.js"></script>
<div class="perfilequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
        <div class="row">
            {$menu_equipo = 0}
            {include file=$_params.root|cat:"views/_templates/info-equipo.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span class="text-gray-dark"><strong>DESCRIPCIÓN</strong></span>
                <div class="clear"><br></div>
                <textarea rows="4" disabled="" style="width: 100%; background-color: #FFFFFF; border: none;">{$team->description}</textarea>
            </div>
            <div class="clear"><br></div>
                {if isset($attachments)}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-gray-dark"><strong>Fotos de Galería</strong></h2><br/>
                    {foreach from=$attachments key=a item=attachment}
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                            <br>
                            <div class="divcortar" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #000000;">
                                <a class="previa" rel="gallery{$a+1}" href="{$_params.site}/public{$attachment->path}">
                                    <img style="width: 100%;" src="{$_params.site}/public{$attachment->path}" alt="Vista previa foto {$a+1}" title="Vista previa foto {$a+1}"/>
                                </a>
                            </div>
                        </div>
                    {/foreach}
                    <div class="clear"></div>
                </div>
                <div class="clear"><br></div> 
                {/if}
                {if count($players)>0}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="caja_info" id="integrantes">
                        <span class="text-gray-dark"><strong>INTEGRANTES</strong></span>
                        <div class="clear"><br></div>
                            {$parte = 0}
                            {$cierrediv = "</div>"}
                            {foreach from=$players item=player key=index}
                                {if $index==$parte}
                                    {$parte = ((count($players)/2)|ceil)}
                                    {if $index>0}
                                        {$cierrediv}
                                    {/if}
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                {/if}
                                <a role="menuitem" tabindex="{$player->coduser}" href="{$_params.site}/perfil?cod={$player->coduser}" target="_blank">
                                    <div class="col-xs-4 col-sm-2 col-md-4 col-lg-4 box-img-user-azul text-right" style="padding-right: 0px;">
                                        {if isset($player->photo)}
                                            <img class="img-responsive" style="float: right;" src="{$_params.site}/{$player->photo}"/>
                                        {else}
                                            <img class="img-responsive" style="float: right;" src="{$_params.site}/public/img/no_user_image.jpg"/>
                                        {/if}
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 box-info-user-azul">
                                        <p>
                                            {$player->name}&nbsp;{$player->lastname}&nbsp;
                                        </p>
                                        <p>
                                            {if $player->status == 'PLAYER'}
                                                (Jugador)
                                            {/if}
                                            {if $player->status == 'CAPTAIN'}
                                                (Capitán)
                                            {/if}
                                        </p>
                                    </div>
                                </a>
                            {/foreach}
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            {/if}
            {if isset($validate_user_hasteam)}  
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 woll">&nbsp;
                    {if isset($msg_team)}
                        <div class="caja_info" id="msg_grupo">
                            <strong class="text-gray-dark">Mensajes </strong>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="321" align="center" valign="top"><strong>Asunto</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Mensaje</strong></td>
                                        <td width="321" align="center" valign="top"><strong>De</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Eliminar</strong></td>
                                    </tr>
                                    {$trueque = true}
                                    {foreach from=$msg_team item=m}  
                                        <tr align="center" trmsg="{$m->codmessage}" {if $trueque}class="success"  {$trueque=false}{else}{$trueque=true}{/if}>
                                            <td>{$m->subject}</td>
                                            <td>{$m->text}</td>
                                            <td>{$m->name}-{$m->lastname}</td>
                                            <td>{$renderfecha->FormatearFecha($m->date)}</td>
                                            {if $user->coduser==$m->from}
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove-sign" data-user="{$m->codmessage}"></span> 
                                                    </button>
                                                </td>
                                            {else}
                                                <td> </td>
                                            {/if}
                                        </tr>
                                    {/foreach}
                                </table>&nbsp;
                                <div class="clear"></div>
                            </div>
                        {/if}
                    </div>
                </div>
            {/if}
        </div>
    </div>
</div>
<input type="hidden" id="text_msg_postula" value="¿Quiere postularse como jugador del equipo {$team->name}?">

<div style="display:none">
    <div id="popup_postula">
        <p id="msg_popup"></p><br/>
        <button id="btn_acep_postule" class="btn btn-default" rel="{$team->codteam}">Aceptar</button>
    </div>
</div>

