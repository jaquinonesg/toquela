<style type="text/css">
    .content_main {
        width: 90%;
        margin: 0 auto;
        margin-left: 35px;
        height: 38px;
    }
    .first {
        background: rgb(7,139,82);
        display: inline-block;
        width: 70%;
        height: 100%;
        float:left;
        color: #fff;
    }
    .first div{
        margin-top: 7px;
        margin-left: 10px;
        font-size: 19px;
    }
    .second {
        background: rgb(14,105,62);
        height: 100%;
    }
    label {
        margin-left: 35px;
        width: 200px;
    }
</style>




<div id="Cont-Mis-Canchas">
    <ul id="Menu-Abm">
        <li><a href="{$_params.site}/administrador-canchas/index/inicio/" class="selectedAbm">INICIO</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/agenda/">AGENDA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/cancha/{$dtoadmin->codcomplex}">INFORMACIÓN DE CANCHA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/usuarios/">INFORMACIÓN DE USUARIO</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/cuenta/">CUENTA</a></li>   
        <li><a href="{$_params.site}/administrador-canchas/login/logout/">SALIR</a></li>   
    </ul>
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Inicio - Estadísticas Mensuales</h2>
        
        <div>
            Fecha Inicio <input type="text" id="date_start" class="date">
            Fecha Final <input type="text" id="date_end" class="date">
            <button id="view_results" data-code="{$dtoComplex->codcomplex}">Actualizar</button>
        </div>
        
        
        <div id="cont_Esta">

            <div class="content_main">
                <div class="first" id="canal2" style="width:{$canal2->porcentaje}%;"><div>{$canal2->porcentaje|number_format:2}%</div></div>
                <div class="second"></div>
            </div>
            <label>Total llamados.</label>
        </div>	                            
        <div id="cont_Esta">

            <div class="content_main">
                <div class="first" id="canal1" style="width:{$canal1->porcentaje}%;"><div>{$canal1->porcentaje|number_format:2}%</div></div>
                <div class="second"></div>
            </div>
            <label>Total entradas por Tóquela.</label>
        </div>	                            
        <div id="cont_Esta">
            
            <div class="content_main">
                <div class="first" id="canal3" style="width:100%;"><div>$ {$canal1->total|number_format:2}%</div></div>
                <div class="second"></div>
            </div>
            <label>Total facturado.</label>
        </div>

        <!-- -->
        <div id="Obser">
            Observaciones
            <p>Texto de pruebas</p>																	
        </div>                            
    </div>
</div>
