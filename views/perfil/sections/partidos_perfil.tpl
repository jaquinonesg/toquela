<div class="mis_partidos">
    {$verpaginator = true}
    {$is_buscador_partido = true}
    {if $iscreator}

        <div class="partidos_privados">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
                <div class="row">
                    {$menu_perfil = 8}
                    {include file=$_params.root|cat:"views/_templates/menu-perfil.tpl"}
                </div>
                <br>
                <span class="menu-estadistica">
                    <ul class="nav nav-tabs mis-nav-tabs">
                        <li class="text-center active" id="pes_privados" style="width: 50%; cursor: pointer;"><a><strong>PRIVADOS</strong></a></li>
                        <li class="text-center" id="pes_publicos" style="width: 50%; cursor: pointer;"><a><strong>PÚBLICOS</strong></a></li>
                    </ul>
                </span>
            </div>
        </div>
    {/if}
    {if isset($games) && !isset($gamesPublic)}
        <div id="partidos_privados">
            {include file=$_params.root|cat:"views/_templates/listar_partidos_privados.tpl"}
        </div>
    {/if}
    {if isset($gamesPublic) && !isset($games)}
        <div id="partidos_publicos">
            {include file=$_params.root|cat:"views/_templates/listar_partidos_publicos.tpl"}
        </div>
    {/if}

    {if isset($games) && isset($gamesPublic)}
        <div id="partidos_privados">
            {include file=$_params.root|cat:"views/_templates/listar_partidos_privados.tpl"}
        </div>
        <div id="partidos_publicos">
            {include file=$_params.root|cat:"views/_templates/listar_partidos_publicos.tpl"}
        </div>
    {/if}
</div>