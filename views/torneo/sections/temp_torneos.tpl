<div class="torneos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark">
            <span class="glyphicon glyphicon-default icon-trophy" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TORNEOS</strong>
            <span style="float: right;font-size: 19px;text-align: right;"><br>QUIERE ORGANIZAR Y GESTIONAR SU TORNEO EN EL LINEA <br> ESCRIBANOS A contactenos@toquela.com Y LE DIREMOS COMO.</span>
        </h4>
        {$is_buscador_torneos = true}
        {$is_paginator = true}
        {$init_js_paginator = true}
        {include file=$_params.root|cat:"views/_templates/listar_torneos.tpl"}
    </div>
</div>