    {if isset($equipos)}
    {foreach from=$equipos item=e key=index}
    <style type="text/css">
        .checkbox-{$index} {
            display: inline-block;
            vertical-align: middle; 
            width: 20px;
            height: 20px;
            background: #ededed;
            margin-left: 10px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 50%;
            position: relative;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.4);
        }
        .checkbox-{$index} label {
            background: #909090;
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            top: 5px;
            left: 4px;
            z-index: 1;
            box-shadow: 0 0 5px rgba(0,0,0,0.7) inset;   
            -webkit-transition: all .2s ease;
            -moz-transition: all .2s ease;
            -o-transition: all .2s ease;
            -ms-transition: all .2s ease;
            transition: all .2s ease;
        }
        .checkbox-{$index} input[type=checkbox]:checked + label {
            background: #22C4DA;
            width: 15px;
            height: 15px;
            top: 2px;
            left: 2px;
        }
    </style>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 team-check-{$e->codteam}">
        {$url = $e->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($e->name)}
        {$urlimg = ""}
        {if is_null($e->image) eq true}
        {$urlimg = $_params.site|cat:"/public/img/fotoequipo.jpg"}
        {else}
        {$urlimg = $_params.site|cat:"/public"|cat:$e->image} 
        {/if}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 team-check">
                <!--             <input type="checkbox" name="add_equi_torneo" value="{$e->name}" data-code="{$e->codteam}" style="position: absolute; right: 5px;"/> -->
                <img src="{$urlimg}" width="50" height="50"/>
                <a class="link" href="{$_params.site}/equipos/perfil-equipo/{$url}" style="text-decoration: none;" target="_blank">
                    <span class="asuntomsg text-gray-dark">{$e->name}</span>
                </a>
                <div class="checkbox-{$index}" style="position: absolute; right: 5px;">
                    <input class="check-team" type="checkbox" id="ejemplo-{$index}" name="add_equi_torneo" value="{$e->name}" data-code="{$e->codteam}" data-url="{$urlimg}"/>
                    <label for="ejemplo-{$index}"></label>
                </div>
            </div>
        </div>
    </div>
    {/foreach}
    <div class="clear text-center">
        {$htmlpaginator}
    </div>
    {literal}
    <script type="text/javascript">
        $(document).ready(function() {
            var buscadorEquiposCheck = new BuscadorEquiposCheck("pagina_equipos_check", "_container-lits-check", "_buscador_equipo", "paginaEquipos");
        });
    </script>
    {/literal}
    {else}
    <p>En este no hay equipos</p>
    {/if}
