<div class="miamigos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        {$menu_perfil = 6}
        {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
        <h2 class="text-center"><strong>AMIGOS</strong></h2>
        <br>  
        {if isset($usuarios)}
            <div class="maq_equipos">
                {foreach from=$usuarios item=amigos}
                    {$url = $amigos->coduser|cat:"-"|cat:$encodeurl->encodeStringToUrl($amigos->email)}
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center">
                        <div class="img-thumbnail">
                            <a class="link" href="{$_params.site}/perfil?cod={$encripter->encript($amigos->coduser)}&uem={$encripter->encript($amigos->email)}" style="text-decoration: none;" target="_blank">
                                <p style="margin-top:10px;font-size:15px;"><strong>{$amigos->name} {$amigos->lastname}</strong></p>
                                <div style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5;margin: 0px auto;">
                                    <img class="img-responsive" style="width: 100%;" src="{$_params.site}/{$amigos->path|default: 'public/img/no_user_image.jpg'}"/>
                                </div>
                            </a>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                {/foreach}
            {else}
                <p>En este momento no tienes amigos</p>
            {/if}
        </div>
        <div class="clear"><br></div>
    </div>
</div>