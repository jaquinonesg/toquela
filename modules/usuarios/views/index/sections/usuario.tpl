<div class="usuario">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-user" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p class="title text-center"><strong>{$usuario->name} {$usuario->lastname}</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="seccion-usuario col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row editar-usuario margin">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="edicion-usuario">
                                <p class="text-header text-center">Asignar Rol</p>
                                    <form id="frm-roles">
                                        {foreach from=$lista_roles item=roles}
                                        {if $user->codrole != 3}
                                            {if isset($roles->checked)}
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role active">
                                                    <input id="{$roles->codrole}" type="radio" name="rol" class="rol rol-si-checked" checked="checked" value="{$roles->name}"><span class="span-rol styles-text">{$roles->name}</span>
                                                </div>
                                            {else}
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role">
                                                    <input id="{$roles->codrole}" type="radio" name="rol" class="rol rol-no-checked" value="{$roles->name}"><span class="span-rol styles-text">{$roles->name}</span>
                                                </div>
                                            {/if}
                                        {else}
                                            {if $roles->codrole != 2}
                                                {if isset($roles->checked)}
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role active">
                                                        <input id="{$roles->codrole}" type="radio" name="rol" class="rol rol-si-checked" checked="checked" value="{$roles->name}"><span class="span-rol styles-text">{$roles->name}</span>
                                                    </div>
                                                {else}
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role">
                                                        <input id="{$roles->codrole}" type="radio" name="rol" class="rol rol-no-checked" value="{$roles->name}"><span class="span-rol styles-text">{$roles->name}</span>
                                                    </div>
                                                {/if}
                                            {/if}
                                        {/if}
                                        {/foreach}
                                    </form>
                            </div>
                            <div class="edicion-usuario">
                                <form id="frm-privileges">
                                    {if $role_checked == 1}
                                    <p class="text-header text-center" style="margin-bottom: 10px;">Este usuario tiene acceso al uso normal de la pagina</p>
                                    {/if}
                                {if $role_checked == 2}
                                <p class="text-header text-center">Este usuario puede:</p>
                                <div class="div-privilegios">
                                    {foreach from=$lista_privilegios item=privilegios}
                                    <div id="div_{$privilegios->idprivilegios}">
                                        <input id="{$privilegios->idprivilegios}" type="checkbox" checked="checked" class="privileges dfl-check" name="vehicle" value="{$privilegios->nombre}" disabled="disabled"/><span class="span-privi styles-text">{$privilegios->nombre}</span>
                                    </div>
                                    {/foreach}
                                </div>
                                {/if}
                                {if $role_checked == 3}
                                <p class="text-header text-center">Asignar privilegios:</p>
                                <div class="div-privilegios">
                                    {foreach from=$lista_privilegios item=privilegios}
                                        {if $privilegios->val_default == true}
                                            <div id="div_{$privilegios->idprivilegios}">
                                                <input id="{$privilegios->idprivilegios}" type="checkbox" checked="checked" class="privileges dfl-check" name="vehicle" value="{$privilegios->nombre}" disabled="disabled" /><span class="span-privi styles-text">{$privilegios->nombre}</span>
                                            </div>
                                        {/if}
                                        {if $privilegios->checked == true && $privilegios->val_default !== true}
                                            <div id="div_{$privilegios->idprivilegios}">
                                                <input id="{$privilegios->idprivilegios}" type="checkbox" class="privileges dfl-check" checked="checked" name="vehicle" value="{$privilegios->nombre}"/><span class="span-privi styles-text">{$privilegios->nombre}</span>
                                            </div>
                                        {/if}
                                        {if $privilegios->checked !== true && $privilegios->val_default !== true}
                                            <div id="div_{$privilegios->idprivilegios}">
                                                <input id="{$privilegios->idprivilegios}" type="checkbox" class="privileges dfl-check" name="vehicle" value="{$privilegios->nombre}"/><span class="span-privi styles-text">{$privilegios->nombre}</span>
                                            </div>
                                        {/if}
                                    {/foreach}
                                </div>
                                {/if}
                                </form>
                            </div>
                        </div>
<!--                         <input id="select-all" type="button" class="btn btn-primary efect-hover" value="Seleccionar todo"/>
                        <input id="select-reverse" type="button" class="btn btn-primary efect-hover" value="Seleccion inversa"/> -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-top">
                   <center> <input class="btn btn-primary efect-hover" id="enviar" type="submit" value="Modificar"/></center>
                </div>
                <span id="{$usuario->coduser}" class="id-usuario"></span>
                    </div>
                </div>
                </div>
                </div>


            </div>
        </div>
    </div>
</div>