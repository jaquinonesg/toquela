<div class="clear"><br></div>
<div class="contend_equipos well list_equipos" panel="equipo">
    <div class="clear"><br></div>
    <div class="contend_equipos well list_equipos" panel="equipo">
        <li class="cancha_pr" style="position: relative;">
            {if isset($usuarios)}
                <div class="maq_equipos">
                    <ul>

                        {foreach from=$usuarios item=usuarios}
                            <li class="cancha_pr" style="position: relative;">

                               
                                <p> {$usuarios->name} </p>
                                <p> {$usuarios->folowers} </p>
                               
                            </li>
                        {/foreach}


                    </ul>
                {else}
                    <p>En este momento no hay Usuarios</p>
                {/if}
            </div>
            <div class="clear"><br></div>
    </div>
</div>
