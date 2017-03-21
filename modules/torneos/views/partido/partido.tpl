<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/modules/torneos/views/partido/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/partido/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/partido/js/partido.js"></script>
<div class="partido">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-torneo" style="margin-left: 0; margin-top: 15px">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="title text-center"><strong>PARTIDO: {$match_info->local->name} VS {$match_info->visitant->name}</strong></p>
            </div>
        </div>
        {if ($match_info->tournament->type=="Eliminación directa")}
        <div class="alert alert-danger fade in text-left">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <p><strong>¡Tenga en cuenta! </strong> Este es un partido que pertenece a un torneo por Eliminación directa, por lo tanto, no pueden existir empates, tiene que haber un ganador unánime por cada partido. Si es necesario, es precisa la definición por penales.</p>
        </div>
        {/if}
    <div class="text-center">
        <button type="button" class="btn btn_blue_light" id="btn_info_config" style="margin-top: 10px;">
            <img src="{$_params.site}/public/img/icons/jornadas.png"/>
            &nbsp;&nbsp; INFORMACIÓN
        </button>
        <button type="button" class="btn btn-default" id="btn_guardar_partido" style="border: 3px solid #4b657d;margin-top: 10px;">
            <img src="{$_params.site}/public/img/icons/ganado.png"/>
            &nbsp;&nbsp; GUARDAR PARTIDO
        </button>
    </div>
    <div class="clear"><br></div>
    <div class="pestanas_partido">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="_equipo_local">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {if ($match_info->scorelocal < 0)}
                <button type="button" class="btn-goles-logic efect-hover btn-para-left" id="btn_add_local_contra" code-match="{$match_info->codmatch}" soy="local" score="{$match_info->scorelocal}" style="position: absolute;left: 0;" title="Sumar goles en contra">
                    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Sumar goles en contra</span>
                    <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GC</span>
                    <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
                    {if $match_info->golescontravisitant >= 10}
                    <div class="contador-partido" style="display: none">{$match_info->golescontralocal}</div>
                    {else}
                    <div class="contador-partido" style="display: none">&nbsp;{$match_info->golescontralocal}&nbsp;</div>
                    {/if}
                </button>
                <button type="button" class="btn-goles-logic efect-hover restaurar_marcador" code-match="{$match_info->codmatch}" soy="local" style="position: absolute;left: 0;top: 38px;" title="Restaurar marcador">
                    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-repeat"></span>&nbsp;Restaurar marcador</span>
                    <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-repeat"></span>&nbsp;RM</span>
                </button>
        {else}               
        <!-- <button type="button" class="btn-goles-logic efect-hover btn-para-left" id="btn_add_local_favor" code-match="{$match_info->codmatch}" soy="local" style="position: absolute;left: 0;" title="Sumar goles a favor">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Goles a favor</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GF</span> -->
            <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
            <!-- {if $match_info->golescontravisitant >= 10}
            <div class="contador-partido" style="display: none">{$match_info->golesfavorlocal}</div>
            {else}
            <div class="contador-partido" style="display: none">&nbsp;{$match_info->golesfavorlocal}&nbsp;</div>
            {/if}
        </button> -->
        {/if}
            </div>
            <p class="number" id="marcador_local">
                {if ($match_info->scorelocal < 0)}
                W
                <input type="text" id="input-local" value="W" style="display: none;">
                {elseif isset($match_info->scorelocal)}
                {$match_info->scorelocal}
                <input type="text" id="input-local" value="{$match_info->scorelocal}" style="display: none;">
                {else}
                0
                <input type="text" id="input-local" value="0" style="display: none;" islocal="{$statis->islocal}" index="{$auxcont}" statistic="{$statis->codstatistics}" typestatistic="{$statis->codtypestatistic}">
                {/if}
            </p>
            <p>{$match_info->local->name|upper}</p>
        </br>
        <button type="button" class="btn btn-sm btn_blue_light" id="btn_add_local">
            <img src="{$_params.site}/public/img/icons/camiseta.png"/>
            AGREGAR A LOCAL
        </button>
    </br>
    <div class="capsula" id="resumen_local">
        <h4 class="text-verde">RESUMEN LOCAL</h4>
        <br>
        {include file=$_params.root|cat:"views/_templates/template_resumen_local.tpl"}
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="_equipo_visitante">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {if ($match_info->scorevisitant < 0)}
        <button type="button" class="btn-goles-logic efect-hover btn-para-right" id="btn_add_visitant_contra" code-match="{$match_info->codmatch}" soy="visitante" score="{$match_info->scorevisitant}" style="position: absolute;right: 0;" title="Sumar goles en contra">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Sumar goles en contra</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GC</span>
            <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
            {if $match_info->golescontravisitant >= 10}
            <div class="contador-partido cont-right" style="display: none">{$match_info->golescontravisitant}</div>
            {else}
            <div class="contador-partido cont-right" style="display: none">&nbsp;{$match_info->golescontravisitant}&nbsp;</div>
            {/if}
        </button>
        <button type="button" class="btn-goles-logic efect-hover restaurar_marcador" code-match="{$match_info->codmatch}" soy="visitante" style="position: absolute;right: 0;top: 38px;" title="Restaurar marcador">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-repeat"></span>&nbsp;Restaurar marcador</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-repeat"></span>&nbsp;RM</span>
        </button>
    {else}    
   <!--  <button type="button" class="btn-goles-logic efect-hover btn-para-right" id="btn_add_visitant_favor" code-match="{$match_info->codmatch}" soy="visitante" style="position: absolute;right: 0;" title="Sumar goles a favor">
    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Goles a favor</span>
        <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GF</span> -->
        <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
