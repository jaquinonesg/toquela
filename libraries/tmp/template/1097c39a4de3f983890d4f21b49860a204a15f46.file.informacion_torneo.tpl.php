<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 13:07:50
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\tablero\sections\informacion_torneo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178435554b6ef0fe1e3-37242706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1097c39a4de3f983890d4f21b49860a204a15f46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\tablero\\sections\\informacion_torneo.tpl',
      1 => 1433176270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178435554b6ef0fe1e3-37242706',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b6ef3dbe12_07033352',
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b6ef3dbe12_07033352')) {function content_5554b6ef3dbe12_07033352($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/torneos.js"></script>
<div class="informacion_torneo">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(2, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
        <span class="glyphicon glyphicon-info-sign" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Información</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="info">
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                </br>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/index/modificar_torneo/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                <button type="button" class="btn btn-default" id="">Añadir poster y descripción del torneo</button>
                </a>
                </br>
                </br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2" scope="col">Configuración del torneo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="glyphicon glyphicon-pushpin"></span>&nbsp; Número de participantes</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tournament']->value->numberparticipants;?>
</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-pushpin"></span>&nbsp; Sistema</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tournament']->value->type;?>
</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-pushpin"></span>&nbsp; Puntos para</td>
                            <td>G=3, E=1, P=0</td>
                        </tr>
                    </tbody>
                </table>
<!--                 <h4>Compartir este torneo</h4>
                </br>
                <ul class="list-inline">
                    <li>
                        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1382126667.html#_=1382130141878&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fwww.konkuri.com%2Ftournaments%2F976252979e&amp;size=m&amp;text=Torneo%20todos%20contra%20todos%20%7C%20Konkuri&amp;url=http%3A%2F%2Fwww.konkuri.com%2Ftournaments%2F976252979e&amp;via=konkuri" class="twitter-share-button twitter-tweet-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 110px; height: 20px;"></iframe>
                    </li>
                    <li>
                        <iframe src="http://www.facebook.com/plugins/like.php?href=http://www.konkuri.com/tournaments/976252979e&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; height: 20px; width: 115px"></iframe>
                    </li>
                    <li>
                        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background-position: initial initial; background-repeat: initial initial;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1382130141922" name="I0_1382130141922" src="https://apis.google.com/u/0/_/+1/fastbutton?usegapi=1&amp;bsv=o&amp;size=medium&amp;origin=http%3A%2F%2Fwww.konkuri.com&amp;url=http%3A%2F%2Fwww.konkuri.com%2Ftournaments%2F976252979e&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.es.YoYPRoaZ5E0.O%2Fm%3D__features__%2Fam%3DAw%2Frt%3Dj%2Fd%3D1%2Frs%3DAItRSTPKrNpXWU8tU8TsqnjWjmL1kysxgw#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1382130141922&amp;parent=http%3A%2F%2Fwww.konkuri.com&amp;pfname=&amp;rpctoken=33598067" data-gapiattached="true" title="+1"></iframe></div>
                    </li>
                </ul> -->
            </div>
            <div class="clear">
                </br>
                </br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 novedades text-gray-dark well">
                </br>
                <h4>PUBLICA EN EL TABLERO</h4>
                <span class="glyphicon glyphicon-default glyphicon-comment" style="position: absolute;right: 0;"></span>
                <div class="clear"></br></br></div>
                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <textarea class="form-control" rows="6" id="description"></textarea>
                    <br>
                    <button type="button" class="btn btn-default" id="publish" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">Publicar</button>
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <ul id="activity-form-type" class="clearfix links">
                        <li class="active" data-type="1">
                            <a href="#" title="Mensajes" id="a_messages"><span class="glyphicon" id="icon-p" title="Videos">P</span></a>
                        </li>
                        <li data-type="2">
                            <a href="#" title="Fotos" id="a_photos"><span class="glyphicon" id="icon-foto"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/foto.png"/></span></a>
                        </li>
                        <li data-type="3">
                            <a href="#" title="Vídeos" id="a_videos"><span class="glyphicon" id="icon-video" title="Fotos"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/video.png"/></span></a>
                        </li>
                    </ul>
                </div>
                <div class="clear"></br></div>
                <div id="content_news" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/news.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
                <div class="clear"></br></div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>