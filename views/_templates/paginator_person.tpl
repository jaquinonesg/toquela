{if $num_paginas > 0}
    <ul class="pagination {$clase_css_pag}" numpags="{$num_paginas}">
        <li class="pag_option" style="cursor: pointer;" id="_pag_back" index="back"><a>«</a></li>
            {for $index=1 to $num_paginas}
                {if $index == $pagina_select}
                <li class="pag_active active" style="cursor: pointer;" id="_pag_{$index}" index="{$index}"><a {if isset($url)} href="{$url}/{$index}" {/if}>{$index}</a></li>
                {else}
                <li class="pag_option" style="cursor: pointer;" id="_pag_{$index}" index="{$index}"><a {if isset($url)} href="{$url}/{$index}" {/if}>{$index}</a></li>
                {/if}
            {/for}
        <li class="pag_option" style="cursor: pointer;" id="_pag_next" index="next"><a>»</a></li>
    </ul>
{/if}