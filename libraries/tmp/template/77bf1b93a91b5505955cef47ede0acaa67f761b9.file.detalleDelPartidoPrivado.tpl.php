<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 13:10:34
         compiled from "C:\xampp\htdocs\toquela\views\equipos\sections\detalleDelPartidoPrivado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68345554e51adfa4a3-04884118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77bf1b93a91b5505955cef47ede0acaa67f761b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\equipos\\sections\\detalleDelPartidoPrivado.tpl',
      1 => 1416600499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68345554e51adfa4a3-04884118',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'teamRival' => 0,
    'teamLocal' => 0,
    'postulados' => 0,
    'user' => 0,
    'postulado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554e51b09ef80_49221082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554e51b09ef80_49221082')) {function content_5554e51b09ef80_49221082($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/equipos/css/perfilequipo.css" type="text/css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/postular_mis_equipos_en_equipos.js"></script>
<div class="perfil-partido">
    <?php if (!isset($_smarty_tpl->tpl_vars['teamRival']->value)){?>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                    <h2 class="text-gray-dark" style="font-size: 30px;"><strong><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
</strong></h2><br>
                            <?php if (isset($_smarty_tpl->tpl_vars['teamLocal']->value->pathTeam)){?>
                        <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->pathTeam;?>
" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
"/><br/>
                    <?php }else{ ?>
                        <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
"/><br/>
                    <?php }?>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="z-index: 0;">
                    <br>
                    <br>
                    <br>
                    <p><span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->footballType;?>
</p>
                    <div class="clear"><br></div>
                    <p>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='MALE'){?>
                            Masculino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='FEMALE'){?>
                            Femenino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=='MIXED'){?>
                            Mixto
                        <?php }?>
                    </p>
                    <?php if (isset($_smarty_tpl->tpl_vars['postulados']->value)){?>
                        <button class="btn btn-primary btn-modal-postulate" data-toggle="modal" data-target="#postulados" style="margin-left: 2%;">
                            Ver equipos postulados
                        </button>
                    <?php }?>
                    <div class="clear"><br></div>
                        <?php if (isset($_smarty_tpl->tpl_vars['user']->value)==true){?>
                            <?php if (count($_smarty_tpl->tpl_vars['postulados']->value)<5){?>
                            <button id="btn-postulate-teams" class="btn btn-primary" style="margin-left: 2%;">
                                Postular equipos
                            </button>
                        <?php }?>
                    <?php }?>

                    <div class="clear"><br></div>
                </div>
                <div class="clear"><br></div>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <h2 class="text-gray-dark" style="font-size: 30px;"><strong><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
</strong></h2><br>
                        <?php if (isset($_smarty_tpl->tpl_vars['teamLocal']->value->pathTeam)){?>
                    <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->pathTeam;?>
" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
"/><br/>
                <?php }else{ ?>
                    <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->name;?>
"/><br/>
                <?php }?>
                <p class="attrs-team hidden-sm hidden-md hidden-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->footballType;?>

                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=='MALE'){?>
                            Masculino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='FEMALE'){?>
                            Femenino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=='MIXED'){?>
                            Mixto
                        <?php }?>
                    </span>
                </p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
                <p class="versus">VS</p>
                <p class="info-match"><strong class="text-gray-dark">Descripción </strong></p><p><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->description;?>
</p>
                <p class="info-match"><strong class="text-gray-dark">Fecha y hora </strong></p><p><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->datetimegame;?>
</p>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <h2 class="text-gray-dark" style="font-size: 30px;"><strong><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->nameTeam;?>
</strong></h2><br>
                        <?php if (isset($_smarty_tpl->tpl_vars['teamRival']->value->pathTeam)){?>
                    <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['teamRival']->value->pathTeam;?>
" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamRival']->value->nameTeam;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamRival']->value->nameTeam;?>
"/><br/>
                <?php }else{ ?>
                    <img class="img-responsive img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamRival']->value->nameTeam;?>
" title="Foto perfil Equipo <?php echo $_smarty_tpl->tpl_vars['teamRival']->value->nameTeam;?>
"/><br/>
                <?php }?>
                <p class="attrs-team hidden-sm hidden-md hidden-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->footballType;?>

                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='MALE'){?>
                            Masculino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8=='FEMALE'){?>
                            Femenino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9=='MIXED'){?>
                            Mixto
                        <?php }?>
                    </span>
                </p>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-md-offset-1 col-lg-offset-1 init hidden-xs">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position: relative;">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <p class="attrs-team hidden-xs visible-sm visible-md visible-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->footballType;?>

                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10=='MALE'){?>
                            Masculino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11=='FEMALE'){?>
                            Femenino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->typeGenre;?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12=='MIXED'){?>
                            Mixto
                        <?php }?>
                    </span>
                </p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center"></div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                <p class="attrs-team hidden-xs visible-sm visible-md visible-lg">
                    <span>
                        <span class="icon-guayo" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->footballType;?>

                    </span>
                    <span>
                        <span class="icon-titular" style="font-size: 40px;"></span>&nbsp;&nbsp;<strong class="text-gray-dark">GÉNERO: </strong>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp13=ob_get_clean();?><?php if ($_tmp13=='MALE'){?>
                            Masculino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp14=ob_get_clean();?><?php if ($_tmp14=='FEMALE'){?>
                            Femenino
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['teamRival']->value->typeGenre;?>
<?php $_tmp15=ob_get_clean();?><?php if ($_tmp15=='MIXED'){?>
                            Mixto
                        <?php }?>
                    </span>
                </p>
            </div>
        </div> 
    </div>
<?php }?>
</div>
<input id="cod_team" value="<?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->codteammanager;?>
" style="display: none;"/>
<input id="cod_game" value="<?php echo $_smarty_tpl->tpl_vars['teamLocal']->value->codgames;?>
" style="display: none;"/>
<?php if ($_smarty_tpl->tpl_vars['postulado']->value!==''){?>
    <input id="cod_postulate" value="<?php echo $_smarty_tpl->tpl_vars['postulado']->value;?>
" style="display: none;"/>
<?php }?>
<input id="cod_selected" value="" style="display: none;"/>
<input id="cod_selected_acept" value="" style="display: none;"/>

<div class="modal-postulate-teams">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/equipos/sections/postular_equipo.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<?php if (isset($_smarty_tpl->tpl_vars['postulados']->value)){?>
    <div class="modal fade modal-postulateds" id="postulados" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                    <h4 class="modal-title" id="myModalLabel">Postulados al partido</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <span class="t-options">Equipos Postulados</span>
                    </p>
                    <?php  $_smarty_tpl->tpl_vars['postulado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['postulado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['postulados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['postulado']->key => $_smarty_tpl->tpl_vars['postulado']->value){
$_smarty_tpl->tpl_vars['postulado']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['postulado']->value->isMyTeam==true){?>
                            <p class="p-postulated">
                                <a id="<?php echo $_smarty_tpl->tpl_vars['postulado']->value->codteam;?>
" class="delete-postulated" data-code="<?php echo $_smarty_tpl->tpl_vars['postulado']->value->codpostulategame;?>
">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                <span class="name-postulated"><?php echo $_smarty_tpl->tpl_vars['postulado']->value->name;?>
</span>
                            </p>
                        <?php }else{ ?>
                            <p class="p-postulated">
                                <span  id="<?php echo $_smarty_tpl->tpl_vars['postulado']->value->codteam;?>
" class="span-postulated glyphicon glyphicon-hand-right"></span><?php echo $_smarty_tpl->tpl_vars['postulado']->value->name;?>

                            </p>   
                        <?php }?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<div class="modal fade modal-postulateds" id="aceptar_postulado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                <h4 class="modal-title" id="myModalLabel">Aceptar postulado</h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Quiere jugar con este equipo?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="acept_postulate_team">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-postulateds" id="rechazar_postulado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove" style="color: white;font-size: 19px;"></span></button>
                <h4 class="modal-title" id="myModalLabel">Rechazar postulado</h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Quiere rechazar este equipo?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="reject_postulate_team">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</div>

<?php }} ?>