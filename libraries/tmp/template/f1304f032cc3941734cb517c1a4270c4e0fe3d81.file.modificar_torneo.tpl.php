<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 12:26:32
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\index\sections\modificar_torneo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67555527245f1f1d0-20986885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1304f032cc3941734cb517c1a4270c4e0fe3d81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\index\\sections\\modificar_torneo.tpl',
      1 => 1433176270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67555527245f1f1d0-20986885',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_555272460c6452_35004945',
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'firstEnter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555272460c6452_35004945')) {function content_555272460c6452_35004945($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/torneos.js"></script>
<div class="modificar_torneo">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(1, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon glyphicon-edit" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Editar</strong></p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 elminar-torneo">
            <button class="btn btn-danger delete-torneo" data="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
"><span class="glyphicon glyphicon-trash" title="Eliminar"></span><!-- &nbsp;Eliminar torneo --></button>
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="update-torneo">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="clear"></br></div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                            <?php if (!is_null($_smarty_tpl->tpl_vars['tournament']->value->poster)){?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-img-torneo">
                                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->poster;?>
" class="img-thumbnail"/>
                            </div>
                            <?php }?>
                        </div>
                        <div class="clear"><br></div>
                        <label for="img_poster" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Poster</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="file" class="form-control" id="img_poster" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_tournament" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Nombre del torneo</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="name_tournament" placeholder="Nombre del torneo" maxlength="60" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Descripción</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="description"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->description;?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_start" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Inicio &nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up" style="font-size: 20px;"></span></label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="date_start" placeholder="Fecha de inicio" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->start;?>
"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_end" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Fin &nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down" style="font-size: 20px;"></span></label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <input type="email" class="form-control" id="date_end" placeholder="Fecha finalización" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->end;?>
"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="places" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Sedes</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="places"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->places;?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contacts" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Contactos</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="contacts"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->contacts;?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rules" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 control-label">Reglas</label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="3" id="rules"><?php echo $_smarty_tpl->tpl_vars['tournament']->value->rules;?>
</textarea>
                        </div>
                    </div>
                </form>
            </div>
<!--             <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-verde inscripcion">
                <div class="clear"></br></div>
                <div class="invitacion">
                    <h4>Invita a tus amigos</h4>
                    </br>
                    <div class="item" id="invita_face_book">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/face_book.png"/></span></div>
                    <div class="item" id="invita_correo">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/mensaje.png"/></span></div>
                    <div class="item" id="invita_toquela">A través de &nbsp;&nbsp;&nbsp;<span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/logo_toquela_icon.png"/></span></div>
                </div>
            </div> -->
            <div class="clear"></div>
            <div class="text-center">
                </br>
                <button type="button" id="btn_update" class="btn btn_blue_light" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">&nbsp;&nbsp;&nbsp;&nbsp;GUARDAR&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            <div class="clear"></br></div>
        </div>
        <div class="clear"></br></div>
        <div class="clear"></br></div>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['firstEnter']->value)){?>
<script type="text/javascript">
    $(document).ready(function() {
        if ($('#firstEnter').val() !== "") {
            component.messageSimple("Torneo...", $('#firstEnter').val());
        }
    });
</script>
<input id="firstEnter" value="<?php echo $_smarty_tpl->tpl_vars['firstEnter']->value;?>
" style="display: none;"/>
<?php }?>
<?php }} ?>