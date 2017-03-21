	
<section>
    <div id="Cont-Mis-Canchas">
        <div id="Torneo">
            <h1 class="NombreTorneo">Por favor, complete sus datos.</h1>

            <form  enctype="multipart/form-data" method="post" name="" id="contentForm" action="{$_params.site}/torneo/saveprofile">
                <label id="Label_">
                    <div class="Orden"><span class="noticias_textos">* Nombre y Apellido:</span></div>
                    <input name="name" type="text" class="Casiillero" placeholder="Nombre y Apellido" autofocus/>
                </label>
                <label id="Label_">
                    <div class="Orden"><span class="noticias_textos">* Cédula:</span></div>
                    <input name="cedula" type="text" class="Casiillero" placeholder="Cédula"/>
                </label>
                <label id="Label_">
                    <div class="Orden"><span class="noticias_textos">*Correo Electrónico:</span></div>
                    <input name="email" type="email" class="Casiillero" placeholder="Correo Elctrónico"/>
                </label>
                <label id="Label_">
                    <div class="Orden"><span class="noticias_textos">* Equipo</span></div>
                    <select required class="Casiillero" name="team" placeholder="Equipo">
                        {foreach from=$teams item=team}
                            <option value="{$team->codteam}">{$team->name|utf8_encode}</option>
                        {/foreach}
                    </select>
                </label>
                <label id="Label_">
                    <div class="Orden"><span class="noticias_textos">* Imagen</span></div>
                    <input name="image" type="file" class="Casiillero"/>
                </label>                      
                <label id="Label_">
                    <!-- Submit Button-->
                    <input name="send" style="cursor:pointer;" type="submit" class="Casiillero3" id="send" value="ENVIAR" />
                    <!-- E-mail verification. Do not edit -->
                </label>                            
            </form>	
            <img src="{$_params.site}/public/img/Pre-Form.png" width="500" height="183"  style="float:left; margin:20px 0 0 40px;"/>

        </div>
    </div>
</section>