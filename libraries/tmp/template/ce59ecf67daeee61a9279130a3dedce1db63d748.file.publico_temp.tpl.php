<!-- //BARRARESULTADOS -->
<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:16:46
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\tablero\sections\publico_temp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:254545554b9d6289f32-93406225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce59ecf67daeee61a9279130a3dedce1db63d748' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\tablero\\sections\\publico_temp.tpl',
      1 => 1433176271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254545554b9d6289f32-93406225',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b9d6474644_51433178',
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b9d6474644_51433178')) {function content_5554b9d6474644_51433178($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/personalizado_public.js"></script>
<div class="publico">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(6, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_sin_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <input type="hidden" id="_torneo" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
            <input type="hidden" id="_html_loader_public" value='
                   <br>
                   <br>
                   <br>
                   <div class="text-center">
                   <p>Cargando sección...</p><br>
                   <img class="img-thumbnail loader-medium" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                   </div>
                   <br>
                   <br>
                   <br>'>
            <div class="clear"></br></div>
            <h4 class="text-gray-dark text-center" style="font-size: 18px;"><strong>TORNEO: <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['tournament']->value->name, 'UTF-8');?>
</strong></h4>
            </br>
            
            <div class="row">
            <div class="col-lg-8 col-lg-offset-3 text-center">
            <span class="menu-estadistica">
                <ul class="nav nav-tabs " style="float: center">
                    <li class="text-center active pesta" id="pes_informacion" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Información&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_equipos" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Equipos&nbsp;&nbsp;</strong></a></li>
                    <!-- Cambio menu torneo -->
                    <li class="text-center pesta" id="pes_calendario" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Fixture&nbsp;&nbsp;</strong></a></li>
                    <li class="text-center pesta" id="pes_resultados" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Resultados&nbsp;&nbsp;</strong></a></li>
                </ul>
            </span>
            </div>
            </div>
            

            <div>
                <div id="contend-informacion">
                    <br>
                    <br>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->poster)===null||$tmp==='' ? 'img/no_torneos.jpg' : $tmp);?>
" class="img-responsive img-thumbnail"/>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <h2><span class="text-gray-dark"><span class="icon-trophy" style="font-size: 30px"></span>&nbsp;&nbsp;NOMBRE:</span></h2>
                        <br>
                        <p><?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
</p>
                        <div class="clear"><br></div>
                        <h2><span class="text-gray-dark"><span class="icon-pencil" style="font-size: 30px"></span>&nbsp;&nbsp;DESCRIPCIÓN:</span></h2>
                        <br>
                        <p><?php echo $_smarty_tpl->tpl_vars['tournament']->value->description;?>
</p>
                    </div>
                    <div class="clear"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-camiseta" style="font-size: 30px"></span>&nbsp;&nbsp;NÚMERO PARTICIPANTES:</span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['tournament']->value->numberparticipants;?>
</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-tiempoinicio" style="font-size: 30px"></span>&nbsp;&nbsp;INICIO:</span>&nbsp;&nbsp;<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->start)===null||$tmp==='' ? 'No se ha definido' : $tmp);?>
</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-tiempofin" style="font-size: 30px"></span>&nbsp;&nbsp;FIN:</span>&nbsp;&nbsp;<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->end)===null||$tmp==='' ? 'No se ha definido' : $tmp);?>
</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-cogs" style="font-size: 30px"></span>&nbsp;&nbsp;SISTEMA:</span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['tournament']->value->type;?>
</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-futbol" style="font-size: 30px"></span>&nbsp;&nbsp;PUNTOS PARA:</span>&nbsp;&nbsp;</p><p><br>Ganados = 3, Empatados = 1, Perdidos = 0</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-cancha" style="font-size: 30px"></span>&nbsp;&nbsp;SEDES:</span>&nbsp;&nbsp;</p><p><br><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->places)===null||$tmp==='' ? 'No se han definido' : $tmp);?>
</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-bubble" style="font-size: 30px"></span>&nbsp;&nbsp;CONTACTOS:</span>&nbsp;&nbsp;</p><p><br><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->contacts)===null||$tmp==='' ? 'No se han definido' : $tmp);?>
</p>
                        <div class="clear"><br></div>
                        <p><span class="text-gray-dark"><span class="icon-reglas" style="font-size: 30px"></span>&nbsp;&nbsp;REGLAS:</span>&nbsp;&nbsp;</p><p><br><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tournament']->value->rules)===null||$tmp==='' ? 'No se han definido' : $tmp);?>
</p>
                    </div>
                    <div class="clear"><br><br></div>
                
                </div>
                <div id="contend-equipos" style="display: none;">
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <!-- ***************************************** -->
                    <div class="text-center">
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/paginator_person.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                </div>
                <div id="contend-calendario" style="display: none;">
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <p>Cargando sección calendario...</p><br>
                        <img class="img-thumbnail loader-medium" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div id="contend-resultados" style="display: none;">
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <p>Cargando sección resultados...</p><br>
                        <img class="img-thumbnail loader-medium" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="clear"></br></div>
        </div>
    </div>
</div><?php }} ?>