<div class="miscanchas">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                {*include file=$_params.root|cat:"views/_templates/info-general-user.tpl"*}
                {$menu_perfil = 1}
                {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}

                <div>
                    <h2 class="text-verde text-center">MIS CANCHAS</h2>
                    <div class="clear"><br></div>
                    {if count($complexs)>0}
                        <ul id="Mi-Cancha">
                            {foreach from=$complexs item=complex}
                                <li class="cancha_pr">
                                    <h3 class="Titulo-Cancha" style="	margin-top:10px;		font-size:18px;">{$complex->name}</h3>
                                    <div class="Img-Mi-Cancha">
                                        <div class="perfil_1"></div>
                                        <div class="perfil_2">
                                            <img 
                                                {if is_null($complex->image) eq true}
                                                    src="{$_params.site}/public/img/Img-Perfil.png" 
                                                {else}
                                                    src="{$_params.site}/public{$complex->image}" 
                                                {/if}
                                                accesskey=""width="233" height="216" alt="{$complex->description}" title="{$complex->description}"/></div>
                                    </div>

                                    <span style="color:#064730">&bull;</span>{$complex->address}<br><br>
                                    <span style="color:#064730">&bull;</span> {$complex->canchas} Cancha(s)
                                    <div class="Reserva">
                                        <a href="{$_params.site}/complejos/disponibilidad?complejo={$complex->codcomplex}">RESERVAR CANCHA</a>
                                    </div>                                            
                                </li>
                            {/foreach}
                        </ul>
                    {else}
                        <div class="caja_azul text-center">
                            <p>Sin complejos favoritos</p>
                        </div>

                    {/if}


                </div>
            </div>
        </div>
    </div>
</div>
