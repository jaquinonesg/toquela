<link href="{$_params.site}/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{$_params.site}/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/participantes.css">
<link rel="stylesheet" type="text/css" href="css/croppic.css">
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/noticias/js/croppic.min.js"></script>
<script type="text/javascript" src="{$_params.site}/modules/torneos/views/noticias/js/noticias.js"></script>

<div class="participantes">
   {$menu_perfil = 9} 
   <!--Slay menu-->
   {include file=$_params.root|cat:"modules/torneos/views/index/sections/slay_menu.tpl"}
   <!--End Slay menu-->
   <!--Barra de titulo-->
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
         <span class="glyphicon glyphicon-comment" style="font-size: 26px;"></span>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
         <p class="title text-center"><strong>Noticias</strong></p>
      </div>
   </div>
   <!-- Fin Barra de titulo-->
   <!--Contenido-->
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
      
      <div class="row">
         <span class="menu-estadistica">
            <ul class="nav nav-tabs">
                <li class="text-center active pesta" id="pes_nueva_noticia" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Nueva Noticia&nbsp;&nbsp;</strong></a></li>
                <li class="text-center pesta" id="pes_ver_noticias" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Ver noticias&nbsp;&nbsp;</strong></a></li>
            </ul>
        </span>
      <div>

      <br/><br/>
      <!--Nueva Noticia-->
      <div id="contend-nueva-noticia">
        <form  method="post" id="noticia_formulario" class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12
                  col-sm-10 col-sm-offset-1
                   ">
              <!--label for="titulo" class="control-label ">Titulo</label-->
              <input type="text" name="titulo" id="titulo" class="form-control has-error" placeholder="Título">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="imagen">
              <div class="thumbnail">
                <label for="subir_imagen" class="btn btn-default" >Subir Imagen</label>
                <input type="file" name="imagen" id="subir_imagen" accept="image/*" style="visibility: hidden">
              </div>
            </div>
          </div>
          <div class="form-group">
            <!--label for="resumen" class="control-label ">Resumen</label-->
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
              <input type="text" name="resumen" id="resumen" class="form-control" maxlength="500" placeholder="Introduzca una breve reseña">
            </div>
          </div>

          <div class="form-group">
            <label for="noticia" class="control-label sr-only">Contenido</label>
            <div class="col-xs-12
                  col-sm-10 col-sm-offset-1
                  ">
              <textarea name="contenido" id="noticia" class="form-control" rows="6" placeholder="Introduzca la noticia" style="resize: none"></textarea>
            </div>
          </div>
          <!--div class="form-group">
            <div class="col-xs-12
                    col-sm-10 col-sm-offset-1
                    ">
              <select class="form-control" name="type" disabled>
                <option value="private">privada - solo para el torneo</option>
                <option value="public" >publica - torneo y home</option>
              </select>
            </div>
          </div-->
          <div class="form-group">
            <div class="col-xs-12 
                  col-sm-12 col-sm-offset-1">
              <button class="btn btn-primary" id="btn-nueva-noticia">
                Publicar
              </button>
            </div>
          </div>
        </form>
      </div>
      <!--Ver Noticias-->
      <div id="contend-ver-noticias">
        <table class="table">
          <tr>
            <th> </th>
            <th>Titulo</th>
            <th>Autor</th>
            <th id="ayuda">
              <div class="helpbox">Si selecciona esta noticia aparecera en el slide principal</div>
              <span class="glyphicon glyphicon-question-sign" style="color: #1A2E3E;"></span> 
              Slide
            </th>
            <th></th>
          </tr>
          {foreach from=$noticias item=noticia}
          <tr>
            <td><a href="{$_params.site}/noticias/ver/{$noticia->codnews}" class="btn btn-link">ver</a></td>
            <td>{$noticia->titulo}</td>
            <td>{$usuarios[$noticia->coduser]}</td>
            <td><form>
              <input class="prioridad" value="{$noticia->codnews}" type="checkbox" style="visibility: visible;"{if $noticia->prioridadtorneo}checked{/if}/> 
            </form></td>
            <td>
              <button type="button" value=" {$noticia->codnews}" class="btn btn-link btn-borrar" >
                Borrar
              </button>
            </td>
          </tr>
          {/foreach}
        </table>
      </div>

      <div class="clear"></br></div>
   </div>
   <!--Fin del Contenido-->
</div>
<div class="displaye_nones" style="display: none;">
   <input id="codigo_torneo" value="{$tournament->codtournament}">
</div>