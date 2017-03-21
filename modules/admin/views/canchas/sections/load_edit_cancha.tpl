<div class="form-group">
    <label for="name_complex">Nombre cancha</label>
    <input type="hidden" id="_cancha" value="{$cancha->codsubcomplex}"/>
    <input type="text"  id="name_cancha" class="form-control" value="{$cancha->name}"/>
</div>
{if isset($cancha->foto)}
    <img class="img-responsive" src="{$_params.site}/{$cancha->foto}"/>
{/if}
<div class="form-group">
    <label for="foto_cancha">Foto de la cancha</label>
    <input type="file" id="foto_cancha" accept="image/jpeg, image/png, image/jpg, image/gif">
    <p class="help-block">Suba una imagen que identifique la cancha.</p>
</div>