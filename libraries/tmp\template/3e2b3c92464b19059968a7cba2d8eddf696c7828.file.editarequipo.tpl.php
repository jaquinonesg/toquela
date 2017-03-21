<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 12:33:31
         compiled from "/var/www/toquela/views/equipos/sections/editarequipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1099636743562a8e4a0c8fd1-96717572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e2b3c92464b19059968a7cba2d8eddf696c7828' => 
    array (
      0 => '/var/www/toquela/views/equipos/sections/editarequipo.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1099636743562a8e4a0c8fd1-96717572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562a8e4a1f65d0_74314859',
  'variables' => 
  array (
    'iscreator' => 0,
    '_params' => 0,
    'team' => 0,
    'types' => 0,
    'type_current' => 0,
    'type' => 0,
    'cities' => 0,
    'city' => 0,
    'user' => 0,
    'current_city' => 0,
    'attachments' => 0,
    'attachment' => 0,
    'captain' => 0,
    'players' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562a8e4a1f65d0_74314859')) {function content_562a8e4a1f65d0_74314859($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['iscreator']->value){?>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui.js"></script>


<div class="crearequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_equipo'] = new Smarty_variable(2, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info-equipo.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                <p class="div-title"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['team']->value->name, 'UTF-8');?>
</p>
            </div>
            <br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre de equipo</label>
                    <input type="text" class="form-control Inp" id="name" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
" maxlength="70" placeholder="Nombre" autofocus="" required=""/>
                </div>
                <div class="form-group">
                    <label for="sex">Género</label>
                    <select class="form-control Inp" id="sex" autofocus="" required="">
                        <option <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='MALE'){?>selected=""<?php }?>>Masculino</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='FEMALE'){?>selected=""<?php }?>>Femenino</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='MIXED'){?>selected=""<?php }?>>Mixto</option>           
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control Inp" id="description" rows="3" autofocus="" required=""><?php echo $_smarty_tpl->tpl_vars['team']->value->description;?>
</textarea>
                </div>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codlocality;?>
" id="codlocalityhidden"/>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="typefutbol">Tipo de Fútbol</label>
                <select class="form-control" id="typefutbol">
                    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['type_current']->value->codvirtues==$_tmp1){?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
" selected=""><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</option>
                    <?php }else{ ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</option>
                    <?php }?>
                    <?php } ?>
                </select>
                <br>
                <div class="form-group">
                    <label for="codcity">Ciudad</label>
                    <select name="codcity" id="codcity" class="form-control Inp" autofocus="" required="">
                        <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['city']->value->codcity;?>
' <?php if ($_smarty_tpl->tpl_vars['user']->value->codcity==$_smarty_tpl->tpl_vars['city']->value->codcity){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value->name;?>
</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="locality">Localidad</label>
                    <select name="codlocality" class="form-control Inp" id="locality">
                        <option>Seleccione...</option>                            
                    </select>
                </div>
                <script type="text/javascript">
                    $('select[name=codcity] option[value=<?php echo $_smarty_tpl->tpl_vars['current_city']->value->codcity;?>
]').attr('selected', 'selected');
                </script>
            </div>
            <div class="clear"><br></div>
            <div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                    <p class="div-title">GALERÍA</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 2%;">
                    <div class="form-group contPic">
                        <label for="file_team">Seleccione una imagen de su equipo:</label>
                        <input class="Inp file_team btn btn-white" id="file_team" type="file" data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
