<div class="misnotificaciones">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
        <h2 class="text-center"><strong class="text-gray-dark">NOTIFICACIONES</strong></h2><br> 
        {if isset($notifications)}
            <div class="contend_notifications_user" id="misnotifi">
                <button type="button" class="btn btn-danger" id="delte_all_notifications" data-user="{$user->coduser}">
                    <span class="glyphicon glyphicon-remove-sign"></span> &nbsp;Eliminar todo
                </button>
                <div class="clear"><br></div>
                    {foreach from=$notifications item=n}   
                    <div trnotiuser="{$n->codnotification}" allnotifi="{$user->coduser}" class="item">
                        <button type="button" class="btn btn-danger" style="float: right;">
                            <span class="glyphicon glyphicon-remove-sign" id="delete_one_notification" data-user="{$n->codnotification}"></span> 
                        </button>
                        <a class="text-gray ir-notificacion" data-link="{$_params.site}{$n->link}" data-user="{$n->codnotification}" style="cursor: pointer;">
                            <p class="asuntomsg text-gray-dark">{$n->subject} &nbsp;
                                <span class="fechamsg">{$renderfecha->FormatearFecha($n->date)}</span>
                            </p>
                            <p>{$n->text}</p>
                        </a>
                        <div class="clear">
                            <br>
                            <br>
                        </div>
                    </div>
                    {* <ul id="paginador" >
                    <li class="next"><a href="{$_params.site}/perfil/misnotificaciones"><p  display="none" >  {$paginacion->render()} </p></a> </p>}
                    </li>*}
                {/foreach}
                <div id="paginador" center><p display="none">{$paginacion->render()}</p></div>
                {else}
                <p>En este momento no hay notificaciones...</p>
            {/if}

            <div class="clear"><br></div>
        </div>
    </div>
</div>
