{if isset($matches_by_date.0)}
{foreach from=$matches_by_date item=match_father key=index}
<div class="row proximas-fechas">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
        {foreach from=$match_father item=match key=index_h}
        {if $index_h == 0}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fecha" style="border-bottom: 2px solid;">
            <p class="text-center">Fecha<span class="glyphicon glyphicon-arrow-right resalta" style="font-size: 14px;"></span>&nbsp;&nbsp;{$match->date}</p>
        </div>
        <div class="titles">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center" style="padding-top: 8px;">Local</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center" style="padding-top: 8px;">Visitante</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center" style="padding-top: 8px;">Campo</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center" style="padding-top: 8px;">Hora</p>
            </div>
        </div>
        {/if}
        {/foreach}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc">
        {foreach from=$match_father item=match key=index_h}
        <div class="row valor" num="{$index+1}" title="{$match->local->name|cat:' VS '|cat:$match->visitant->name}">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!-- <div class="contador-partido"># {$index_h+1}</div> -->
                <p class="text-center">{$match->local->name}</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="text-center">{$match->visitant->name}</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
                <p>{$match->complex->name}</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" title="Jornada partido">
                <p class="text-center"><span class="glyphicon glyphicon-time resalta"></span>&nbsp;&nbsp;{$match->hour}</p>
            </div>
        </div>
        {/foreach}
    </div>
</div>
{/foreach}
{else}
<p class="text-center" style="font-size: 18px;">En este momento no hay fechas próximas para este grupo.</p>
{/if}