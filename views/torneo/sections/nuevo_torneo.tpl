<div class="nuevo_torneo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {include file=$_params.root|cat:"views/torneo/sections/slay_menu.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 crear-torneo">
                <div class="clear"></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    </br><h4 class="text-verde">NUEVO TORNEO</h4><span class="glyphicon glyphicon-default glyphicon-thumbs-up"></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="clear"></br></div>
                    <form class="form-horizontal text-verde" role="form">
                        <div class="form-group">
                            <label for="name_tournament" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Nombre del torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="name_tournament" placeholder="Ingrese nombre del torneo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Descripción</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <textarea class="form-control" rows="3" id="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_torneo" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Tipo Torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="1" id="type_1" checked/>
                                                Nocaut
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="2" id="type_2"/>
                                                Grupos y play-off
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
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="n_participants" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Num Participantes</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select class="form-control" id="n_participants">
                                    {for $i=2 to 16}
                                        <option value="{$i}">{$i}</option>
                                    {/for}
                                </select>
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label for="tipo_futbol" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Tipo de fútbol</label>
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
                        </div-->
                    </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-verde inscripcion">
                    <!--div class="fechas" id="incio_inscripcion"><p>Inicio de inscripciones </p><span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora_verde.png"/></span></div>
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
                    </div-->
                    <div class="clear"></br></div>
                    <div class="invitacion">
                        <h5>Invita a tus amigos</h5></br>
                        <div class="item" id="invita_face_book">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/face_book.png"/></span></div>
                        <div class="item" id="invita_correo">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/mensaje.png"/></span></div>
                        <div class="item" id="invita_toquela">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/logo_toquela_icon.png"/></span></div>

                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    </br>
                    <button type="button" class="btn btn-default" id="btn_create">CREAR TORNEO</button>
                </div>
                <div class="clear"></br></div>
            </div>
        </div>
    </div>
</div>