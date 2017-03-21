<div class="clear"><br></div>
<div class="contend_equipos well list_equipos" panel="equipo">
    <div class="clear"><br></div>
    <div class="contend_equipos well list_equipos" panel="equipo">
        <li class="cancha_pr" style="position: relative;">
            {if isset($_favorites)}
                <div class="maq_equipos">
                    <ul>

                        {foreach from=$_favorites item=favorites}
                            <li class="cancha_pr" style="position: relative;">

                                <h3 style="margin-top:10px;font-size:15px;"><strong>{$favorites->name}</strong></h3>
                                <p> {$favorites->email} </p>
                                <p> {$favorites->phone} </p>
                                <p> {$favorites->address}</p>
                                <p> {$favorites->description}</p>
                            </li>
                        {/foreach}


                    </ul>
                {else}
                    <p>En este momento no hay Canchas</p>
                {/if}
            </div>
            <div class="clear"><br></div>
    </div>
</div>