"/>
                    </div>
                    <br>
                    <?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)){?>
                    <?php  $_smarty_tpl->tpl_vars['attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->key => $_smarty_tpl->tpl_vars['attachment']->value){
$_smarty_tpl->tpl_vars['attachment']->_loop = true;
?>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="capagaleria img-thumbnail">
                            <button class="delete_img btn btn-danger" style="position: absolute; left: 0; top:0;" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['attachment']->value->codattachment;?>
">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <button class="select_img btn btn-info escojo_esta" style="position: absolute; right: 0; bottom:0;" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['attachment']->value->codattachment;?>
">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <a class="previa" rel="gallery1" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['attachment']->value->path;?>
">
                                <img alt="previa" style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['attachment']->value->path;?>
"/>
                            </a>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                    <?php }else{ ?>
                    <p>No se ha súbido ninguna imagen...</p>
                    <?php }?>
                </div>

                <?php if (isset($_smarty_tpl->tpl_vars['captain']->value)){?>
                <div class="clear"><br></div>
                <?php }?>
                <div class="clear"><br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-bg">
                        <p class="div-title">JUGADORES</p>
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div style="border: 2px solid #ddd; padding: 15px;">
                            <div>
                                <p class="text-center" style="font-size: 20px;"><strong class="resalta">ORGANIZADOR DEL EQUIPO: </strong><?php echo $_smarty_tpl->tpl_vars['captain']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['captain']->value->lastname;?>
 </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inscribir-jugadores" style="padding: 0px;">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="border-right: 1px solid #ddd;">
                                <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Inscribir jugadores al equipo:</p>
                                <div class="content">
                                    <p><span class="resalta">1)</span> Descargar plantilla base.&nbsp;<span class="glyphicon glyphicon-arrow-right resalta"></span>&nbsp;<a class="btn btn-sm efect-hover" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/descargables/plantilla_base.xlsx">Descargar</a></p>
                                    <p><span class="resalta">2)</span> Llenar la tabla con los usuarios que necesite agregar.</p>
                                    <p><span class="resalta">3)</span> Subir el archivo excel que creó.&nbsp;<span class="glyphicon glyphicon-arrow-right resalta"></span>&nbsp;<label for="axel" class="btn btn-sm efect-hover">Subir excel</label>
                                        <input id="axel" type="file" style="visibility:hidden">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="border-left: 1px solid #ddd;">
                            <p style="font-size: 18px;text-align: center;margin-top: 2%;margin-bottom: 2%;">JUGADORES</p>
                                <div class="paneles" panel=equipo>
                                    <?php if (count($_smarty_tpl->tpl_vars['players']->value)>1){?>
                                    <table class="table">
                                        <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['players']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
?>
                                        <?php if (($_smarty_tpl->tpl_vars['player']->value->status=='POSTULANT')){?>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>

                                            </td>
                                            <td>
                                                <button class="aceptar_jugador btn btn-default" data-code="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Aceptar</button>
                                                <button class="rechazar_jugador btn btn-default" data-code="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Rechazar</button>
                                            </td>
                                        </tr>
                                        <?php }elseif(($_smarty_tpl->tpl_vars['player']->value->status!='CAPTAIN')){?>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>

                                            </td>
                                            <td>
                                                <?php if (!isset($_smarty_tpl->tpl_vars['captain']->value)||$_smarty_tpl->tpl_vars['captain']->value->coduser!=$_smarty_tpl->tpl_vars['player']->value->coduser){?>
                                                <button class="remove_user_team btn btn-sm btn-danger" data-code="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">
                                                    <span class="glyphicon glyphicon-remove-circle">
                                                    </button>
                                                    <button class="captain_team btn btn-sm btn-default" data-code="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Asignar como organizador</button>
                                                    <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil?cod=<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" >Editar Jugador</button>
                                                    <?php }?>
                                                </td>    
                                            </tr>
                                            <?php }?>
                                            <?php } ?>
                                        </table>
                                        <?php }else{ ?>
                                        <p>Sin jugadores</p>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"><br></div>
                        <div style="text-align: center;">
                            <p><strong>Invitar jugadores a través de:</strong></p>
                            <img data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" class="cursor" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/redes/fbtoquela.png" alt="Facebook" title="Facebook" id="btn_facebook"/>
                            <img data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" class="cursor" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/redes/twtoquela.png" alt="Twitter" title="Twitter"id="btn_twitter"/>
                            <!--a class="popup" href="#message_form"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/redes/email.png"/></a-->
                            <!--a class="popup" href="#search_form"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/redes/toquela.png"/></a-->
                        </div>
                        <div class="clear"><br></div>
                        <div class="text-center">
                            <button id="update_team" class="btn btn_blue_light" style="width: 70%;" data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Actualizar Equipo</button>
                            <br>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                </div>
            </div>

            <div style="display:none">
                <form id="search_form" method="post" action="">
                    <p>
                        <span for="username">USERNAME</span>
                        <input type="text" name="username" size="30" id="username" />
                        <button id="add_player_team" data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Agregar al equipo</button>
                    </p>
                </form>
            </div>
            <div style="display: none;">
                <form id="message_form" method="post" action="">
                    <div>            
                        <span for="your_name">Tu nombre</span>
                    </div>
                    <div>
                        <input type="text" name="your_name" size="30" id="your_name" />
                    </div>
                    <div>            
                        <span for="your_email">Tu correo electrónico</span>
                    </div>
                    <div>
                        <input type="text" name="your_email" size="30" id="your_email" />
                    </div>
                    <div>            
                        <span for="email_friends">El correo electrónico de tu amigo</span>
                    </div>
                    <div>
                        <input type="text" name="email_friends" size="30" id="email_friends" />
                    </div>
                    <div>            
                        <span for="subject">Asunto</span>
                    </div>
                    <div>
                        <input type="text" name="subject" size="30" id="subject" />
                    </div>
                    <div>            
                        <span for="message">Mensaje</span>
                    </div>
                    <div>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <div>
                        <button id="send_message">Enviar</button>
                    </div>
                </form>
            </div>
            <?php }else{ ?>
            <div class="crearequipo">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
                    <div class="row">
                        <?php $_smarty_tpl->tpl_vars['menu_equipo'] = new Smarty_variable(2, null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info-equipo.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <br>
                        <p class="text-center">Solo el capitán puede editar este equipo.</p>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <?php }?>

            <div class="displayes-out">
                <div id="mensaje-jugadores-excel" style="display: none;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mensaje-jugadores-excel" style="padding: 0px;">
                    <p class="text-center resalta" style="font-size: 22px;margin-bottom: 2%;">Información</p>
                        <!--Nuevos en el equipos-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 registrado tipo" style="display: none">
                            <p class="title" style="background-color: #06ABB2">Nuevos usuarios</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Usuarios registrados exitosamente.</p>
                            <div class="content"></div>
                        </div>
                        <!--ya estaba en el equipos-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ya-registrado tipo" style="display: none">
                            <p class="title" style="background-color: #6E6E6E">Usuarios duplicados</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Los siguientes usuarios se encontraban registrados en el equipo anteriormente:</p>
                            <div class="content"></div>
                        </div>
                        <!--Algun error-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 correo-mal tipo" style="display: none">
                            <p class="title" style="background-color: #8A0808" >Problemas con la creación de usuarios</p>
                            <p class="desc"><span class="glyphicon glyphicon-record"></span>&nbsp;Ha ocurrido un error en la creación de algunos usuarios, le sugerimos confirmar la información que quiere ingresar y/o completarla si el problema persiste. </p>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>
                <input id="codigo_equipo" type="text" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" style="display: none;">
            </div><?php }} ?>