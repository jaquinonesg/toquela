<br>
<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 slay" style="padding: 0px;">
        <div id="carousel-example-generic" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="{$_params.site}/public/files/slay/img1.jpg" alt="First slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="{$_params.site}/public/files/slay/img2.jpg" alt="Second slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="{$_params.site}/public/files/slay/img3.jpg" alt="Third slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="{$_params.site}/public/files/slay/img4.jpg" alt="Fourth slide">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
        <div class=" menu">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;margin-top: 10px;">
                    <p class="title text-center" style="font-size: 32px;">
                    <span class="glyphicon icon-trophy" style="color: #23C3E2;"></span>
                    <span>{$tournament->name}</span>
                    </p>
            </div>

            <script type="text/javascript" src="{$_params.site}/modules/torneos/views/index/js/index.js"></script>
            <div class="clear"><br></div>
            <nav class="navbar navbar-inverse navbar-inverse-perso" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_perfil">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {if isset($tournament)}
                    <a class="navbar-brand" style="padding-bottom: 0px;">
                    </a>
                    {/if}
                </div>
                <div class="collapse navbar-collapse" id="_menu_perfil">
                    <ul class="nav navbar-nav">
                        {if isset($tournament)}
                            <li {if $menu_perfil == 1} class="active" {/if}>
                                <a href="{$_params.site}/torneos/index/modificar_torneo/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-edit" title="Editar"></span>&nbsp;Editar
                                </a>
                            </li>
                            <li {if $menu_perfil == 7} class="active" {/if}>
                                <a href="{$_params.site}/torneos/calendario/configurar/{$tournament->codtournament}">
                                <span class="glyphicon icon-cog"></span>&nbsp;Configurar
                                </a>
                            </li>
                            <li {if $menu_perfil == 2} class="active" {/if}>
                                <a href="{$_params.site}/torneos/tablero/informacion/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-info-sign" title="Información"></span>&nbsp;Información
                                </a>
                            </li>
                            <li {if $menu_perfil == 3} class="active" {/if}>
                                <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-plus" title="Asignar Participantes"></span>&nbsp;Equipos
                                </a>
                            </li>
                            <li {if $menu_perfil == 4} class="active" {/if}>
                                <a href="{$_params.site}/torneos/calendario/index/?torn={$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-calendar" title="Calendarios y resultados."></span>&nbsp;Calendario
                                </a>
                            </li>
                            <li {if $menu_perfil == 5} class="active" {/if}>
                                <a href="{$_params.site}/torneos/clasificacion/index/?torn={$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-list-alt" title="Tabla de Resultados."></span>&nbsp;Resultados
                                </a>
                            </li>
                            <li {if $menu_perfil == 6} class="active" {/if}>
                                <a href="{$_params.site}/torneos/tablero/publico/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-globe" title="Enlace publico."></span>&nbsp;Público
                                </a>
                            </li>
                            <li {if $menu_perfil == 8} class="active" {/if}>
                                <a href="{$_params.site}/carnets/index/nuevo_carnet/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-credit-card" title="Carnets"></span>&nbsp;Carnets
                                </a>
                            </li>
                            <li {if $menu_perfil == 9} class="active" {/if}>
                                <a href="{$_params.site}/torneos/Noticias/index/{$tournament->codtournament}">
                                    <span class="glyphicon glyphicon-comment" title="Noticias"></span>&nbsp;Noticias
                                </a>
                            </li>
                        {/if}
                        <li {if $menu_perfil == 0} class="active" {/if}>
                            <a href="{$_params.site}/torneos/index">
                                <span class="glyphicon glyphicon-pushpin" title="Mis torneos"></span>&nbsp; Torneos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


