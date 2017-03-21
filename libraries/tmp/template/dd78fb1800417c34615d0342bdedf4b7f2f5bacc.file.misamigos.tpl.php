<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:23:05
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\misamigos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210095554bb8b0d5d94-66037055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd78fb1800417c34615d0342bdedf4b7f2f5bacc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\misamigos.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210095554bb8b0d5d94-66037055',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bb8b1d8333_53102761',
  'variables' => 
  array (
    '_params' => 0,
    'usuarios' => 0,
    'amigos' => 0,
    'encodeurl' => 0,
    'encripter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bb8b1d8333_53102761')) {function content_5554bb8b1d8333_53102761($_smarty_tpl) {?><div class="miamigos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(6, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <h2 class="text-center"><strong>AMIGOS</strong></h2>
        <br>  
        <?php if (isset($_smarty_tpl->tpl_vars['usuarios']->value)){?>
            <div class="maq_equipos">
                <?php  $_smarty_tpl->tpl_vars['amigos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['amigos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['amigos']->key => $_smarty_tpl->tpl_vars['amigos']->value){
$_smarty_tpl->tpl_vars['amigos']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable((($_smarty_tpl->tpl_vars['amigos']->value->coduser).("-")).($_smarty_tpl->tpl_vars['encodeurl']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['amigos']->value->email)), null, 0);?>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center">
                        <div class="img-thumbnail">
                            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil?cod=<?php echo $_smarty_tpl->tpl_vars['encripter']->value->encript($_smarty_tpl->tpl_vars['amigos']->value->coduser);?>
&uem=<?php echo $_smarty_tpl->tpl_vars['encripter']->value->encript($_smarty_tpl->tpl_vars['amigos']->value->email);?>
" style="text-decoration: none;" target="_blank">
                                <p style="margin-top:10px;font-size:15px;"><strong><?php echo $_smarty_tpl->tpl_vars['amigos']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['amigos']->value->lastname;?>
</strong></p>
                                <div style="overflow: hidden;position: relative;width: 200px;height: 260px; background-color: #E5E5E5;margin: 0px auto;">
                                    <img class="img-responsive" style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['amigos']->value->path)===null||$tmp==='' ? 'public/img/no_user_image.jpg' : $tmp);?>
"/>
                                </div>
                            </a>
                        </div>
                        <div class="clear"><br></div>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <p>En este momento no tienes amigos</p>
            <?php }?>
        </div>
        <div class="clear"><br></div>
    </div>
</div><?php }} ?>