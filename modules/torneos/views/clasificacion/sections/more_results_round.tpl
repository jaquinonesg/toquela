<link href="{$_params.site}/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<span class="clasificacion">
{if isset($goleadores)}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="4" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Goleadores</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_21.png"></span></th>
        </tr>
        {foreach from=$goleadores item=goleador key=i}
        <tr>
            <td class="text-center" >{$i+1}</td>
            <td>{$goleador->Nombre}</td>
            {if $goleador->Nombre == 'Sin asignar Sin asignar'}
            <td>Sin equipo</td>
            {else}
            <td>{$goleador->equipo}</td>
            {/if}
            <td class="text-center">{$goleador->Goles}</td>
        </tr>
        {/foreach}
    </table>
</div>
{/if}
{if isset($tarjetas)}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="7" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Tarjetas</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_5.png"></span></th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_6.png"></span></th>
            <th class="text-center" style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;">Total</th>
        </tr>
        {foreach from=$tarjetas item=tarjeta key=i}
        <tr data-toggle="collapse" data-target="#accordion-{$i}" class="clickable">
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$i+1}</td>
            <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$tarjeta->Nombre}</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            {if $tarjeta->Amarillas == ''}0{else}{$tarjeta->Amarillas}{/if}
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            {if $tarjeta->Rojas == ''}0{else}{$tarjeta->Rojas}{/if}
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$tarjeta->Equipo}</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{if $tarjeta->Total == ''}0{else}{$tarjeta->Total}{/if}</td>
        </tr>
        <tr>
            <td colspan="7" style=" padding: 0px;">
                <div id="accordion-{$i}" class="collapse">
                    <table class="table-match" style="border-bottom:3px solid #ddd;width:100%">
                        <tr>
                            <td class="text-center" style="border-top: 0px;">#</td>
                            <td class="text-center" style="border-top: 0px;">Descripción</td>
                            <td class="text-center" style="border-top: 0px;">Estado Tarjeta</td>
                            <td class="text-center" style="border-top: 0px;">Ir al partido</td>
                        </tr>
                        {foreach from=$tarjeta->partidos item=estadistica key=a}
                        <tr>
                            <td class="text-center">
                            {if $estadistica->Codtypestatistic == 5}
                            <span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_5.png"></span>
                            {/if}
                            {if $estadistica->Codtypestatistic == 6}
                            <span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_6.png"></span>
                            {/if}
                            </td>
                            <td class="text-center">{$estadistica->Descripcion}</td>
                            {if $estadistica->Estado == 1}
                            <td class="text-center">Pagada</td>
                            {else}
                            <td class="text-center">No pagada</td>
                            {/if}
                            <td class="text-center">
                            <a class="ir-match" href="{$_params.site}/torneos/partido/index/{$estadistica->Codmatch}" target="_blank"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
                        </tr>
                        {/foreach}
                    </table>
                </div>
            </td>
        </tr>
        {/foreach}
    </table>
    
</div>
{/if}
<!-- ahora las azules son sanciones -->
{if isset($sanciones[0])}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style="border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="7" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Sanciones</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_23.png"></span></th>
            <th class="text-center" style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;">Total</th>
        </tr>
        {foreach from=$sanciones item=sancion key=i}
        <tr data-toggle="collapse" data-target="#accordion-dos-{$i}" class="clickable">
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$i+1}</td>
            <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$sancion->Nombre}</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            {if $sancion->Sanciones == ''}0{else}{$sancion->Sanciones}{/if}
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{$sancion->Equipo}</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">{if $sancion->Total == ''}0{else}{$sancion->Total}{/if}</td>
        </tr>
        <tr>
            <td colspan="7" style=" padding: 0px;">
                <div id="accordion-dos-{$i}" class="collapse">
                    <table class="table-match" style="border-bottom:3px solid #ddd;width:100%">
                        <tr>
                            <td class="text-center" style="border-top: 0px;">#</td>
                            <td class="text-center" style="border-top: 0px;">Descripción</td>
                            <td class="text-center" style="border-top: 0px;">Estado Tarjeta</td>
                            <td class="text-center" style="border-top: 0px;">Ir al partido</td>
                        </tr>
                        {foreach from=$sancion->partidos item=estadistica key=u}
                        <tr>
                            <td class="text-center">{$u+1}</td>
                            <td class="text-center">{$estadistica->Descripcion}</td>
                            {if $estadistica->Estado == 1}
                            <td class="text-center">Pagada</td>
                            {else}
                            <td class="text-center">No pagada</td>
                            {/if}
                            <td class="text-center">
                            <a class="ir-match" href="{$_params.site}/torneos/partido/index/{$estadistica->Codmatch}" target="_blank"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
                        </tr>
                        {/foreach}
                    </table>
                </div>
            </td>
        </tr>
    {/foreach}
</table>

</div>
{/if}

{if isset($vallamenosvencida)}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="6" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Valla menos vencida</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_22.png"></span></th>
        </tr>
        {foreach from=$vallamenosvencida item=valla key=i}
        <tr>
            <td class="text-center">{$i+1}</td>
            <td>{$valla.name}</td>
            <td class="text-center">
                <span class="glyphicon">
                    {if $valla.goles == ''}0{else}{$valla.goles}{/if}
            </td>
        </tr>
        {/foreach}
    </table>
</div>
{/if}
{if !isset($goleadores) && !isset($tarjetas) && !isset($sanciones) && !isset($vallamenosvencida)}
<p style="margin-top: 5%; margin-bottom: 5%; font-weight: bold;" class="text-center">En este momento no hay más resultados</p>
{/if}
</span>