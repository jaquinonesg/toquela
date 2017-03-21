<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:32:05
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\perfil\sections\datos_adicionales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22920563041b51b10f4-60747904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a9121f1bd56ff758cd6d5e57357358fffe5a31b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\perfil\\sections\\datos_adicionales.tpl',
      1 => 1442433094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22920563041b51b10f4-60747904',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'aditional' => 0,
    'teams' => 0,
    'team' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041b52d60b8_81462420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041b52d60b8_81462420')) {function content_563041b52d60b8_81462420($_smarty_tpl) {?><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form id="form_data_aditional" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/updateaditionaldata" enctype="multipart/form-data" method="post" role="form">
        <div class="form-group">
            <label for="typedoc" style="margin-top: 9px;" class="col-sm-3 text-right">TIPO DE DOCUMENTO&nbsp;</label>
            <div class="col-sm-9">
                <select name="typedoc" id="typedoc" class="form-control">
                    <option value="">Seleccione tipo de documento.</option>
                    <option value="1" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typedoc==1)){?>selected=""<?php }?>>Tarjeta de identidad</option>
                    <option value="2" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typedoc==2)){?>selected=""<?php }?>>Cedula de ciudadanía</option>
                    <option value="3" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typedoc==3)){?>selected=""<?php }?>>Registro civil</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="numdoc" style="margin-top: 9px;" class="col-sm-3 text-right">NÚMERO DOCUMENTO&nbsp;</label>
            <div class="col-sm-9">
                <input name="numdoc" type="text" id="numdoc" class="form-control" onkeypress="validate.validateInsertNumeric()" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->numdoc;?>
" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="datebirth" style="margin-top: 9px;" class="col-sm-3 text-right">FECHA NACIMIENTO&nbsp;</label>
            <div class="col-sm-9">
                <!--input name="datebirth" type="text" id="datebirth" class="form-control" value="" maxlength="10" autofocus/-->
                <div class="input-append date" id="datebirth" data-date="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->datebirth;?>
" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                    <input class="form-control" name="datebirth" size="16" type="text" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->datebirth;?>
" readonly="" style="width: 90px;display: inline-block;"/>
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
                    <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->teamcarnet==$_smarty_tpl->tpl_vars['team']->value->codteam)){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="category" style="margin-top: 9px;" class="col-sm-3 text-right">CATEGORÍA&nbsp;</label>
            <div class="col-sm-9">
                <select name="category" id="category" class="form-control">
                    <option value="">Seleccione su categoría.</option>
                    <option value="Sub 17" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->category=="Sub 17")){?>selected=""<?php }?>>Sub 17</option>
                    <option value="Sub 20" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->category=="Sub 20")){?>selected=""<?php }?>>Sub 20</option>
                    <option value="Profesional" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->category=="Profesional")){?>selected=""<?php }?>>Profesional</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="phone" style="margin-top: 9px;" class="col-sm-3 text-right">TELÉFONO FIJO&nbsp;</label>
            <div class="col-sm-9">
                <input name="phone" type="text" id="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>
" placeholder="Teléfono de contacto" maxlength="7" onkeypress="validate.validateInsertNumeric()" autofocus required=""/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="cellular" style="margin-top: 9px;" class="col-sm-3 text-right">CELULAR&nbsp;</label>
            <div class="col-sm-9">
                <input name="cellular" type="text" id="cellular" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->cellular;?>
" placeholder="Celular de contacto" maxlength="10" onkeypress="validate.validateInsertNumeric()" autofocus required=""/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="typeblood" style="margin-top: 9px;" class="col-sm-3 text-right">TIPO SANGRE&nbsp;</label>
            <div class="col-sm-9">
                <select name="typeblood" id="typeblood" class="form-control">
                    <option value="">Seleccione tipo de sangre.</option>
                    <option value="O-" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="O-")){?>selected=""<?php }?>>O-</option>
                    <option value="O+" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="O+")){?>selected=""<?php }?>>O+</option>
                    <option value="A-" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="A-")){?>selected=""<?php }?>>A-</option>
                    <option value="A+" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="A+")){?>selected=""<?php }?>>A+</option>
                    <option value="B-" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="B-")){?>selected=""<?php }?>>B-</option>
                    <option value="B+" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="B+")){?>selected=""<?php }?>>B+</option>
                    <option value="AB-" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="AB-")){?>selected=""<?php }?>>AB-</option>
                    <option value="AB+" <?php if (($_smarty_tpl->tpl_vars['aditional']->value->typeblood=="AB+")){?>selected=""<?php }?>>AB+</option>
                </select>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="eps" style="margin-top: 9px;" class="col-sm-3 text-right">EPS&nbsp;</label>
            <div class="col-sm-9">
                <input name="eps" type="text" id="eps" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->eps;?>
" maxlength="30" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="guardian" style="margin-top: 9px;" class="col-sm-3 text-right">NOMBRE ACUDIENTE&nbsp;</label>
            <div class="col-sm-9">
                <input name="guardian" type="text" id="guardian" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->guardian;?>
" maxlength="35" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="profession" style="margin-top: 9px;" class="col-sm-3 text-right">PROFESIÓN&nbsp;</label>
            <div class="col-sm-9">
                <input name="profession" type="text" id="profession" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->profession;?>
" maxlength="30" onkeypress="component.toltipMaxSizeInputText()" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="university" style="margin-top: 9px;" class="col-sm-3 text-right">UNIVERSIDAD&nbsp;</label>
            <div class="col-sm-9">
                <input name="university" type="text" id="university" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->university;?>
" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="form-group">
            <label for="nationality" style="margin-top: 9px;" class="col-sm-3 text-right">NACIONALIDAD&nbsp;</label>
            <div class="col-sm-9">
                <input name="nationality" type="text" id="nationality" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['aditional']->value->nationality;?>
" maxlength="30" autofocus/>
            </div>
        </div>
        <div class="clear"><br></div>
        <div class="text-center">
            <button type="button" class="btn btn_blue_light" id="_btn_update_adtional" style="width: 70%">Actualizar datos adicionales</button>
        </div>
        <div class="clear"><br></div>
    </form>
</div>
<?php }} ?>