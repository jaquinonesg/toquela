<div class="row">
    <div id="equipos_escogidos" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
        <div class="panel-group" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEquipos">
                            Ver equipos escogidos
                        </a>
                    </h4>
                </div>
                <div id="collapseEquipos" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: initial;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
</div>
<div class="row btns-arregla-vidas" style="padding-left: 14px;padding-right: 14px;">
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
        <button class="btn_info" id="_seleccionar_todos" style="width: 100%">Seleccionar todos</button>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
        <button class="btn_info" id="_desseleccionar_todos" style="width: 100%">Desseleccionar todos</button>
    </div>
</div>
<div id="_container-lits-check" class="row">
    {$is_buscador_equipo = true}
    {include file=$_params.root|cat:"views/_templates/listar_equipos_check.tpl"}
</div>
