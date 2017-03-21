<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 22:32:04
         compiled from "C:\xampp\htdocs\html\coparevistastage\views\perfil\perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28069563041b49c7447-33228716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f277375c3c0c0db2c96715fe57636dbfdad28afd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\coparevistastage\\views\\perfil\\perfil.tpl',
      1 => 1442433094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28069563041b49c7447-33228716',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'pestana' => 0,
    'user' => 0,
    'virtues' => 0,
    'cities' => 0,
    'city' => 0,
    'select_city' => 0,
    'name_city' => 0,
    'teamsfans' => 0,
    'tf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_563041b4edc1f0_67039879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563041b4edc1f0_67039879')) {function content_563041b4edc1f0_67039879($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/partido/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/perfil/js/perfil.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/perfil/js/update.js"></script>
<div class="perfil">
    <script type="text/javascript">
        $(document).ready(function() {
            var perfil = new Perfil();
            perfil.init();

        <?php if ($_smarty_tpl->tpl_vars['pestana']->value==2){?>
            perfil.loadPestanaDatosAdicionales();
        <?php }?>

        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(0, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span class="menu-estadistica">
                    <ul class="nav nav-tabs">
                        <li class="text-center active" id="pes_mis_datos" style="width: 50%; cursor: pointer;"><a>Mis datos</a></li>
                        <li class="text-center" id="pes_datos_adicionales" style="width: 50%; cursor: pointer;"><a>Datos adicionales</a></li>
                    </ul>
                </span>
                <br>
                <span id="contend-mis-datos"> 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
                        <div class="form-group" style="margin-bottom: 16px;">
                            <form enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/uploadattachment" method="POST">
                                <input type="file" class="btn btn-white" style="width: 100%;margin-bottom: 5px;" title="Seleccione foto" accept="image/jpeg, image/png, image/jpg, image/gif" name="new_photo" value="Seleccione foto" style="margin-bottom: 5px;"/>
                                <button type="submit" class="btn btn-default" name="profile" value=true>&nbsp;&nbsp;Subir Foto&nbsp;&nbsp;</button>
                            </form>
                            <div class="clear">
                                <br>
                                <br>
                            </div>
                        </div>
                        <form enctype="multipart/form-data" id="form_change_password" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modal/changepassword" method="POST">
                            <div class="form-group">
                                <label for="clave">CONTRASEÑA &nbsp;&nbsp;<span id="num_caracter_clave"></span></label>
                                <input name="password" type="password" id="clave" class="form-control" value="" maxlength="15" autofocus/>
                            </div>
                            <div class="form-group">
                                <label for="reclave">REPITA CONTRASEÑA &nbsp;&nbsp;<span id="num_caracter_reclave"></span></label>
                                <input name="repassword" type="password" id="reclave" class="form-control" value="" maxlength="15" autofocus style="margin-bottom: 5px;"/>
                                <button type="button" class="btn btn-default" id="btn_change_password">&nbsp;&nbsp;CAMBIAR CONTRASEÑA&nbsp;&nbsp;</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;">
                        <form id="form_perfil" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/updateprofile" enctype="multipart/form-data" method="post" role="form">
                            <label for="gene">GÉNERO</label>
                            <br>
                            <div class="radio"  style="display: inline-block">
                                <label>
                                    <input type="radio" name="sex" value="HOMBRE" class="gene" <?php if ($_smarty_tpl->tpl_vars['user']->value->sex=='HOMBRE'){?> checked="true" <?php }?> required="">
                                    Masculino
                                </label>
                            </div>
                            <div class="radio" style="display: inline-block; margin-top: 10px; margin-left: 10px;">
                                <label>
                                    <input type="radio" name="sex" value="MUJER" class="gene" <?php if ($_smarty_tpl->tpl_vars['user']->value->sex=='MUJER'){?> checked="true" <?php }?> required="">
                                    Femenino
                                </label>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group">
                                <label for="name">NOMBRE</label>
                                <input name="name" type="text"  id="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
" placeholder="Nombre de usuario" maxlength="35" autofocus required=""/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">APELLIDO</label>
                                <input name="lastname" type="text" id="lastname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
" placeholder="Apellido" maxlength="35" autofocus required=""/>
                            </div>
                            <div class="form-group">
                                <label for="email">CORREO ELECTRÓNICO</label>
                                <input name="email" type="email" id="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" placeholder="Correo Electrónico" maxlength="70" autofocus required=""/>
                            </div>
                    </div>
                    <div class="clear">
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!--button type="button" class="btn btn-success" id="btn_load_canchita">Posición favorita</button-->
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/perfil/sections/popup_canchita.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <div class="form-group">
                            <label for="favoritevirtue" style="margin-top: 9px;" class="col-sm-3 text-right">POSICIÓN FAVORITA&nbsp;</label>
                            <div class="col-sm-9">
                                <select name="favoritevirtue" id="favoritevirtue" class="form-control select-default" style="height: 45px;">
                                    <option value="11" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==11){?>selected<?php }?>>Arquero</option>
                                    <option value="12" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==12){?>selected<?php }?>>Lateral Izquierdo</option>
                                    <option value="13" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==13){?>selected<?php }?>>Lateral Derecho</option>
                                    <option value="14" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==14){?>selected<?php }?>>Central Izquierdo</option>
                                    <option value="64" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==64){?>selected<?php }?>>Central Derecho</option>
                                    <option value="15" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==15){?>selected<?php }?>>Volante Central</option>
                                    <option value="16" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==16){?>selected<?php }?>>Volante Mixto</option>
                                    <option value="17" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==17){?>selected<?php }?>>Volante de Creación</option>
                                    <option value="18" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==18){?>selected<?php }?>>Volante por banda Izquierdo</option>
                                    <option value="19" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==19){?>selected<?php }?>>Volante por banda Derecho</option>
                                    <option value="20" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==20){?>selected<?php }?>>Extremo Izquierdo</option>
                                    <option value="21" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==21){?>selected<?php }?>>Extremo Derecho</option>
                                    <option value="22" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==22){?>selected<?php }?>>Enganche</option>
                                    <option value="23" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==23){?>selected<?php }?>>Media punta</option>
                                    <option value="24" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==24){?>selected<?php }?>>Segundo Delantero</option>
                                    <option value="25" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==25){?>selected<?php }?>>Delantero Centro</option>
                                    <option value="26" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==26){?>selected<?php }?>>Director Técnico</option>
                                    <option value="28" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==28){?>selected<?php }?>>Aguatero/Acompañante</option>
                                    <option value="29" <?php if ($_smarty_tpl->tpl_vars['user']->value->positiongame->codvirtues==29){?>selected<?php }?>>Volante de Recreación (No juego pero hago reír)</option>                            
                                </select>
                            </div>
                        </div>
                        <!-- <div class="clear"><br></div>
                        <div class="form-group">
                            <label for="piernahabil" style="margin-top: 9px;" class="col-sm-3 text-right">PIERNA HÁBIL&nbsp;</label>
                            <div class="col-sm-9">
                                <select name="virtues[]" id="piernahabil" class="form-control select-default" style="height: 45px;">
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[1]){?>selected<?php }?>>Diestro</option>
                                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[2]){?>selected<?php }?>>Zurdo</option>
                                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[3]){?>selected<?php }?>>Ambidiestro</option>                       
                                </select>
                            </div>
                        </div> -->
                       <!--  <div class="clear"><br></div>
                        <div class="form-group">
                            <label for="niveljuego" style="margin-top: 9px;" class="col-sm-3 text-right">NIVEL DE JUEGO&nbsp;</label>
                            <div class="col-sm-9">
                                <select name="virtues[]" id="niveljuego" class="form-control select-default" style="height: 45px;">
                                    <option value="4" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[4]){?>selected<?php }?>>Tronco</option>
                                    <option value="5" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[5]){?>selected<?php }?>>Regular</option>
                                    <option value="6" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[6]){?>selected<?php }?>>Aceptable</option>                       
                                    <option value="7" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[7]){?>selected<?php }?>>Bueno</option>                       
                                    <option value="8" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[8]){?>selected<?php }?>>Calidoso</option>                       
                                    <option value="63" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[63]){?>selected<?php }?>>Crack</option>                       
                                    <option value="9" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[9]){?>selected<?php }?>>SemiProfesional</option>                       
                                    <option value="10" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[10]){?>selected<?php }?>>Profesional</option>                       
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="clear"><br></div>
                        <div class="form-group">
                            <label for="codcity" style="margin-top: 9px;" class="col-sm-3 text-right">CIUDAD&nbsp;</label>
                            <div class="col-sm-9">
                                <select name="codcity" id="codcity" class="form-control select-default" style="height: 45px;">
                                    <option value='Ninguna'>Ninguna</option>
                                    <?php $_smarty_tpl->tpl_vars['select_city'] = new Smarty_variable('', null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['name_city'] = new Smarty_variable('', null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->locality->codcity==$_smarty_tpl->tpl_vars['city']->value->codcity){?>
                                            <?php $_smarty_tpl->tpl_vars['select_city'] = new Smarty_variable("selected", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['name_city'] = new Smarty_variable($_smarty_tpl->tpl_vars['city']->value->name, null, 0);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->tpl_vars['select_city'] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['city']->value->codcity;?>
' <?php echo $_smarty_tpl->tpl_vars['select_city']->value;?>
><?php echo $_smarty_tpl->tpl_vars['city']->value->name;?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        <!-- <input type="hidden" id="namecity" name="namecity" value="<?php echo $_smarty_tpl->tpl_vars['name_city']->value;?>
">
                        <input type="hidden" id="hid_codlocality" name="codlocality" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->codlocality;?>
">
                        <div class="form-group" id="contend_localidades">
                        </div>
                        <div class="clear"><br></div>
                        <div class="form-group">
                            <label for="idfan" style="margin-top: 9px;" class="col-sm-3 text-right">HINCHA&nbsp;</label>
                            <div class="col-sm-9">
                                <select name="idfan" class="form-control select-default selectfan" id="idfan" style="height: 45px;">
                                    <?php  $_smarty_tpl->tpl_vars['tf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teamsfans']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tf']->key => $_smarty_tpl->tpl_vars['tf']->value){
$_smarty_tpl->tpl_vars['tf']->_loop = true;
?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['tf']->value->idfan;?>
' data-content='<img style="width: 30px;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/fans_icons/<?php echo $_smarty_tpl->tpl_vars['tf']->value->icon;?>
"/>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['tf']->value->name;?>
' <?php if ($_smarty_tpl->tpl_vars['user']->value->idfan==$_smarty_tpl->tpl_vars['tf']->value->idfan){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tf']->value->name;?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        
                    <!--     </div> 

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 virtudes">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h3 class="text-center text-gray-dark"><strong>TIPOS DE FÚTBOL PREFERIDOS</strong></h3><br/>
                            <div class="caja_azul">
                                <div class="checkbox">
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[66]){?>checked="true"<?php }?> type="checkbox" value="66"/> Fútbol 11</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[67]){?>checked="true"<?php }?> type="checkbox" value="67"/> Fútbol 5</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[68]){?>checked="true"<?php }?> type="checkbox" value="68"/> Fútbol 7/8/9</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[69]){?>checked="true"<?php }?> type="checkbox" value="69"/> Fútbol Sala</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[70]){?>checked="true"<?php }?> type="checkbox" value="70"/> Fútbol de Salón/Micro</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[71]){?>checked="true"<?php }?> type="checkbox" value="71"/> Fútbol playa</span>
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[72]){?>checked="true"<?php }?> type="checkbox" value="72"/> Freestyle</span>
                                    </label>
                                </div>
                            </div>             
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h3 class="text-center text-gray-dark"><strong>OTRAS POSICIONES</strong></h3>
                            <br>
                            <div class="caja_azul">
                                <div class="checkbox">
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[11]){?>checked="true"<?php }?> type="checkbox" value="11"/> Arquero</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[12]){?>checked="true"<?php }?> type="checkbox" value="12"/> Lateral Izquierdo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[13]){?>checked="true"<?php }?> type="checkbox" value="13"/> Lateral Derecho</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[14]){?>checked="true"<?php }?> type="checkbox" value="14"/> Central Izquierdo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[64]){?>checked="true"<?php }?> type="checkbox" value="64"/> Central Derecho</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[15]){?>checked="true"<?php }?> type="checkbox" value="15"/> Volante Central</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[16]){?>checked="true"<?php }?> type="checkbox" value="16"/> Volante Mixto</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[17]){?>checked="true"<?php }?> type="checkbox" value="17"/> Volante de Creación</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[18]){?>checked="true"<?php }?> type="checkbox" value="18"/> Volante por banda Izquierdo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[19]){?>checked="true"<?php }?> type="checkbox" value="19"/> Volante por banda Derecho</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[20]){?>checked="true"<?php }?> type="checkbox" value="20"/> Extremo Izquierdo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[21]){?>checked="true"<?php }?> type="checkbox" value="21"/> Extremo Derecho</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[22]){?>checked="true"<?php }?> type="checkbox" value="22"/> Enganche</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[23]){?>checked="true"<?php }?> type="checkbox" value="23"/> Media Punta</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[24]){?>checked="true"<?php }?> type="checkbox" value="24"/> Segundo Delantero</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[25]){?>checked="true"<?php }?> type="checkbox" value="25"/> Delantero Centro</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[26]){?>checked="true"<?php }?> type="checkbox" value="26"/> Director Técnico</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[28]){?>checked="true"<?php }?> type="checkbox" value="28"/> Aguatero/Acompañante</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[29]){?>checked="true"<?php }?> type="checkbox" value="29"/> Volante de Recreación</span> 
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h3 class="text-center text-gray-dark"><strong>VIRTUDES DE JUEGO</strong></h3><br>
                            <div class="caja_azul">
                                <div class="checkbox">
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[30]){?>checked="true"<?php }?> type="checkbox" value="30"/> Posicionamiento</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[31]){?>checked="true"<?php }?> type="checkbox" value="31"/> Visión</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[32]){?>checked="true"<?php }?> type="checkbox" value="32"/> Intuición</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[33]){?>checked="true"<?php }?> type="checkbox" value="33"/> Organización</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[34]){?>checked="true"<?php }?> type="checkbox" value="34"/> Marca</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[35]){?>checked="true"<?php }?> type="checkbox" value="35"/> Cabeceo Defensivo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[36]){?>checked="true"<?php }?> type="checkbox" value="36"/> Anticipación</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[37]){?>checked="true"<?php }?> type="checkbox" value="37"/> Recuperación</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[38]){?>checked="true"<?php }?> type="checkbox" value="38"/> Quite deslizante<br/></span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[39]){?>checked="true"<?php }?> type="checkbox" value="39"/> Pegada de media y larga distancia</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[40]){?>checked="true"<?php }?> type="checkbox" value="40"/> Toque de primera</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[41]){?>checked="true"<?php }?> type="checkbox" value="41"/> Pase Corto</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[42]){?>checked="true"<?php }?> type="checkbox" value="42"/> Pase largo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[43]){?>checked="true"<?php }?> type="checkbox" alue="43"/> Pase gol</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[44]){?>checked="true"<?php }?> type="checkbox" value="44" /> Gambeta</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[45]){?>checked="true"<?php }?> type="checkbox" value="45" /> Drible en velocidad</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[46]){?>checked="true"<?php }?> type="checkbox" value="46" /> Cabeceo Ofensivo</span> 
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[47]){?>checked="true"<?php }?> type="checkbox" value="47" /> Definición</span>  
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
                            <h3 class="text-center text-gray-dark"><strong>VIRTUDES FÍSICAS Y MENTALES</strong></h3><br>
                            <div class="caja_azul">
                                <div class="checkbox">
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[48]){?>checked="true"<?php }?> type="checkbox" value="48" /> Fuerza</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[49]){?>checked="true"<?php }?> type="checkbox"  value="49" /> Velocidad</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[50]){?>checked="true"<?php }?> type="checkbox" value="50" /> Potencia</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[51]){?>checked="true"<?php }?> type="checkbox" value="51" /> Salto</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[52]){?>checked="true"<?php }?> type="checkbox" value="52" /> Resistencia</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[53]){?>checked="true"<?php }?> type="checkbox" value="53" /> Agilidad</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[54]){?>checked="true"<?php }?> type="checkbox" value="54" /> Reflejos</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[55]){?>checked="true"<?php }?> type="checkbox" value="55" /> Estirada</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[56]){?>checked="true"<?php }?> type="checkbox" value="56" /> Atajada</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[57]){?>checked="true"<?php }?> type="checkbox" value="57" /> Agresividad</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[58]){?>checked="true"<?php }?> type="checkbox" value="58" /> Entrega</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[59]){?>checked="true"<?php }?> type="checkbox" value="59" /> Sacrificio</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[60]){?>checked="true"<?php }?> type="checkbox" value="60" /> Espiritu competitivo</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[61]){?>checked="true"<?php }?> type="checkbox" value="61" /> Compañerismo</span>  
                                    </label>
                                    <label>
                                        <span class="span-hover"><input name="virtues[]" <?php if ($_smarty_tpl->tpl_vars['virtues']->value[62]){?>checked="true"<?php }?> type="checkbox" value="62" /> Juego Limpio</span>  
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="clear">

                        </div>
                    </div>
                    <div class="clear">
                            <br>
                            <br>
                            <br>
                        </div>
                    <input type="hidden" name="latitude" id='user-latitud' value="<?php echo $_smarty_tpl->tpl_vars['user']->value->latitude;?>
"><br/>
                    <input type="hidden" name="longitude" id='user-longitud' value="<?php echo $_smarty_tpl->tpl_vars['user']->value->longitude;?>
"><br/>
                    <div class="text-center">
                        <button type="button" class="btn btn_blue_light" id="_btn_update_perfil" style="width: 70%">Actualizar datos</button>
                    </div>
                    <div class="clear"><br></div>
                    </form>
                </span>
                <span id="contend-datos-adicionales" style="display: none;">
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/perfil/sections/datos_adicionales.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </span>
            </div>
        </div>
    </div>
</div>
<?php }} ?>