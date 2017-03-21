<div class="fotos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {$menu_perfil = 3}
            {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
            <h2 class="text-center"><strong><a class="text-gray-dark" style="text-decoration: none;" href="{$_params.site}/perfil/fotos">FOTOS</a></strong></h2>          
            <br>
            <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6">
                <p class="text-gray-dark">Seleccione una foto y agréguela a la galería.</p>
                <div class="clear"><br></div>
                <form enctype="multipart/form-data" method="post" id="form_upload_photo" action="{$_params.site}/perfil/uploadattachment">
                    <div class="upload-image">
                        <input type="file" class="btn btn-white" id="input_file_photo" style="width: 100%;" accept="image/jpeg, image/png, image/jpg, image/gif" name="new_photo">
                        <br>       
                        <button type="button" class="btn btn_blue_light sube_photo">&nbsp;&nbsp;Subir&nbsp;&nbsp;</button>
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            {if count($photos) > 0}
                <div class="clear"><br></div>
                    {foreach from=$photos item=photo key=index}
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                        <form action="{$_params.site}/perfil/deleteattachment" index="{$index}" id="form_delete_photo-{$index}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="attachment" value="{$photo->codattachment}">
                        </form>
                        <br>
                        <div class="divcortar img-thumbnail" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #CCCCCC;">
                            <button class="btn btn-danger delete_foto_user" type="button" index="{$index}" style="position: absolute; top: 0; left: 0;" title="Eliminar">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <a class="previa" rel="gallery{$index}" href="{$_params.site}/{$photo->path}">
                                <img style="width: 100%;" src="{$_params.site}/{$photo->path}"/>
                            </a>
                        </div>
                    </div>
                {/foreach}
            {else}
                <p>No se ha súbido ninguna foto...</p>
            {/if}
            <div class="clear"><br></div>
        </div>
    </div>
</div>
