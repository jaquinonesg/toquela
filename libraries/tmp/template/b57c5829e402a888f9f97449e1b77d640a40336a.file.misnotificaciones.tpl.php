<?php /* Smarty version Smarty-3.1.8, created on 2015-05-12 16:27:43
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\misnotificaciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23695552704f3cf217-04457412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b57c5829e402a888f9f97449e1b77d640a40336a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\misnotificaciones.tpl',
      1 => 1416600521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23695552704f3cf217-04457412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'notifications' => 0,
    'user' => 0,
    'n' => 0,
    'renderfecha' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5552704f4b96d7_13440742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5552704f4b96d7_13440742')) {function content_5552704f4b96d7_13440742($_smarty_tpl) {?><div class="misnotificaciones">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <h2 class="text-center"><strong class="text-gray-dark">NOTIFICACIONES</strong></h2><br> 
        <?php if (isset($_smarty_tpl->tpl_vars['notifications']->value)){?>
            <div class="contend_notifications_user" id="misnotifi">
                <button type="button" class="btn btn-danger" id="delte_all_notifications" data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value->coduser;?>
">
                    <span class="glyphicon glyphicon-remove-sign"></span> &nbsp;Eliminar todo
                </button>
                <div class="clear"><br></div>
                    <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>   
                    <div trnotiuser="<?php echo $_smarty_tpl->tpl_vars['n']->value->codnotification;?>
" allnotifi="<?php echo $_smarty_tpl->tpl_vars['user']->value->coduser;?>
" class="item">
                        <button type="button" class="btn btn-danger" style="float: right;">
                            <span class="glyphicon glyphicon-remove-sign" id="delete_one_notification" data-user="<?php echo $_smarty_tpl->tpl_vars['n']->value->codnotification;?>
"></span> 
                        </button>
                        <a class="text-gray ir-notificacion" data-link="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
<?php echo $_smarty_tpl->tpl_vars['n']->value->link;?>
" data-user="<?php echo $_smarty_tpl->tpl_vars['n']->value->codnotification;?>
" style="cursor: pointer;">
                            <p class="asuntomsg text-gray-dark"><?php echo $_smarty_tpl->tpl_vars['n']->value->subject;?>
 &nbsp;
                                <span class="fechamsg"><?php echo $_smarty_tpl->tpl_vars['renderfecha']->value->FormatearFecha($_smarty_tpl->tpl_vars['n']->value->date);?>
</span>
                            </p>
                            <p><?php echo $_smarty_tpl->tpl_vars['n']->value->text;?>
</p>
                        </a>
                        <div class="clear">
                            <br>
                            <br>
                        </div>
                    </div>
                    
                <?php } ?>
                <div id="paginador" center><p display="none"><?php echo $_smarty_tpl->tpl_vars['paginacion']->value->render();?>
</p></div>
                <?php }else{ ?>
                <p>En este momento no hay notificaciones...</p>
            <?php }?>

            <div class="clear"><br></div>
        </div>
    </div>
</div>
<?php }} ?>