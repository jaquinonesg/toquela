<div class="misequipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {$menu_perfil = 2}
            {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
            {$if_crear_equipo = true}
            {include file=$_params.root|cat:"views/_templates/listar_equipos.tpl"}      
        </div>
    </div>
</div>