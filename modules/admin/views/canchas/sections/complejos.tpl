<div class="complejos">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{$_params.site}/public/js/gmaps.js"></script>
    {literal}
        <script type="text/javascript">
            $(document).ready(function() {
                var complejos = new Complejos();
            });
        </script>
    {/literal}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center text-gray-dark"><span style="font-size: 35px;" class="icon-cancha"></span>&nbsp;&nbsp;&nbsp; ADMINISTRADOR DE COMPLEJOS</h1>
        <br>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-gray-dark">NUEVO COMPLEJO</h3>
            <br>
            <form role="form">
                <div class="form-group">
                    <label for="name_complex">Nombre del complejo</label>
                    <input type="text"  id="name_complex" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email del complejo</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="phone">Télefono</label>
                    <input type="text" id="phone" maxlength="90" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text"  id="address" maxlength="90" class="form-control"/>
                    <br>
                    <input type="text"  id="buscar" class="form-control" placeholder="Buscar en el mapa" style="width: 80%; display: inline-block;"/>
                    <button type="button" id="ir_dir" class="btn btn-default" style="width: 15%; display: inline-block;">ir</button>
                    <div id="map" style="width: 100%; height: 250px;"></div>
                </div>
                <div class="form-group">
                    <label for="description">* Descripción del complejo</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="foto_complex">Foto del complejo</label>
                    <input type="file" id="foto_complex" accept="image/jpeg, image/png, image/jpg, image/gif">
                    <p class="help-block">Suba una imagen que identifique la entrada o el lugar exacto del complejo o las canchas.</p>
                </div>
                <br>
                <button type="button" id="create_complex" class="btn btn-default">Crear complejo</button>
            </form>
        </div>
        {if isset($all_complex)}
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h3 class="text-gray-dark">LISTA DE COMPLEJOS</h3>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre complejo</th>
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
                                    <button class="btn btn-danger delete_complex" data-code="{$complex->codcomplex}">Eliminar</button>
                                    <a href="{$_params.site}/admin/canchas/editarcomplejo/{$complex->codcomplex}"><button class="btn btn-success" data-code="{$complex->codcomplex}">Editar</button></a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        {/if}
        <br>
    </div>
</div>
