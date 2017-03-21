{if $noprogramado === true}
<style type="text/css">
    .resalta{
    color: #848484;
    }
</style>
{/if}
{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('.formato_statistic').popover({"html": true, "trigger": "hover"});
        $('.formato_statistic').on('click', function() {
            $(this).popover('show');
        });
    });
</script>
{/literal}
<div class="row detalle-partido-notificacion">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 detalle">
    <div class="row div-title-torneo">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
                <span class="glyphicon icon-cancha" style="font-size: 36px;color: rgb(132, 132, 132);"></span>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="title text-center"><strong>PARTIDO</strong></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            {if ($team_local->status == 'CREATOR')||($team_local->status == 'CAPTAIN')}
            {$url_local = "perfil-equipo/"|cat:$team_local->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($team_local->name)}
            {else}
            {$url_local = "editar-equipo/"|cat:$team_local->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($team_local->name)}
            {/if}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 40px;margin-bottom: 10px;">Local</p>
            </div>
            <a class="link" href="{$_params.site}/equipos/{$url_local}" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    {if $team_local->image != ""}
                    <img class="img-responsive" src="{$_params.site}/public/{$team_local->image}" alt="">
                    {else}
                    <img class="img-responsive" src="{$_params.site}/public/img/fotoequipo.jpg" alt="">
                    {/if}
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    {if ($match->scorelocal < 0)}
                    W
                    {elseif isset($match->scorelocal)}
                    {$match->scorelocal}
                    {else}
                    0
                    {/if}
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta">{$team_local->name}</p>
            </div>
            
            <div class="panel-group" id="accordion-local" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-local" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            RESUMEN LOCAL
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            {if isset($statistics_local)}
                            {include file=$_params.root|cat:"views/_templates/template_resumen_local.tpl"}
                            {else}
                            <p>No tiene estadisticas por el momento</p>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <div class="informacion">
                {if $noprogramado != true}
                <div class="info-torneo">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
                        {if isset($match->date)}
                        <p><strong class="resalta">Fecha:</strong><br>{$match->date}</p>
                        {/if}
                        {if isset($match->hour)}
                        <p><strong class="resalta">Hora:</strong><br>{$match->hour}</p>
                        {/if}
                        {if isset($match->location)}
                        {if isset($match->location)}
                        <p><strong class="resalta">Lugar:</strong> {$match->location}</p>
                        {/if}
                        {/if}
                    </div>
                </div>
                {else}
                <p>Aún no ha sido programado</p>
                {/if}
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            {if ($team_visitant->status == 'CREATOR')||($team_visitant->status == 'CAPTAIN')}
            {$url_visitant = "perfil-equipo/"|cat:$team_visitant->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($team_visitant->name)}
            {else}
            {$url_visitant = "editar-equipo/"|cat:$team_visitant->codteam|cat:"-"|cat:$urlencode->encodeStringToUrl($team_visitant->name)}
            {/if}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 40px;margin-bottom: 10px;">Visitante</p>
            </div>
            <a class="link" href="{$_params.site}/equipos/{$url_visitant}" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    {if $team_visitant->image != ""}
                    <img class="img-responsive" src="{$_params.site}/public/{$team_visitant->image}" alt="">
                    {else}
                    <img class="img-responsive" src="{$_params.site}/public/img/fotoequipo.jpg" alt="">
                    {/if}
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    {if ($match->scorevisitant < 0)}
                    W
                    {elseif isset($match->scorevisitant)}
                    {$match->scorevisitant}
                    {else}
                    0
                    {/if}
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta">{$team_visitant->name}</p>
            </div>
            
            <div class="panel-group" id="accordion-visitant" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-visitant" href="#visitant" aria-expanded="true" aria-controls="visitant">
                            RESUMEN VISITANTE
                            </a>
                        </h4>
                    </div>
                    <div id="visitant" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            {if isset($statistics_visitant)}
                            {include file=$_params.root|cat:"views/_templates/template_resumen_visitant.tpl"}
                            {else}
                            <p>No tiene estadisticas por el momento</p>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>