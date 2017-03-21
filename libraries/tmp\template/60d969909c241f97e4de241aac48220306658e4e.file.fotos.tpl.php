<?php /* Smarty version Smarty-3.1.8, created on 2016-01-21 17:51:02
         compiled from "/var/www/toquela/views/perfil/sections/fotos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201422688556a160d6e27233-37801681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d969909c241f97e4de241aac48220306658e4e' => 
    array (
      0 => '/var/www/toquela/views/perfil/sections/fotos.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201422688556a160d6e27233-37801681',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'photos' => 0,
    'index' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a160d6e7b082_86669545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a160d6e7b082_86669545')) {function content_56a160d6e7b082_86669545($_smarty_tpl) {?><div class="fotos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(3, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <h2 class="text-center"><strong><a class="text-gray-dark" style="text-decoration: none;" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/fotos">FOTOS</a></strong></h2>          
            <br>
            <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6">
                <p class="text-gray-dark">Seleccione una foto y agréguela a la galería.</p>
                <div class="clear"><br></div>
                <form enctype="multipart/form-data" method="post" id="form_upload_photo" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/uploadattachment">
                    <div class="upload-image">
                        <input type="file" class="btn btn-white" id="input_file_photo" style="width: 100%;" accept="image/jpeg, image/png, image/jpg, image/gif" name="new_photo">
                        <br>       
                        <button type="button" class="btn btn_blue_light sube_photo">&nbsp;&nbsp;Subir&nbsp;&nbsp;</button>
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <?php if (count($_smarty_tpl->tpl_vars['photos']->value)>0){?>
                <div class="clear"><br></div>
                    <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['photo']->key;
?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/deleteattachment" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" id="form_delete_photo-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="attachment" value="<?php echo $_smarty_tpl->tpl_vars['photo']->value->codattachment;?>
">
                        </form>
                        <br>
                        <div class="divcortar img-thumbnail" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #CCCCCC;">
                            <button class="btn btn-danger delete_foto_user" type="button" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="position: absolute; top: 0; left: 0;" title="Eliminar">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <a class="previa" rel="gallery<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
">
                                <img style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
"/>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <p>No se ha súbido ninguna foto...</p>
            <?php }?>
            <div class="clear"><br></div>
        </div>
    </div>
</div>
<?php }} ?>