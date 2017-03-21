<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 slay">
    <div id="carousel-example-generic" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item">
                <img src="{$_params.site}/public/files/slay/img1.jpg" alt="First slide">
            </div>
            <div class="item">
                <img src="{$_params.site}/public/files/slay/img2.jpg" alt="Second slide">
            </div>
            <div class="item active">
                <img src="{$_params.site}/public/files/slay/img3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 menu">
        <a href="{$_params.site}/torneo/mis_torneos">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><p>MIS TORNEOS</p>
                {if $menu_item == 0}
                    <div class="selected"></div>
                {/if}
            </div>
        </a>
        <!--a href="{$_params.site}/torneo/calendario"-->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><p id="p-calendarios-resultados">CALENDARIOS Y RESULTADOS</p>
                {if $menu_item == 1}
                    <div class="selected"></div>
                {/if}
            </div>
        <!--/a-->
        <!--a href="{$_params.site}/torneo/participantes"-->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><p>PARTICIPANTES</p>
                {if $menu_item == 2}
                    <div class="selected"></div>
                {/if}
            </div>
        <!--/a-->
        <!--a href="{$_params.site}/torneo/informacion"-->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><p>INFORMACIÓN</p>
                {if $menu_item == 3}
                    <div class="selected"></div>
                {/if}
            </div>
        <!--/a-->
    </div>
</div>