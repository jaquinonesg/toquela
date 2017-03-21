{if $_tbl}
    {$cont = 0}
    {$_exect = true}
    {$_height_brackets = 92}
    {$_top_brackets = 38}
    {$_left_brackets = 150}
    {$_margin_left_caja = 0}
    {$_margin_top_caja = 0}
    {$_top_caja = 0}
    <span id="container-tablero">
        <div class="knockoutTree" style="width:470px; height: 470px">
            {while $_exect}
                <div class="knockoutBranches">
                    {for $foo=1 to $_tbl_num_init}
                        <div class="knockoutMatch">
                            {if $cont==1}
                                {if $foo>1}
                                    {$_top_caja = 90}
                                {/if}
                                {$_top_brackets = 84}
                                {$_height_brackets = $_height_brackets+90}
                            {elseif $cont==2}
                                {$_top_caja = 90}
                            {elseif $cont==3}
                            {elseif $cont==4}
                            {elseif $cont==5}
                            {/if}
                            <table class="competitorPerMatch" style="margin-left: {$_margin_left_caja}px; margin-top:{$_margin_top_caja}px; top:{$_top_caja}px;">
                                <tbody>
                                    <tr class="competitorCont">
                                        <td class="competitorName" rel="1">
                                            {if $cont==0}
                                                <select class="form-control" data-team="{$match->local->codteam}" data-name="{$match->local->name}">
                                                    <option value="0">------</option>
                                                    {foreach from=$teams item=team}
                                                        <option value="{$team->codteam}">{$team->name}</option>
                                                    {/foreach}
                                                </select>
                                            {/if}
                                        </td>	
                                        <td class="competitorRes">

                                        </td>
                                    </tr>
                                    <tr class="competitorCont">
                                        <td class="competitorName" rel="1">
                                            {if $cont==0}
                                                <select class="form-control" data-team="{$match->local->codteam}" data-name="{$match->local->name}">
                                                    <option value="0">------</option>
                                                    {foreach from=$teams item=team}
                                                        <option value="{$team->codteam}">{$team->name}</option>
                                                    {/foreach}
                                                </select>
                                            {/if}
                                        </td>	
                                        <td class="competitorRes">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {if $foo is not even}
                            {if $_tbl_num_init!=1}
                                <div class="brackets" style="height:{$_height_brackets}px; top:{$_top_brackets}px; left:{$_left_brackets}px;">&nbsp;</div>
                            {/if}
                            {$_top_brackets = $_top_brackets+180}
                        {/if}
                        {$_margin_top_caja = $_margin_top_caja+90}
                    {/for}
                    {$_margin_left_caja = $_margin_left_caja+160}
                    {$_margin_top_caja = 46}
                    {$_left_brackets = $_left_brackets+160}
                </div>
                {if $_tbl_num_init==1}
                    {break}
                {/if}
                {$_tbl_num_init = ($_tbl_num_init/2)}
                {$cont = $cont+1}
            {/while}
        </div>
    </span>
{/if}
