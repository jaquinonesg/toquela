<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 00:05:19
         compiled from "/var/www/toquela/views/_templates/info-equipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3595183565622f6592cfdc0-16442480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c6468755291f7b9c8a7f2ac9a3281f9175d311a' => 
    array (
      0 => '/var/www/toquela/views/_templates/info-equipo.tpl',
      1 => 1446180634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3595183565622f6592cfdc0-16442480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622f659381556_34269973',
  'variables' => 
  array (
    '_params' => 0,
    'postula' => 0,
    'user' => 0,
    'team' => 0,
    'ph_principal' => 0,
    'type' => 0,
    'MyTeam' => 0,
    'menu_equipo' => 0,
    'iscreator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622f659381556_34269973')) {function content_5622f659381556_34269973($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/crear_partidos.js"></script>
<br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
    <?php if ($_smarty_tpl->tpl_vars['postula']->value){?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value->coduser)){?>
    <div style="position: absolute;right: 0;top: 0;z-index: 10;">
        <a class="popup" href="#popup_postula">
            <button class="btn btn-default" style="padding: 25px;font-size: 20px;" data-team="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">Postularme al equipo</button>
        </a>
    </div>
    <?php }?>
    <?php }?>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
        <h2 class="text-gray-dark" style="font-size: 30px;"><strong><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['team']->value->name, 'UTF-8');?>
</strong></h2><br>
        <?php if ($_smarty_tpl->tpl_vars['ph_principal']->value->path!=''){?>
            <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['ph_principal']->value->path;?>
" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
"/><br/>
        <?php }else{ ?>
            <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
"/><br/>
        <?php }?>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="z-index: 0;">
        <br>
        <br>
        <br>
        <p><span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php if (isset($_smarty_tpl->tpl_vars['type']->value->name)){?><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
<?php }else{ ?>No tiene tipo de juego<?php }?></p>
        <div class="clear"><br></div>
        <p>
            <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
            <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='MALE'){?>
                Masculino
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='FEMALE'){?>
                Femenino
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['team']->value->type=='MIXED'){?>
                Mixto
            <?php }?>
        </p>
        <div class="clear"><br></div>
        <?php if (isset($_smarty_tpl->tpl_vars['user']->value->coduser)&&isset($_smarty_tpl->tpl_vars['MyTeam']->value)){?>
        <button type="button" class="btn btn-primary btn_enviar_msg_team efect-hover">Enviar mensaje grupal</button>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/equipos/sections/popupmsgteam.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php }?>

        <div class="clear"><br></div>
<!--             <?php if (isset($_smarty_tpl->tpl_vars['MyTeam']->value)){?>
            <button type="button" class="btn btn-primary btn_create-match" data-toggle="modal" data-target="#_popup_html_big">Crear partido</button>
        <?php }?> -->
        <div class="clear"><br></div>
    </div>
    <div class="clear"><br></div>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_equipo">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="_menu_equipo">
            <ul class="nav navbar-nav">
                <li <?php if ($_smarty_tpl->tpl_vars['menu_equipo']->value==0){?> class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['team']->value->url;?>
"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;INFORMACIÓN</a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['menu_equipo']->value==1){?> class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/estadistica/<?php echo $_smarty_tpl->tpl_vars['team']->value->url;?>
"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;ESTADÍSTICAS</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['iscreator']->value){?>
                <li <?php if ($_smarty_tpl->tpl_vars['menu_equipo']->value==2){?> class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/editar-equipo/<?php echo $_smarty_tpl->tpl_vars['team']->value->url;?>
"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;EDITAR</a>
                </li>
                <?php }?>
                
            </ul>
        </div>
    </nav>
    <input id="cod_team" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" style="display: none;"/>
    <?php if (isset($_smarty_tpl->tpl_vars['MyTeam']->value)){?>
        <div class="modal-crear-partido">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/equipos/sections/crear_partido.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>
    <input type="text" id="team_local" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" style="display: none;"/>
</div><?php }} ?>