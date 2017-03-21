<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 16:49:48
         compiled from "/var/www/toquela/modules/torneos/views/index/sections/slay_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:896028069562508086cd150-30332479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e97fbe32f55b1d194669df3eb3f6b3aeacce5cc1' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/index/sections/slay_menu.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '896028069562508086cd150-30332479',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56250808756b78_01180213',
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'menu_perfil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56250808756b78_01180213')) {function content_56250808756b78_01180213($_smarty_tpl) {?><br>
<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 slay" style="padding: 0px;">
        <div id="carousel-example-generic" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img1.jpg" alt="First slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img2.jpg" alt="Second slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img3.jpg" alt="Third slide">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img4.jpg" alt="Fourth slide">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
        <div class=" menu">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;margin-top: 10px;">
                    <p class="title text-center" style="font-size: 32px;">
                    <span class="glyphicon icon-trophy" style="color: #23C3E2;"></span>
                    <span><?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
</span>
                    </p>
            </div>

            <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/index/js/index.js"></script>
            <div class="clear"><br></div>
            <nav class="navbar navbar-inverse navbar-inverse-perso" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#_menu_perfil">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if (isset($_smarty_tpl->tpl_vars['tournament']->value)){?>
                    <a class="navbar-brand" style="padding-bottom: 0px;">
                    </a>
                    <?php }?>
                </div>
                <div class="collapse navbar-collapse" id="_menu_perfil">
                    <ul class="nav navbar-nav">
                        <?php if (isset($_smarty_tpl->tpl_vars['tournament']->value)){?>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==1){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index/modificar_torneo/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-edit" title="Editar"></span>&nbsp;Editar
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==7){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/configurar/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                <span class="glyphicon icon-cog"></span>&nbsp;Configurar
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==2){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/tablero/informacion/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-info-sign" title="Información"></span>&nbsp;Información
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==3){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/participantes/index/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-plus" title="Asignar Participantes"></span>&nbsp;Equipos
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==4){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-calendar" title="Calendarios y resultados."></span>&nbsp;Calendario
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==5){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/clasificacion/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-list-alt" title="Tabla de Resultados."></span>&nbsp;Resultados
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==6){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/tablero/publico/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-globe" title="Enlace publico."></span>&nbsp;Público
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==8){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/nuevo_carnet/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-credit-card" title="Carnets"></span>&nbsp;Carnets
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==9){?> class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/Noticias/index/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                                    <span class="glyphicon glyphicon-comment" title="Noticias"></span>&nbsp;Noticias
                                </a>
                            </li>
                        <?php }?>
                        <li <?php if ($_smarty_tpl->tpl_vars['menu_perfil']->value==0){?> class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index">
                                <span class="glyphicon glyphicon-pushpin" title="Mis torneos"></span>&nbsp; Torneos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


<?php }} ?>