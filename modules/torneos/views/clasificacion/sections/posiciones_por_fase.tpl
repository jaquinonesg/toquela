<link href="{$_params.site}/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
    .table tbody > tr > td{
        color: #1A2E3E;
    }

{$resultados|print_r}

</style>
<span class="clasificacion">
    
    <div style="border-bottom:3px solid #ddd;margin-bottom: 20px;">
        <table class="table">
            <tr>
                <th colspan="13" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Grupo {$i}</th>
            </tr>
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
            {foreach from=$resultados item=team key=e}
            <tr>
                <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);">{$e+1}</td>
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
    </div>
    
    <span>