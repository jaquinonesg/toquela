<div class="tablero">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            {include file=$_params.root|cat:"views/torneo/sections/slay_menu.tpl"}
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 crear-torneo">
                <div class="clear"></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="text-verde">CARACTERÍSTICAS DEL TORNEO</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="clear"></br></div>
                    <form class="form-horizontal text-verde" role="form">
                        <div class="form-group">
                            <label for="nombre_torneo" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Nombre del torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <input type="email" class="form-control" id="nombre_torneo" placeholder="Nombre del torneo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_torneo" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Tipo de torneo</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select class="form-control" id="tipo_torneo">
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
                            <label for="cantidad_equipos" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Cantidad de equipos</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select class="form-control" id="cantidad_equipos">
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
                            <label for="descripcion" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Descripción</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <textarea class="form-control" rows="3" id="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Contacto</label>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
                                <input type="text" class="form-control" id="correo" placeholder="Correo">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-verde inscripcion">
                    <div class="fechas" id="incio_inscripcion"><p>Inicio de inscripciones </p><span class="glyphicon"><img src="{$_params.site}/public/img/icons/fecha_hora_verde.png"/></span></div>
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
                    </div>
                    <div class="clear"></br></div>
                    <div class="invitacion">
                        <h4>Invita a tus amigos</h4></br>
                        <div class="item" id="invita_face_book">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/face_book.png"/></span></div>
                        <div class="item" id="invita_correo">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/mensaje.png"/></span></div>
                        <div class="item" id="invita_toquela">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="{$_params.site}/public/img/icons/logo_toquela_icon.png"/></span></div>
                        </br>
                        <button type="button" class="btn btn-default" id="crear_torneo">CREAR TORNEO</button>
                    </div>
                </div>
                <div class="clear"></br></div>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 novedades text-verde">
                </br><h4>PUBLICAR NOVEDADES</h4><span class="glyphicon" id="icon-novedad"><img src="{$_params.site}/public/img/icons/novedades.png"/></span>
                <div class="clear"></br></br></div>
                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <textarea class="form-control" rows="6" id="mensaje_novedad"></textarea>
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <span class="glyphicon" id="icon-foto"><img src="{$_params.site}/public/img/icons/foto.png"/></span>
                    <span class="glyphicon" id="icon-video"><img src="{$_params.site}/public/img/icons/video.png"/></span>
                    <span class="glyphicon" id="icon-p">P</span>
                    </br></br>
                </div>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 grupos text-verde">
                </br><h4>GRUPOS</h4><span class="glyphicon" id="icon-camiseta"><img src="{$_params.site}/public/img/icons/camiseta.png"/></span>
                <div class="clear"></br></br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    <div class="panel panel-default verde">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <div class="panel-heading">
                                <h4 class="panel-title">GRUPO A</h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Equipo</th>
                                            <th>PJ</th>
                                            <th>G</th>
                                            <th>E</th>
                                            <th>P</th>
                                            <th>GF</th>
                                            <th>GC</th>
                                            <th>PTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Italia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Italia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Italia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Italia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default azul">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <div class="panel-heading">
                                <h4 class="panel-title">GRUPO B</h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Equipo</th>
                                            <th>PJ</th>
                                            <th>G</th>
                                            <th>E</th>
                                            <th>P</th>
                                            <th>GF</th>
                                            <th>GC</th>
                                            <th>PTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Colombia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Colombia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Colombia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Colombia</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default verde">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <div class="panel-heading">
                                <h4 class="panel-title">GRUPO C</h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Equipo</th>
                                            <th>PJ</th>
                                            <th>G</th>
                                            <th>E</th>
                                            <th>P</th>
                                            <th>GF</th>
                                            <th>GC</th>
                                            <th>PTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 clasificacion text-verde">
                <span class="glyphicon" id="icon-medalla"><img src="{$_params.site}/public/img/icons/medalla.png"/></span>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><span class="glyphicon"><img src="{$_params.site}/public/img/Pelota.png"/></span>CLASIFICACIÓN</th>
                            <th>PUNTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-hand-right"></span> Brasil</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clear"></br></div>
    </div>
</div>





