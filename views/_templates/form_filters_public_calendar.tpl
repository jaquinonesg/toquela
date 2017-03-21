<div class="alert well fade in" style="color: #000000;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
    <h2 class="text-center">FILTRAR POR:</h2>
    <br>
    <form id="{$type_public_filter}" class="form-filter">
        <input name="torn" id="torn" type="hidden" value="{$tournament->codtournament}"/>
        <div class="form-group" style="margin-bottom: 5px;">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="fase" class="form-control">
                    <option>Fase</option>
                    {foreach from=$filter_fases item=fase}
                        <option value="{$fase->num}" type="{$fase->type}" {if $fase->num == $filter->fase}selected=""{/if}>{$fase->num}</option>
                    {/foreach}
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="grupo" class="form-control">
                    <option>Grupo</option>
                    {foreach from=$filter_grupos item=grupo}
                        <option value="{$grupo->num}" {if $grupo->num == $filter->grupo}selected=""{/if}>{$grupo->num}</option>
                    {/foreach}
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="jornada" class="form-control">
                    <option>Jornada</option>
                    {foreach from=$filter_jornadas item=jornada}
                        <option value="{$jornada->num}" {if $jornada->num == $filter->jornada}selected=""{/if}>{$jornada->num}</option>
                    {/foreach}
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="margin-bottom: 7px;">
            <div class="input-group date fechas_filter col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 2px;" data-date="{if !empty($filter->fechaA)}{$filter->fechaA}{/if}" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd" data-link-field="filter_fechaA">
                <input class="form-control" size="16" type="text" value="{if !empty($filter->fechaA)}{$filter->fechaA}{/if}" placeholder="Fecha inical" readonly disabled="disabled"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                <input type="hidden" name="fechaA" id="filter_fechaA" value="{if !empty($filter->fechaA)}{$filter->fechaA}{/if}"/>
            </div>
            <div class="input-group date fechas_filter col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 2px;" data-date="{if !empty($filter->fechaB)}{$filter->fechaB}{/if}" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd" data-link-field="filter_fechaB">
                <input class="form-control" size="16" type="text" value="{if !empty($filter->fechaB)}{$filter->fechaB}{/if}" placeholder="Fecha final" readonly disabled="disabled"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                <input type="hidden" name="fechaB" id="filter_fechaB" value="{if !empty($filter->fechaB)}{$filter->fechaB}{/if}"/>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="margin-bottom: 5px;">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="padding: 2px;">
                <div class="input-group">
                    <span class="input-group-addon cursor" id="remove-autocomplete-filter"><span class="glyphicon glyphicon-remove"></span></span>
                    <input type="text" class="form-control" id="autocomplete-filter" value="{$filter->strfilter}" placeholder="Ingresa algo"/>
                    <input type="hidden" id="hid-strfilter" name="strfilter" value="{$filter->strfilter}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="typefilter" id="typefilter" class="form-control">
                    {foreach from=$tipos_filtros key=index item=tifiltro}
                        <option value="{$index}" {if $index == $filter->typefilter}selected=""{/if}>{$tifiltro}</option>
                    {/foreach}
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="padding: 2px;margin: 0;">
            <button type="button" id="btn-{$type_public_filter}" class="btn btn_blue_light">Filtrar</button>
            <button id="btn-quit-{$type_public_filter}" type="button" class="btn btn-default">Quitar filtros</button>
        </div>
    </form>
</div>