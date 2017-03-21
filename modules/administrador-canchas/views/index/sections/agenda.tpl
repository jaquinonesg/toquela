{literal}
    <style>

        #Listado-Calendario {
            width:1100px;
            float:left;	
        }

        ul#Listado-Dispo {
            width:460px;
            float:left;
            margin:10px 0 0 55px;
        }

        ul#Listado-Dispo li {
            width:95px;
            float:left;	
            background:#179b6a;
            padding:10px;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;	
        }	

        ul#Listado-Reser {
            width:460px;
            float:left;
            margin:10px 0 0 55px;
        }

        ul#Listado-Reser li {
            width:95px;
            float:left;	
            background:#dededc;
            padding:10px;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;	
        }	
        ul#Listado-Reser li a, ul#Listado-Dispo li a {	color:#fff;	text-decoration:none; }

    </style>
{/literal}

<div id="Cont-Mis-Canchas">
    <ul id="Menu-Abm">
        <li><a href="{$_params.site}/administrador-canchas/index/inicio/">INICIO</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/agenda/" class="selectedAbm">AGENDA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/cancha/{$dtoadmin->codcomplex}">INFORMACIÓN DE CANCHA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/usuarios/">INFORMACIÓN DE USUARIO</a></li>      
        <li><a href="{$_params.site}/administrador-canchas/index/cuenta/">CUENTA</a></li>   
        <li><a href="{$_params.site}/administrador-canchas/login/logout/">SALIR</a></li>                
    </ul>
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Agenda</h2>

        <div id="Cont-Infor" class="disponibilidad" >
            <div id="Contiene-Disponibilidad">
                <ul id="Paginador-Canchas">
                    {foreach from=$subs item=sub key=k}
                        <li>
                            <a code="{$sub->codsubcomplex}" href="javascript:;" class="{if $k==0}selectedCancha{/if}">{$sub->name}</a>
                        </li>
                    {/foreach}
                </ul>
                <div class="agendaCanchas">
                    <div id="eventosMes">{$_mes}</div>
                    <div id='calendar'></div>                  
                </div> 
            </div>

            <div class="detallesDia">
                <div id="Obser">
                    Actividad diaria
                </div> 
                <div id="Listado-Calendario">
                    <table border="1" style="width:49%;" id="_manana" >

                    </table>
                    <table border="1" style="width:49%;" id="_tarde" >

                    </table>
                </div>         
                <div id="Obser">
                    Actividad de Agenda
                    <p>NicolÃ¡s CÃ³rdoba reserva</p>																	
                </div>  
            </div>  

        </div>                          
    </div>


</div>

<div style="display:none">
    <form id="reserva_form" method="post" action="">
        <p id="login_error">Por favor, complete todos los campos!</p>
        <p>
            <label for="username">USERNAME</label>
            <input type="text" name="username" size="30" id="username" />
        </p>
        <p>
            <input type="button" id="search" value="BUSCAR" />
        </p>
        <hr />
        <p>
            <label for="p_nombre">NOMBRE</label>
            <input type="text" class="req" name="p_nombre" value="{$user->name}" size="30" id="name"/>
        </p>
        <p>
            <label for="p_telefono">TELÉFONO</label>
            <input type="text" class="req" name="p_telefono" value="{$user->phone}" size="30" id="phone"/>
        </p>
        <p>
            <label for="p_direccion">DIRECCIÓN</label>
            <input type="text" class="req" name="p_direccion" value="{$user->address}" size="30" id="address"/>
        </p>
        <p>
            <label for="p_abona">VALOR</label>
            <input type="text" class="valor_reserva" readonly="" id="value"/>
        </p>
        <p>
            <label for="p_abona">ABONA</label>
            <input type="text" class="req" name="p_abona" value="0" size="30" id="abona"/>
        </p>
        <p>
            <label for="p_falta">FALTA PAGAR</label>
            <input type="text" readonly  name="p_falta" class="valor_reserva" size="30" />
        </p>
        <input type="submit" value="RESERVAR" data-code="" id="send_data"/>

    </form>
</div>
