<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 13:10:26
         compiled from "C:\xampp\htdocs\toquela\views\_templates\listar_partidos_privados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215245554e5127c0e75-43338112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1801d1e927296ab707e9a874d24597a90b9f3d1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\listar_partidos_privados.tpl',
      1 => 1416600478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215245554e5127c0e75-43338112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sololista' => 0,
    'is_buscador_partido' => 0,
    'types_futbol' => 0,
    'type' => 0,
    'games' => 0,
    'game' => 0,
    '_params' => 0,
    'verpaginator' => 0,
    'htmlpaginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554e51284f9c1_87823855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554e51284f9c1_87823855')) {function content_5554e51284f9c1_87823855($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init partidos_privados">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PARTIDOS PRIVADOS</strong></h4>
        <div class="clear"><br></div>
        <div class="contend_equipos list_equipos" panel="equipo">
            <?php if ($_smarty_tpl->tpl_vars['is_buscador_partido']->value){?>
                <form id="_buscador_partido">
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

        <?php if (isset($_smarty_tpl->tpl_vars['games']->value)){?>
            <?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
                <div id="_partidos_pagination">
                <?php }?>
                <div class="maq_equipos" id="_contend_equipos">
                    <?php  $_smarty_tpl->tpl_vars['game'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['game']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['games']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['game']->key => $_smarty_tpl->tpl_vars['game']->value){
$_smarty_tpl->tpl_vars['game']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['game']->value->codcomplex){?>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-equipo container-partido">
                                <a class="link" href="/toquela/equipos/deatalleDelPartido/<?php echo $_smarty_tpl->tpl_vars['game']->value->codgames;?>
" style="text-decoration: none;">
                                    <div class="recuadro">
                                        <?php if (!isset($_smarty_tpl->tpl_vars['game']->value->pathTeam)){?>
                                            <div class="img_equipo">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" accesskey="">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="img_equipo">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['game']->value->pathTeam;?>
" accesskey="">
                                            </div>  
                                        <?php }?>
                                        <div class="clear"><br></div>
                                        <h3 style="margin-left: 5px;" class="text-left"><span style="font-size: 16px;">Equipo creador: <?php echo $_smarty_tpl->tpl_vars['game']->value->nameTeam;?>
</span></h3>
                                        <br>
                                        <p class="text-left" style="margin-left: 5px;"><span style="font-size: 16px;">Fecha y hora del partido: </span><?php echo $_smarty_tpl->tpl_vars['game']->value->datetimegame;?>
</p>
                                        <br>
                                    </div>
                                </a>
                            </div>
                        <?php }?>
                    <?php } ?>
                <?php }else{ ?>
                    <br>
                    <br>
                    <br>
                    <p class="not-info">En este momento no hay partidos.</p>
                <?php }?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['verpaginator']->value){?>
                <div class="clear text-center">
                    <?php echo $_smarty_tpl->tpl_vars['htmlpaginator']->value;?>

                </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['sololista']->value&&isset($_smarty_tpl->tpl_vars['games']->value)){?> 
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['verpaginator']->value){?>
        <script type="text/javascript">
            $(document).ready(function() {
                var paginatorGames = new PaginatorGames('paginator_games', '_partidos_pagination', "_buscador_partido", '<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/get_games_private');
            });
        </script>
    <?php }?>
<?php }?><?php }} ?>