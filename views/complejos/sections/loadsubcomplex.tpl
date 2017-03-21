<div class="form-group">
    <label for="name_cancha">Nombre cancha: </label>
    <div class="clear"><br></div>
    <input type="text"  id="name_cancha" class="form-control" disabled="disabled" value="{$cancha->name}"/>
    <div class="text-center">
        {if isset($cancha->foto)}
            <img class="img-responsive" src="{$_params.site}/{$cancha->foto}"/>
        {/if}
    </div>
</div>
