{if $fase->type == 1}
    <p>Fase: {$fase->number}, Total grupos: {$fase->numrounds}, Total partidos: {$fase->nummatches}</p>
    <br>
    <button class="btn btn-danger btn_eliminar_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}">Eliminar fase {$fase->number}</button>
    &nbsp;&nbsp;
    <button class="btn btn-success btn_actualizar_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}">Guardar fase {$fase->number}</button>
    <div class="acor" style="margin-top: 5px;">
        {$fase->html} 
    </div>
{elseif $fase->type == 2}
    <p>Total partidos: {$fase->nummatches}</p>
    <button class="btn btn-danger btn_eliminar_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}">Eliminar fase {$fase->number}</button>
    &nbsp;&nbsp;
    <button class="btn btn-success btn_actualizar_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}" tipo="{$fase->type}">Guardar fase {$fase->number}</button>
    <br>
    <div>
        {$fase->html} 
    </div>
{/if}