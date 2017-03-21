<div class="equipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>EQUIPOS</strong></h4>
        {$if_crear_equipo = true}
        {$verpaginator = true}
        {$is_buscador_equipo = true}
        {include file=$_params.root|cat:"views/_templates/listar_equipos.tpl"}
    </div>
</div>