<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:30:22
         compiled from "C:\xampp\htdocs\html\toquela\views\_templates\calendar_eliminatoria_aux.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1836056304f5e157479-40585954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01222ad67c40a2f4deeb39c92bd531b4010aa568' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\_templates\\calendar_eliminatoria_aux.tpl',
      1 => 1445039359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1836056304f5e157479-40585954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'matches_ronda' => 0,
    'match' => 0,
    'aux_round' => 0,
    'urlencode' => 0,
    'public' => 0,
    '_params' => 0,
    'class_no_calendar' => 0,
    'count' => 0,
    'result_aux' => 0,
    'inter' => 0,
    'class_inter' => 0,
    'tournament' => 0,
    'acordion_parent' => 0,
    'arr_enun' => 0,
    'class_collapse' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f5e53b6d4_26826599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f5e53b6d4_26826599')) {function content_56304f5e53b6d4_26826599($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
<?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
<?php $_smarty_tpl->tpl_vars['aux_round'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['matches_ronda']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['match']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['match']->iteration=0;
 $_smarty_tpl->tpl_vars['match']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['match']->key;
 $_smarty_tpl->tpl_vars['match']->iteration++;
 $_smarty_tpl->tpl_vars['match']->index++;
 $_smarty_tpl->tpl_vars['match']->first = $_smarty_tpl->tpl_vars['match']->index === 0;
 $_smarty_tpl->tpl_vars['match']->last = $_smarty_tpl->tpl_vars['match']->iteration === $_smarty_tpl->tpl_vars['match']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['match']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['match']->last;
?>
<?php if ($_smarty_tpl->tpl_vars['match']->value->round==$_smarty_tpl->tpl_vars['aux_round']->value){?>
<?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars['irlocal'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamlocal).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->local)), null, 0);?>
<?php $_smarty_tpl->tpl_vars['irvisitant'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamvisitant).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->visitant)), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['public']->value){?>
<?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>

<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
<?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
<?php }?>
<?php }else{ ?>
<?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
<?php if (isset($_smarty_tpl->tpl_vars['match']->value->teamlocal)&&isset($_smarty_tpl->tpl_vars['match']->value->teamvisitant)){?>
<?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_params']->value['base']).("/torneos/partido/index/")).($_smarty_tpl->tpl_vars['match']->value->codmatch), null, 0);?>
<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
<?php }?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
<?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
<?php }?>
<?php }?>
<tr class="all-match <?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
 btn_result_detalle_partido" cod-partido="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" data-target="#modal-detalle-partido" data-calendar="<?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
">
        <td style='vertical-align: middle;'>
            <div class="contador-partido"># <?php echo ($_smarty_tpl->tpl_vars['count']->value+1);?>
</div>
            <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['match']->value->local;?>
</p>
        </td>
        <td>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['match']->value->scorelocal<0){?>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorelocal, null, 0);?>
            <?php }?>
            <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0){?>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorevisitant, null, 0);?>
            <?php }?>
            <input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamvisitant;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
        </td>
        <td style='vertical-align: middle;'>
            <p class="text-left"><?php echo $_smarty_tpl->tpl_vars['match']->value->visitant;?>
</p>
        </td>
        <td style='vertical-align: middle;'>
            <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
            <span><?php if (isset($_smarty_tpl->tpl_vars['match']->value->numjornada)){?>
                <?php echo $_smarty_tpl->tpl_vars['match']->value->numjornada;?>

                <?php }?></span>
            </td>
        </tr>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['inter']->value){?>
        <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
        <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(false, null, 0);?>
        <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("azul", null, 0);?>
        <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?> 
        
        <div class="panel panel-default <?php echo $_smarty_tpl->tpl_vars['class_inter']->value;?>
">
            <div class="panel-heading">
                <div class="btns-actions">
                    <?php if ($_smarty_tpl->tpl_vars['public']->value){?>
                    
                    <?php }else{ ?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/informacion/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
/<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" style="float: right;">
                        <button class="btn btn-primary btn-modi-info" title="Configurar Calendario Ronda <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
">Configurar Calendario</button>
                    </a>
                    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>
                    <button class="btn btn-primary gen_siguiente_ronda" round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" style="float: right; margin-right: 2px;">Actualizar Siguiente Ronda</button>
                    <?php }?>
                    <?php }?>
                    <button class="btn btn-primary btn_result_proxima_fecha" style="float: right; margin-right: 2px;" round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" data-target="#modal-results-parcial">Próxima fecha</button>
                </div>
                <a class="accordion-toggle grupo-menu tmp-grupo-menu" title="Grupo <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" data-toggle="collapse" data-parent="#accordion<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">Grupo <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
 <?php if (isset($_smarty_tpl->tpl_vars['arr_enun']->value[$_smarty_tpl->tpl_vars['match']->value->round])){?> &nbsp;:&nbsp; <?php echo $_smarty_tpl->tpl_vars['arr_enun']->value[$_smarty_tpl->tpl_vars['match']->value->round];?>
 <?php }?> &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down" style="padding-right: 46%;"></span>
                </a>
                <div class="clear"></div>
            </div>
            <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse <?php echo $_smarty_tpl->tpl_vars['class_collapse']->value;?>
