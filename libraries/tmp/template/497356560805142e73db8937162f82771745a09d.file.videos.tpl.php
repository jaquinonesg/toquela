<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:18:05
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236915573a9ddbcb884-40263383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '497356560805142e73db8937162f82771745a09d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\videos.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236915573a9ddbcb884-40263383',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'youtube' => 0,
    'index' => 0,
    'video' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5573a9ddc8af38_32040329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573a9ddc8af38_32040329')) {function content_5573a9ddc8af38_32040329($_smarty_tpl) {?><div class="fotos">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(4, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div>
                <h2 class="text-center"><strong><a class="text-gray-dark" style="text-decoration: none;" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/videos">VIDEOS</a></strong></h2>          
                <br>
                <form enctype="multipart/form-data" method="post" id="form_upload_video" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/uploadattachment">
                    <div class="upload-image">
                        <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6"> 
                            <p class="text-gray-dark">Solo se pueden subir links de video que pertenezcan a youtube.</p>
                            <br>
                            <label for="txt_sube_video">URL youtube:</label>
                            <input type="text" class="form-control" id="txt_sube_video" name="new_link"/>
                            <br>
                            <button type="button" class="btn btn_blue_light sube_video">&nbsp;&nbsp;Subir&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clear"><br></div>
            <div>
                <?php if (count($_smarty_tpl->tpl_vars['youtube']->value)>0){?>
                    <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['youtube']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
$_smarty_tpl->tpl_vars['video']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['video']->key;
?>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <form action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/deleteattachment" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" id="form_delete_video-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="attachment" value="<?php echo $_smarty_tpl->tpl_vars['video']->value->codattachment;?>
">
                            </form>
                            <button class="btn btn-danger delete_video_user" type="button" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="position: absolute;" title="Eliminar">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <iframe width="200" height="150" src="http://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['video']->value->path;?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <p>No ha subido ningún video</p>
                <?php }?>
                <div class="clear"></div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>
<?php }} ?>