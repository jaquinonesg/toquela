<?php /* Smarty version Smarty-3.1.8, created on 2015-05-12 13:24:20
         compiled from "/var/www/html/toquela/views/_templates/menu-perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47061571055524554d909f0-46414644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6a11f9a37b3b696cdd87a06cf6c6088eff807a2' => 
    array (
      0 => '/var/www/html/toquela/views/_templates/menu-perfil.tpl',
      1 => 1416600480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47061571055524554d909f0-46414644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'user' => 0,
    '_params' => 0,
    'menu_perfil' => 0,
    'userpublic' => 0,
    'isfollower' => 0,
    'haySesion' => 0,
    'encodeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55524554f11e77_60998697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55524554f11e77_60998697')) {function content_55524554f11e77_60998697($_smarty_tpl) {?><div class="clear"><br></div>
    <?php if ($_smarty_tpl->tpl_vars['menu']->value){?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5;display: inline-block;">
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value->photoprofile)){?>
                    <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->photoprofile->path;?>
" target="_blank">
                        <img class="img-thumbnail img-perfil" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->photoprofile->path;?>
" alt="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
" title="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
"/>
                    </a>
                <?php }else{ ?>
                    <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg" target="_blank">
                        <img class="img-thumbnail img-perfil" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg" alt="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
" title="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
"/>
                    </a>
                <?php }?>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="display: inline-block;margin-left: 15px;">
                <div style="font-size: 35px;"><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
</div><br>
                <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/" title="Editar mi perfil">
                    <span class="icon-cog" style="font-size: 30px;"></span>
                </a>&nbsp;&nbsp;
                <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/<?php echo $_smarty_tpl->tpl_vars['user']->value->coduser;?>
-<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
" title="Perfil público">
                    <span class="icon-camiseta" style="font-size: 30px;"></span>
                </a>&nbsp;&nbsp;
                <?php if ($_smarty_tpl->tpl_vars['user']->value->nummsg>0){?>
                    <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/mismensajes" title="Mensajes">
                        <span class="glyphicon glyphicon-envelope" style="font-size: 30px;"></span>
                        <span class="burbuja">&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value->nummsg;?>
</span>
                    </a>&nbsp;&nbsp;
                <?php }else{ ?>
                    <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/mismensajes" title="Mensajes">
                        <span class="glyphicon glyphicon-envelope" style="font-size: 30px;"></span>
                    </a>&nbsp;&nbsp;
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->notify>0){?>
                    <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/misnotificaciones" title="Notificaciones">
                        <span class="glyphicon icon-earth" style="font-size: 30px;"></span>
                        <span class="burbuja">&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value->notify;?>
</span>
                    </a>&nbsp;&nbsp;
                <?php }else{ ?>
                    <a class="text-gray-dark" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/misnotificaciones" title="Notificaciones">
                        <span class="glyphicon icon-earth" style="font-size: 30px;"></span>
                    </a>&nbsp;&nbsp;          
                <?php }?>
                <div class="clear"><br></div>
                <div>
                    <div><span class="icon-guayo" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;NIVEL DE JUEGO: </span><?php echo $_smarty_tpl->tpl_vars['user']->value->levelgame->name;?>
</div>
                    <br>
                    <div><span class="icon-cancha" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;POSICIÓN: </span><?php echo $_smarty_tpl->tpl_vars['user']->value->positiongame->name;?>
</div>
                    <br>
                    <div><span class="icon-location" style="font-size: 28px; margin-top: 5px;"></span><span class="text-gray-dark">&nbsp;&nbsp;LOCALIDAD: </span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->locality->name)===null||$tmp==='' ? "Sin localidad" : $tmp);?>
</div>
                    <br>
                    <div><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/fans_icons/<?php echo $_smarty_tpl->tpl_vars['user']->value->fan->icon;?>
" style="width: 26px; margin-top: 5px;" /><span class="text-gray-dark">&nbsp;&nbsp;HINCHA: </span><?php echo $_smarty_tpl->tpl_vars['user']->value->fan->name;?>
</div>
                </div> 
            </div>
        </div>
        <div class="clear"><br></div>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_perfil">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="_menu_perfil">
                <ul class="nav navbar-nav">
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==0){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/">MI PERFIL</a></li>
                    <!--li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==1){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/miscanchas">Mis canchas</a></li-->
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==2){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/misequipos">MIS EQUIPOS</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==3){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/fotos">FOTOS</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==4){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/videos">VIDEOS</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==5){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/estadisticas">ESTADÍSTICAS</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==6){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/misamigos">AMIGOS</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==7){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/actividades">ACTIVIDADES</a></li>
<!--                     <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==8){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/partidos_perfil">PARTIDOS</a></li> -->
                </ul>
            </div>
        </nav>
    </div>
<?php }else{ ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5; display: inline-block;">
                <?php if (isset($_smarty_tpl->tpl_vars['userpublic']->value->photoprofile)){?>
                    <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['userpublic']->value->photoprofile->path;?>
" target="_blank">
                        <img class="img-thumbnail img-perfil" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['userpublic']->value->photoprofile->path;?>
" width="150" alt="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->lastname;?>
" title="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->lastname;?>
"/>
                    </a>
                <?php }else{ ?>
                    <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg" target="_blank">
                        <img class="img-thumbnail img-perfil" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg" width="150" alt="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->lastname;?>
" title="Imagen perfil <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->lastname;?>
"/>
                    </a>
                <?php }?>
            </div>
            <div style="display: inline-block;margin-left: 15px;">
                <div style="font-size: 35px;"><?php echo $_smarty_tpl->tpl_vars['userpublic']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['userpublic']->value->lastname;?>
</div><br>
                <?php if ($_smarty_tpl->tpl_vars['isfollower']->value->isfollower==0){?>
                <?php if ($_smarty_tpl->tpl_vars['haySesion']->value==true){?>
                <div><button type="button" data-accion="save" data-user="<?php echo $_smarty_tpl->tpl_vars['userpublic']->value->coduser;?>
-<?php echo $_smarty_tpl->tpl_vars['encodeurl']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['userpublic']->value->username);?>
" class="btn btn_blue_light" id="btn_seguir">Seguir</button></div>
                <?php }?>
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['haySesion']->value==true){?>
                <div><button type="button" data-accion="delete" data-user="<?php echo $_smarty_tpl->tpl_vars['userpublic']->value->coduser;?>
-<?php echo $_smarty_tpl->tpl_vars['encodeurl']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['userpublic']->value->username);?>
" class="btn btn-default" id="btn_seguir">Dejar de Seguir</button></div>
                <?php }?>
                <?php }?>
                <br>
                <div><span class="icon-guayo" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;NIVEL DE JUEGO: </span><?php echo $_smarty_tpl->tpl_vars['userpublic']->value->levelgame->name;?>
</div>
                <br>
                <div><span class="icon-cancha" style="font-size: 30px;"></span><span class="text-gray-dark">&nbsp;&nbsp;POSICIÓN: </span><?php echo $_smarty_tpl->tpl_vars['userpublic']->value->positiongame->name;?>
</div>
                <br>
                <div><span class="icon-location" style="font-size: 28px; margin-top: 5px;"></span><span class="text-gray-dark">&nbsp;&nbsp;LOCALIDAD: </span><?php echo $_smarty_tpl->tpl_vars['userpublic']->value->locality->name;?>
</div>
                <br>
                <div><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/fans_icons/<?php echo $_smarty_tpl->tpl_vars['userpublic']->value->fan->icon;?>
" style="width: 26px; margin-top: 5px;" /><span class="text-gray-dark">&nbsp;&nbsp;HINCHA: </span><?php echo $_smarty_tpl->tpl_vars['userpublic']->value->fan->name;?>
</div>
            </div>
        </div>
    </div>
<?php }?><?php }} ?>