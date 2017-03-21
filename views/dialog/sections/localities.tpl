<div class="form-group">
    <div class="clear"><br></div>
    <label for="codlocality" style="margin-top: 9px;" class="col-sm-3 text-right">LOCALIDAD&nbsp;</label>
    <div class="col-sm-9">
        <select id="sel_codlocality" class="form-control select-default" style="height: 45px;">
            {foreach from=$localities item=locality}
                <option value='{$locality->codlocality}'>{$locality->name}</option>
            {foreachelse}
                <option value=''>Esta Ciudad no tiene localidades</option>
            {/foreach}               
        </select>
    </div>
</div>