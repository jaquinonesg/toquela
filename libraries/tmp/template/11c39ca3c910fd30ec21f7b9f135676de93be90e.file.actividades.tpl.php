<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:23:07
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\actividades.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203425554bb99078a14-39799639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11c39ca3c910fd30ec21f7b9f135676de93be90e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\actividades.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203425554bb99078a14-39799639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bb991888e6_44727456',
  'variables' => 
  array (
    '_params' => 0,
    'actividadestorneo' => 0,
    'actividadesuserteam' => 0,
    'a' => 0,
    'ac' => 0,
    'n' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bb991888e6_44727456')) {function content_5554bb991888e6_44727456($_smarty_tpl) {?><div class="misactividades">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(7, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <h2 class="text-center"><strong class="text-gray-dark">ACTIVIDADES</strong></h2><br> 
        <?php if (isset($_smarty_tpl->tpl_vars['actividadestorneo']->value)||($_smarty_tpl->tpl_vars['actividadesuserteam']->value)){?>
            <div id="overflow" style="height: 300px; overflow-y: auto; padding: 1em;">
                <div class="contend_actividades" id="misactivi">
                    <div class="clear"><br></div>
                    <div class="itemactidades">
                        <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actividadestorneo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>   

                            <a  class="text-gray" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/tablero/publico_temp/<?php echo $_smarty_tpl->tpl_vars['a']->value->codtournament;?>
#publicaciones-torneo" data-user="<?php echo $_smarty_tpl->tpl_vars['a']->value->codnews;?>
">
                                <img class="img-responsive" style="width: 8%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['a']->value->path;?>
"/>
                                <p><?php echo $_smarty_tpl->tpl_vars['a']->value->name;?>
 Escribio </p>
                                <p><?php echo $_smarty_tpl->tpl_vars['a']->value->messagetorneo;?>
</p>
                                <p>En el torneo:<br><?php echo $_smarty_tpl->tpl_vars['a']->value->nametoreno;?>
</p>
                            </a>

                            <div class="clear">
                                <br>
                                <br>
                            </div>
                        <?php } ?>
                        <?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ac']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actividadesuserteam']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
$_smarty_tpl->tpl_vars['ac']->_loop = true;
?>   
                            <a  class="text-gray" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['ac']->value->codteam;?>
#msg_grupo" data-user="<?php echo $_smarty_tpl->tpl_vars['n']->value->codnotification;?>
">

                                <img class="img-responsive" style="width: 8%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['ac']->value->path;?>
"/>
                                <p><?php echo $_smarty_tpl->tpl_vars['ac']->value->name;?>
 Escribio </p>
                                <p><?php echo $_smarty_tpl->tpl_vars['ac']->value->text;?>
</p>
                                <p>En el Equipo:<br><?php echo $_smarty_tpl->tpl_vars['ac']->value->nameteam;?>
</p>
                            </a>
                            <div class="clear">
                                <br>
                                <br>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="paginador_activi" center><p display="none"><?php echo $_smarty_tpl->tpl_vars['paginacion']->value->render();?>
</p></div>
                    <?php }else{ ?>
                    <p>En este momento no hay actividades...</p>
                <?php }?>

                <div class="clear"><br></div>
            </div>
        </div>
    </div>
</div>




<?php }} ?>