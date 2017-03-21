<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="nuevo_torneo">
    <!-- se comenta para ue no salgaese menusito -->
    <!-- {*include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"*} -->

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-btn-back-torneos" style="margin-top: 15px;">
        <a href="{$_params.site}/torneos/index"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<span class="back">Volver a mis torneos<span></a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-trophy"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>NUEVO TORNEO</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
            <div class="crear-torneo">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2">
                    <div class="clear"></br></div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="name_tournament" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Nombre del torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="name_tournament" placeholder="Ingrese nombre del torneo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Descripción</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <textarea class="form-control" rows="3" id="descripcion" data-toggle="tooltip" data-placement="top" title="Ingresar descripción acompañada de tipo de fútbol y el género del torneo."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_torneo" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Tipo Torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="4" id="type_4"/>
                                                Personalizado
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="3" id="type_3"/>
                                                Todos contra todos
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="1" id="type_1" checked/>
                                                Eliminación directa
                                            </label>
                                        </div>
                                    </li>
                                    {*<li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="2" id="type_2"/>
                                                Grupos y Eliminación directa
                                            </label>
                                        </div>
                                    </li>*}
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="n_participants" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Num Participantes</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select class="form-control" id="select_1">
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="16">16</option>
                                    <option value="32">32</option>
                                    <option value="64">64</option>
                                </select>
                                <select class="form-control" id="select_2" style="display: none;">
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="16">16</option>
                                    <option value="20">20</option>
                                    <option value="24">24</option>
                                    <option value="32">32</option>
                                    <option value="40">40</option>
                                    <option value="48">48</option>
                                    <option value="64">64</option>
                                </select>
                                <select class="form-control" id="select_3" style="display: none;">
                                    {section name=foo start=8 loop=65 step=2}
                                        <option value="{$smarty.section.foo.index}">{$smarty.section.foo.index}</option>
                                    {/section}
                                </select>
                                <select class="form-control" id="select_4" style="display: none;">
                                    {section name=foo start=4 loop=101}
                                        <option value="{$smarty.section.foo.index}">{$smarty.section.foo.index}</option>
                                    {/section}
                                </select>
                            </div>

                        </div>
                        {*<!--div class="form-group">
                        <label for="tipo_futbol" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Tipo de futbol</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <select class="form-control" id="tipo_futbol">
                        <option>Selecciona...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="descripcion" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Contacto</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
                        <input type="text" class="form-control" id="correo" placeholder="Correo">
                        </div>
                        </div-->*}
                    </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-verde inscripcion">
                    {*<!--div class="fechas" id="incio_inscripcion"><p>Inicio de inscripciones </p><span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora_verde.png"/></span></div>
                    <div class="fechas" id="fin_inscripcion"><p>Fin de inscripciones </p><span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora_verde.png"/></span></div>
                    <div class="fechas" id="fecha_inicio"><p>Fecha de inicio </p><span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora_verde.png"/></span></div>
                    </br>
                    <div class="form-group">
                    <label for="ciudad" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Ciudad</label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <select class="form-control" id="ciudad">
                    <option>Selecciona...</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                    </div>
                    <div class="clear"></div>
                    </div>
                    <div class="form-group">
                    <label for="premio" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Premio</label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <select class="form-control" id="premio">
                    <option>Selecciona...</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                    </div>
                    <div class="clear"></div>
                    </div-->*}
                    <div class="clear"></br></div>
                </div>
                <div class="clear"></div>
                <div class="text-center">
                    </br>
                    <button type="button" class="btn btn_blue_light" id="btn_create">&nbsp;&nbsp;&nbsp;&nbsp;CREAR TORNEO&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
                <div class="clear"></br></div>
            </div>
    </div>
</div>