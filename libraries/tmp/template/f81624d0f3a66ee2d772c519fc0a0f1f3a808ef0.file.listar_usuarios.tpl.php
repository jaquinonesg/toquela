<?php /* Smarty version Smarty-3.1.8, created on 2015-05-15 10:14:30
         compiled from "C:\xampp\htdocs\toquela\views\_templates\listar_usuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:355055560d56aaac08-09042019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f81624d0f3a66ee2d772c519fc0a0f1f3a808ef0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\listar_usuarios.tpl',
      1 => 1416600478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '355055560d56aaac08-09042019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_buscador_jugadores' => 0,
    'posiciones' => 0,
    'posicion' => 0,
    'jugadores' => 0,
    '_params' => 0,
    'jugador' => 0,
    'is_paginator' => 0,
    'htmlpaginator' => 0,
    'init_js_paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55560d56b26ee3_69256492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55560d56b26ee3_69256492')) {function content_55560d56b26ee3_69256492($_smarty_tpl) {?><div class="listar_jugadores">
    <div class="clear"><br></div>
        <?php if ($_smarty_tpl->tpl_vars['is_buscador_jugadores']->value){?>
        <form id="_buscador_jugadores" class="text-center">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                <label for="txt_bus_jugador" class="control-label">BUSCAR USUARIO</label>
                <input type="text" class="form-control" id="txt_bus_jugador"/>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
                <label for="sel_jugador_genero" class="control-label">GÉNERO</label>
                <select class="form-control" id="sel_jugador_genero">
                    <option value="" selected="">Todos</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Indefinido</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 40px;"><span class="icon-cancha"></span></div>
                <label for="sel_posicion_futbol" class="control-label">POSICIÓN</label>
                <select class="form-control" id="sel_posicion_futbol">
                    <option value="" selected="">Todas</option>
                    <?php  $_smarty_tpl->tpl_vars['posicion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['posicion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posiciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['posicion']->key => $_smarty_tpl->tpl_vars['posicion']->value){
$_smarty_tpl->tpl_vars['posicion']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['posicion']->value['cod_virtues'];?>
"><?php echo $_smarty_tpl->tpl_vars['posicion']->value['name'];?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"><br></div>
        </form>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['jugadores']->value)){?>
        <div id="_jugadores_pagination" class="text-center">
            <?php  $_smarty_tpl->tpl_vars['jugador'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jugador']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jugadores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jugador']->key => $_smarty_tpl->tpl_vars['jugador']->value){
$_smarty_tpl->tpl_vars['jugador']->_loop = true;
?>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 container-jugador">
                    <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/usuarios/index/usuario/<?php echo $_smarty_tpl->tpl_vars['jugador']->value->coduser;?>
" style="text-decoration: none;" target="blank">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong><?php echo $_smarty_tpl->tpl_vars['jugador']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['jugador']->value->lastname;?>
</strong></p>
                            <div class="img_jugador">
                                <?php if (isset($_smarty_tpl->tpl_vars['jugador']->value->photo)){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['jugador']->value->photo;?>
" accesskey="" alt="" title=""/>
                                <?php }else{ ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_user_image.jpg" accesskey="" alt="" title=""/>
                                <?php }?>
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-users" style="font-size: 16px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['jugador']->value->sex;?>
</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-titular" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['jugador']->value->positiongame;?>
</p>
                        </div>
                    </a>
                    <br><br>
                </div>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['is_paginator']->value){?>
                <div class="clear"></div>
                <?php echo $_smarty_tpl->tpl_vars['htmlpaginator']->value;?>

            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['init_js_paginator']->value){?>
            <script type="text/javascript">
                $(document).ready(function() {
                   var paginajugadores = new PaginarJugadores("pagina_jugadores", "_jugadores_pagination", "_buscador_jugadores", "<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/usuarios/index/paginajugadores");
                });
            </script>
        <?php }?>
    <?php }else{ ?>
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay jugadores.</p>
            <br>
            <br>
            <br>
        </div>
    <?php }?>
    <br>
</div><?php }} ?>