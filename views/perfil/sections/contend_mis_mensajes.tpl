<div class="_container-pop-ver-msg">
    <div id="delete_all_msg">
        <button type="button" class="btn btn-danger" id="delte_all_messages" style="float: left">
            <span class="glyphicon glyphicon-remove-sign"></span> &nbsp;Eliminar todo
        </button>&nbsp;&nbsp;
    </div><br>&nbsp;
    {$primero = true}
    {foreach from=$msg_por_usuario item=m}   
        {if $primero }
            <input type="hidden" id="_user_from" name="user_from" value="{$m->from}">
        {/if}
        <div trmsg="{$m->codmessage}">
            <p class="asuntomsg text-gray-dark">{$m->subject} &nbsp;
                <span class="fechamsg">{$renderfecha->FormatearFecha($m->date)}</span>
                <button type="button" class="btn btn-danger" style="float: right;">
                    <span class="glyphicon glyphicon-remove-sign" id="delete_msg" data-user="{$m->codmessage}"></span> 
                </button>
            </p>
            <p>{$m->text}</p>
            <div class="clear"><br></div>
        </div>
             {$primero = false}
    {/foreach}
</div>