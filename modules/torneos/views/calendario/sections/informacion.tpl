<link href="{$_params.site}/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$_params.site}/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/calendario.js"></script>
<div class="informacion">
    {$menu_perfil == 4}
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init div-contenedor-partidos">
        <div class="clear"></br></div>
        <h4 class="text-verde"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;<strong>GRUPO {$round}</strong></h4>
        <br>
        <a href="#" target="_blank"></a>
        {$config_calendar = true}
        <!-- {include file=$_params.root|cat:"views/_templates/info_calendario.tpl"} -->
        <table class="table table-responsive table-hover" id="info_round">
            <tbody>
                {foreach from=$matches item=match key=key}
                    {$class_program = "titulo-calendar"}
                    {if empty($match->date) || empty($match->hour)}
                        {$class_program = "titulo-calendar-noprogramdo"}
                    {/if}
                    <tr class="{$class_program}">
                        <td>
                            <div class="contador-partido"># {($key+1)}</div>
                            <p class="text-right">{$match->local->name}</p>
                        </td>
                        <td class="resultado" style="vertical-align: middle" title="R: Resultado parcial del partido">
                            {$result_aux = ""}
                            {if $match->scorelocal < 0}
                                {$result_aux = "W"}
                            {else}
                                {$result_aux = $match->scorelocal}
                            {/if}
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <input type="text" class="form-control result_match input-resultado" name="result_team1" code="{$match->teamlocal}" value="{$result_aux}" disabled="disabled" readonly="readonly"/>
                            {$result_aux = ""}
                            {if $match->scorevisitant < 0}
                                {$result_aux = "W"}
                            {else}
                                {$result_aux = $match->scorevisitant}
                            {/if}
                            <input type="text" class="form-control result_match input-resultado" name="result_team2" code="{$match->teamvisitant}" value="{$result_aux}" disabled="disabled" readonly="readonly"/>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </td>
                        <td>
                            <p class="text-left">{$match->visitant->name}</p>
                        </td>
                    </tr>
                    <tr class="info-calendar" data-match="{$match->codmatch}" codlocal="{$match->teamlocal}" codvisitante="{$match->teamlocal}">
                        <td colspan="2" class="contain-time" style="vertical-align: middle">
                            <div class="form-group">
                                <p class="text-left">Fecha y hora del partido: </p>
                                <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p" title="{$match->date} {$match->hour}" data-link-field="dtp_input{$key}">
                                    <input class="form-control" size="16" type="text" value="{$match->date} {$match->hour}" readonly name="date"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" name="date_time_hid" id="dtp_input{$key}" value="{$match->date} {$match->hour}"/>
                                <br>
                                <p class="text-left">Lugar: </p>
                                <textarea class="form-control" maxlength="150" name="descriptionplace" placeholder="Lugar (Nombre lugar, direccíon, barrio, cancha, información adicional)" rows="4">{$match->descriptionplace}</textarea>
                            </div>
                        </td>
                        <td class="contain-selects" style="text-align: left;">
                            <div class="form-group">
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="margin: 0; padding: 0;">
                                    <p><a href='{$_params.site}/complejos/' target='_blank'>Cancha: </a>
                                        <button type="button" class="btn btn-lg btn-default popover-dismiss btn-help" style="margin-top: -6px;" data-toggle="popover" data-placement="top" title="<a href='{$_params.site}/complejos/' target='_blank'>Complejos Tóquela</a>" data-content="Aquí puede seleccionar complejos que están registrados en tóquela, estos tienen canchas que podrá asignar al partido <a href='{$_params.site}/complejos/' target='_blank'>VER COMPLEJOS</a>.">
                                            <span class="glyphicon glyphicon-question-sign"></span>
                                        </button>
                                    </p>
                                    <select class="form-control selectpicker" name="complex">
                                        <option value="1">Sin cancha</option>
                                        {foreach from=$complex item=c}
                                            {if $c->codcomplex != 1}
                                                {if $c->codcomplex == $match->codcomplex}
                                                    <option value="{$c->codcomplex}" selected="">{$c->name}</option>
                                                {else}
                                                    <option value="{$c->codcomplex}">{$c->name}</option>
                                                {/if}
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin: 0; padding: 0; padding-left: 4px; text-align: center;">
                                    <p><strong>J</strong>ornada: </p>
                                    <input class="form-control numeric" title="Jornada" style="width: 40px; display: inline-block;" name="jornada" type="text" value="{$match->numjornada}" maxlength="3"/>        
                                </div>
                                <div class="clear"><br></div>
                                <p class="text-left">Arbitros, veedores o encargados:</p>
                                <textarea class="form-control" maxlength="150" name="arbitros" placeholder="Arbitros, veedores o encargados" rows="4">{$match->arbitros}</textarea>
                            </div>
                        </td>
                    </tr>
                {/foreach}
            <tbody>
        </table>
        <div class="btns-static-flotante" style="display: none">
                <button class="btn btn-default button_save_round">&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;</button>
                <a href="{$_params.site}/torneos/calendario/index/?torn={$tournament->codtournament}">
                    <button class="btn btn-default">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
                </a>
        </div>
        <div class="btns-aparezcan" style="display: none">
            <button class="btn btn-default button_save_round">&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;</button>
            <a href="{$_params.site}/torneos/calendario/index/?torn={$tournament->codtournament}">
                <button class="btn btn-default">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
            </a>
        </div>
        <input type="hidden" id="rel" value="{$tournament->codtournament}"/>
        <br>
        <div class="alert alert-info hide" id="sucess_round"></div>
        <div class="alert alert-danger hide" id="danger_round"></div>
        <div class="clear"></br></div>
    </div>
</div>