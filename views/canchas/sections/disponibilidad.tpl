<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<section id="disponibilidad">
    <div id="Cont-Mis-Canchas">
        {include file=$_params.root|cat:"views/_templates/info-general-user.tpl"}
        <div id="Reserva">
            <a id="favorito">Marcar como favorito</a>                        
        </div>
        <ul id="Menu-Int-Canchas">
            <li>
                <a href="{$_params.site}/canchas/info" display="informacion" class="selected">Información</a>
            </li>
            <li>
                <a href="{$_params.site}/canchas/disponibilidad/1" display="disponibilidad" {*<?php if($id_section == "2") echo 'class="selected"' ?>*}>Disponibilidad</a>
            </li>
        </ul>        
        <div id="Cont-Infor" class="informacion">
            <h2 class="Titulo-Cont"><span id="nombre_complejo">{$_complejo->name}</span></h2>
            <div id="head_site_colonia">
                <img id="img_fondo_colonia" src="{$_params.site}/public/img/site_colonia_head.png"/>
                <img id="img_balon_colonia" src="{$_params.site}/public/img/titulo_site_colonia.png"/>
                <div id="titulo_colonia">{$_complejo->name}</div>
            </div>
            <div id="Info-Cancha">
                <div class = 'sliderContainer'>
                    <div class="prev" style="cursor: pointer;"><img src="{$_params.site}/public/img/flecha_izq.png"/></div>
                    <div class = 'iosSlider'>
                        <div class = 'slider'>
                            {foreach from=$_imagenes key=k item=p}
                                <div class = 'slide'>
                                    <a class="previa" rel="gallery1" href="{$_params.site}/public{$p->path}">
                                        <img alt="previa" src="{$_params.site}/public{$p->path}" width="135" height="100"  />
                                    </a>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                    <div class="next" style="cursor: pointer;"><img src="{$_params.site}/public/img/flecha_der.png"/></div>
                </div>
                <p id="descripcion_complejo">
                    {$_complejo->description}
                </p>
                {if $_muestra_califica}
                    <div class="Aca-Mapa-Cancha-Info">
                        {*  <img src="http://www.posicionamientoeficaz.com/blog2/wp-content/uploads/1.-GOOGLE-MAPS.png" width="570" height="332" />*}
                        <div id="map" data-lng="{$_complejo->lng}" data-lat="{$_complejo->lat}" style="width:300px;height: 200px;"></div>
                    </div>
                {/if}
            </div>
            {if $_muestra_califica}
                <div id="contend_calificacion"><br/>
                    <div id="titu_calificacion">CALIFICACIÓN</div>
                    {assign var="b" value=0}
                    {assign var="c" value=0}
                    {foreach from=$_qualifications key=a item=item}
                        {if $item->type == 'EXPERIENCIA_JUEGO'}
                            {if $b==0}
                                <div id="exp_juego"><p id="titu"><strong>Experiencia de juego</strong></p><br/><br/>
                                    <div id="contend">
                                        <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="expe_{$b++}" score="{$item->prom}" class="expe"></div>
                                    {else}
                                        <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="expe_{$b++}" score="{$item->prom}" class="expe"></div>
                                    {/if}

                                {else if $item->type == 'INSTALACION_SERVICIO'}
                                    {if $c==0}
                                    </div></div>
                                <div id="int_servicios"><p id="titu"><strong>Instalaciones y servicios</strong></p><br/><br/>
                                    <div id="contend">
                                        <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="inst_{$c++}" score="{$item->prom}" class="inst"></div>
                                    {else}
                                        <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="inst_{$c++}" score="{$item->prom}" class="inst"></div>
                                    {/if}
                                {/if}
                            {/foreach}
                        </div>
                    </div>
                    {if $_califica}
                        <a class="popup" id="btn_califica" href="#frm_califica"> Califique Aquí </a>
                    {/if}
                {else}
                    <div class="Aca-Mapa-Cancha-Info">
                        {*  <img src="http://www.posicionamientoeficaz.com/blog2/wp-content/uploads/1.-GOOGLE-MAPS.png" width="570" height="332" />*}
                        <div id="map" data-lng="{$_complejo->lng}" data-lat="{$_complejo->lat}" style="margin-top: 14%; width:500px;height: 300px;"></div>
                    </div>
                {/if}
            </div>
        </div>
    </div>


    <div id="Cont-Infor" class="disponibilidad" style="display: none">

        <div class="convenciones">
            <div class="c_c"><div class="c_green"></div> <b>Todas las Reservas Disponibles</b></div>
            <div class="c_c"><div class="c_orange"></div> <b>Con Reservas Disponibles</b></div>
            <div class="c_c"><div class="c_gray"></div> <b>Sin Reservas Diponibles</b></div>
        </div>

        <div id="Contiene-Disponibilidad">
            <ul id="Paginador-Canchas">
                {foreach from=$_subs item=p key=k}
                    <li><a code="{$p->codsubcomplex}" >{$p->name}</a></li>
                    {/foreach}
            </ul>
            <div class="agendaCanchas">
                <div id="eventosMes">{$_mes}</div>
                <div id='calendar'></div>                  
            </div> 
        </div>

        <div class="detallesDia">
            <div id="Obser">
                <div class="contInfoF">
                    <ul id="">
                        <li><a class="FechaActual"></a></li>                              
                    </ul>
                </div>
                Actividad diaria
            </div> 
            <div id="Listado-Calendario">
                <table border="1"  id="_manana" >

                </table>
                <table border="1"  id="_tarde" >

                </table>
            </div>         
            <div id="Obser">
                Actividad de Agenda
                <p>Nicolás Córdoba reserva</p>																	
            </div>  
        </div>  

    </div>
