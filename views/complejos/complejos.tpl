<div class="canchas">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        {if !$only_content}
            <h4 class="text-gray-dark">
                <span class="glyphicon glyphicon-default icon-cancha" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CANCHAS</strong>
            </h4>
        {/if}
        {$is_buscador_canchas = true}
        {$is_paginator = true}
        {$init_js_paginator = true}
        {if !$isiframe}
            {include file=$_params.root|cat:"views/_templates/listar_canchas.tpl"}
        {else}
            {include file=$_params.root|cat:"views/_templates/listar_canchas_iframe.tpl"}
        {/if}
    </div>
    {if $isiframe}
        <input id="iframe-exist" value="1" style="display: none;"/>
    {/if}
</div>