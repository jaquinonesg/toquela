<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/participantes/js/participantes.js"></script>
<div class="participantes">
   {$menu_perfil = 3} 
   {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
         <span class="glyphicon icon-users" style="font-size: 26px;"></span>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
         <p class="title text-center"><strong>ASIGNAR EQUIPOS</strong></p>
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="asignar_equipos">
         <button type="button" class="btn btn_blue_light btn_asignar_equipos_torneo" data-code="{$tournament->codtournament}" data-target="#modal-asignar-equipos">Agregar Equipos</button>
         <div><br></div>
         {include file=$_params.root|cat:"modules/torneos/views/participantes/sections/popup_asig_equipos.tpl"}
         <form class="form-horizontal text-verde" role="form">
            {for $var=1 to $tournament->numberparticipants}
            <div class="form-group">
               <label for="_equipo_{$var}" class="col-xs-12 col-sm-12 col-md-2 col-lg-2 control-label">{$var}) </label>
               {$flag = true}
               {foreach from=$teams item=team}
               {if $team->number == $var}
               <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                  <div class="input-group">
                     <input type="text" class="form-control autocomplete_team" value="{$team->name}" id="_equipo_{$var}" data-number="{$var}" data-code="{$team->codteam}" placeholder="Nombre del equipo"/>
                     <span class="input-group-addon"><button type="button" class="close remove_team" data-code="{$team->codteam}" data-tournament="{$tournament->codtournament}" aria-hidden="true">&times;</button></span>
                  </div>
               </div>
               {$flag = false}
               {/if}
               {/foreach}
               {if $flag}
               <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                  <input type="text" class="form-control autocomplete_team" id="_equipo_{$var}" data-number="{$var}" placeholder="Nombre del equipo"/>
               </div>
               {/if}
            </div>
            {/for}
            </br>
            <button type="button" class="btn btn_blue_light" id="save_teams" data-code="{$tournament->codtournament}">GUARDAR</button>
         </form>
      </div>
      <!-- equipos inscritos -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="equipos-inscritos">
         <div id="container-info-team">
         </div>
      </div>
      <div class="clear"></br></div>
   </div>
</div>
<div class="displaye_nones" style="display: none;">
   <input id="codigo_torneo" value="{$tournament->codtournament}">
</div>