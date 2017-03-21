<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
    <h2>MAÑANA</h2><br>
    {if isset($morning)}
        {foreach from=$morning item=schedule}
            <div style="background:#179B6A; color: #FFFFFF;padding-top: 5px; padding-bottom: 5px;border-bottom: 2px solid #FFFFFF;">
                <span class="glyphicon glyphicon-star">&nbsp;</span>
                {$days[$schedule->day]}&nbsp;&nbsp;&nbsp;
                {$schedule->starthour|date_format:"%H:%M"} <span class="glyphicon glyphicon-arrow-right"></span> {$schedule->endhour|date_format:"%H:%M"}&nbsp;&nbsp;
                ${$schedule->price|number_format}&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="delete_schedule" data-code="{$schedule->codschedule}">
                    <button type="button" class="btn-sm btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-sign"></span></button>
                </a>
            </div>
        {/foreach}
    {else}
        <p>No se han asignado horarios por la mañana.</p>
    {/if}

</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
    <h2>TARDE</h2><br>
    {if isset($afternoon)}
        {foreach from=$afternoon item=schedule}
            <div style="background:#179B6A; color: #FFFFFF;padding-top: 5px; padding-bottom: 5px;border-bottom: 2px solid #FFFFFF;">
                <span class="glyphicon glyphicon-star">&nbsp;</span>
                {$days[$schedule->day]}&nbsp;&nbsp;&nbsp;
                {$schedule->starthour|date_format:"%H:%M"} <span class="glyphicon glyphicon-arrow-right"></span> {$schedule->endhour|date_format:"%H:%M"}&nbsp;&nbsp;
                ${$schedule->price|number_format}&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="delete_schedule" data-code="{$schedule->codschedule}">
                    <button type="button" class="btn-sm btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-sign"></span></button>
                </a>
            </div>	                        
        {/foreach}
    {else}
        <p>No se han asignado horarios por la tarde.</p>
    {/if}
</div>