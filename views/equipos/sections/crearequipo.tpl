<script type="text/javascript" src="{$_params.site}/public/js/vendor/underscore.js"></script>
<div class="crearequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <h1 class="text-center text-gray-dark"><strong>CREAR EQUIPO</strong></h1>
            <br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre de equipo</label>
                    <input type="text" class="form-control Inp" id="name" placeholder="Nombre" autofocus="" required="" maxlength="35"/>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control Inp" id="description" rows="3" autofocus="" required=""></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="description">Tipo de Fútbol</label>
                <select class="form-control" id="typefutbol">
                    {foreach from=$types item=type}
                        <option value="{$type->codvirtues}">{$type->name}</option>
                    {/foreach}
                </select>
                <br>
                <div class="form-group">
                    <label for="sex">Género</label>
                    <select class="form-control Inp" id="sex" autofocus="" required="">
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Mixto</option>           
                    </select>
                </div>
                <br>
<!--                 <div class="form-group">
                    <label for="codcity">Ciudad</label>
                    <select name="codcity" id="codcity" class="form-control Inp" autofocus="" required="">
                        {foreach from=$cities item=city}
                            <option value='{$city->codcity}' {if $user->codcity == $city->codcity}selected{/if}>{$city->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group">
                    <label for="locality">Localidad</label>
                    <select name="codlocality" class="form-control Inp" id="locality">
                        <option>Seleccione...</option>                            
                    </select>
                </div> -->
            </div>
            <div class="clear"><br></div>
                {if count($teams) > 0}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3 class="text-gray-dark"><strong>EQUIPOS</strong></h3>
                    <br>
                    {if count($teams) > 0}
                        <table class="table text-left">
                            {foreach from=$teams item=team}
                                <tr>
                                    <td>{$team->name}</td>
                                    <td>
                                        {if ($team->status == 'CAPTAIN')||($team->status == 'CREATOR')}
                                            <a href="{$_params.site}/equipos/editar-equipo/{$team->codteam}">
                                                <button class="btn btn-green"><span class="glyphicon glyphicon-wrench"></span></button>
                                            </a>
                                        {else}
                                            <a href="{$_params.site}/equipos/perfil-equipo/{$team->codteam}">
                                                <button class="btn btn-green"><span class="glyphicon glyphicon-globe"></span></button>
                                            </a>
                                        {/if}
                                    </td>
                                    <!--td><button>Eliminar</button></td-->
                                </tr>
                            {/foreach}
                        </table>
                    {/if}
                </div>
                <div class="clear"><br></div>
                {/if}
            <div class="text-center">
                <button id="create_team" class="btn btn_blue_light">&nbsp;&nbsp;&nbsp;&nbsp;CREAR EQUIPO&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <div class="clear"><br></div>
            </div>
            {*<div class="contPic">
            <p>Invitar jugadores a través de</p>
            <img src="{$_params.site}/public/img/redes/facebook.png"/>
            <img src="{$_params.site}/public/img/redes/twitter.png"/>
            <img src="{$_params.site}/public/img/redes/email.png"/>
            <img src="{$_params.site}/public/img/redes/toquela.png"/>
            <div>
            <p>Integrantes</p>
            </div>
            </div>*}
        </div>
    </div>
</div>
