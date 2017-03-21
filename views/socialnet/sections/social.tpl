<div class="redes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <div class="text-center">
                {if $net=="twitter"}
                    <img src="{$_params.site}/public/img/twitter.png">
                {/if}
                {if $net=="facebook"}
                    <img src="{$_params.site}/public/img/facebook.png">
                {/if}
            </div>
            <br>
            <div class="text-center wel caja_azul">
                <p>
                    {if $mensaje == ""}
                        Si estás seguro de acceder por {$net} haz clic: 
                    {else}
                        {$mensaje}
                    {/if}
                </p>
                <br>
                <a class="btn btn-link" href="{$url}">
                    <button class="btn btn-default" style="height: 60px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AQUI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </a>
                <br>
                <b>{$error}</b>
                <br>
                {if $user != null}
                    Tus datos de registro: <br>
                    Nombre: {$user->name}<br>
                    Nombre de usuario: {$user->username}<br>
                    Imagen: <img src="{$user->pic}">
                {/if}
            </div>
            <br>
        </div>
    </div>
</div>