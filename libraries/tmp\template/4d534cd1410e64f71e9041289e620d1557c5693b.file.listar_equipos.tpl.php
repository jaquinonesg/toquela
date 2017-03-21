<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 10:58:15
         compiled from "/var/www/toquela/views/_templates/listar_equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4165082705622efa27f99e6-43613741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d534cd1410e64f71e9041289e620d1557c5693b' => 
    array (
      0 => '/var/www/toquela/views/_templates/listar_equipos.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4165082705622efa27f99e6-43613741',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622efa288b365_76064790',
  'variables' => 
  array (
    'sololista' => 0,
    'if_crear_equipo' => 0,
    '_params' => 0,
    'is_buscador_equipo' => 0,
    'types_futbol' => 0,
    'type' => 0,
    'teams' => 0,
    'team' => 0,
    'urlencode' => 0,
    'onlyperfil' => 0,
    'url' => 0,
    'urlimg' => 0,
    'verpaginator' => 0,
    'htmlpaginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622efa288b365_76064790')) {function content_5622efa288b365_76064790($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
    <div class="clear"><br></div>
    <div class="contend_equipos list_equipos" panel="equipo">
        <?php if ($_smarty_tpl->tpl_vars['if_crear_equipo']->value){?>
            <div class="text-left">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/crear-equipo/">
                    <button type="button" class="btn btn_blue_light" style="width: 160px; height: 50px;">&nbsp;&nbsp;&nbsp;CREAR EQUIPO&nbsp;&nbsp;&nbsp;</button>
                </a>
                <div class="clear"><br></div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['is_buscador_equipo']->value){?>
            <form id="_buscador_equipo">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                    <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                    <label for="txt_bus_equipo" class="control-label">BUSCAR EQUIPO</label>
                    <input type="text" class="form-control" id="txt_bus_equipo"/>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                    <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
                    <label for="sel_equipo_genero" class="control-label">GÉNERO</label>
                    <select class="form-control" id="sel_equipo_genero">
                        <option value="" selected="">Todos</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                        <option value="3">Mixto</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                    <div class="text-center" style="font-size: 40px;"><span class="icon-guayo"></span></div>
                    <label for="sel_tipo_futbol" class="control-label">TIPO FÚTBOL</label>
                    <select class="form-control" id="sel_tipo_futbol">
                        <option value="" selected="">Todos</option>
                        <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types_futbol']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clear"></div>
            </form>
        <?php }?>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['teams']->value)){?>
        <?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
            <div id="_equipos_pagination">
            <?php }?>
            <div class="maq_equipos" id="_contend_equipos">
                <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable((($_smarty_tpl->tpl_vars['team']->value->codteam).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team']->value->name)), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable('', null, 0);?>
                    <?php if (is_null($_smarty_tpl->tpl_vars['team']->value->image)==true){?>
                        <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable(($_smarty_tpl->tpl_vars['_params']->value['site']).("/public/img/fotoequipo.jpg"), null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_params']->value['site']).("/public")).($_smarty_tpl->tpl_vars['team']->value->image), null, 0);?> 
                    <?php }?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-equipo">
                        <?php if ($_smarty_tpl->tpl_vars['onlyperfil']->value){?>
                            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;">
                            <?php }else{ ?>
                                <?php if (($_smarty_tpl->tpl_vars['team']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team']->value->status=='CAPTAIN')){?>
                                    <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/editar-equipo/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;">
                                    <?php }else{ ?> 
                                        <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;">
                                        <?php }?>
                                    <?php }?>
                                    <div class="recuadro">
                                        <div class="img_equipo">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['urlimg']->value;?>
" accesskey="" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value->description;?>
" title="<?php echo $_smarty_tpl->tpl_vars['team']->value->description;?>
"/>
                                        </div>
                                        <h3 style="font-size:15px;"><strong><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</strong></h3>
                                        <br>
                                        <p class="text-left" style="margin-left: 5px;"><span class="icon-guayo" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['team']->value->futboltype;?>
</p>
                                        <p class="text-left" style="margin-left: 5px;"><span class="icon-titular" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['team']->value->tipo;?>
</p>
                                        <br>
                                        <?php if (!$_smarty_tpl->tpl_vars['onlyperfil']->value){?>
                                            <?php if (($_smarty_tpl->tpl_vars['team']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team']->value->status=='CAPTAIN')){?>
                                                <div class="text-right" style="position: absolute; width: 100%; bottom: 35px; right: 35px;">
                                                    <span class="icon-cog" style="font-size: 25px;"></span>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </a>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <br>
                            <br>
                            <br>
                            <p>En este momento no hay equipos.</p>
                        <?php }?>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['verpaginator']->value){?>
                            <div class="clear text-center">
                                <?php echo $_smarty_tpl->tpl_vars['htmlpaginator']->value;?>

                            </div>
                        <?php }?>
                        <?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?> 
                            </div>
                            <div class="clear"><br></div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['verpaginator']->value){?>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var paginaequipos = new PaginarEquipos("pagina_equipos", "_equipos_pagination", "_buscador_equipo", "<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/paginaequipos");
                                    });
                                </script>
                            <?php }?>
                        <?php }?><?php }} ?>