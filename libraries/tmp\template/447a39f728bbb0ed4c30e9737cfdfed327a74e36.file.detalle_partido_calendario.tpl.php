<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 11:57:55
         compiled from "/var/www/toquela/modules/torneos/views/calendario/sections/detalle_partido_calendario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2010302965628fb3e85f679-94238676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '447a39f728bbb0ed4c30e9737cfdfed327a74e36' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/calendario/sections/detalle_partido_calendario.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2010302965628fb3e85f679-94238676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5628fb3ea5a485_52989471',
  'variables' => 
  array (
    'noprogramado' => 0,
    'team_local' => 0,
    'urlencode' => 0,
    '_params' => 0,
    'url_local' => 0,
    'match' => 0,
    'player' => 0,
    'team_visitant' => 0,
    'url_visitant' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628fb3ea5a485_52989471')) {function content_5628fb3ea5a485_52989471($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['noprogramado']->value===true){?>
<style type="text/css">
    .resalta{
    color: #848484;
    }
</style>
<?php }?>
<div class="detalle-partido-popup">
    <div class="row detalle">
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            <?php if (($_smarty_tpl->tpl_vars['team_local']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team_local']->value->status=='CAPTAIN')){?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("perfil-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("editar-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 20px;margin-bottom: 10px;">Local</p>
            </div>
            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/<?php echo $_smarty_tpl->tpl_vars['url_local']->value;?>
" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    <?php if ($_smarty_tpl->tpl_vars['team_local']->value->image!=''){?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo $_smarty_tpl->tpl_vars['team_local']->value->image;?>
" alt="">
                    <?php }else{ ?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="">
                    <?php }?>
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    <?php if (($_smarty_tpl->tpl_vars['match']->value->scorelocal<0)){?>
                    W
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['match']->value->scorelocal)){?>
                    <?php echo $_smarty_tpl->tpl_vars['match']->value->scorelocal;?>

                    <?php }else{ ?>
                    0
                    <?php }?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta"><?php echo $_smarty_tpl->tpl_vars['team_local']->value->name;?>
</p>
            </div>
            
            <div class="panel-group" id="accordion-local" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-local" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            JUGADORES LOCAL
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['team_local']->value->players; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['player']->key;
?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil?cod=<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" target="blank">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 player">    
                                <p><span class="icon-user"></span><?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
</p>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <div class="informacion">
                <?php if ($_smarty_tpl->tpl_vars['noprogramado']->value!=true){?>
                <div class="info-torneo">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)){?>
                        <p><?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                        <p><?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->descriptionplace)){?>
                        <p><strong class="resalta">Lugar:</strong> <?php echo $_smarty_tpl->tpl_vars['match']->value->descriptionplace;?>
</p>
                        <?php }?>
                    </div>
                </div>
                <?php }else{ ?>
                <p>Aún no ha sido programado</p>
                <?php }?>
                <!-- <a class="btn efect-hover" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/partido/index/<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" target="_blank" style="margin-top: 10px">Cargar resultados</a> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            <?php if (($_smarty_tpl->tpl_vars['team_visitant']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team_visitant']->value->status=='CAPTAIN')){?>
            <?php $_smarty_tpl->tpl_vars['url_visitant'] = new Smarty_variable(((("perfil-equipo/").($_smarty_tpl->tpl_vars['team_visitant']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_visitant']->value->name)), null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['url_visitant'] = new Smarty_variable(((("editar-equipo/").($_smarty_tpl->tpl_vars['team_visitant']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_visitant']->value->name)), null, 0);?>
            <?php }?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 20px;margin-bottom: 10px;">Visitante</p>
            </div>
            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/<?php echo $_smarty_tpl->tpl_vars['url_visitant']->value;?>
" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    <?php if ($_smarty_tpl->tpl_vars['team_visitant']->value->image!=''){?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo $_smarty_tpl->tpl_vars['team_visitant']->value->image;?>
" alt="">
                    <?php }else{ ?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="">
                    <?php }?>
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    <?php if (($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0)){?>
                    W
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['match']->value->scorevisitant)){?>
                    <?php echo $_smarty_tpl->tpl_vars['match']->value->scorevisitant;?>

                    <?php }else{ ?>
                    0
                    <?php }?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta"><?php echo $_smarty_tpl->tpl_vars['team_visitant']->value->name;?>
</p>
            </div>
            
            <div class="panel-group" id="accordion-visitant" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-visitant" href="#visitant" aria-expanded="true" aria-controls="visitant">
                            JUGADORES VISITANTE
                            </a>
                        </h4>
                    </div>
                    <div id="visitant" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['team_visitant']->value->players; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['player']->key;
?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil?cod=<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" target="blank">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 player">    
                                    <p><span class="icon-user"></span><?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
</p>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><?php }} ?>