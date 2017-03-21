<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<div class="nuevo_carnet">
    {$menu_perfil = 8} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
    <script type="text/javascript">
        $(document).ready(function() {
            var expo = new Export();
            expo.init({$tournament->codtournament});
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center"><strong>Exportar carnet</strong></h1>
        <br>
        <div class="export">
            <div class="actions">
                <a href="{$_params.site}/carnets/index/nuevo_carnet/{$tournament->codtournament}">
                    <button class="btn btn-default" id="btn_config_carnet">Configurar carnet</button>
                </a>
                <a href="{$_params.site}/carnets/index/exportall/{$tournament->codtournament}/print" target="_blank">
                    <button class="btn btn-default" id="btn_imprimir_todo">Imprimir todo</button>                    
                </a>
                <a href="{$_params.site}/carnets/index/exportall/{$tournament->codtournament}/jpg" target="_blank">
                    <button class="btn btn-default" id="btn_export_jpg">Exportar todo a JPG</button>                    
                </a>
                <a href="{$_params.site}/carnets/index/exportall/{$tournament->codtournament}/png" target="_blank">
                    <button class="btn btn-default" id="btn_export_png">Exportar todo a PNG</button>                    
                </a>
                <a href="{$_params.site}/carnets/index/exportall/{$tournament->codtournament}/pdf" target="_blank">
                    <button class="btn btn-default" id="btn_export_pdf">Exportar todo a PDF</button>                    
                </a>
            </div>
            <div class="clear"><br></div>
            <div class="buscadores">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h2>Buscar equipo</h2>
                    <input type="text" class="form-control" id="txt_buscar_equipo" placeholder="Equipo"/>
                    <div id="result_equipo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h2>Buscar jugador</h2>
                    <input type="text" class="form-control" id="txt_buscar_jugador" placeholder="Jugador"/>
                    <div id="result_jugador">
                    </div>
                </div>
            </div>
            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 panel-group acor clear" style="float: right;" id="accordion1">
                {$htmlexport}
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>