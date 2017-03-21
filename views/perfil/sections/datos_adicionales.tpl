<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form id="form_data_aditional" action="{$_params.site}/perfil/updateaditionaldata" enctype="multipart/form-data" method="post" role="form">
        <div class="form-group">
            <label for="typedoc" style="margin-top: 9px;" class="col-sm-3 text-right">TIPO DE DOCUMENTO&nbsp;</label>
            <div class="col-sm-9">
                <select name="typedoc" id="typedoc" class="form-control">
                    <option value="">Seleccione tipo de documento.</option>
                    <option value="1" {if ($aditional->typedoc ==1)}selected=""{/if}>Tarjeta de identidad</option>
                    <option value="2" {if ($aditional->typedoc ==2)}selected=""{/if}>Cedula de ciudadanía</option>
                    <option value="3" {if ($aditional->typedoc ==3)}selected=""{/if}>Registro civil</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="numdoc" style="margin-top: 9px;" class="col-sm-3 text-right">NÚMERO DOCUMENTO&nbsp;</label>
            <div class="col-sm-9">
                <input name="numdoc" type="text" id="numdoc" class="form-control" onkeypress="validate.validateInsertNumeric()" value="{$aditional->numdoc}" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="datebirth" style="margin-top: 9px;" class="col-sm-3 text-right">FECHA NACIMIENTO&nbsp;</label>
            <div class="col-sm-9">
                <!--input name="datebirth" type="text" id="datebirth" class="form-control" value="" maxlength="10" autofocus/-->
                <div class="input-append date" id="datebirth" data-date="{$aditional->datebirth}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                    <input class="form-control" name="datebirth" size="16" type="text" value="{$aditional->datebirth}" readonly="" style="width: 90px;display: inline-block;"/>
                    <span class="add-on" style="cursor: pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="teamcarnet" style="margin-top: 9px;" class="col-sm-3 text-right">EQUIPO PARA CARNET&nbsp;</label>
            <div class="col-sm-9">
                <select name="teamcarnet" id="teamcarnet" class="form-control">
                    <option value="">Seleccione equipo carnet.</option>
                    {foreach from=$teams item=team}
                        <option value="{$team->codteam}" {if ($aditional->teamcarnet == $team->codteam)}selected=""{/if}>{$team->name}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="category" style="margin-top: 9px;" class="col-sm-3 text-right">CATEGORÍA&nbsp;</label>
            <div class="col-sm-9">
                <select name="category" id="category" class="form-control">
                    <option value="">Seleccione su categoría.</option>
                    <option value="Sub 17" {if ($aditional->category =="Sub 17")}selected=""{/if}>Sub 17</option>
                    <option value="Sub 20" {if ($aditional->category =="Sub 20")}selected=""{/if}>Sub 20</option>
                    <option value="Profesional" {if ($aditional->category =="Profesional")}selected=""{/if}>Profesional</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="phone" style="margin-top: 9px;" class="col-sm-3 text-right">TELÉFONO FIJO&nbsp;</label>
            <div class="col-sm-9">
                <input name="phone" type="text" id="phone" class="form-control" value="{$user->phone}" placeholder="Teléfono de contacto" maxlength="7" onkeypress="validate.validateInsertNumeric()" autofocus required=""/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="cellular" style="margin-top: 9px;" class="col-sm-3 text-right">CELULAR&nbsp;</label>
            <div class="col-sm-9">
                <input name="cellular" type="text" id="cellular" class="form-control" value="{$user->cellular}" placeholder="Celular de contacto" maxlength="10" onkeypress="validate.validateInsertNumeric()" autofocus required=""/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="typeblood" style="margin-top: 9px;" class="col-sm-3 text-right">TIPO SANGRE&nbsp;</label>
            <div class="col-sm-9">
                <select name="typeblood" id="typeblood" class="form-control">
                    <option value="">Seleccione tipo de sangre.</option>
                    <option value="O-" {if ($aditional->typeblood =="O-")}selected=""{/if}>O-</option>
                    <option value="O+" {if ($aditional->typeblood =="O+")}selected=""{/if}>O+</option>
                    <option value="A-" {if ($aditional->typeblood =="A-")}selected=""{/if}>A-</option>
                    <option value="A+" {if ($aditional->typeblood =="A+")}selected=""{/if}>A+</option>
                    <option value="B-" {if ($aditional->typeblood =="B-")}selected=""{/if}>B-</option>
                    <option value="B+" {if ($aditional->typeblood =="B+")}selected=""{/if}>B+</option>
                    <option value="AB-" {if ($aditional->typeblood =="AB-")}selected=""{/if}>AB-</option>
                    <option value="AB+" {if ($aditional->typeblood =="AB+")}selected=""{/if}>AB+</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="eps" style="margin-top: 9px;" class="col-sm-3 text-right">EPS&nbsp;</label>
            <div class="col-sm-9">
                <input name="eps" type="text" id="eps" class="form-control" value="{$aditional->eps}" maxlength="30" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="guardian" style="margin-top: 9px;" class="col-sm-3 text-right">NOMBRE ACUDIENTE&nbsp;</label>
            <div class="col-sm-9">
                <input name="guardian" type="text" id="guardian" class="form-control" value="{$aditional->guardian}" maxlength="35" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="profession" style="margin-top: 9px;" class="col-sm-3 text-right">PROFESIÓN&nbsp;</label>
            <div class="col-sm-9">
                <input name="profession" type="text" id="profession" class="form-control" value="{$aditional->profession}" maxlength="30" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="university" style="margin-top: 9px;" class="col-sm-3 text-right">UNIVERSIDAD&nbsp;</label>
            <div class="col-sm-9">
                <input name="university" type="text" id="university" class="form-control" value="{$aditional->university}" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="nationality" style="margin-top: 9px;" class="col-sm-3 text-right">NACIONALIDAD&nbsp;</label>
            <div class="col-sm-9">
                <input name="nationality" type="text" id="nationality" class="form-control" value="{$aditional->nationality}" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="text-center">
            <button type="button" class="btn btn_blue_light" id="_btn_update_adtional" style="width: 70%">Actualizar datos adicionales</button>
        </div>
        <div class="clear"><br></div>
    </form>
</div>
