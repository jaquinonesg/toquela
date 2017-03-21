<div class="alert alert-warning fade in" style="color: #000000;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
    <p style="color: #FF0000;"><span style="display: inline-block;background-color: #FF0000; width: 15px;height: 15px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;"></span> = No se ha programado calendario para el partido.</p>
    {if $config_calendar}
        <p style="color: #47AFC7;"><span style="display: inline-block;background-color: #47AFC7; width: 15px;height: 15px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;"></span> = La fecha ya se programó.</p>
    {/if}
    <p><strong>#</strong> = Número del partido</p>
    <p><strong>J</strong> = Jornada</p>
    <p><strong>R</strong> = Resultado parcial del partido</p>
    <p><strong>W</strong> = Pierde por W</p>
</div>