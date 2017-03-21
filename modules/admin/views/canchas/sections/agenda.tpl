{literal}
    <style>
        #contend-disponibilidad {
            height: auto;
        }	
        .fc-sat{
            width: 50px;
        }
        .popup{
            color: #FFFFFF;
        }
    </style>
{/literal}
<div class="agenda">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init" {if $isiframe}style="margin-left: 0%;"{/if}>
        <br>
        <h2 class="text-center text-gray-dark">AGENDA DE CANCHAS</h2>
        <h2 class="text-gray-dark">Complejo: TAL</h2>
        <br>
        <div>
            <div id="contend-disponibilidad">
                <ul id="Paginador-Canchas">
                    {foreach from=$subs item=sub key=k}
                        <li>
                            <a code="{$sub->codsubcomplex}" href="javascript:;" class="{if $k==0}selectedCancha{/if}">{$sub->name}</a>
                        </li>
                    {/foreach}
                </ul>
                <div class="clear"><br></div>
                <div class="agendaCanchas">
                    <div id="eventosMes" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">{$_mes}</div>
                    <div id='calendar'></div>                  
                </div> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 detallesDia">
                <br>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center" id="Listado-Calendario">
                    <h2>Actividad del día: </h2>
                    <div id="_manana">

                    </div>
                </div>       
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center" id="Obser">
                    <h2>Actividad de Agenda</h2>
                </div>  
            </div>  
        </div>                          
        <div style="display:none">
            <form id="reserva_form" style="width: 400px;padding-left: 10px; padding-right: 20px; padding-top: 10px;padding-bottom: 10px;">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" value="{$user->name} {$user->lastname}">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" value="{$user->phone}">
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" value="{$user->address}">
                </div>
                <div class="form-group">
                    <label for="value">Valor</label>
                    <input type="text" class="form-control valor_reserva" id="value" readonly disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="abona">Abona</label>
                    <input type="text" class="form-control valor_reserva" id="abona" value="0">
                </div>
                <div class="form-group">
                    <label for="abona">Falta pagar</label>
                    <input type="text" class="form-control valor_reserva" id="falta" readonly disabled="disabled">
                </div>
                <div id="msg_reserva">
                </div>
                <button type="button" class="btn btn-default" id="send_data" data-code="{$user->coduser}" value="Reservar">Reservar</button>
            </form>
        </div>
        <div class="clear"><br></div>
    </div>
</div>
{if $isiframe}
    <input id="cod_game_reserve" value="{$codgame}" style="display: none;"/>
{/if}

