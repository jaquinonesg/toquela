<div class="participantes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {include file=$_params.root|cat:"views/torneo/sections/slay_menu.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="jugadores-inscritos">
                    <span class="glyphicon" id="icon-jugador"><img src="{$_params.site}/public/img/icons/jugador.png"/></span>
                    </br>
                    </br>
                    <p class="number">117</p>
                    <p>JUGADORES INSCRITOS</p>
                    </br>
                    <button type="button" class="btn btn-default" id="buscar_jugador">BUSCAR JUGADOR</button>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="equipos-inscritos">
                    <span class="glyphicon" id="icon-camiseta"><img src="{$_params.site}/public/img/icons/camiseta.png"/></span>
                    </br>
                    </br>
                    <p class="number">21</p>
                    <p>EQUIPOS INSCRITOS</p>
                    </br>
                    <button type="button" class="btn btn-default" id="buscar_equipo">BUSCAR EQUIPO</button>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center clear">
                    </br>
                    <select class="select-default">
                        <option value="">TIPO DE FÚTBOL</option>
                    </select>
                    <select class="select-default">
                        <option value="">NIVEL</option>
                    </select>
                    <select class="select-default">
                        <option value="">PAÍS</option>
                    </select>
                    <select class="select-default">
                        <option value="">CIUDAD</option>
                    </select>
                </div>
                <div class="clear"></br></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jugadores">
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                    <img src="{$_params.site}/public/img/img_ejemplo/messi.jpg"/>
                </div>
            </div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>





