<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 18:14:09
         compiled from "/var/www/toquela/modules/torneos/views/clasificacion/clasificacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16342346355628f9ff909810-50811480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd59f59a0e229c3cb6137f155be35395897fe50a5' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/clasificacion/clasificacion.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16342346355628f9ff909810-50811480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5628f9ffa26514_99059269',
  'variables' => 
  array (
    '_params' => 0,
    'error_number' => 0,
    'tournament' => 0,
    'fase' => 0,
    'type' => 0,
    'matches_jornadas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628f9ffa26514_99059269')) {function content_5628f9ffa26514_99059269($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
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
<style type="text/css">
    .div-title-torneo .title{
     padding-top: 0px;
 }
 .div-acordion-grupos{
    margin-top: 20px;
}
</style>
<div class="resultados">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(5, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['error_number']->value!=1){?>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <button class="btn btn-primary btn_mas_resultados" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> INFO</button>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>Resultados</strong></p>
        </div>
    </div>
    <?php }?>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
                <?php if ($_smarty_tpl->tpl_vars['error_number']->value==1){?>
            </br>
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
        </br><h3 class="text-verde"><strong>RONDAS ELIMINACIÓN DIRECTA</strong></h3></br>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="clear"></br></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_eliminatoria_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
        <?php if (isset($_smarty_tpl->tpl_vars['matches_jornadas']->value)){?>
        
        <script type="text/javascript">
            $(document).ready(function() {
                var td = new TodosContraTodos();
                td.init();

                var gep = new GruposEliminatoriaPublic();
                gep.init();
            });
        </script>
        

        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/info_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="clear"></br></div>
        <h3 class="text-verde"><strong>FASE DE GRUPOS</strong></h3></br>
        <?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable(1, null, 0);?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion1">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </br><h3 class="text-verde"><strong>FASE DE ELIMINACIÓN</strong></h3></br>
    <button class="btn btn-default" id="btn_result_fase_grupos" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" grupo="1">Resultados Fase Grupos</button>
    <button class="btn btn-default" id="btn_update_elim" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" grupo="1">Actualizar Eliminatoria</button>
    <div class="clear"></br></div>
    <?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable(2, null, 0);?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion2">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_eliminatoria_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <?php }?>
    <?php }elseif($_smarty_tpl->tpl_vars['type']->value==3){?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            var td = new TodosContraTodos();
            td.init();
        });
    </script>
    
</br><h3 class="text-verde"><strong>JORNADAS TODOS CONTRA TODOS</strong></h3></br>

<div class="clear"></br></div>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/maqueta_calendar_fases.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }elseif($_smarty_tpl->tpl_vars['type']->value==4){?>
<style type="text/css">
    .acor tbody tr {
        cursor: pointer;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        var filters = new FiltersTorneo();
    });
</script>


<h3 class="text-verde text-center"><strong><span class="glyphicon glyphicon-list-alt"></span>&nbsp; FASES PERSONALIZADO</strong></h3></br>
<?php $_smarty_tpl->tpl_vars['public'] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars['ver_total_fase'] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/maqueta_calendar_fases.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="filter-padding">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/form_filters_clasification.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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


<!-- popup de +info eliminacion directa -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/calendario/sections/popup_detalle_calendario.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php }?>
</div>
<div class="clear"></br></div>
</div>
<div class="clear"></br></div>
</div>
</div><?php }} ?>