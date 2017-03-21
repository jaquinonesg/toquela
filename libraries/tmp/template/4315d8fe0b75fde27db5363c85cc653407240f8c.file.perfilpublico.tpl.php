<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 10:09:38
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\perfilpublico.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13885554bab23df6d8-59337800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4315d8fe0b75fde27db5363c85cc653407240f8c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\perfilpublico.tpl',
      1 => 1416600521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13885554bab23df6d8-59337800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'virtuespublic' => 0,
    'virtue' => 0,
    'userpublic' => 0,
    'photo' => 0,
    'index' => 0,
    'teams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bab254f739_33121216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bab254f739_33121216')) {function content_5554bab254f739_33121216($_smarty_tpl) {?><div class="publico">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <script type="text/javascript">
                $(document).ready(function() {
                    var perfil_publico = new PerfilPublico();
                    perfil_publico.init();
                });
            </script>
            <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(10, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px; margin-bottom: 0px;">
                <h3 class="text-left"><span class="icon-cancha" style="font-size: 30px;"></span>&nbsp;&nbsp; POSICIÓN EN EL CAMPO</h3><br/>
                <div>
                    <img class="img-responsive" alt="POSICIÓN EN EL CAMPO" title="POSICIÓN EN EL CAMPO" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/pos_campo.jpg"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="padding-right: 0px; margin-bottom: 0px;">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 virtudes">
                    <br>
                    <h3 class="text-left"><span class="icon-cancha" style="font-size: 30px;"></span>&nbsp;&nbsp; OTRAS POSICIONES</h3><br/>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;" class="text-gray-dark">
                        <?php  $_smarty_tpl->tpl_vars['virtue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['virtue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['virtuespublic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['virtue']->key => $_smarty_tpl->tpl_vars['virtue']->value){
$_smarty_tpl->tpl_vars['virtue']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['virtue']->value->codvirtuesgroup==2){?>
                                <p class="span-hover"> <?php echo $_smarty_tpl->tpl_vars['virtue']->value->name;?>
</p>
                            <?php }?>
                        <?php } ?>
                    </div>
                    <br>
                    <h3 class="text-left"><span class="icon-guayo" style="font-size: 30px;"></span>&nbsp;&nbsp; TIPO DE FÚTBOL PREFERIDO</h3><br/>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        <?php  $_smarty_tpl->tpl_vars['virtue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['virtue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['virtuespublic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['virtue']->key => $_smarty_tpl->tpl_vars['virtue']->value){
$_smarty_tpl->tpl_vars['virtue']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['virtue']->value->codvirtuesgroup==1){?>
                                <p class="span-hover"> <?php echo $_smarty_tpl->tpl_vars['virtue']->value->name;?>
</p>
                            <?php }?>
                        <?php } ?>
                    </div>     
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 virtudes">
                    <br>
                    <h3 class="text-left"><span class="icon-juego" style="font-size: 30px;"></span>&nbsp;&nbsp; VIRTUDES DE JUEGO</h3><br>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        <?php  $_smarty_tpl->tpl_vars['virtue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['virtue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['virtuespublic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['virtue']->key => $_smarty_tpl->tpl_vars['virtue']->value){
$_smarty_tpl->tpl_vars['virtue']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['virtue']->value->codvirtuesgroup==5){?>
                                <p class="span-hover"> <?php echo $_smarty_tpl->tpl_vars['virtue']->value->name;?>
</p>
                            <?php }?>
                        <?php } ?>
                    </div>
                    <br>
                    <h3 class="text-left"><span class="icon-fisico" style="font-size: 30px;"></span>&nbsp;&nbsp; VIRTUDES FÍSICAS Y MENTALES</h3><br>
                    <div style="height: 130px; overflow-y: scroll; overflow-x: hidden;">
                        <?php  $_smarty_tpl->tpl_vars['virtue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['virtue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['virtuespublic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['virtue']->key => $_smarty_tpl->tpl_vars['virtue']->value){
$_smarty_tpl->tpl_vars['virtue']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['virtue']->value->codvirtuesgroup==6){?>
                                <p class="span-hover"> <?php echo $_smarty_tpl->tpl_vars['virtue']->value->name;?>
</p>
                            <?php }?>
                        <?php } ?>
                    </div>
                </div>
            </div>


            <?php if (count($_smarty_tpl->tpl_vars['userpublic']->value->photos)>0){?>
                <div class="clear">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-left"><strong class="btn-link-sencillo link_selected" id="lik_mis_fotos">FOTOS</strong>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<strong class="btn-link-sencillo" id="lik_mis_videos">VIDEOS</strong></h2>
                    <br>
                    <div class="galeria">
                        <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userpublic']->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['photo']->key;
?>
                            <?php if ($_smarty_tpl->tpl_vars['photo']->value->type=='FOTO'){?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center contend-mis-fotos">
                                    <br>
                                    <div class="divcortar" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #FFFFFF;">
                                        <a id="single_image" class="previa" rel="gallery<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
">
                                            <img alt="Imagen <?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
"/>
                                        </a>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center contend-mis-videos" style="display: none;">
                                    <br>
                                    <iframe width="200" height="150" src="http://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            <?php }?>
                        <?php }
if (!$_smarty_tpl->tpl_vars['photo']->_loop) {
?>
                            <p>Sin Galería</p>
                        <?php } ?>        
                    </div>
                    <div class="clear"></div>
                </div>
            <?php }?>
            <?php if (count($_smarty_tpl->tpl_vars['teams']->value)>0){?>
                <div class="clear">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span><strong>EQUIPOS: </strong></span>
                    <div class="clear"><br></div>
                        <?php $_smarty_tpl->tpl_vars['onlyperfil'] = new Smarty_variable(true, null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            <?php }?>
            <div class="clear"><br></div>
        </div>
    </div>
</div><?php }} ?>