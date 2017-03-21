<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 13:10:26
         compiled from "C:\xampp\htdocs\toquela\views\_templates\listar_partidos_publicos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53095554e512913c53-53620143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f2eb29eb9266abb6fa70573d7a2472007c58497' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\listar_partidos_publicos.tpl',
      1 => 1416600478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53095554e512913c53-53620143',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sololista' => 0,
    'is_buscador_partido' => 0,
    'types_futbol' => 0,
    'type' => 0,
    'gamesPublic' => 0,
    'gamePublic' => 0,
    '_params' => 0,
    'verpaginator' => 0,
    'htmlpaginator_public' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554e512992689_05830913',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554e512992689_05830913')) {function content_5554e512992689_05830913($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init partidos_publicos">
        <h4 class="text-gray-dark"><span class="glyphicon glyphicon-default icon-users" style="margin-top: 10px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PARTIDOS PUBLICOS</strong></h4>
        <div class="clear"><br></div>
        <div class="contend_equipos list_equipos" panel="equipo">
            <?php if ($_smarty_tpl->tpl_vars['is_buscador_partido']->value){?>
                <form id="_buscador_partido_publico">
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

        <?php if (isset($_smarty_tpl->tpl_vars['gamesPublic']->value)){?>
            <?php if (!$_smarty_tpl->tpl_vars['sololista']->value){?>
                <div id="_partidos_publicos_pagination">
                <?php }?>
                <div class="maq_equipos" id="_contend_equipos">
                    <?php  $_smarty_tpl->tpl_vars['gamePublic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gamePublic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gamesPublic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gamePublic']->key => $_smarty_tpl->tpl_vars['gamePublic']->value){
$_smarty_tpl->tpl_vars['gamePublic']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['gamePublic']->value->codcomplex){?>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-equipo">
                                <a class="link" href="/toquela/partidos/deatalleDelPartido/<?php echo $_smarty_tpl->tpl_vars['gamePublic']->value->codgames;?>
" style="text-decoration: none;">
                                    <div class="recuadro">
                                        <?php if (!isset($_smarty_tpl->tpl_vars['gamePublic']->value->pathTeam)){?>
                                            <div class="img_equipo">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" accesskey="">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="img_equipo">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['gamePublic']->value->pathTeam;?>
" accesskey="">
                                            </div>  
                                        <?php }?>
                                        <div class="clear"><br></div>
                                        <h3 style="margin-left: 5px;" class="text-left"><span style="font-size: 16px;">Equipo creador: <?php echo $_smarty_tpl->tpl_vars['gamePublic']->value->nameTeam;?>
</span></h3>
                                        <br>
                                        <p class="text-left" style="margin-left: 5px;"><span style="font-size: 16px;">Fecha y hora: </span><?php echo $_smarty_tpl->tpl_vars['gamePublic']->value->datetimegame;?>
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
                    <?php echo $_smarty_tpl->tpl_vars['htmlpaginator_public']->value;?>

                </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['sololista']->value&&isset($_smarty_tpl->tpl_vars['gamesPublic']->value)){?> 
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['verpaginator']->value){?>
        <script type="text/javascript">
            $(document).ready(function() {
                var paginatorGamesPublic = new PaginatorGamesPublic('paginator_games_public', '_partidos_publicos_pagination', "_buscador_partido_publico", '<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/get_games_public');
            });
        </script>
    <?php }?>
<?php }?><?php }} ?>