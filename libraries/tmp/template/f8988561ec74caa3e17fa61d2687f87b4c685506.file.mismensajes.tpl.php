<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 10:13:53
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\mismensajes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310955554bbb1ec8ee8-41334310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8988561ec74caa3e17fa61d2687f87b4c685506' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\mismensajes.tpl',
      1 => 1416600520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310955554bbb1ec8ee8-41334310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'all_messages' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bbb210ca12_81643753',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bbb210ca12_81643753')) {function content_5554bbb210ca12_81643753($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<div class="mismensajes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <h2 class="text-center"><strong class="text-gray-dark">HISTORIAL MENSAJES</strong></h2>
        <br> 
                <button type="button" class="btn btn_blue_light btn_enviar_msg_user">Nuevo Mensaje</button>
                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/perfil/sections/popupmsg.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php if (isset($_smarty_tpl->tpl_vars['all_messages']->value)){?>
            <div id="notificaciones_msg">
                <div class="clear"><br></div>
                <table class="table table-striped">
                    <tr>
                        <td width="321" align="center" valign="top"><strong>Usuario</strong></td>
                        <td width="321" align="center" valign="top"><strong>De</strong></td>
                        <td width="321" align="center" valign="top"><strong>Sin Leer</strong></td>
                        <td width="321" align="center" valign="top"><strong>Accion</strong></td>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>   
                        <tr cod_from="<?php echo $_smarty_tpl->tpl_vars['m']->value->from;?>
">
                            <td align="center" valign="top"><img   accesskey=""width="50" height="40" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value->path;?>
"  /></td>
                            <td align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value->lastname;?>
</td>
                            <td align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['m']->value->sinver;?>
</td>
                            <td align="center" valign="top"> <button type="button" class="btn btn-info btn_ver_msg_user" data-user="<?php echo $_smarty_tpl->tpl_vars['m']->value->from;?>
">Ver</button>
                                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/perfil/sections/popupvermsg.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php }else{ ?>
            <p>En este momento no hay mensajes</p>
        <?php }?>
        <div class="clear"><br></div>
    </div>
</div>

<?php }} ?>