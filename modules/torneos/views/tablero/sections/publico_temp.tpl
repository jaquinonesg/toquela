<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/calendario/js/personalizado_public.js"></script>
<div class="publico">
    {$menu_perfil = 6} 
    {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_sin_menu.tpl"}
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <input type="hidden" id="_torneo" value="{$tournament->codtournament}">
            <input type="hidden" id="_html_loader_public" value='
                   <br>
                   <br>
                   <br>
                   <div class="text-center">
                   <p>Cargando sección...</p><br>
                   <img class="img-thumbnail loader-medium" src="{$_params.site}/public/img/loader.gif"/>
                   </div>
                   <br>
                   <br>
                   <br>'>
            <div class="clear"></br></div>
            <h4 class="text-gray-dark text-center" style="font-size: 18px;"><strong>TORNEO: {$tournament->name|upper}</strong></h4>
            </br>
            <span class="menu-estadistica">
                <ul class="nav nav-tabs">
                    <li class="text-center pesta active" id="pes_home" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Noticias&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_informacion" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Información&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_equipos" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Equipos&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_calendario" torneo="{$tournament->codtournament}" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Fixture&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_resultados" torneo="{$tournament->codtournament}" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Resultados&nbsp;&nbsp;</strong></a></li>
                </ul>
            </span>
            <div>
                <div id="contend-informacion">
                    <br>
                    <br>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <img src="{$_params.site}/public/{$tournament->poster|default: 'img/no_torneos.jpg'}" class="img-responsive img-thumbnail"/>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <h2><span class="text-gray-dark"><span class="icon-trophy" style="font-size: 30px"></span>&nbsp;&nbsp;NOMBRE:</span></h2>
                        <br>
                        <p>{$tournament->name}</p>
                        <div class="clear"><br></div>
                        <h2><span class="text-gray-dark"><span class="icon-pencil" style="font-size: 30px"></span>&nbsp;&nbsp;DESCRIPCIÓN:</span></h2>
                        <br>
                        <p>{$tournament->description}</p>
                    </div>
                    <div class="clear"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-camiseta" style="font-size: 30px"></span>&nbsp;&nbsp;NÚMERO PARTICIPANTES:</span>&nbsp;&nbsp;{$tournament->numberparticipants}</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-tiempoinicio" style="font-size: 30px"></span>&nbsp;&nbsp;INICIO:</span>&nbsp;&nbsp;{$tournament->start|default: 'No se ha definido'}</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-tiempofin" style="font-size: 30px"></span>&nbsp;&nbsp;FIN:</span>&nbsp;&nbsp;{$tournament->end|default: 'No se ha definido'}</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-cogs" style="font-size: 30px"></span>&nbsp;&nbsp;SISTEMA:</span>&nbsp;&nbsp;{$tournament->type}</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-futbol" style="font-size: 30px"></span>&nbsp;&nbsp;PUNTOS PARA:</span>&nbsp;&nbsp;</p><p><br>Ganados = 3, Empatados = 1, Perdidos = 0</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-cancha" style="font-size: 30px"></span>&nbsp;&nbsp;SEDES:</span>&nbsp;&nbsp;</p><p><br>{$tournament->places|default: 'No se han definido'}</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-bubble" style="font-size: 30px"></span>&nbsp;&nbsp;CONTACTOS:</span>&nbsp;&nbsp;</p><p><br>{$tournament->contacts|default: 'No se han definido'}</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-reglas" style="font-size: 30px"></span>&nbsp;&nbsp;REGLAS:</span>&nbsp;&nbsp;</p><p><br>{$tournament->rules|default: 'No se han definido'}</p>
                    </div>
                    <div class="clear"><br><br></div>
                
                </div>
                <div id="contend-home">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {include file=$_params.root|cat:"views/noticias//sections/principalNoticias.tpl"}
                    </div>
                </div>
                <div id="contend-equipos" style="display: none;">
                    {include file=$_params.root|cat:"views/_templates/listar_equipos.tpl"}
                    
                    <div class="text-center">
                        {include file=$_params.root|cat:"views/_templates/paginator_person.tpl"}
                    </div>
                </div>
                <div id="contend-calendario" style="display: none;">
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <p>Cargando sección calendario...</p><br>
                        <img class="img-thumbnail loader-medium" src="{$_params.site}/public/img/loader.gif"/>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div id="contend-resultados" style="display: none;">
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <p>Cargando sección resultados...</p><br>
                        <img class="img-thumbnail loader-medium" src="{$_params.site}/public/img/loader.gif"/>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="clear"></br></div>
        </div>
    </div>
</div>