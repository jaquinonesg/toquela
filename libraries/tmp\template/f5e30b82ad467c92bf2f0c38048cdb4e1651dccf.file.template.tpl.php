<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 18:44:42
         compiled from "/var/www/toquela/views/layout/login/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161262089156a01bea488c78-45814291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5e30b82ad467c92bf2f0c38048cdb4e1651dccf' => 
    array (
      0 => '/var/www/toquela/views/layout/login/template.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161262089156a01bea488c78-45814291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'css' => 0,
    'js' => 0,
    'params' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a01bea5c7b32_45552438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a01bea5c7b32_45552438')) {function content_56a01bea5c7b32_45552438($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Administrador de canchas</title>


        <?php if (isset($_smarty_tpl->tpl_vars['_params']->value['css'])&&count($_smarty_tpl->tpl_vars['_params']->value['css'])){?>
            <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_params']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (strpos($_tmp1,"Mobil")){?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" media="screen and (max-width: 980px)" rel="stylesheet" type="text/css" />
                <?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if (strpos($_tmp2,"Tablet")){?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" media="screen and (max-width: 1024px)" rel="stylesheet" type="text/css" />
                <?php }else{ ?>
                    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" type="text/css" rel="stylesheet"/>
                <?php }}?>
            <?php } ?>
        <?php }?>

        <script type="text/javascript" >
            var base_url = '<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
';
            var url_site = '<?php echo $_smarty_tpl->tpl_vars['_params']->value['base'];?>
';
            var controller = '<?php echo $_smarty_tpl->tpl_vars['_params']->value['controller'];?>
';
            <?php if (isset($_smarty_tpl->tpl_vars['_params']->value['user'])){?>
            var user_global = parseInt('0');
            <?php }?>
        </script>

        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/underscore.js"></script>


        <?php if (isset($_smarty_tpl->tpl_vars['_params']->value['js'])&&count($_smarty_tpl->tpl_vars['_params']->value['js'])){?>
            <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_params']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"></script>
            <?php } ?>
        <?php }?>


        
            <style>
                body {margin:0;padding:0; background:#DBDBD8;}
                #cabeza {
                    width:100%;
                    float:left;
                    background:#D3D2CE;
                    padding-bottom:20px;
                    border-bottom:5px solid #004731;
                }
                #cabeza .In { width:380px; height:93px; margin:20px auto;}
                #Cuerpo {
                    width:100%;
                    float:left;
                    background:url(/public/img/Back-Main.png) repeat;
                }

                #Cuerpo .Cont-Form {
                    width:500px;
                    height:170px;
                    margin:20px auto;
                    background:#fff;
                }

                #Cuerpo .Form	{
                    width:300px;
                    float:left;
                    margin:15px;
                }

                .Cont_All {
                    width:465px;
                    float:left;	
                    margin-top:20px;
                }

                .Label {
                    width:300px;
                    float:left;	
                    margin:5px;

                    font-family:Arial, Helvetica, sans-serif;
                    font-size:14px;
                    color:#000;
                }
                .Casiillero3 {
                    float:left;
                    margin:10px 0 0 375px;

                    font-family:Arial, Helvetica, sans-serif;
                    font-size:14px;
                    color:#000;	
                }

            </style>
        

    </head>

    <body>
        <div id="cabeza">
            <div class="In">	
                <img src="<?php echo $_smarty_tpl->tpl_vars['params']->value['site'];?>
/public/img/Logo-Toquela.png" width="380" height="93" alt="Tóquela" title="Tóquela" class="Logo" />
            </div>
        </div>
        <div id="Cuerpo">

            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



        </div>
    </body>
</html><?php }} ?>