" style="height: auto;">
                <div class="panel-body">
                    <table class="table table-striped my_rounds" data-round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
">
                        <thead>
                            <tr>
                                <th style="text-align: right;">Local</th>
                                <th class="text-center" title="Resultado parcial del partido">R</th>
                                <th style="text-align: left;">Visitante</th>
                                <th class="text-center" title="Jornada partido">J</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable('', null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable('', null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable('', null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['irlocal'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamlocal).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->local)), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['irvisitant'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamvisitant).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->visitant)), null, 0);?>
                            <?php if ($_smarty_tpl->tpl_vars['public']->value){?>
                            <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                            
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
                            <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
                            <?php }?>
                            <?php }else{ ?>
                            <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                            <?php if (isset($_smarty_tpl->tpl_vars['match']->value->teamlocal)&&isset($_smarty_tpl->tpl_vars['match']->value->teamvisitant)){?>
                            <?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_params']->value['base']).("/torneos/partido/index/")).($_smarty_tpl->tpl_vars['match']->value->codmatch), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
                            <?php }?>
                            <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
                            <?php }?>
                            <?php }?>
                            <tr class="all-match <?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
 btn_result_detalle_partido" cod-partido="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" data-target="#modal-detalle-partido" data-calendar="<?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
">
                                    <td style='vertical-align: middle;'>
                                        <div class="contador-partido"># <?php echo ($_smarty_tpl->tpl_vars['count']->value+1);?>
</div>
                                        <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['match']->value->local;?>
</p>
                                    </td>
                                    <td>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                                        <?php if ($_smarty_tpl->tpl_vars['match']->value->scorelocal<0){?>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                                        <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorelocal, null, 0);?>
                                        <?php }?>
                                        <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                                        <?php if ($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0){?>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                                        <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorevisitant, null, 0);?>
                                        <?php }?>
                                        <input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamvisitant;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
                                    </td>
                                    <td style='vertical-align: middle;'>
                                        <p class="text-left"><?php echo $_smarty_tpl->tpl_vars['match']->value->visitant;?>
</p>
                                    </td>
                                    <td style='vertical-align: middle;'>
                                        <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
                                        <span><?php if (isset($_smarty_tpl->tpl_vars['match']->value->numjornada)){?>
                                            <?php echo $_smarty_tpl->tpl_vars['match']->value->numjornada;?>

                                            <?php }?></span>
                                        </td>
                                    </tr>
                                    <?php }else{ ?>
                                    <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--************************************************************-->
                <div class="panel panel-default <?php echo $_smarty_tpl->tpl_vars['class_inter']->value;?>
">
                    <div class="panel-heading">
                        <div class="btns-actions">
                            <?php if ($_smarty_tpl->tpl_vars['public']->value){?>
                            
                            <?php }else{ ?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/informacion/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
/<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" style="float: right;">
                                <button class="btn btn-primary btn-modi-info" title="Configurar Calendario Ronda <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
">Configurar Calendario</button>
                            </a>
                            <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>
                            <button class="btn btn-primary gen_siguiente_ronda" round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" style="float: right; margin-right: 2px;">Actualizar Siguiente Ronda</button>
                            <?php }?>
                            <?php }?>
                            <button class="btn btn-primary btn_result_proxima_fecha" style="float: right; margin-right: 2px;" round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['match']->value->group;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" data-target="#modal-results-parcial">Próxima fecha</button>
                        </div>
                        <a class="accordion-toggle grupo-menu tmp-grupo-menu" title="Grupo <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
