<?php /* Smarty version Smarty-3.1.8, created on 2015-12-01 17:09:20
         compiled from "/var/www/toquela/views/perfil/sections/estadisticas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:458613427565e1a90d7a8b6-64652271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eb117f1c15aa17b482f9adf3f9864324956a2df' => 
    array (
      0 => '/var/www/toquela/views/perfil/sections/estadisticas.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '458613427565e1a90d7a8b6-64652271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'estadistica' => 0,
    'matches' => 0,
    'torneos' => 0,
    'inter' => 0,
    'class_inter' => 0,
    'torneo' => 0,
    'count' => 0,
    'user' => 0,
    'class_collapse' => 0,
    'mas_estadisticas' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_565e1a90f1bfc5_08104788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e1a90f1bfc5_08104788')) {function content_565e1a90f1bfc5_08104788($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="estadisticas">
    <script type="text/javascript">
        $(document).ready(function() {
            var estadisticas = new Estadisticas();
            estadisticas.init();
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(5, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <br>
            <span class="menu-estadistica">
                <ul class="nav nav-tabs">
                    <li class="text-center active" id="pes_general" style="width: 50%; cursor: pointer;"><a><strong>GENERAL</strong></a></li>
                    <li class="text-center" id="pes_torneos" style="width: 50%; cursor: pointer;"><a><strong>TORNEOS</strong></a></li>
                </ul>
            </span>
            <div id="contend-general">
                <div class="clear"><br></div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">GOLES MARCADOS</h2><br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center text-azul" style="position: relative; height: auto;">
                    <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-gol"></span></span>
                    <br>
                    <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->goal;?>
</p>
                    <p style="font-size: 25px;">Goles</p>
                    <br>
                </div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">TARJETAS</h2><br>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: auto;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-targetaamarilla"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->yellow;?>
</p>
                        <p style="font-size: 25px;">Tarjetas amarillas</p>
                        <br>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: auto;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-targetaroja"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->red;?>
</p>
                        <p style="font-size: 25px;">Tarjetas rojas</p>
                        <br>
                    </div>
                </div>
                <div class="clear"></div>
                <h2 class="text-gray-dark" style="font-size: 18px;border-bottom: 1px solid #CCCCCC;">PARTIDOS</h2><br>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-pito"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['matches']->value->totalplayed;?>
</p>
                        <p style="font-size: 25px;">Partidos jugados</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-trophy"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['matches']->value->totalwin;?>
</p>
                        <p style="font-size: 25px;">Partidos ganados</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="glyphicon-thumbs-down" style="display: inline-table;margin-bottom: 4px;"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['matches']->value->totallost;?>
</p>
                        <p style="font-size: 25px;">Partidos perdidos</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="caja_blanca text-center text-azul" style="position: relative; height: 250px;">
                        <span class="glyphicon glyphicon-default" style="margin-top: 10px;"><span class="icon-empate"></span></span>
                        <br>
                        <p style="font-size: 70px;"><?php echo $_smarty_tpl->tpl_vars['matches']->value->totaldraw;?>
</p>
                        <p style="font-size: 25px;">Partidos empatados</p>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="position: relative; height: auto;">
                    <button class="btn btn_blue_light" id="btn_mas_estadisticas">&nbsp;&nbsp;&nbsp;Ver mas estadisticas&nbsp;&nbsp;&nbsp;</button>
                </div>
                <div class="clear"><br></div>
            </div>
            <div id="contend-torneos" style="display: none;">
                <div class="clear"><br></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
                    <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['torneo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['torneo']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['torneos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['torneo']->key => $_smarty_tpl->tpl_vars['torneo']->value){
$_smarty_tpl->tpl_vars['torneo']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['torneo']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['inter']->value){?>
                            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(false, null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("azul", null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
                        <?php }?>
                        <div class="panel panel-default <?php echo $_smarty_tpl->tpl_vars['class_inter']->value;?>
">
                            <div class="panel-heading">
                                <a class="accordion-toggle rango-torneo" style="display: inline-block;width: 49%;" data-toggle="collapse" torneo="<?php echo $_smarty_tpl->tpl_vars['torneo']->value->codtournament;?>
" index="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" usuario="<?php echo $_smarty_tpl->tpl_vars['user']->value->coduser;?>
" data-parent="#accordion" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                                    <h4 class="panel-title" title="<?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
"><span class="glyphicon glyphicon-circle-arrow-right" id="glyphicon_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"></span> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
</h4>
                                </a>
                                <div style="display: inline-block;width: 49%;" class="text-right">
                                    <button class="btn btn-primary btn-statistic-by-torneo" torneo="<?php echo $_smarty_tpl->tpl_vars['torneo']->value->codtournament;?>
" index="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" usuario="<?php echo $_smarty_tpl->tpl_vars['user']->value->coduser;?>
">&nbsp;Mis estadísticas en este torneo&nbsp;</button>
                                </div>
                            </div>
                            <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse <?php echo $_smarty_tpl->tpl_vars['class_collapse']->value;?>
" style="height: auto;">
                                <div class="panel-body" id="torneo_body_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" style="padding-left: 25px; padding-top: 4px;">
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <img class="loader-medium img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>
<div class="display_none">
    <span id="popup_mas_estadisticas">
        <!--div style="height: 300px;overflow-y: scroll;overflow-x: hidden;">
            <table class="table">
        <?php  $_smarty_tpl->tpl_vars['estadistica'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estadistica']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mas_estadisticas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estadistica']->key => $_smarty_tpl->tpl_vars['estadistica']->value){
$_smarty_tpl->tpl_vars['estadistica']->_loop = true;
?>
            <tr>
                <td>
                    <img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/<?php echo $_smarty_tpl->tpl_vars['estadistica']->value->icon;?>
"/>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['estadistica']->value->name;?>
: &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['estadistica']->value->count;?>

                </td>
            </tr>
        <?php } ?>
    </table>
</div-->
    </span>
    <span id="popup_estadisticas">
        <!--div class="contend-estadistica">
            <br>
            <br>
            <div class="text-center">
                <p>Cargando estadisticas...</p><br>
                <img class="loader-medium img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
            </div>
            <br>
            <br>
        </div-->
    </span>
</div>
<?php }} ?>