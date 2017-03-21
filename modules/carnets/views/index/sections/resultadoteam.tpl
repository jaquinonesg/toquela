<div>
    <br>
    <h2>{$team->name}</h2>
    <br>
    <span class="actions">
        <a href="{$_params.site}/carnets/index/exportbyteam/{$codtournament}/{$team->codteam}/print" target="_blank">
            <button class="btn btn-primary">Imprimir</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyteam/{$codtournament}/{$team->codteam}/jpg" target="_blank">
            <button class="btn btn-primary">Exportar a JPG</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyteam/{$codtournament}/{$team->codteam}/png" target="_blank">
            <button class="btn btn-primary">Exportar a PNG</button>                    
        </a>
        <a href="{$_params.site}/carnets/index/exportbyteam/{$codtournament}/{$team->codteam}/pdf" target="_blank">
            <button class="btn btn-primary">Exportar a PDF</button>
        </a>
    </span>
</div>