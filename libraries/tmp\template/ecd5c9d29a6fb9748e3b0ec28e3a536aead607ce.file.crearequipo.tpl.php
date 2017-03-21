<?php /* Smarty version Smarty-3.1.8, created on 2015-12-11 16:50:20
         compiled from "/var/www/toquela/views/equipos/sections/crearequipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1607156215562a8e0d8d8596-55835909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecd5c9d29a6fb9748e3b0ec28e3a536aead607ce' => 
    array (
      0 => '/var/www/toquela/views/equipos/sections/crearequipo.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1607156215562a8e0d8d8596-55835909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562a8e0d975e39_48605453',
  'variables' => 
  array (
    '_params' => 0,
    'types' => 0,
    'type' => 0,
    'cities' => 0,
    'city' => 0,
    'user' => 0,
    'teams' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562a8e0d975e39_48605453')) {function content_562a8e0d975e39_48605453($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/underscore.js"></script>
<div class="crearequipo">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <h1 class="text-center text-gray-dark"><strong>CREAR EQUIPO</strong></h1>
            <br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre de equipo</label>
                    <input type="text" class="form-control Inp" id="name" placeholder="Nombre" autofocus="" required="" maxlength="35"/>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control Inp" id="description" rows="3" autofocus="" required=""></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="description">Tipo de Fútbol</label>
                <select class="form-control" id="typefutbol">
                    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</option>
                    <?php } ?>
                </select>
                <br>
                <div class="form-group">
                    <label for="sex">Género</label>
                    <select class="form-control Inp" id="sex" autofocus="" required="">
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Mixto</option>           
                    </select>
                </div>
                <br>
<!--                 <div class="form-group">
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
                </div> -->
            </div>
            <div class="clear"><br></div>
                <?php if (count($_smarty_tpl->tpl_vars['teams']->value)>0){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3 class="text-gray-dark"><strong>EQUIPOS</strong></h3>
                    <br>
                    <?php if (count($_smarty_tpl->tpl_vars['teams']->value)>0){?>
                        <table class="table text-left">
                            <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</td>
                                    <td>
                                        <?php if (($_smarty_tpl->tpl_vars['team']->value->status=='CAPTAIN')||($_smarty_tpl->tpl_vars['team']->value->status=='CREATOR')){?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/editar-equipo/<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">
                                                <button class="btn btn-green"><span class="glyphicon glyphicon-wrench"></span></button>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">
                                                <button class="btn btn-green"><span class="glyphicon glyphicon-globe"></span></button>
                                            </a>
                                        <?php }?>
                                    </td>
                                    <!--td><button>Eliminar</button></td-->
                                </tr>
                            <?php } ?>
                        </table>
                    <?php }?>
                </div>
                <div class="clear"><br></div>
                <?php }?>
            <div class="text-center">
                <button id="create_team" class="btn btn_blue_light">&nbsp;&nbsp;&nbsp;&nbsp;CREAR EQUIPO&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <div class="clear"><br></div>
            </div>
            
        </div>
    </div>
</div>
<?php }} ?>