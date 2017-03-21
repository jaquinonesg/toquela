{if isset($statistics)}
    <table class="table">
        {foreach from=$statistics item=statistic}
            <tr>
                <td>
                    <img class="img-thumbnail" src="{$_params.site}/public/files/icons_type_statistic/{$statistic->icon}"/>&nbsp;&nbsp;{$statistic->name}: &nbsp;&nbsp;{$statistic->count}
                </td>
            </tr>
        {/foreach}
    </table>
{else}
    <p class="text-center">No se han ingresado estadísticas.</p>
{/if}