<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 18:14:58
         compiled from "/var/www/toquela/modules/torneos/views/clasificacion/sections/more_results_round.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1861389265562557ec6147e1-84828325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d5d1b7d81d676982d4fb1ca9fea845bf173c02a' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/clasificacion/sections/more_results_round.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1861389265562557ec6147e1-84828325',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562557ec70c346_14965687',
  'variables' => 
  array (
    '_params' => 0,
    'goleadores' => 0,
    'i' => 0,
    'goleador' => 0,
    'tarjetas' => 0,
    'tarjeta' => 0,
    'estadistica' => 0,
    'sanciones' => 0,
    'sancion' => 0,
    'u' => 0,
    'vallamenosvencida' => 0,
    'valla' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562557ec70c346_14965687')) {function content_562557ec70c346_14965687($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<span class="clasificacion">
<?php if (isset($_smarty_tpl->tpl_vars['goleadores']->value)){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="4" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Goleadores</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_21.png"></span></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['goleador'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['goleador']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goleadores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['goleador']->key => $_smarty_tpl->tpl_vars['goleador']->value){
$_smarty_tpl->tpl_vars['goleador']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['goleador']->key;
?>
        <tr>
            <td class="text-center" ><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['goleador']->value->Nombre;?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['goleador']->value->Nombre=='Sin asignar Sin asignar'){?>
            <td>Sin equipo</td>
            <?php }else{ ?>
            <td><?php echo $_smarty_tpl->tpl_vars['goleador']->value->equipo;?>
</td>
            <?php }?>
            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['goleador']->value->Goles;?>
</td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['tarjetas']->value)){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="7" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Tarjetas</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_5.png"></span></th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_6.png"></span></th>
            <th class="text-center" style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;">Total</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['tarjeta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tarjeta']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tarjetas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tarjeta']->key => $_smarty_tpl->tpl_vars['tarjeta']->value){
$_smarty_tpl->tpl_vars['tarjeta']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['tarjeta']->key;
?>
        <tr data-toggle="collapse" data-target="#accordion-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="clickable">
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
            <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['tarjeta']->value->Nombre;?>
</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            <?php if ($_smarty_tpl->tpl_vars['tarjeta']->value->Amarillas==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['tarjeta']->value->Amarillas;?>
<?php }?>
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            <?php if ($_smarty_tpl->tpl_vars['tarjeta']->value->Rojas==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['tarjeta']->value->Rojas;?>
<?php }?>
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['tarjeta']->value->Equipo;?>
</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php if ($_smarty_tpl->tpl_vars['tarjeta']->value->Total==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['tarjeta']->value->Total;?>
<?php }?></td>
        </tr>
        <tr>
            <td colspan="7" style=" padding: 0px;">
                <div id="accordion-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="collapse">
                    <table class="table-match" style="border-bottom:3px solid #ddd;width:100%">
                        <tr>
                            <td class="text-center" style="border-top: 0px;">#</td>
                            <td class="text-center" style="border-top: 0px;">Descripción</td>
                            <td class="text-center" style="border-top: 0px;">Estado Tarjeta</td>
                            <td class="text-center" style="border-top: 0px;">Ir al partido</td>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['estadistica'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estadistica']->_loop = false;
 $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tarjeta']->value->partidos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estadistica']->key => $_smarty_tpl->tpl_vars['estadistica']->value){
$_smarty_tpl->tpl_vars['estadistica']->_loop = true;
 $_smarty_tpl->tpl_vars['a']->value = $_smarty_tpl->tpl_vars['estadistica']->key;
?>
                        <tr>
                            <td class="text-center">
                            <?php if ($_smarty_tpl->tpl_vars['estadistica']->value->Codtypestatistic==5){?>
                            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_5.png"></span>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['estadistica']->value->Codtypestatistic==6){?>
                            <span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_6.png"></span>
                            <?php }?>
                            </td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->Descripcion;?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['estadistica']->value->Estado==1){?>
                            <td class="text-center">Pagada</td>
                            <?php }else{ ?>
                            <td class="text-center">No pagada</td>
                            <?php }?>
                            <td class="text-center">
                            <a class="ir-match" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/partido/index/<?php echo $_smarty_tpl->tpl_vars['estadistica']->value->Codmatch;?>
