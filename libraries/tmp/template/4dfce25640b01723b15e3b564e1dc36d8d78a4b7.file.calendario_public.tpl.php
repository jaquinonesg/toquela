<?php /* Smarty version Smarty-3.1.8, created on 2015-07-02 11:00:24
         compiled from "C:\xampp\htdocs\toquela_jorge\modules\torneos\views\calendario\sections\calendario_public.tpl" */ ?>
<?php /*%%SmartyHeaderCode:652055956018c74ee0-00856962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dfce25640b01723b15e3b564e1dc36d8d78a4b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela_jorge\\modules\\torneos\\views\\calendario\\sections\\calendario_public.tpl',
      1 => 1435787786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '652055956018c74ee0-00856962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'error_number' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55956018df5327_04136611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55956018df5327_04136611')) {function content_55956018df5327_04136611($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/js/calendario_public.js"></script>
<span class="calendario">
    <div class="clear"></br></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_total.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_parcial.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['error_number']->value==1){?>
    </br>
    <div class="alert alert-warning">
        No se ha terminado de completar todos los equipos que participaran en el torneo.
    </div>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>
</br><h3 class="text-verde"><strong>RONDAS ELIMINATORIA</strong></h3></br>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="clear"></br></div>
<?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable(1, null, 0);?>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_eliminatoria_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="clear"></br></div>
<h3 class="text-verde"><strong>FASE DE GRUPOS</strong></h3></br>
<?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable(1, null, 0);?>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion1">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</br><h3 class="text-verde"><strong>FASE DE ELIMINACIÓN</strong></h3></br>
<div class="clear"></br></div>
<?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable(2, null, 0);?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion2">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_eliminatoria_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }elseif($_smarty_tpl->tpl_vars['type']->value==3){?>
</br><h3 class="text-verde"><strong>JORNADAS TODOS CONTRA TODOS</strong></h3></br>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
<?php $_smarty_tpl->tpl_vars['type_public_filter'] = new Smarty_variable('form-calendario', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/form_filters_public.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="clear"></br></div>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }elseif($_smarty_tpl->tpl_vars['type']->value==4){?>
<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
        var dp = new DetallaPartido();
    });
</script>
<!--Esto sirve para que en el tpl del filtro publico, se ponga el id si es en resultados o en calendario-->
<?php $_smarty_tpl->tpl_vars['type_public_filter'] = new Smarty_variable('form-calendario', null, 0);?>
</br><h3 class="text-verde"><strong>FASES PERSONALIZADO</strong></h3></br>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/maqueta_calendar_fases.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="filter-padding">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/form_filters_public.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<!-- popup de resultado parcial, tabla de posiciones -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_result_parcial_resultados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- popup de proxima fecha -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_proxima_fecha.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }?>
<?php }?>
<!-- popup de detalle partido -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_detalle_partido.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="clear"></br></div>
</span><?php }} ?>