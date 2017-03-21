{literal}
    <script type="text/javascript">
        $(document).ready(function() {
            var horario_admin = new HorarioAdmin();
        });
    </script>
{/literal}
<div class="cancha">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <div>
            <ul id="Paginador-Canchas">
                {foreach from=$subs item=sub key=k}
                    <li>
                        <a href="javascript:;" class="sub_complex" data-complex="{$dtoComplex->codcomplex}" data-code="{$sub->codsubcomplex}">{$sub->name}</a>
                    </li>
                {/foreach}
            </ul>
        </div>
        {if isset($subs)}
            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label for="disponibility" class="control-label">Disponibilidad</label>
                    <select type="text" class="form-control Dia" id="disponibility" value="" data-code="{$first->codsubcomplex}">      
                        {foreach from=$days item=day key=index}
                            <option value="{$index}">{$day}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label for="start" class="control-label">Agregar horario</label><br>
                    <select name="" type="text" class="form-control Hora" id="start" style="display: inline-block; width: 48%;">
                        {for $i=0 to 23}
                            <option index="{$i}" value="{$i}:00">{$i}:00</option>
                        {/for}
                    </select>
                    <select class="form-control Hora" id="end" style="display: inline-block; width: 48%;">
                        {for $i=0 to 23}
                            <option index="{$i}" value="{$i}:00">{$i}:00</option>
                        {/for}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label for="precio" class="control-label">Precio</label>
                    <input type="text" class="form-control" id="precio"/>
                </div>
                <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <br>
                    <div class="btn-group">
                        <button type="button" mult="1" class="btn btn-success btn-multiplo active">X 1 Hora</button>
                        {*<button type="button" class="btn btn-success">Manual</button>*}
                        <button type="button" mult="2" class="btn btn-success btn-multiplo">X 2 Horas</button>
                    </div>&nbsp;&nbsp;
                    <button class="btn btn-default" id="add_schedule" data-sub="{$first->codsubcomplex}" data-complex="{$dtoComplex->codcomplex}">Agregar</button>
                </div>
            </div>
            <div class="clear"><br></div>
            <div id="Listado-Calendario">
                {include file=$_params.root|cat:"views/_templates/schedule.tpl"}
            </div>
        {else}
            <p class="text-gray-dark">Para ingresar un horario es necesario crear una cancha para el complejo.</p>
        {/if}
        <div class="clear"><br></div>
    </div>
</div>