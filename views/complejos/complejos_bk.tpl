<div class="equipos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="clear"><br></div>
                <div class="contend_equipos well list_equipos" panel="equipo">
                    <div class="clear"><br></div>
                    <div class="contend_equipos well list_equipos" panel="equipo">
                        <li class="cancha_pr" style="position: relative;">
                            {if isset($_complex)}
                                <div class="maq_equipos">
                                    <ul>

                                        {foreach from=$_complex item=complex}
                                            <li class="cancha_pr" style="position: relative;">

                                                <h3 style="margin-top:10px;font-size:15px;"><strong>{$favorites->name}</strong></h3>
                                                <p> {$complex->email} </p>
                                                <p> {$complex->phone} </p>
                                                <p> {$complex->address}</p>
                                                <p> {$complex->description}</p>
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
            </div>
        </div>
    </div>
</div>