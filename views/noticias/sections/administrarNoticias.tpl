<link href="{$_params.site}/public/css/torneos.css" rel="stylesheet" type="text/css"/>

<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
  <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo" style="margin-top: 5mm; margin-bottom: 5mm;">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <p class="title"><strong>ADMINISTRAR NOTICIAS</strong></p>
        </div>
    </div>
    <br>
    <div id="contend-ver-noticias">
      <table class="table table-striped">
        <tr>
          <th> </th>
          <th>Titulo</th>
          <th>Autor</th>
          <th class="ayuda">
            <div class="helpbox helpbox_1">Seleccione esta opción para publicar en el home principal</div>
            <span class="glyphicon glyphicon-question-sign" style="color: #1A2E3E;"></span> 
            Publicar
          </th>
          <th class="ayuda">
            <div class="helpbox helpbox_2">Seleccione esta opción para mostrar en el slide</div>
            <span class="glyphicon glyphicon-question-sign" style="color: #1A2E3E;"></span> 
            Slide
          </th>
          <th></th>
        </tr>
        
        {foreach from=$noticias item=noticia}
        <tr>
          <td><a href="{$_params.site}/noticias/ver/{$noticia->codnews}" class="btn btn-link">Ver</a></td>
          <td>{$noticia->titulo}</td>
          <td>{$usuarios[$noticia->coduser]}</td>

          <td ><form>
            <input class="publico" value="{$noticia->codnews}" type="checkbox" {if $noticia->type == "public" }checked{/if}> 
          </form></td>
          <td >
            <input class="prioridad" value="{$noticia->codnews}" type="checkbox" {if $noticia->prioridadhome}checked{/if}> 
          </td>

          <td>
            <button type="button" value=" {$noticia->codnews}" class="btn btn-link btn-borrar" >
              Borrar
            </button>
          </td>
        </tr>
        {/foreach}
      </table>
    </div>
  </div>
</header>