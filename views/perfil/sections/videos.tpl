<div class="fotos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {$menu_perfil = 4}
            {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
            <div>
                <h2 class="text-center"><strong><a class="text-gray-dark" style="text-decoration: none;" href="{$_params.site}/perfil/videos">VIDEOS</a></strong></h2>          
                <br>
                <form enctype="multipart/form-data" method="post" id="form_upload_video" action="{$_params.site}/perfil/uploadattachment">
                    <div class="upload-image">
                        <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6"> 
                            <p class="text-gray-dark">Solo se pueden subir links de video que pertenezcan a youtube.</p>
                            <br>
                            <label for="txt_sube_video">URL youtube:</label>
                            <input type="text" class="form-control" id="txt_sube_video" name="new_link"/>
                            <br>
                            <button type="button" class="btn btn_blue_light sube_video">&nbsp;&nbsp;Subir&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clear"><br></div>
            <div>
                {if count($youtube) > 0}
                    {foreach from=$youtube item=video key=index}
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <form action="{$_params.site}/perfil/deleteattachment" index="{$index}" id="form_delete_video-{$index}" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="attachment" value="{$video->codattachment}">
                            </form>
                            <button class="btn btn-danger delete_video_user" type="button" index="{$index}" style="position: absolute;" title="Eliminar">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <iframe width="200" height="150" src="http://www.youtube.com/embed/{$video->path}?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    {/foreach}
                {else}
                    <p>No ha subido ningún video</p>
                {/if}
                <div class="clear"></div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>
