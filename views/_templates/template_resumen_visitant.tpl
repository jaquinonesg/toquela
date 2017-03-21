{foreach from=$statistics_visitant name=foo item=statis key=count}
{$auxcont = ($init + $count)}
{if !$solo_format}
<span id="_resu_visitant_contend_{$auxcont}">
    {/if}
    {$esconder_statistic = ''}
{if ($match_info->scorevisitant >= 0) && $statis->codtypestatistic == 19}
    {$esconder_statistic = 'esconder_statistic'}
{/if}
    <div class="formato_statistic {$esconder_statistic} btn col-xs-12 col-sm-12 col-ms-12 col-lg-12" data-toggle="popover" title="" data-placement="top" data-content="<p><strong>Minuto: </strong>{$statis->minute}</p><p><strong>Jugador: </strong>{$statis->player->name} {$statis->player->lastname}</p><p><strong>Descripción: </strong>{$statis->description}</p>" role="button" data-original-title="{$statis->type->name}"
        id="_resu_visi_{$auxcont}" index="{$auxcont}" minute="{$statis->minute}" date="{$statis->date}" islocal="{$statis->islocal}" typestatistic="{$statis->codtypestatistic}" player="{$statis->coduser}" partido="{$statis->codmatch}" description="{$statis->description}">
        <div class="col-xs-12 col-sm-12 col-md-6 col-xs-6" style="padding-left: 0">
            <span class="resu">
                <span>
                    <img class="img-thumbnail" src="{$_params.site}/public/files/icons_type_statistic/{$statis->type->icon}">
                </span>
                &nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;<span>{$statis->type->name}</span>
            </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-xs-6" style="padding-left: 0">
        {if $isPartidoCalendar === true}
        <span class="actions_resumen">
            {if $statis->codtypestatistic == 5 || $statis->codtypestatistic == 6 || $statis->codtypestatistic == 21}
            <!-- lógica para el estado de las tarjeta amarillas, rojas y azules -->
            <button type="button" data-toggle="popover" data-container="body" data-toggle="popover" data-placement="left" data-content="{if !isset($statis->estado) || $statis->estado == 0}No ha sido pagada{else}Pagada{/if}" class="btn_pagar" index="{$auxcont}" statistic="{$statis->codstatistics}" typeEstado="{if !isset($statis->estado) || $statis->estado == 0}nopagado{else}pagado{/if}" typestatistic="{$statis->codtypestatistic}">
            {if !isset($statis->estado) || $statis->estado == 0}
            <img src="{$_params.site}/public/icons/bolsadedinero.png" style="width: 25px;height:25px;margin-top: -18%;">
            {else}
            <img src="{$_params.site}/public/icons/bolsadedinero_pagado.png" style="width: 25px;height:25px;margin-top: -18%;">
            {/if}
            </button>
            {/if}
            <button type="button" class="btn_delete_resumen" islocal="{$statis->islocal}" index="{$auxcont}" statistic="{$statis->codstatistics}" typestatistic="{$statis->codtypestatistic}">
            <span class="glyphicon glyphicon-trash"></span>
            </button>
            <button type="button" class="btn_update_resumen" islocal="{$statis->islocal}" index="{$auxcont}" statistic="{$statis->codstatistics}" typestatistic="{$statis->codtypestatistic}">
            <span class="glyphicon glyphicon-new-window"></span>
            </button>
            {if $statis->codtypestatistic == 19}
            <input type="hidden" class="pierdeW" islocal="{$statis->islocal}" value="1"/>
            {/if}
        </span>
        {/if}
        </div>
    </div>
    {if ($match_info->scorevisitant == 0) && $statis->codtypestatistic == 19}
    <!-- si pasa acá es que la estadistica por w no se debe cargar si pasa esto-->
    <input type="text" class="score_cero" islocal="{$statis->islocal}" index="{$auxcont}" statistic="{$statis->codstatistics}" typestatistic="{$statis->codtypestatistic}" style="display: none;">
    {/if}
    {if !$solo_format}
</span>
{/if}
{/foreach}