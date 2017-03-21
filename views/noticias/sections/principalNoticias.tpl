<link rel="stylesheet" type="text/css" href="{$_params.site}/views/noticias/css/principalNoticias.css">
<script type="text/javascript" src="{$_params.site}/views/noticias/js/principalNoticias.js"></script>
{if $noticias}<!--No modificar este archivo afecta torneos y index->
<!--NOTICIA PRINCIPAL-->
<div id="carousel_noticias" class="carousel slide" data-ride="corousel">
    <ol class="carousel-indicators">
    {foreach from=$noticia_principal item=noticia key=key}
        <li data-target="#carousel_noticias" data-slide-to="{$key}" class="active"></li>
    {/foreach}
    </ol>
    

    <div class="carousel-inner" role="listbox">
    {$aux_slide = 'none'}
    {foreach from=$noticia_principal item=noticia key=key}
    {if $key > 0} {$aux_slide = 'inherit'} {/if}
        
        <div class="item {if $key == 0}active{/if}">
            <div class="contenedor-principal-slide">
                <div class="col-xs-12 col-sm-8">
                    <a class="thumbnail img-slide" href="{$_params.site}/noticias/ver/{$noticia->codnews}" title="{$noticia->titulo}">
                        <img src="{$_params.site|cat: $noticia->locimg}" title="{$noticia->titulo}" alt="{$noticia->titulo}">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="{$_params.site}/noticias/ver/{$noticia->codnews}"><h1>{$noticia->titulo}</h3></a>
                    <p>{$noticia->date}</p>
                    <br>
                    <p>{$noticia->resumen}</p>
                </div>
            </div>  
        </div>
    {/foreach}
    </div>

    <!--Controles carousel-->
    <a class="left carousel-control " href="#carousel_noticias" role="button" data-slide="prev" style="display: {$aux_slide}">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control " href="#carousel_noticias" role="button" data-slide="next" style="display: {$aux_slide}">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<!-- GRIND NOTICIAS -->
<div class="row">
{$btn = 'oculto'}
{foreach from=$mas_noticias item=noticia key=num}
    <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-4 article
                {if $num >= 3} oculto {/if} ">
        <div class="thumbnail articulo" >
            <a href="{$_params.site}/noticias/ver/{$noticia->codnews}" ><img src="{$_params.site|cat: $noticia->locimg}" class="img-responsive img-grid" title="{$noticia->titulo}" alt="{$noticia->titulo}"></a>
            <a href="{$_params.site}/noticias/ver/{$noticia->codnews}"><h3>{$noticia->titulo}</h3></a>
            <p>{$noticia->date}</p>
            <p>{$noticia->resumen}</p>
        </div>
    </div>
    {if $num %3 == 0 and $num > 1}
        {$btn = ' '}
    {/if}
{/foreach}
</div>
<br><br>
<div class="row">
    <div class="col-xs-12
                col-sm-2 col-sm-offset-5 {$btn}">
        <button class="btn large-button btn-block" id="btn-ver-mas">Ver mas</button>
    </div>
</div>
{else}
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="alert alert-info" style="margin-bottom: 10%; margin-top: 10%;">
                En el momento no tenemos noticias para mostrar!!!
            </div>
        </div>
    </div>  
</div>
{/if}