<!--         {if $match_info->golescontravisitant >= 10}
        <div class="contador-partido cont-right" style="display: none">{$match_info->golesfavorvisitant}</div>
        {else}
        <div class="contador-partido cont-right" style="display: none">&nbsp;{$match_info->golesfavorvisitant}&nbsp;</div>
        {/if}
    </button> -->
    {/if}
    </div>
    <p class="number" id="marcador_visitante">
        {if ($match_info->scorevisitant < 0)}
        W
        <input type="text" id="input-visitante" value="W" style="display: none;">
        {elseif isset($match_info->scorevisitant)}
        {$match_info->scorevisitant}
        <input type="text" id="input-visitante" value="{$match_info->scorevisitant}" style="display: none;">
        {else}
        0
        <input type="text" id="input-visitante" value="0" style="display: none;" islocal="{$statis->islocal}" index="{$auxcont}" statistic="{$statis->codstatistics}" typestatistic="{$statis->codtypestatistic}">
        {/if}
    </p>
    <p>{$match_info->visitant->name|upper}</p>
</br>
<button type="button" class="btn btn-default" id="btn_add_visitante" style="border: 3px solid #4b657d;">
    <img src="{$_params.site}/public/img/icons/camiseta.png"/>
    AGREGAR A VISITANTE
</button>
</br>
<div class="capsula" id="resumen_visitante">
    <h4 class="text-verde">RESUMEN VISITANTE</h4>
    <br>
    {include file=$_params.root|cat:"views/_templates/template_resumen_visitant.tpl"}
</div>
</div>
</div>
</br>
</div>
<input type="hidden" id="_match" value="{$match_info->codmatch}"/>
<input type="hidden" id="date_realizacion" value="{$match_info->date}"/>
<input type="hidden" id="_num_statistic_local" value="{$num_statistic_local-1}"/>
<input type="hidden" id="_num_statistic_visitant" value="{$num_statistic_visitant-1}"/>
<input type="hidden" id="_scorelocal" value="
{if isset($match_info->scorelocal)}
{$match_info->scorelocal}
{else}
0
{/if}"/>
<input type="hidden" id="_scorevisitant" value="
{if isset($match_info->scorevisitant)}
{$match_info->scorevisitant}
{else}
0
{/if}"/>
<div class="clear"></br></div>
</div>
</div>
<!-- popup de goles en contra -->
{include file=$_params.root|cat:"modules/torneos/views/partido/sections/popup_gol_en_contra.tpl"}
<!-- popup de goles a favor -->
{include file=$_params.root|cat:"modules/torneos/views/partido/sections/popup_gol_a_favor.tpl"}
<div class="div-goles-favor-contra" style="display: none">
    fl<input type="text" class="goles-favor-local" value="{$match_info->golesfavorlocal}">
    cl<input type="text" class="goles-contra-local" value="{$match_info->golescontralocal}">
    
    fv<input type="text" class="goles-favor-visitante" value="{$match_info->golesfavorvisitant}">
    cv<input type="text" class="goles-contra-visitante" value="{$match_info->golescontravisitant}">
