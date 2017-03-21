<div class="exportloader">
    <span class="glyphicon glyphicon-remove-circle cerrar" style="display: none"></span>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="text-center">
        <p>Cargando, espere un momento...</p><br>
        <img class="img-thumbnail loader-medium" src="{$_params.site}/public/img/loader.gif"/>
    </div>
    <br>
    <br>
    <br>
</div>
{if !$hayplantilla}
    <div class="text-center">
        <br>
        <h1>{$htmlcarnet}</h1>
    </div>
{/if}
<div class="preview">
    {if $print}
        <input type="hidden" id="isprint" value="true"/>
    {/if}
    {if $ispdf}
        <input type="hidden" id="ispdf" value="true"/>
    {/if}
    {if $isjpg}
        <input type="hidden" id="isjpg" value="true"/>
    {/if}
    <div class="actions">
        <br>
        {if $print}
            <button class="btn btn-default" id="btn_imprimir" onclick="window.print();">Imprimir vista</button>
        {else}
            {if !$ispdf}
                <button class="btn btn-default" id="btn_generate_zip" disabled="">Guardar Zip de imagene(s)</button>
            {/if}
        {/if}
    </div>
    <div class="carnet">
        <div class="contend_carnet">
            <div class="plantilla_carnet">
                {foreach from=$datacarnets item=datacarnet key=index}
                    {$rendercarnet->getHtmlDataCarnet($plantilla, $datacarnet,$index)}
                {/foreach}
            </div>
        </div>
    </div>
</div>
<div id="_contend_print"></div>
<div id="_contend_img"></div>
<script type="text/javascript">
                $(document).ready(function() {
                    var eju = new ExportJpgUser();
                    eju.init();
                });
</script>