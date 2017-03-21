<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/torneos.js"></script>
<div class="modificar_torneo">
    {$menu_perfil = 1} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon glyphicon-edit" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Editar</strong></p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 elminar-torneo">
            <button class="btn btn-danger delete-torneo" data="{$tournament->codtournament}"><span class="glyphicon glyphicon-trash" title="Eliminar"></span><!-- &nbsp;Eliminar torneo --></button>
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="update-torneo">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="clear"></br></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                            {if !is_null($tournament->poster)}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-img-torneo">
                                <img class="img-responsive" src="{$_params.site}/public/{$tournament->poster}" class="img-thumbnail"/>
                            </div>
                            {/if}
                        </div>
                        <div class="clear"><br></div>
                        <label for="img_poster" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Poster</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="file" class="form-control" id="img_poster" data-code="{$tournament->codtournament}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_tournament" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Nombre del torneo</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="name_tournament" placeholder="Nombre del torneo" maxlength="60" value="{$tournament->name}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Descripción</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="description">{$tournament->description}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_start" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Inicio &nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up" style="font-size: 20px;"></span></label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="date_start" placeholder="Fecha de inicio" value="{$tournament->start}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_end" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Fin &nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down" style="font-size: 20px;"></span></label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="date_end" placeholder="Fecha finalización" value="{$tournament->end}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="places" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Sedes</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="places">{$tournament->places}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contacts" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Contactos</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="contacts">{$tournament->contacts}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rules" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Reglas</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="rules">{$tournament->rules}</textarea>
                        </div>
                    </div>
                </form>
            </div>
<!--             <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-verde inscripcion">
                <div class="clear"></br></div>
                <div class="invitacion">
                    <h4>Invita a tus amigos</h4>
                    </br>
                    <div class="item" id="invita_face_book">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/face_book.png"/></span></div>
                    <div class="item" id="invita_correo">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/mensaje.png"/></span></div>
                    <div class="item" id="invita_toquela">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/logo_toquela_icon.png"/></span></div>
                </div>
            </div> -->
            <div class="clear"></div>
            <div class="text-center">
                </br>
                <button type="button" id="btn_update" class="btn btn_blue_light" data-code="{$tournament->codtournament}">&nbsp;&nbsp;&nbsp;&nbsp;GUARDAR&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
        <div class="clear"></br></div>
    </div>
</div>
{if isset($firstEnter)}
<script type="text/javascript">
    $(document).ready(function() {
        if ($('#firstEnter').val() !== "") {
            component.messageSimple("Torneo...", $('#firstEnter').val());
        }
    });
</script>
<input id="firstEnter" value="{$firstEnter}" style="display: none;"/>
{/if}
