<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 00:05:19
         compiled from "/var/www/toquela/views/equipos/sections/perfilequipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4568402505622f65913c2d0-60568443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ac3a96f4e1bab5be14c326af7e66b56a621c100' => 
    array (
      0 => '/var/www/toquela/views/equipos/sections/perfilequipo.tpl',
      1 => 1446180634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4568402505622f65913c2d0-60568443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622f6592c4074_11591851',
  'variables' => 
  array (
    '_params' => 0,
    'team' => 0,
    'attachments' => 0,
    'a' => 0,
    'attachment' => 0,
    'players' => 0,
    'index' => 0,
    'parte' => 0,
    'cierrediv' => 0,
    'player' => 0,
    'validate_user_hasteam' => 0,
    'msg_team' => 0,
    'm' => 0,
    'trueque' => 0,
    'renderfecha' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622f6592c4074_11591851')) {function content_5622f6592c4074_11591851($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/equipos/css/perfilequipo.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui.js"></script>
<div class="perfilequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_equipo'] = new Smarty_variable(0, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info-equipo.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span class="text-gray-dark"><strong>DESCRIPCIÓN</strong></span>
                <div class="clear"><br></div>
                <textarea rows="4" disabled="" style="width: 100%; background-color: #FFFFFF; border: none;"><?php echo $_smarty_tpl->tpl_vars['team']->value->description;?>
</textarea>
            </div>
            <div class="clear"><br></div>
                <?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-gray-dark"><strong>Fotos de Galería</strong></h2><br/>
                    <?php  $_smarty_tpl->tpl_vars['attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attachment']->_loop = false;
 $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->key => $_smarty_tpl->tpl_vars['attachment']->value){
$_smarty_tpl->tpl_vars['attachment']->_loop = true;
 $_smarty_tpl->tpl_vars['a']->value = $_smarty_tpl->tpl_vars['attachment']->key;
?>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                            <br>
                            <div class="divcortar" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #000000;">
                                <a class="previa" rel="gallery<?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['attachment']->value->path;?>
">
                                    <img style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['attachment']->value->path;?>
" alt="Vista previa foto <?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
" title="Vista previa foto <?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
"/>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"><br></div> 
                <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['players']->value)>0){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="caja_info" id="integrantes">
                        <span class="text-gray-dark"><strong>INTEGRANTES</strong></span>
                        <div class="clear"><br></div>
                            <?php $_smarty_tpl->tpl_vars['parte'] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['cierrediv'] = new Smarty_variable("</div>", null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['players']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['player']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['index']->value==$_smarty_tpl->tpl_vars['parte']->value){?>
                                    <?php $_smarty_tpl->tpl_vars['parte'] = new Smarty_variable((ceil((count($_smarty_tpl->tpl_vars['players']->value)/2))), null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value>0){?>
                                        <?php echo $_smarty_tpl->tpl_vars['cierrediv']->value;?>

                                    <?php }?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <?php }?>
                                <a role="menuitem" tabindex="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil?cod=<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" target="_blank">
                                    <div class="col-xs-4 col-sm-2 col-md-4 col-lg-4 box-img-user-azul text-right" style="padding-right: 0px;">
                                        <?php if (isset($_smarty_tpl->tpl_vars['player']->value->photo)){?>
                                            <img class="img-responsive" style="float: right;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['player']->value->photo;?>
"/>
                                        <?php }else{ ?>
                                            <img class="img-responsive" style="float: right;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg"/>
                                        <?php }?>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 box-info-user-azul">
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
&nbsp;
                                        </p>
                                        <p>
                                            <?php if ($_smarty_tpl->tpl_vars['player']->value->status=='PLAYER'){?>
                                                (Jugador)
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['player']->value->status=='CAPTAIN'){?>
                                                (Capitán)
                                            <?php }?>
                                        </p>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['validate_user_hasteam']->value)){?>  
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 woll">&nbsp;
                    <?php if (isset($_smarty_tpl->tpl_vars['msg_team']->value)){?>
                        <div class="caja_info" id="msg_grupo">
                            <strong class="text-gray-dark">Mensajes </strong>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="321" align="center" valign="top"><strong>Asunto</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Mensaje</strong></td>
                                        <td width="321" align="center" valign="top"><strong>De</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
                                        <td width="321" align="center" valign="top"><strong>Eliminar</strong></td>
                                    </tr>
                                    <?php $_smarty_tpl->tpl_vars['trueque'] = new Smarty_variable(true, null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msg_team']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>  
                                        <tr align="center" trmsg="<?php echo $_smarty_tpl->tpl_vars['m']->value->codmessage;?>
" <?php if ($_smarty_tpl->tpl_vars['trueque']->value){?>class="success"  <?php $_smarty_tpl->tpl_vars['trueque'] = new Smarty_variable(false, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['trueque'] = new Smarty_variable(true, null, 0);?><?php }?>>
                                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value->subject;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value->text;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
-<?php echo $_smarty_tpl->tpl_vars['m']->value->lastname;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['renderfecha']->value->FormatearFecha($_smarty_tpl->tpl_vars['m']->value->date);?>
</td>
                                            <?php if ($_smarty_tpl->tpl_vars['user']->value->coduser==$_smarty_tpl->tpl_vars['m']->value->from){?>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove-sign" data-user="<?php echo $_smarty_tpl->tpl_vars['m']->value->codmessage;?>
"></span> 
                                                    </button>
                                                </td>
                                            <?php }else{ ?>
                                                <td> </td>
                                            <?php }?>
                                        </tr>
                                    <?php } ?>
                                </table>&nbsp;
                                <div class="clear"></div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<input type="hidden" id="text_msg_postula" value="¿Quiere postularse como jugador del equipo <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
?">

<div style="display:none">
    <div id="popup_postula">
        <p id="msg_popup"></p><br/>
        <button id="btn_acep_postule" class="btn btn-default" rel="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Aceptar</button>
    </div>
</div>

<?php }} ?>