<?php /* Smarty version Smarty-3.1.8, created on 2015-11-16 11:52:09
         compiled from "/var/www/toquela/modules/usuarios/views/index/sections/usuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1118647413564a09b93a71b3-59058437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e780b2b7994556d3c1139a493a0ece94f0981d82' => 
    array (
      0 => '/var/www/toquela/modules/usuarios/views/index/sections/usuario.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1118647413564a09b93a71b3-59058437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuario' => 0,
    'lista_roles' => 0,
    'user' => 0,
    'roles' => 0,
    'role_checked' => 0,
    'lista_privilegios' => 0,
    'privilegios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_564a09b94a05f5_42327809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564a09b94a05f5_42327809')) {function content_564a09b94a05f5_42327809($_smarty_tpl) {?><div class="usuario">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon icon-user" style="font-size: 25px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p class="title text-center"><strong><?php echo $_smarty_tpl->tpl_vars['usuario']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['usuario']->value->lastname;?>
</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <div class="seccion-usuario col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row editar-usuario margin">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="edicion-usuario">
                                <p class="text-header text-center">Asignar Rol</p>
                                    <form id="frm-roles">
                                        <?php  $_smarty_tpl->tpl_vars['roles'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['roles']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['roles']->key => $_smarty_tpl->tpl_vars['roles']->value){
$_smarty_tpl->tpl_vars['roles']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->codrole!=3){?>
                                            <?php if (isset($_smarty_tpl->tpl_vars['roles']->value->checked)){?>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role active">
                                                    <input id="<?php echo $_smarty_tpl->tpl_vars['roles']->value->codrole;?>
" type="radio" name="rol" class="rol rol-si-checked" checked="checked" value="<?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
"><span class="span-rol styles-text"><?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
</span>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role">
                                                    <input id="<?php echo $_smarty_tpl->tpl_vars['roles']->value->codrole;?>
" type="radio" name="rol" class="rol rol-no-checked" value="<?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
"><span class="span-rol styles-text"><?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
</span>
                                                </div>
                                            <?php }?>
                                        <?php }else{ ?>
                                            <?php if ($_smarty_tpl->tpl_vars['roles']->value->codrole!=2){?>
                                                <?php if (isset($_smarty_tpl->tpl_vars['roles']->value->checked)){?>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role active">
                                                        <input id="<?php echo $_smarty_tpl->tpl_vars['roles']->value->codrole;?>
" type="radio" name="rol" class="rol rol-si-checked" checked="checked" value="<?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
"><span class="span-rol styles-text"><?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
</span>
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 div-role">
                                                        <input id="<?php echo $_smarty_tpl->tpl_vars['roles']->value->codrole;?>
" type="radio" name="rol" class="rol rol-no-checked" value="<?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
"><span class="span-rol styles-text"><?php echo $_smarty_tpl->tpl_vars['roles']->value->name;?>
</span>
                                                    </div>
                                                <?php }?>
                                            <?php }?>
                                        <?php }?>
                                        <?php } ?>
                                    </form>
                            </div>
                            <div class="edicion-usuario">
                                <form id="frm-privileges">
                                    <?php if ($_smarty_tpl->tpl_vars['role_checked']->value==1){?>
                                    <p class="text-header text-center" style="margin-bottom: 10px;">Este usuario tiene acceso al uso normal de la pagina</p>
                                    <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['role_checked']->value==2){?>
                                <p class="text-header text-center">Este usuario puede:</p>
                                <div class="div-privilegios">
                                    <?php  $_smarty_tpl->tpl_vars['privilegios'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['privilegios']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_privilegios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['privilegios']->key => $_smarty_tpl->tpl_vars['privilegios']->value){
$_smarty_tpl->tpl_vars['privilegios']->_loop = true;
?>
                                    <div id="div_<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
">
                                        <input id="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
" type="checkbox" checked="checked" class="privileges dfl-check" name="vehicle" value="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
" disabled="disabled"/><span class="span-privi styles-text"><?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
</span>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['role_checked']->value==3){?>
                                <p class="text-header text-center">Asignar privilegios:</p>
                                <div class="div-privilegios">
                                    <?php  $_smarty_tpl->tpl_vars['privilegios'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['privilegios']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_privilegios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['privilegios']->key => $_smarty_tpl->tpl_vars['privilegios']->value){
$_smarty_tpl->tpl_vars['privilegios']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['privilegios']->value->val_default==true){?>
                                            <div id="div_<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
">
                                                <input id="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
" type="checkbox" checked="checked" class="privileges dfl-check" name="vehicle" value="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
" disabled="disabled" /><span class="span-privi styles-text"><?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
</span>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['privilegios']->value->checked==true&&$_smarty_tpl->tpl_vars['privilegios']->value->val_default!==true){?>
                                            <div id="div_<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
">
                                                <input id="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
" type="checkbox" class="privileges dfl-check" checked="checked" name="vehicle" value="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
"/><span class="span-privi styles-text"><?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
</span>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['privilegios']->value->checked!==true&&$_smarty_tpl->tpl_vars['privilegios']->value->val_default!==true){?>
                                            <div id="div_<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
">
                                                <input id="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->idprivilegios;?>
" type="checkbox" class="privileges dfl-check" name="vehicle" value="<?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
"/><span class="span-privi styles-text"><?php echo $_smarty_tpl->tpl_vars['privilegios']->value->nombre;?>
</span>
                                            </div>
                                        <?php }?>
                                    <?php } ?>
                                </div>
                                <?php }?>
                                </form>
                            </div>
                        </div>
<!--                         <input id="select-all" type="button" class="btn btn-primary efect-hover" value="Seleccionar todo"/>
                        <input id="select-reverse" type="button" class="btn btn-primary efect-hover" value="Seleccion inversa"/> -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-top">
                   <center> <input class="btn btn-primary efect-hover" id="enviar" type="submit" value="Modificar"/></center>
                </div>
                <span id="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->coduser;?>
" class="id-usuario"></span>
                    </div>
                </div>
                </div>
                </div>


            </div>
        </div>
    </div>
</div><?php }} ?>