" data-toggle="collapse" data-parent="#accordion<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">Grupo <?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
 <?php if (isset($_smarty_tpl->tpl_vars['arr_enun']->value[$_smarty_tpl->tpl_vars['match']->value->round])){?> &nbsp;:&nbsp; <?php echo $_smarty_tpl->tpl_vars['arr_enun']->value[$_smarty_tpl->tpl_vars['match']->value->round];?>
 <?php }?> &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['acordion_parent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse <?php echo $_smarty_tpl->tpl_vars['class_collapse']->value;?>
" style="height: auto;">
                        <div class="panel-body">
                            <table class="table table-striped my_rounds" data-round="<?php echo $_smarty_tpl->tpl_vars['match']->value->round;?>
">
                                <thead>
                                    <tr>
                                        <th style="text-align: right;">Local</th>
                                        <th class="text-center" title="Resultado parcial del partido">R</th>
                                        <th style="text-align: left;">Visitante</th>
                                        <th class="text-center" title="Jornada partido">J</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable('', null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable('', null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable('', null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['irlocal'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamlocal).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->local)), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['irvisitant'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->teamvisitant).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['match']->value->visitant)), null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['public']->value){?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                                    
                                    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
                                    <?php }else{ ?>
                                    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
                                    <?php }?>
                                    <?php }else{ ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)&&isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['match']->value->teamlocal)&&isset($_smarty_tpl->tpl_vars['match']->value->teamvisitant)){?>
                                    <?php $_smarty_tpl->tpl_vars['irpartido'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_params']->value['base']).("/torneos/partido/index/")).($_smarty_tpl->tpl_vars['match']->value->codmatch), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($_smarty_tpl->tpl_vars['match']->value->local).(" VS ")).($_smarty_tpl->tpl_vars['match']->value->visitant), null, 0);?>
                                    <?php }?>
                                    <?php }else{ ?>
                                    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("No se ha programado calendario para este partido", null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['class_no_calendar'] = new Smarty_variable("no-programado", null, 0);?>
                                    <?php }?>
                                    <?php }?>
                                    <tr class="all-match <?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
 btn_result_detalle_partido" cod-partido="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" data-target="#modal-detalle-partido" data-calendar="<?php echo $_smarty_tpl->tpl_vars['class_no_calendar']->value;?>
">
                                            <td style='vertical-align: middle;'>
                                                <div class="contador-partido"># <?php echo ($_smarty_tpl->tpl_vars['count']->value+1);?>
</div>
                                                <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['match']->value->local;?>
</p>
                                            </td>
                                            <td>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                                                <?php if ($_smarty_tpl->tpl_vars['match']->value->scorelocal<0){?>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                                                <?php }else{ ?>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorelocal, null, 0);?>
                                                <?php }?>
                                                <span class="glyphicon glyphicon-chevron-left"></span><input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamlocal;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable('', null, 0);?>
                                                <?php if ($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0){?>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable("W", null, 0);?>
                                                <?php }else{ ?>
                                                <?php $_smarty_tpl->tpl_vars['result_aux'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->scorevisitant, null, 0);?>
                                                <?php }?>
                                                <input type="text" class="form-control input-resultado" code="<?php echo $_smarty_tpl->tpl_vars['match']->value->teamvisitant;?>
" value="<?php echo $_smarty_tpl->tpl_vars['result_aux']->value;?>
" disabled="disabled"/><span class="glyphicon glyphicon-chevron-right"></span>
                                            </td>
                                            <td style='vertical-align: middle;'>
                                                <p class="text-left"><?php echo $_smarty_tpl->tpl_vars['match']->value->visitant;?>
</p>
                                            </td>
                                            <td style='vertical-align: middle;'>
                                                <span class="glyphicon glyphicon-hand-up"></span>&nbsp;&nbsp;
                                                <span><?php if (isset($_smarty_tpl->tpl_vars['match']->value->numjornada)){?>
                                                    <?php echo $_smarty_tpl->tpl_vars['match']->value->numjornada;?>

                                                    <?php }?></span>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <?php }?>
                                            <?php $_smarty_tpl->tpl_vars['aux_round'] = new Smarty_variable($_smarty_tpl->tpl_vars['match']->value->round, null, 0);?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


<?php }} ?>