" target="_blank"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>
    
</div>
<?php }?>
<!-- ahora las azules son sanciones -->
<?php if (isset($_smarty_tpl->tpl_vars['sanciones']->value[0])){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style="border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="7" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Sanciones</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_23.png"></span></th>
            <th class="text-center" style="border-top: 0px;">Equipo</th>
            <th class="text-center" style="border-top: 0px;">Total</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['sancion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sancion']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sanciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sancion']->key => $_smarty_tpl->tpl_vars['sancion']->value){
$_smarty_tpl->tpl_vars['sancion']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['sancion']->key;
?>
        <tr data-toggle="collapse" data-target="#accordion-dos-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="clickable">
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
            <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['sancion']->value->Nombre;?>
</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;">
            <?php if ($_smarty_tpl->tpl_vars['sancion']->value->Sanciones==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sancion']->value->Sanciones;?>
<?php }?>
            </td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['sancion']->value->Equipo;?>
</td>
            <td class="text-center" style="padding: 8px;line-height: 1.428571429;vertical-align: top;"><?php if ($_smarty_tpl->tpl_vars['sancion']->value->Total==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sancion']->value->Total;?>
<?php }?></td>
        </tr>
        <tr>
            <td colspan="7" style=" padding: 0px;">
                <div id="accordion-dos-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="collapse">
                    <table class="table-match" style="border-bottom:3px solid #ddd;width:100%">
                        <tr>
                            <td class="text-center" style="border-top: 0px;">#</td>
                            <td class="text-center" style="border-top: 0px;">Descripción</td>
                            <td class="text-center" style="border-top: 0px;">Estado Tarjeta</td>
                            <td class="text-center" style="border-top: 0px;">Ir al partido</td>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['estadistica'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estadistica']->_loop = false;
 $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sancion']->value->partidos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estadistica']->key => $_smarty_tpl->tpl_vars['estadistica']->value){
$_smarty_tpl->tpl_vars['estadistica']->_loop = true;
 $_smarty_tpl->tpl_vars['u']->value = $_smarty_tpl->tpl_vars['estadistica']->key;
?>
                        <tr>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['u']->value+1;?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->Descripcion;?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['estadistica']->value->Estado==1){?>
                            <td class="text-center">Pagada</td>
                            <?php }else{ ?>
                            <td class="text-center">No pagada</td>
                            <?php }?>
                            <td class="text-center">
                            <a class="ir-match" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/partido/index/<?php echo $_smarty_tpl->tpl_vars['estadistica']->value->Codmatch;?>
" target="_blank"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>

</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['vallamenosvencida']->value)){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 8%;">
    <table class="table" style=";border-bottom:3px solid #ddd;">
        <tr>
            <th colspan="6" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Valla menos vencida</th>
        </tr>
        <tr>
            <th class="text-center" style="border-top: 0px;">Posición</th>
            <th style="border-top: 0px;">Nombre</th>
            <th class="text-center" style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_22.png"></span></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['valla'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valla']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vallamenosvencida']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valla']->key => $_smarty_tpl->tpl_vars['valla']->value){
$_smarty_tpl->tpl_vars['valla']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['valla']->key;
?>
        <tr>
            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['valla']->value['name'];?>
</td>
            <td class="text-center">
                <span class="glyphicon">
                    <?php if ($_smarty_tpl->tpl_vars['valla']->value['goles']==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['valla']->value['goles'];?>
<?php }?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['goleadores']->value)&&!isset($_smarty_tpl->tpl_vars['tarjetas']->value)&&!isset($_smarty_tpl->tpl_vars['sanciones']->value)&&!isset($_smarty_tpl->tpl_vars['vallamenosvencida']->value)){?>
<p style="margin-top: 5%; margin-bottom: 5%; font-weight: bold;" class="text-center">En este momento no hay más resultados</p>
<?php }?>
</span><?php }} ?>