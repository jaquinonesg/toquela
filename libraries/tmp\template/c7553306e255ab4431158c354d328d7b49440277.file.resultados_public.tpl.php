<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 13:39:13
         compiled from "/var/www/toquela/modules/torneos/views/clasificacion/sections/resultados_public.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300478331562557df8e03c8-04509468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7553306e255ab4431158c354d328d7b49440277' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/clasificacion/sections/resultados_public.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300478331562557df8e03c8-04509468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562557dfa140e7_80269912',
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
    'previa_eliminacion' => 0,
    'fase' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562557dfa140e7_80269912')) {function content_562557dfa140e7_80269912($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<span class="clasificacion">
    <br><br>
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
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_parcial.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_total.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>
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
        <th style="border-top: 0px;">J</th>
        <th style="border-top: 0px;">G</th>
        <th style="border-top: 0px;">E</th>
        <th style="border-top: 0px;">P</th>
        <th style="border-top: 0px;">GC</th>
        <th style="border-top: 0px;">GF</th>
        <th style="border-top: 0px;">+/-</th>
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
        <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
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
        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->Puntos;?>
</td>
    </tr>
    <?php } ?>
</table>
<div>
    <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
    <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
</div>
<br>
<span>
    <?php echo $_smarty_tpl->tpl_vars['previa_eliminacion']->value;?>

</span>
<?php }elseif(($_smarty_tpl->tpl_vars['type']->value==3)){?>
<table class="table">
    <tr>
        <th class="text-center" style="border-top: 0px;">Posición</th>
        <th style="border-top: 0px;">Nombre</th>
        <th style="border-top: 0px;">J</th>
        <th style="border-top: 0px;">G</th>
        <th style="border-top: 0px;">E</th>
        <th style="border-top: 0px;">P</th>
        <th style="border-top: 0px;">GC</th>
        <th style="border-top: 0px;">GF</th>
        <th style="border-top: 0px;">+/-</th>
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
        <td><span class="glyphicon glyphicon-ok"></span>  &nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
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
        <td><?php echo $_smarty_tpl->tpl_vars['team']->value->Puntos;?>
</td>
    </tr>
    <?php } ?>
</table>
<div>
    <h5 class="text-verde">Puntos para G=3, E=1, P=0</h5></br>
    <h5 class="text-verde">Las prioridades son Puntos, +/-, GF</h5></br>
</div>
<?php }elseif(($_smarty_tpl->tpl_vars['type']->value==4)){?>
<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
    });
</script>
<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
<?php $_smarty_tpl->tpl_vars['type_public_filter'] = new Smarty_variable('form-resultados', null, 0);?>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0 auto; text-align: center">
    <button class="btn btn-primary btn_mas_resultados" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Más estadísticas</button>
    
</div>
<?php $_smarty_tpl->tpl_vars['ver_total_fase'] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/maqueta_calendar_fases.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="filter-padding">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/form_filters_public.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<!-- popup de mas resultados -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_more_results.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- popup de resutados fase -->
<!--  -->

<!-- popup de posiciones por fase y por grupo -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_posiciones_fase.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- popup de resultado parcial, tabla de posiciones -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- popup de detalle partido -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_detalle_partido.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php }?>
</span><?php }} ?>