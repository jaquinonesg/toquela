<div>
    <br>
    <h2>{$user->name} {$user->lastname}</h2>
    <br>
    <span class="actions">
        <a href="{$_params.site}/carnets/index/exportbyuser/{$codtournament}/{$user->coduser}/print" target="_blank">
            <button class="btn btn-primary">Imprimir</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyuser/{$codtournament}/{$user->coduser}/jpg" target="_blank">
            <button class="btn btn-primary">Exportar a JPG</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyuser/{$codtournament}/{$user->coduser}/png" target="_blank">
            <button class="btn btn-primary">Exportar a PNG</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyuser/{$codtournament}/{$user->coduser}/pdf" target="_blank">
            <button class="btn btn-primary">Exportar a PDF</button>
        </a>
    </span>
</div>