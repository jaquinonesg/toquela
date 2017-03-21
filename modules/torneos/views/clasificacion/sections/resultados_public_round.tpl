<link href="{$_params.site}/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<span class="clasificacion">
    {if $error_number == 1}
        <div class="alert alert-warning">
            Debe terminar de completar todos los equipos que participaran en el torneo. 
            <a href="{$_params.site}/torneos/participantes/index/{$tournament->codtournament}">
                Click aquí
            </a>
        </div>
    {else}
        {if ($type == 1)}
            </br><h3 class="text-verde">Sistema eliminación directa</h3><br/>
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
                    <th style="border-top: 0px;">PJ</th>
                    <th style="border-top: 0px;">PG</th>
                    <th style="border-top: 0px;">PE</th>
                    <th style="border-top: 0px;">PP</th>
                    <th style="border-top: 0px;">GC</th>
                    <th style="border-top: 0px;">GF</th>
                    <th style="border-top: 0px;">+/-</th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_5.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_6.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_23.png"></span></th>
                    <th class="text-center" style="border-top: 0px;">Puntos</th>
                </tr>
                {foreach from=$teams item=team key=i}
                    <tr>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);">{$i+1}</td>
                        <td>{$team->name}</td>
                        <td>{$team->J}</td>
                        <td>{$team->G}</td>
                        <td>{$team->E}</td>
                        <td>{$team->P}</td>
                        <td>{$team->GC}</td>
                        <td>{$team->GF}</td>
                        <td>{$team->DIF}</td>
                        <td>{$team->amarilla}</td>
                        <td>{$team->rojas}</td>
                        <td>{$team->azules}</td>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1); ">{$team->Puntos}</td>
                    </tr>
                {/foreach}
            </table>
            <div>
                <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
                <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
                <h5 class="text-verde">S = Sanción</h5></br>
            </div>
        {elseif ($type == 3)||($type == 4)}
            <table class="table">
                <tr>
                    <th class="text-center" style="border-top: 0px;">Posición</th>
                    <th style="border-top: 0px;">Nombre</th>
                    <th style="border-top: 0px;">PJ</th>
                    <th style="border-top: 0px;">PG</th>
                    <th style="border-top: 0px;">PE</th>
                    <th style="border-top: 0px;">PP</th>
                    <th style="border-top: 0px;">GC</th>
                    <th style="border-top: 0px;">GF</th>
                    <th style="border-top: 0px;">+/-</th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_5.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_6.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="{$_params.site}/public/files/icons_type_statistic/icon_23.png"></span></th>
                    <th class="text-center" style="border-top: 0px;">Puntos</th>
                </tr>
                {foreach from=$teams item=team key=i}
                    <tr>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);">{$i+1}</td>
                        <td>{$team->name}</td>
                        <td>{$team->J}</td>
                        <td>{$team->G}</td>
                        <td>{$team->E}</td>
                        <td>{$team->P}</td>
                        <td>{$team->GC}</td>
                        <td>{$team->GF}</td>
                        <td>{$team->DIF}</td>
                      <td>{$team->amarilla}</td>
                        <td>{$team->rojas}</td>
                        <td>{$team->azules}</td>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1); ">{$team->Puntos}</td>
                    </tr>
                {/foreach}
            </table>
            <div>
                <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
                <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
                <h5 class="text-verde">S = Sanción</h5></br>
            </div>
        {/if}
    {/if}
</span>