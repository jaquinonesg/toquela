<div class="jugadores">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-user" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>ADMINISTRAR USUARIOS</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {$is_buscador_jugadores = true}
            {$is_paginator = true}
            {$init_js_paginator = true}
            {include file=$_params.root|cat:"views/_templates/listar_usuarios.tpl"}
        </div>
    </div>
</div>