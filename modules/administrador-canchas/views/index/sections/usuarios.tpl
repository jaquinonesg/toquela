{literal}
    <style>

        .Cont-Map {
            width:450px;
            height:200px;
            float:left;
            margin:10px;
        }

    </style>
{/literal}
<div id="Cont-Mis-Canchas">
    <ul id="Menu-Abm">
        <li><a href="{$_params.site}/administrador-canchas/index/inicio/">INICIO</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/agenda/">AGENDA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/cancha/{$dtoadmin->codcomplex}">INFORMACIÓN DE CANCHA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/usuarios/" class="selectedAbm">INFORMACIÓN DE USUARIO</a></li>                
        <li><a href="{$_params.site}/administrador-canchas/index/cuenta/">CUENTA</a></li>   
        <li><a href="{$_params.site}/administrador-canchas/login/logout/">SALIR</a></li>
    </ul>
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Información de usuario </h2>

        <div id="cont-">
            <label class="label_">* Nombre y Apellido</label>
            <input name="" type="text"  id="name" class="input_" />
        </div>
        <div id="cont-">
            <label class="label_">* Contraseña</label>
            <input name="" type="password"  id="password" class="input_" />
        </div>
        <div id="cont-">
            <label class="label_">* Teléfono</label>
            <input name="" type="text"  id="phone" class="input_" />
        </div>
        <div id="cont-">
            <label class="label_">* Dirección</label>
            <input name="" type="text"  id="address" class="input_"/>
        </div>
        <div id="cont-">
            <label class="label_">* E-Mail</label>
            <input name="" type="text"  id="email" class="input_" />
        </div>
        <!-- --> 
        <p>Gestione sus permisos</p>

        <div id="cont-" style="margin:20px 0 0 10px; width:400px">
            <label class="label_">* Agenda</label>
            <input name="" type="checkbox"  id="is_diary" class="input_"/>
        </div>                                
        <div id="cont-" style="margin:20px 0 0 10px; width:400px">
            <label class="label_">* Usuario</label>
            <input name="" type="checkbox"  id="is_user" class="input_"/>
        </div>                                
        <div id="cont-" style="margin:20px 0 0 10px; width:400px">
            <label class="label_">* Información de Cancha</label>
            <input name="" type="checkbox"  id="is_complex" class="input_"/>
        </div>                                
        <div id="cont-" style="margin:20px 0 0 10px; width:400px">
            <label class="label_">* Inicio</label>
            <input name="" type="checkbox"  id="is_index" class="input_"/>
        </div>                                
        <!-- Submit Button-->
        <input name="" type="submit" class="Send_" id="create_user" value="AGREGAR" data-code="{$complex->codcomplex}"/>
        <!-- E-mail verification. Do not edit -->


        <div id="Obser">
            Usuarios con permisos
            <table>
                {foreach from=$users item=user}
                    <tr>
                        <td>
                            <a href="{$_params.site}/administrador-canchas/index/editar-usuario/{$user->codadministrator}">
                                {$user->name}
                            </a>
                        </td>
                        <td><button class="delete_user" data-code="{$user->codadministrator}" data-complex="{$complex->codcomplex}">Eliminar</button></td>
                    </tr>
                {/foreach}
            </table>
        </div>                            
    </div>


</div>