</div>
</section>

<div style="display:none">
    <form id="reserva_form" method="post" action="">
        <p id="login_error">Por favor, complete todos los campos!</p>
        <p>
            <label for="p_nombre">NOMBRE</label>
            <input type="text" class="req" name="p_nombre" value="{$user->name}" size="30" />
        </p>
        <p>
            <label for="p_telefono">TELÉFONO</label>
            <input type="text" class="req" name="p_telefono" value="{$user->phone}" size="30" />
        </p>
        <p>
            <label for="p_direccion">DIRECCIÓN</label>
            <input type="text" class="req" name="p_direccion" value="{$user->address}" size="30" />
        </p>
        <p>
            <label for="p_abona">VALOR</label>
            <input type="text" class="valor_reserva" readonly="" />
        </p>
        <p>
            <label for="p_abona">ABONA</label>
            <input type="text" class="req" name="p_abona" value="0" size="30" />
        </p>
        <p>
            <label for="p_falta">FALTA PAGAR</label>
            <input type="text" readonly  name="p_falta" class="valor_reserva" size="30" />
        </p>
        <p>
        </p>
        <input type="submit" value="RESERVAR" />
    </form>
    {if $_muestra_califica}
        {if $_califica}
            <form id="frm_califica" method="post" action="{$_params.site}/canchas/setCalificacion">
                <div id="msg_califi"></div>
                {assign var="x" value=0}
                {assign var="y" value=0}
                {foreach from=$_qualifications key=con item=item}
                    {if $item->type == 'EXPERIENCIA_JUEGO'}
                        {if $x==0}
                            <div id="exp_juego"><p id="titu"><strong>Experiencia de juego</strong></p><br/><br/>
                                <div id="contend">
                                    <input type="hidden" name="expe_hid_{$x}" id="expe_hid_{$x}" altname="{$item->name}" value=""/>
                                    <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="expe_cali_{$x++}" alt="{$item->codqualification}" class="expe_cali"></div>
                                {else}
                                    <input type="hidden" name="expe_hid_{$x}" id="expe_hid_{$x}" altname="{$item->name}" value=""/>
                                    <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="expe_cali_{$x++}" alt="{$item->codqualification}" class="expe_cali"></div>
                                {/if}
                            {else if $item->type == 'INSTALACION_SERVICIO'}
                                {if $y==0}
                                </div></div>
                            <div id="int_servicios"><p id="titu"><strong>Instalaciones y servicios</strong></p><br/><br/>
                                <div id="contend">
                                    <input type="hidden" name="inst_hid_{$y}" id="inst_hid_{$y}" altname="{$item->name}" value=""/>
                                    <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="inst_cali_{$y++}" alt="{$item->codqualification}" class="inst_cali"></div>
                                {else}
                                    <input type="hidden" name="inst_hid_{$y}" id="inst_hid_{$y}" altname="{$item->name}" value=""/>
                                    <div title="{$item->description}" class="title_item">{$item->name}: </div><div id="inst_cali_{$y++}" alt="{$item->codqualification}" class="inst_cali"></div>
                                {/if}
                            {/if}
                        {/foreach}
                        <input type="hidden" name="num_expe" id="num_expe" value="{$x}"/>
                        <input type="hidden" name="num_inst" id="num_inst" value="{$y}"/>
                        <input type="hidden" name="complex" value="{$_complejo->codcomplex}"/>
                    </div>
                </div>
                <input id="btn_enviar_califi" type="button" value=" Enviar " />
            </form>
        {/if}
    {/if}
</div>
