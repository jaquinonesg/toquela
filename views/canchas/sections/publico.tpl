<div class="vercomplejo">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{$_params.site}/public/js/gmaps.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var public_complex = new PublicoCompejo();
            public_complex.initMap('{$dtoComplex->lat}', '{$dtoComplex->lng}');
            public_complex.addMarkerMap();
            public_complex.events();
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center text-gray-dark"><span style="font-size: 35px;" class="icon-cancha"></span>&nbsp;&nbsp;&nbsp; COMPLEJO: {$dtoComplex->name|upper}</h1>
        <br>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h2 class="text-gray-dark">Contacto del complejo</h2>
            <br>
            <p id="email"><span class="text-gray-dark">Email del complejo:&nbsp;&nbsp; </span>{$dtoComplex->email}</p>
            <p id="phone"><span class="text-gray-dark">Télefono:&nbsp;&nbsp;</span>{$dtoComplex->phone}</p>
            <p id="address"><span class="text-gray-dark">Dirección:&nbsp;&nbsp;</span>{$dtoComplex->address}</p>
            <div class="form-group">
                <br>
                <label for="map" class="text-gray-dark">Ubicación:</label>
                <div id="map" style="width: 100%; height: 250px;"></div>
            </div>
            <div class="form-group">
                <label for="description" class="text-gray-dark">Descripción:</label>
                <p id="description">{$dtoComplex->description}</p>
            </div>
            <br>
            <div class="clear"><br></div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-gray-dark">CANCHAS DEL COMPLEJO</h3>
            <br>
            <br>
            {if isset($all_complex)}
                <div style="display: none;" class="modal fade" id="pop-ver-cancha" tabindex="-1" role="dialog" aria-labelledby="lbl-ver-cancha" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title" id="lbl-ver-cancha">Cancha</h4>
                            </div>
                            <div class="modal-body" id="contend-ver-cancha">
                                <br>
                                <br>
                                <div class="text-center">
                                    <img class="loader-medium img-thumbnail" src="{$_params.site}/public/img/loader.gif"/>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
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
                                    <button class="btn btn-success ver_cancha" data-code="{$complex->codsubcomplex}">Ver</button>
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
        {if isset($photos)}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
                <div class="clear"></div>
                {foreach from=$photos item=photo key=index}
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="divcortar img-thumbnail" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #CCCCCC;">
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
