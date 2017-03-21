<div style="border: 1px solid #05673a;">

    <h1>Novedades</h1>
    <label>Descripción</label>
    <textarea name="text_novedad" rows="4" cols="20">{$_languaje->novedad_txt}</textarea>
    <label>link</label>
    <input type="text" name="link_novedad" value="{$_languaje->novedad_link}"/>
    <label>Imagen</label>
    <input type="file" name="image_novedad" id="image_novedad"/>
    <img src="{$_params.site}/{$_languaje->novedad_img}" preview="image_novedad" width="465" height="135" />
    <button class="enviar" target=novedad >Guardar Cambios</button>
    <img id="loading_novedad" style="width: 20px;display: none;"src="{$_params.site}/modules/administrador/views/banners/img/cargando.gif"/>
    <label id="message_novedad"></label>
</div>
<div style="border: 1px solid #05673a;">

    <h1>Publicidad</h1>
    <label>Descripción</label>
    <textarea name="text_publicidad" rows="4" cols="20">{$_languaje->publicidad_txt}</textarea>
    <label>link</label>
    <input type="text" name="link_publicidad" value="{$_languaje->publicidad_link}"/>
    <label>Imagen</label>
    <input type="file" name="image_publicidad" id="image_publicidad"/>
    <img src="{$_params.site}/{$_languaje->publicidad_img}"  preview="image_publicidad" width="465" height="135" />
    <button class="enviar" target=publicidad >Guardar Cambios</button>
    <img id="loading_publicidad" style="width: 20px;display: none;"src="{$_params.site}/modules/administrador/views/banners/img/cargando.gif"/>
    <label id="message_publicidad"></label>
</div>