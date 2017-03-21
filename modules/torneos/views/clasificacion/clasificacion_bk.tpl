<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="clasificacion">
    {$menu_perfil = 5} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="clear"></br></div>
            <h4 class="text-gray-dark text-center"><strong>CLASIFICACIÓN TORNEO: {$tournament->name}</strong></h4>
            </br>
            {if $error_number == 1}
                <div class="alert alert-warning">
                    Debe terminar de completar todos los equipos que participaran en el torneo. 
                    <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
                        Click aquí
                    </a>
                </div>
            {else}
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_parcial.tpl"}
                {include file=$_params.root|cat:"modules/torneos/views/calendario/sections/popup_result_total.tpl"}
                {if $type == 1}
                    </br><h3 class="text-gray-dark">Sistema eliminación directa</h3><br/>
                    {if isset($tablero_torneo)}
                        {$tablero_torneo}
                    {else}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert-danger">
                                <p>Hubo un error al generar la grafica del torneo...</p>
                                <p>El número de equipos debe ser multiplo de 4 para poder organizar el torneo por eliminación directa...</p>
                            </div>
                        </div>
                    {/if}
                {elseif ($type == 2)}
                    <table class="table">
                        <tr>
                            <th class="text-center" style="border-top: 0px;">Posición</th>
                            <th style="border-top: 0px;">Nombre</th>
                            <th style="border-top: 0px;">J</th>
                            <th style="border-top: 0px;">G</th>
                            <th style="border-top: 0px;">E</th>
                            <th style="border-top: 0px;">P</th>
                            <th style="border-top: 0px;">GC</th>
                            <th style="border-top: 0px;">GF</th>
                            <th style="border-top: 0px;">+/-</th>
                            <th class="text-center" style="border-top: 0px;">Puntos</th>
                        </tr>
                        {foreach from=$teams item=team key=i}
                            <tr>
                                <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;{$i+1}</td>
                                <td>{$team->name}</td>
                                <td>{$team->J}</td>
                                <td>{$team->G}</td>
                                <td>{$team->E}</td>
                                <td>{$team->P}</td>
                                <td>{$team->GC}</td>
                                <td>{$team->GF}</td>
                                <td>{$team->DIF}</td>
                                <td>{$team->Puntos}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <div>
                        <h5 class="text-gray-dark">Puntos para G=3, E=1, P=0</h5></br>
                        <h5 class="text-gray-dark">Las prioridades son Puntos, +/-, GF</h5></br>
                    </div>
                    <br>
                    <span>
                        {$previa_eliminacion}
                    </span>
                {elseif ($type == 3)}
                    <table class="table">
                        <tr>
                            <th class="text-center" style="border-top: 0px;">Posición</th>
                            <th style="border-top: 0px;">Nombre</th>
                            <th style="border-top: 0px;">J</th>
                            <th style="border-top: 0px;">G</th>
                            <th style="border-top: 0px;">E</th>
                            <th style="border-top: 0px;">P</th>
                            <th style="border-top: 0px;">GC</th>
                            <th style="border-top: 0px;">GF</th>
                            <th style="border-top: 0px;">+/-</th>
                            <th class="text-center" style="border-top: 0px;">Puntos</th>
                        </tr>
                        {foreach from=$teams item=team key=i}
                            <tr>
                                <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;{$i+1}</td>
                                <td>{$team->name}</td>
                                <td>{$team->J}</td>
                                <td>{$team->G}</td>
                                <td>{$team->E}</td>
                                <td>{$team->P}</td>
                                <td>{$team->GC}</td>
                                <td>{$team->GF}</td>
                                <td>{$team->DIF}</td>
                                <td>{$team->Puntos}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <div>
                        <h5 class="text-gray-dark">Puntos para G=3, E=1, P=0</h5></br>
                        <h5 class="text-gray-dark">Las prioridades son Puntos, +/-, GF</h5></br>
                    </div>
                {elseif ($type == 4)}
                    <script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/personalizado_public.js"></script>
                    {foreach from=$fases item=fase}
                        <div class="alert alert-default fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
                            <br>
                            <p>
                                <strong>{$fase->name}</strong>
                                &nbsp;&nbsp;
                                <button class="btn btn-default btn_ver_resultado_fase" torneo="{$tournament->codtournament}" fase="{$fase->number}">Ver fase {$fase->number}</button>
                            </p>
                            <br>
                            <div id="contend_fase_{$fase->number}">
                            </div>
                        </div>   
                    {/foreach}
                {/if}
            {/if}
        </div>
        <div class="clear"></br></div>
    </div>
</div>