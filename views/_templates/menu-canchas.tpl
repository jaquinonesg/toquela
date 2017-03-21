<div class="clear"><br></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_canchas">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_canchas">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="_menu_canchas">
                <ul class="nav navbar-nav">
                    <li {if $menu_cancha == 0} class="active" {/if}><a href="{$_params.site}/administrador-canchas/index/inicio/{$dtoComplex->codcomplex}">INICIO</a></li>
                    <li {if $menu_cancha == 2} class="active" {/if}><a href="{$_params.site}/administrador-canchas/index/agenda/{$dtoComplex->codcomplex}">AGENDA</a></li>
                    <li {if $menu_cancha == 3} class="active" {/if}><a href="{$_params.site}/administrador-canchas/index/cancha/{$dtoComplex->codcomplex}">INFORMACIÓN DE CANCHA</a></li>
                        {*<li><a href="{$_params.site}/administrador-canchas/index/usuarios/">INFORMACIÓN DE USUARIO</a></li>
                        <li><a href="{$_params.site}/administrador-canchas/index/cuenta/">CUENTA</a></li>   
                        <li><a href="{$_params.site}/administrador-canchas/login/logout/">SALIR</a></li>*}
                </ul>
            </div>
        </nav>
    </div>
</div>