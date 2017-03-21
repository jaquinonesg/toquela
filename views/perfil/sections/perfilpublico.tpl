<div class="publico">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <script type="text/javascript">
                $(document).ready(function() {
                    var perfil_publico = new PerfilPublico();
                    perfil_publico.init();
                });
            </script>
            {$menu_perfil = 10}
            {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px; margin-bottom: 0px;">
                <!-- <h3 class="text-left"><span class="icon-cancha" style="font-size: 30px;"></span>&nbsp;&nbsp; POSICIÓN EN EL CAMPO</h3><br/>
                <div>
                    <img class="img-responsive" alt="POSICIÓN EN EL CAMPO" title="POSICIÓN EN EL CAMPO" src="{$_params.site}/public/img/img_ejemplo/pos_campo.jpg"/>
                </div> -->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="padding-right: 0px; margin-bottom: 0px;">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 virtudes">
                    <br>
                    <!-- <h3 class="text-left"><span class="icon-cancha" style="font-size: 30px;"></span>&nbsp;&nbsp; OTRAS POSICIONES</h3><br/>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;" class="text-gray-dark">
                        {foreach from=$virtuespublic item=virtue}
                            {if $virtue->codvirtuesgroup == 2}
                                <p class="span-hover"> {$virtue->name}</p>
                            {/if}
                        {/foreach}
                    </div>
                    <br>
                    <h3 class="text-left"><span class="icon-guayo" style="font-size: 30px;"></span>&nbsp;&nbsp; TIPO DE FÚTBOL PREFERIDO</h3><br/>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        {foreach from=$virtuespublic item=virtue}
                            {if $virtue->codvirtuesgroup == 1}
                                <p class="span-hover"> {$virtue->name}</p>
                            {/if}
                        {/foreach}
                    </div>     
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 virtudes">
                    <br>
                    <h3 class="text-left"><span class="icon-juego" style="font-size: 30px;"></span>&nbsp;&nbsp; VIRTUDES DE JUEGO</h3><br>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        {foreach from=$virtuespublic item=virtue}
                            {if $virtue->codvirtuesgroup == 5}
                                <p class="span-hover"> {$virtue->name}</p>
                            {/if}
                        {/foreach}
                    </div>
                    <br>
                    <h3 class="text-left"><span class="icon-fisico" style="font-size: 30px;"></span>&nbsp;&nbsp; VIRTUDES FÍSICAS Y MENTALES</h3><br>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        {foreach from=$virtuespublic item=virtue}
                            {if $virtue->codvirtuesgroup == 6}
                                <p class="span-hover"> {$virtue->name}</p>
                            {/if}
                        {/foreach}
                    </div> -->
                </div>
            </div>


            {if count($userpublic->photos) > 0}
                <div class="clear">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-left"><strong class="btn-link-sencillo link_selected" id="lik_mis_fotos">FOTOS</strong>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<strong class="btn-link-sencillo" id="lik_mis_videos">VIDEOS</strong></h2>
                    <br>
                    <div class="galeria">
                        {foreach from=$userpublic->photos item=photo key=index}
                            {if $photo->type == 'FOTO'}
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center contend-mis-fotos">
                                    <br>
                                    <div class="divcortar" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #FFFFFF;">
                                        <a id="single_image" class="previa" rel="gallery{$index+1}" href="{$_params.site}/{$photo->path}">
                                            <img alt="Imagen {$index+1}" style="width: 100%;" src="{$_params.site}/{$photo->path}"/>
                                        </a>
                                    </div>
                                </div>
                            {else $photo->type == 'YOUTUBE'}
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center contend-mis-videos" style="display: none;">
                                    <br>
                                    <iframe width="200" height="150" src="http://www.youtube.com/embed/{$photo->path}?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            {/if}
                        {foreachelse}
                            <p>Sin Galería</p>
                        {/foreach}        
                    </div>
                    <div class="clear"></div>
                </div>
            {/if}
            {if count($teams)>0}
                <div class="clear">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span><strong>EQUIPOS: </strong></span>
                    <div class="clear"><br></div>
                        {$onlyperfil = true}
                        {include file=$_params.root|cat:"views/_templates/listar_equipos.tpl"}
                </div>
            {/if}
            <div class="clear"><br></div>
        </div>
    </div>
</div>