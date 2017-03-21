<div class="_container-equipos">
    <form id="_buscador_equipo" class="text-center">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
            <label for="txt_bus_equipo" class="control-label">BUSCAR EQUIPO</label>
            <input type="text" class="form-control" id="txt_bus_equipo"/>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
            <label for="sel_equipo_genero" class="control-label">GÉNERO</label>
            <select class="form-control" id="sel_equipo_genero">
                <option value="" selected="">Todos</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Mixto</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 40px;"><span class="icon-guayo"></span></div>
            <label for="sel_tipo_futbol" class="control-label">TIPO FÚTBOL</label>
            <select class="form-control" id="sel_tipo_futbol">
                <option value="" selected="">Todos</option>
                {foreach from=$types_futbol item=type}
                    <option value="{$type->codvirtues}">{$type->name}</option>
                {/foreach}
            </select>
        </div>
    </form>
    <form id="_info_match" class="text-center info-match" style="display: none;">
        <a class="col-xs-1 col-sm-1 col-md-1 col-lg-1 a-btn-back" id="btn_back">
            <span class="glyphicon glyphicon-arrow-left"></span>
        </a>
        <h4 class="col-xs-11 col-sm-11 col-md-11 col-lg-11 text-center" style="margin-bottom: 2%; padding-left: 0px;">
            <label style="font-size: 23px;" id="title_for_type">Nuevo partido Privado</label>
        </h4>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 text-left form-info-match">
            <!--h3 class="h-style">Fecha y hora</h3>
            <input type="text" id="date_of_match" class="form-control" style="margin-bottom: 2%"/-->
            <h4 class="h-style">Descripción</h4>
            <textarea class="form-control" id="description_of_match" style="margin-bottom: 2%"></textarea>

            <div id="div-select-type-complex" style="display: none;">
                <h4 class="h-style">Escoger tipo de complejo:</h4>
                <span class="menu-estadistica">
                    <ul class="nav nav-tabs">
                        <li class="text-center" id="btn-reserve-complex" style="width: 49%; cursor: pointer; margin-right: 2%;"><a><strong>RESERVAR</strong></a></li>
                        <li class="text-center" id="btn-create-complex" style="width: 49%; cursor: pointer;"><a><strong>CREAR</strong></a></li>
                    </ul>
                </span>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 select-complex" id="select-complex" style="display: none;">
                <a href="javascript:window.frames.ifrComplex.history.go(-1)" class="ifr-back"><span class="glyphicon glyphicon-arrow-left"></span></a>
            </div>
            <div class="clear"></div>
            <!-- boton crear complejo
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div_create_complex" id="div_create_complex">
                    <a id="btn_create_complex"><span class="glyphicon glyphicon-arrow-right row-create-complex"></span>Crear complejo</a>
            </div>
            -->
            <button type="button" class="btn btn-default btn_crear_partido" id="_btn_crear_partido">Guardar</button>
        </div>
    </form>
    <div id="div-select-type-match" style="display: none;">
        <button type="button" class="btn btn-primary btn_create-match-private btn-match-type col-xs-5 col-xs-5 col-xs-5 col-xs-5">Privado</button>
        <button type="button" class="btn btn-primary btn_create-match-public btn-match-type col-xs-5 col-xs-5 col-xs-5 col-xs-5">Público</button>
    </div>
    <input id="input_type_match" val="" style="display: none;"/>
    <div class="clear"><br></div>
    <div id="_container-lits-check" style="margin-left: 13%;">
        {foreach from=$equipos item=e}  
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 team-check-{$e->codteam}" style="padding: 0px;">
                {$url = $e->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($e->name)}
                <div class="checkbox">
                    <label>
                        {$urlimg = ""}
                        {if is_null($e->image) eq true}
                            {$urlimg = $_params.site|cat:"/public/img/fotoequipo.jpg"}
                        {else}
                            {$urlimg = $_params.site|cat:"/public"|cat:$e->image} 
                        {/if}
                        <p style="margin-bottom: 3%; padding-top: 15%;">
                            <img src="{$urlimg}" width="50" height="50" />
                        </p>
                        <input type="checkbox" name="add_equi_torneo" value="{$e->name}" data-code="{$e->codteam}" />
                        <a class="link" href="{$_params.site}/equipos/perfil-equipo/{$url}" style="text-decoration: none;" target="_blank">
                            <span class="asuntomsg text-gray-dark">{$e->name}</span>
                        </a>
                    </label>
                </div>

            </div>
        {/foreach}
    </div>
</div>