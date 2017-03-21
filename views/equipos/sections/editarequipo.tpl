{if $iscreator}
<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui.js"></script>
{*<script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/backbone.js"></script>*}

<div class="crearequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {$menu_equipo = 2}
            {include file=$_params.root|cat:"views/_templates/info-equipo.tpl"}
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                <p class="div-title">{$team->name|upper}</p>
            </div>
            <br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre de equipo</label>
                    <input type="text" class="form-control Inp" id="name" value="{$team->name}" maxlength="70" placeholder="Nombre" autofocus="" required=""/>
                </div>
                <div class="form-group">
                    <label for="sex">Género</label>
                    <select class="form-control Inp" id="sex" autofocus="" required="">
                        <option {if $team->type == 'MALE'}selected=""{/if}>Masculino</option>
                        <option {if $team->type == 'FEMALE'}selected=""{/if}>Femenino</option>
                        <option {if $team->type == 'MIXED'}selected=""{/if}>Mixto</option>           
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control Inp" id="description" rows="3" autofocus="" required="">{$team->description}</textarea>
                </div>
                <input type="hidden" value="{$team->codlocality}" id="codlocalityhidden"/>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="typefutbol">Tipo de Fútbol</label>
                <select class="form-control" id="typefutbol">
                    {foreach from=$types item=type}
                    {if $type_current->codvirtues == {$type->codvirtues}}
                    <option value="{$type->codvirtues}" selected="">{$type->name}</option>
                    {else}
                    <option value="{$type->codvirtues}">{$type->name}</option>
                    {/if}
                    {/foreach}
                </select>
                <br>
                <div class="form-group">
                    <label for="codcity">Ciudad</label>
                    <select name="codcity" id="codcity" class="form-control Inp" autofocus="" required="">
                        {foreach from=$cities item=city}
                        <option value='{$city->codcity}' {if $user->codcity == $city->codcity}selected{/if}>{$city->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group">
                    <label for="locality">Localidad</label>
                    <select name="codlocality" class="form-control Inp" id="locality">
                        <option>Seleccione...</option>                            
                    </select>
                </div>
                <script type="text/javascript">
                    $('select[name=codcity] option[value={$current_city->codcity}]').attr('selected', 'selected');
                </script>
            </div>
            <div class="clear"><br></div>
            <div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                    <p class="div-title">GALERÍA</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 2%;">
                    <div class="form-group contPic">
                        <label for="file_team">Seleccione una imagen de su equipo:</label>
                        <input class="Inp file_team btn btn-white" id="file_team" type="file" data-code="{$team->codteam}"/>
                    </div>
                    <br>
                    {if isset($attachments)}
                    {foreach from=$attachments item=attachment}
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="capagaleria img-thumbnail">
                            <button class="delete_img btn btn-danger" style="position: absolute; left: 0; top:0;" data-team="{$team->codteam}" data-code="{$attachment->codattachment}">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <button class="select_img btn btn-info escojo_esta" style="position: absolute; right: 0; bottom:0;" data-team="{$team->codteam}" data-code="{$attachment->codattachment}">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <a class="previa" rel="gallery1" href="{$_params.site}/public{$attachment->path}">
                                <img alt="previa" style="width: 100%;" src="{$_params.site}/public{$attachment->path}"/>
                            </a>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                    {/foreach}
                    <div class="clear"></div>
                    {else}
                    <p>No se ha súbido ninguna imagen...</p>
                    {/if}
                </div>

                {if isset($captain)}
                <div class="clear"><br></div>
                {/if}
                <div class="clear"><br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                        <p class="div-title">JUGADORES</p>
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div style="border: 2px solid #ddd; padding: 15px;">
                            <div>
                                <p class="text-center" style="font-size: 20px;"><strong class="resalta">ORGANIZADOR DEL EQUIPO: </strong>{$captain->name} {$captain->lastname} </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inscribir-jugadores" style="padding: 0px;">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="border-right: 1px solid #ddd;">
                                <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Inscribir jugadores al equipo:</p>
                                <div class="content">
                                    <p><span class="resalta">1)</span> Descargar plantilla base.&nbsp;<span class="glyphicon glyphicon-arrow-right resalta"></span>&nbsp;<a class="btn btn-sm efect-hover" href="{$_params.site}/public/descargables/plantilla_base.xlsx">Descargar</a></p>
                                    <p><span class="resalta">2)</span> Llenar la tabla con los usuarios que necesite agregar.</p>
                                    <p><span class="resalta">3)</span> Subir el archivo excel que creó.&nbsp;<span class="glyphicon glyphicon-arrow-right resalta"></span>&nbsp;<label for="axel" class="btn btn-sm efect-hover">Subir excel</label>
                                        <input id="axel" type="file" style="visibility:hidden">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="border-left: 1px solid #ddd;">
                            <p style="font-size: 18px;text-align: center;margin-top: 2%;margin-bottom: 2%;">JUGADORES</p>
                                <div class="paneles" panel=equipo>
                                    {if count($players)>1}
                                    <table class="table">
                                        {foreach from=$players item=player}
                                        {if ($player->status == 'POSTULANT')}
                                        <tr>
                                            <td>
                                                {$player->name} {$player->lastname}
                                            </td>
                                            <td>
                                                <button class="aceptar_jugador btn btn-default" data-code="{$player->coduser}" data-team="{$team->codteam}">Aceptar</button>
                                                <button class="rechazar_jugador btn btn-default" data-code="{$player->coduser}" data-team="{$team->codteam}">Rechazar</button>
                                            </td>
                                        </tr>
                                        {elseif ($player->status != 'CAPTAIN')}
                                        <tr>
                                            <td>
                                                {$player->name} {$player->lastname}
                                            </td>
                                            <td>
                                                {if !isset($captain) || $captain->coduser != $player->coduser}
                                                <button class="remove_user_team btn btn-sm btn-danger" data-code="{$player->coduser}" data-team="{$team->codteam}">
                                                    <span class="glyphicon glyphicon-remove-circle">
                                                    </button>
                                                    <button class="captain_team btn btn-sm btn-default" data-code="{$player->coduser}" data-team="{$team->codteam}">Asignar como organizador</button>
                                                    <a class="btn btn-sm btn-default" href="{$_params.site}/perfil?cod={$player->coduser}" >Editar Jugador</button>
                                                    {/if}
                                                </td>    
                                            </tr>
                                            {/if}
                                            {/foreach}
                                        </table>
                                        {else}
                                        <p>Sin jugadores</p>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"><br></div>
                        <div style="text-align: center;">
                            <p><strong>Invitar jugadores a través de:</strong></p>
                            <img data-code="{$team->codteam}" class="cursor" src="{$_params.site}/public/img/redes/fbtoquela.png" alt="Facebook" title="Facebook" id="btn_facebook"/>
                            <img data-code="{$team->codteam}" class="cursor" src="{$_params.site}/public/img/redes/twtoquela.png" alt="Twitter" title="Twitter"id="btn_twitter"/>
                            <!--a class="popup" href="#message_form"><img src="{$_params.site}/public/img/redes/email.png"/></a-->
                            <!--a class="popup" href="#search_form"><img src="{$_params.site}/public/img/redes/toquela.png"/></a-->
                        </div>
                        <div class="clear"><br></div>
                        <div class="text-center">
                            <button id="update_team" class="btn btn_blue_light" style="width: 70%;" data-code="{$team->codteam}">Actualizar Equipo</button>
                            <br>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                </div>
            </div>

            <div style="display:none">
                <form id="search_form" method="post" action="">
                    <p>
                        <span for="username">USERNAME</span>
                        <input type="text" name="username" size="30" id="username" />
                        <button id="add_player_team" data-code="{$team->codteam}">Agregar al equipo</button>
                    </p>
                </form>
            </div>
            <div style="display: none;">
                <form id="message_form" method="post" action="">
                    <div>            
                        <span for="your_name">Tu nombre</span>
                    </div>
                    <div>
                        <input type="text" name="your_name" size="30" id="your_name" />
                    </div>
                    <div>            
                        <span for="your_email">Tu correo electrónico</span>
                    </div>
                    <div>
                        <input type="text" name="your_email" size="30" id="your_email" />
                    </div>
                    <div>            
                        <span for="email_friends">El correo electrónico de tu amigo</span>
                    </div>
                    <div>
                        <input type="text" name="email_friends" size="30" id="email_friends" />
                    </div>
                    <div>            
                        <span for="subject">Asunto</span>
                    </div>
                    <div>
                        <input type="text" name="subject" size="30" id="subject" />
                    </div>
                    <div>            
                        <span for="message">Mensaje</span>
                    </div>
                    <div>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <div>
                        <button id="send_message">Enviar</button>
                    </div>
                </form>
            </div>
            {else}
            <div class="crearequipo">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
                    <div class="row">
                        {$menu_equipo = 2}
                        {include file=$_params.root|cat:"views/_templates/info-equipo.tpl"}
                        <br>
                        <p class="text-center">Solo el capitán puede editar este equipo.</p>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            {/if}

            <div class="displayes-out">
                <div id="mensaje-jugadores-excel" style="display: none;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mensaje-jugadores-excel" style="padding: 0px;">
                    <p class="text-center resalta" style="font-size: 22px;margin-bottom: 2%;">Información</p>
                        <!--Nuevos en el equipos-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 registrado tipo" style="display: none">
                            <p class="title" style="background-color: #06ABB2">Nuevos usuarios</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Usuarios registrados exitosamente.</p>
                            <div class="content"></div>
                        </div>
                        <!--ya estaba en el equipos-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ya-registrado tipo" style="display: none">
                            <p class="title" style="background-color: #6E6E6E">Usuarios duplicados</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Los siguientes usuarios se encontraban registrados en el equipo anteriormente:</p>
                            <div class="content"></div>
                        </div>
                        <!--Algun error-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 correo-mal tipo" style="display: none">
                            <p class="title" style="background-color: #8A0808" >Problemas con la creación de usuarios</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Ha ocurrido un error en la creación de algunos usuarios, le sugerimos confirmar la información que quiere ingresar y/o completarla si el problema persiste. </p>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>
                <input id="codigo_equipo" type="text" value="{$team->codteam}" style="display: none;">
            </div>