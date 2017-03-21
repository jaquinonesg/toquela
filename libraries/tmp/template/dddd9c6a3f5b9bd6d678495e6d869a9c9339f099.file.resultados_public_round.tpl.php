<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 15:33:31
         compiled from "/var/www/toquela/modules/torneos/views/clasificacion/sections/resultados_public_round.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190991205562780ffccf5c8-62208415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dddd9c6a3f5b9bd6d678495e6d869a9c9339f099' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/clasificacion/sections/resultados_public_round.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190991205562780ffccf5c8-62208415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562780ffd91740_68759714',
  'variables' => 
  array (
    '_params' => 0,
    'error_number' => 0,
    'tournament' => 0,
    'type' => 0,
    'tablero_torneo' => 0,
    'teams' => 0,
    'i' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562780ffd91740_68759714')) {function content_562780ffd91740_68759714($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<span class="clasificacion">
    <?php if ($_smarty_tpl->tpl_vars['error_number']->value==1){?>
        <div class="alert alert-warning">
            Debe terminar de completar todos los equipos que participaran en el torneo. 
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/participantes/index/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                Click aquí
            </a>
        </div>
    <?php }else{ ?>
        <?php if (($_smarty_tpl->tpl_vars['type']->value==1)){?>
            </br><h3 class="text-verde">Sistema eliminación directa</h3><br/>
            <?php if (isset($_smarty_tpl->tpl_vars['tablero_torneo']->value)){?>
                <?php echo $_smarty_tpl->tpl_vars['tablero_torneo']->value;?>

            <?php }else{ ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert-danger">
                        <p>Hubo un error al generar la grafica del torneo...</p>
                        <p>El número de equipos debe ser multiplo de 4 para poder organizar el torneo por eliminación directa...</p>
                    </div>
                </div>
            <?php }?>
        <?php }elseif(($_smarty_tpl->tpl_vars['type']->value==2)){?>
            <table class="table">
                <tr>
                    <th class="text-center" style="border-top: 0px;">Posición</th>
                    <th style="border-top: 0px;">Nombre</th>
                    <th style="border-top: 0px;">PJ</th>
                    <th style="border-top: 0px;">PG</th>
                    <th style="border-top: 0px;">PE</th>
                    <th style="border-top: 0px;">PP</th>
                    <th style="border-top: 0px;">GC</th>
                    <th style="border-top: 0px;">GF</th>
                    <th style="border-top: 0px;">+/-</th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_5.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_6.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_23.png"></span></th>
                    <th class="text-center" style="border-top: 0px;">Puntos</th>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['team']->key;
?>
                    <tr>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->J;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->G;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->E;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->P;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->GC;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->GF;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->DIF;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->amarilla;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->rojas;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->azules;?>
</td>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1); "><?php echo $_smarty_tpl->tpl_vars['team']->value->Puntos;?>
</td>
                    </tr>
                <?php } ?>
            </table>
            <div>
                <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
                <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
                <h5 class="text-verde">S = Sanción</h5></br>
            </div>
        <?php }elseif(($_smarty_tpl->tpl_vars['type']->value==3)||($_smarty_tpl->tpl_vars['type']->value==4)){?>
            <table class="table">
                <tr>
                    <th class="text-center" style="border-top: 0px;">Posición</th>
                    <th style="border-top: 0px;">Nombre</th>
                    <th style="border-top: 0px;">PJ</th>
                    <th style="border-top: 0px;">PG</th>
                    <th style="border-top: 0px;">PE</th>
                    <th style="border-top: 0px;">PP</th>
                    <th style="border-top: 0px;">GC</th>
                    <th style="border-top: 0px;">GF</th>
                    <th style="border-top: 0px;">+/-</th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_5.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_6.png"></span></th>
                    <th style="border-top: 0px;"><span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/icon_23.png"></span></th>
                    <th class="text-center" style="border-top: 0px;">Puntos</th>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['team']->key;
?>
                    <tr>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->J;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->G;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->E;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->P;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->GC;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->GF;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->DIF;?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['team']->value->amarilla;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->rojas;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->azules;?>
</td>
                        <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1); "><?php echo $_smarty_tpl->tpl_vars['team']->value->Puntos;?>
</td>
                    </tr>
                <?php } ?>
            </table>
            <div>
                <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
                <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
                <h5 class="text-verde">S = Sanción</h5></br>
            </div>
        <?php }?>
    <?php }?>
</span><?php }} ?>