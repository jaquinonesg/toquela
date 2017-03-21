<?php /* Smarty version Smarty-3.1.8, created on 2015-11-20 15:52:50
         compiled from "/var/www/toquela/views/socialnet/sections/social.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153811637356244af9dd8fc7-70710926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c4bc7b9181232a2e2c0614b53b787738e6d541f' => 
    array (
      0 => '/var/www/toquela/views/socialnet/sections/social.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153811637356244af9dd8fc7-70710926',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56244af9e2afc2_55059818',
  'variables' => 
  array (
    'net' => 0,
    '_params' => 0,
    'mensaje' => 0,
    'url' => 0,
    'error' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56244af9e2afc2_55059818')) {function content_56244af9e2afc2_55059818($_smarty_tpl) {?><div class="redes">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <div class="text-center">
                <?php if ($_smarty_tpl->tpl_vars['net']->value=="twitter"){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/twitter.png">
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['net']->value=="facebook"){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/facebook.png">
                <?php }?>
            </div>
            <br>
            <div class="text-center wel caja_azul">
                <p>
                    <?php if ($_smarty_tpl->tpl_vars['mensaje']->value==''){?>
                        Si estás seguro de acceder por <?php echo $_smarty_tpl->tpl_vars['net']->value;?>
 haz clic: 
                    <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

                    <?php }?>
                </p>
                <br>
                <a class="btn btn-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                    <button class="btn btn-default" style="height: 60px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AQUI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </a>
                <br>
                <b><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</b>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['user']->value!=null){?>
                    Tus datos de registro: <br>
                    Nombre: <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
<br>
                    Nombre de usuario: <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
<br>
                    Imagen: <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->pic;?>
">
                <?php }?>
            </div>
            <br>
        </div>
    </div>
</div><?php }} ?>