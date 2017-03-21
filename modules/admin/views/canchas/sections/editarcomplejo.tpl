<div class="editarcomplejo">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{$_params.site}/public/js/gmaps.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var edit_complejos = new EditarComplejos();
            edit_complejos.initMap('{$dtoComplex->lat}', '{$dtoComplex->lng}','{$dtoComplex->name} : {$dtoComplex->address}');
            edit_complejos.addMarkerMap();
            edit_complejos.events();
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center text-gray-dark"><span style="font-size: 35px;" class="icon-cancha"></span>&nbsp;&nbsp;&nbsp; ADMINISTRADOR DE COMPLEJOS</h1>
        <br>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-gray-dark">EDITAR COMPLEJO</h3>
            <br>
            <form role="form">
                <input type="hidden" id="_complejo" value="{$dtoComplex->codcomplex}"/>
                <div class="form-group">
                    <label for="name_complex">Nombre del complejo</label>
                    <input type="text"  id="name_complex" class="form-control" value="{$dtoComplex->name}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email del complejo</label>
                    <input type="email" class="form-control" id="email" value="{$dtoComplex->email}">
                </div>
                <div class="form-group">
                    <label for="phone">Télefono</label>
                    <input type="text" id="phone" maxlength="90" class="form-control" value="{$dtoComplex->phone}"/>
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text"  id="address" class="form-control" maxlength="90" value="{$dtoComplex->address}"/>
                    <br>
                    <input type="text"  id="buscar" class="form-control" placeholder="Buscar en el mapa" style="width: 80%; display: inline-block;"/>
                    <button type="button" id="ir_dir" class="btn btn-default" style="width: 15%; display: inline-block;">ir</button>
                    <div id="map" style="width: 100%; height: 250px;"></div>
                </div>
                <div class="form-group">
                    <label for="description">* Descripción del complejo</label>
                    <textarea class="form-control" id="description">{$dtoComplex->description}</textarea>
                </div>
                <br>
                <button type="button" id="update_complex" class="btn btn-default">Actualizar complejo</button>

                <div class="clear"><br></div>
            </form>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-gray-dark">CANCHAS DEL COMPLEJO</h3>
            <br>
            <button class="btn btn-default" data-toggle="modal" data-target="#pop-agregar-cancha" data-code="{$dtoComplex->codcomplex}">Agregar Cancha</button>
            <a href="{$_params.site}/admin/canchas/horario/{$dtoComplex->codcomplex}"><button class="btn btn-primary" data-code="{$complex->codsubcomplex}">Editar Horarios</button></a>
            <a href="{$_params.site}/admin/canchas/agenda/{$dtoComplex->codcomplex}"><button class="btn btn-primary" data-code="{$complex->codsubcomplex}">Agenda</button></a>
            <div style="display: none;" class="modal fade" id="pop-agregar-cancha" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" id="mySmallModalLabel">Agregar Cancha</h4>
                        </div>
                        <div class="modal-body" id="new-cancha">
                            <div class="form-group">
                                <label for="name_complex">Nombre cancha</label>
                                <input type="text"  id="name_cancha" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="foto_cancha">Foto de la cancha</label>
                                <input type="file" id="foto_cancha" accept="image/jpeg, image/png, image/jpg, image/gif">
                                <p class="help-block">Suba una imagen que identifique la cancha.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div id="message-new-cancha" style="text-align: left;"></div>
                            <button type="button" class="btn btn-primary" id="btn-agregar-cancha">Agregar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {if isset($all_complex)}
                <div style="display: none;" class="modal fade" id="pop-editar-cancha" tabindex="-1" role="dialog" aria-labelledby="lbl-editar-cancha" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title" id="lbl-editar-cancha">Editar Cancha</h4>
                            </div>
                            <div class="modal-body" id="contend-edit-cancha">
                                <br>
                                <br>
                                <div class="text-center">
                                    <img class="loader-medium img-thumbnail" src="{$_params.site}/public/img/loader.gif"/>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <div id="message-edit-cancha" style="text-align: left;"></div>
                                <button type="button" class="btn btn-primary" id="btn-actualizar-cancha">Actualizar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre cancha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$troque = true}
                        {foreach from=$all_complex item=complex key=index}
                            <tr {if $troque}class="active"{$troque = false}{else}{$troque = true}{/if}>
                                <td>{($index + 1)}</td>
                                <td>{$complex->name}</td>
                                <td>
                                    <button class="btn btn-danger delete_canchas" data-code="{$complex->codsubcomplex}">Eliminar</button>
                                    <button class="btn btn-success editar_canchas" data-code="{$complex->codsubcomplex}">Editar</button>
                                    
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            {else}
                <br>
                <p>No se han agregado canchas a este complejo...</p>
            {/if}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
            <br>
            <h2 class="text-gray-dark">Agregar foto al complejo</h2>
            <br>
            <div class="form-group img-thumbnail">
                <p class="help-block">Suba una imagen que identifique la entrada o el lugar exacto del complejo o las canchas.</p>
                <input type="file" id="foto_complex" accept="image/jpeg, image/png, image/jpg, image/gif" style="width: 80%; display: inline-block;">
                <button type="button" id="btn_subir_foto" class="btn btn-default" style="width: 15%; display: inline-block;">Subir</button>
            </div>
        </div>

        {if isset($photos)}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="clear"></div>
                    {foreach from=$photos item=photo key=index}
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                        <form action="{$_params.site}/perfil/deleteattachment" index="{$index}" id="form_delete_photo-{$index}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="attachment" value="{$photo->codattachment}">
                            <input type="hidden" name="referencia" value="/admin/canchas/editarcomplejo/{$dtoComplex->codcomplex}">
                        </form>
                        <br>
                        <div class="divcortar img-thumbnail" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #CCCCCC;">
                            <button class="btn btn-danger delete_foto_complex" type="button" index="{$index}" style="position: absolute; top: 0; left: 0;" title="Eliminar">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <a class="previa" rel="gallery{$index}" href="{$_params.site}/{$photo->path}">
                                <img style="width: 100%;" src="{$_params.site}/{$photo->path}"/>
                            </a>
                        </div>
                    </div>
                {/foreach}
            </div>
        {/if}
        <div class="clear"><br></div>
    </div>
</div>