</div>
<!--  display none -->
<div class="display_none">
    <span id="popup_config_info_body">
        <!--div class="info_partido">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Torneo: </td>
                        <td>{$match_info->tournament->name}</td>
                    </tr>
                    <tr>
                        <td>Tipo torneo: </td>
                        <td>{$match_info->tournament->type}</td>
                    </tr>
                    <tr>
                        <td>Número de equipos en el torneo: </td>
                        <td>{$match_info->tournament->numberparticipants}</td>
                    </tr>
                    <tr>
                        <td>Fecha Programada: </td>
                        <td>{$match_info->date}</td>
                    </tr>
                    <tr>
                        <td>Hora: </td>
                        <td>{$match_info->hour}</td>
                    </tr>
                    <tr>
                        <td>Fecha Realización: </td>
                        <td>
                            <div class="input-group date" id="contend_fecha_realizacion" data-date-format="dd MM yyyy" data-link-field="date_realizacion" data-link-format="yyyy-mm-dd">
                                <input type="text" class="form-control" value="{$match_info->date}" name="date" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lugar: </td>
                        <td>
            {if isset($match_info->location)}<p><strong>Lugar</strong> {$match_info->location}</p>{/if}
            {if isset($match_info->descriptionplace)}<p><strong>Descripción del lugar:</strong> {$match_info->descriptionplace}</p>{/if}
            </td>
            </tr>
            </tbody>
            </table>
        </div-->
    </span>
    <span id="popup_config_info_footer">
        <!--button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Aceptar</button-->
    </span>
    <span id="popup_local_body">
        <!--div class="add_local pop_add">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas text-center">
                <h4 class="text-verde">{$match_info->local->name|upper}</h4>
                <br>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <div class="input-group">
                    <input type="text" maxlength="3" class="form-control add_minuto" value="0" onkeypress="validate.validateInsertNumeric()">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn_add" type="button">
                            <span class="glyphicon glyphicon-time"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <select class="form-control selectpicker add_type_statistic">
            {foreach from=$types_statistics item=type_statistic key=count}
            <option value="{$type_statistic->codtypestatistic}" icon="{$type_statistic->icon}" data-content='<span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/{$type_statistic->icon}"></span>&nbsp;&nbsp;{$type_statistic->name}' title="{$type_statistic->description}">{$type_statistic->name}</option>
            {/foreach}
            </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
            <select class="form-control selectpicker add_player">
            <option value="1" data-content='<span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;Sin asignar'>Sin asignar</option>
            {foreach from=$match_info->local->players item=player key=count}
            <option value="{$player->coduser}" data-content='<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;{$player->name} {$player->lastname}'>{$player->name} {$player->lastname}</option>
            {/foreach}
            </select>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas">
            <textarea class="form-control add_description" rows="3" placeholder="Descripción"></textarea>
            </div>
            </div>
            <div class="clear"></div-->
            </span>
            <span id="popup_local_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_save_local">Guardar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="update_resumen_local_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_update_resumen_local">Actualizar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="popup_visitant_body">
        <!--div class="add_visitant pop_add">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas text-center">
                <h4 class="text-verde">{$match_info->visitant->name|upper}</h4>
                <br>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <div class="input-group">
                    <input type="text" maxlength="3" class="form-control add_minuto" value="0" onkeypress="validate.validateInsertNumeric()">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn_add" type="button">
                            <span class="glyphicon glyphicon-time"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <select class="form-control selectpicker add_type_statistic">
            {foreach from=$types_statistics item=type_statistic key=count}
            <option value="{$type_statistic->codtypestatistic}" icon="{$type_statistic->icon}" data-content='<span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/{$type_statistic->icon}"></span>&nbsp;&nbsp;{$type_statistic->name}' title="{$type_statistic->description}">{$type_statistic->name}</option>
            {/foreach}
            </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
            <select class="form-control selectpicker add_player">
            <option value="1" data-content='<span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;Sin asignar'>Sin asignar</option>
            {foreach from=$match_info->visitant->players item=player key=count}
            <option value="{$player->coduser}" data-content='<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;{$player->name} {$player->lastname}'>{$player->name} {$player->lastname}</option>
            {/foreach}
            </select>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas">
            <textarea class="form-control add_description" rows="3" placeholder="Descripción"></textarea>
            </div>
            </div>
            <div class="clear"></div-->
            </span>
            <span id="popup_visitant_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_save_visitant">Guardar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="update_resumen_visitant_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_update_resumen_visitant">Actualizar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
</div>