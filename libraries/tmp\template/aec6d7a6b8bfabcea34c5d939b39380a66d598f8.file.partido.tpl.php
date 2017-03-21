<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 11:47:21
         compiled from "/var/www/toquela/modules/torneos/views/partido/partido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17195903505628fb4f612ca9-16548556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aec6d7a6b8bfabcea34c5d939b39380a66d598f8' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/partido/partido.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17195903505628fb4f612ca9-16548556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5628fb4f7ed367_65606557',
  'variables' => 
  array (
    '_params' => 0,
    'match_info' => 0,
    'statis' => 0,
    'auxcont' => 0,
    'num_statistic_local' => 0,
    'num_statistic_visitant' => 0,
    'types_statistics' => 0,
    'type_statistic' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628fb4f7ed367_65606557')) {function content_5628fb4f7ed367_65606557($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/partido/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/partido/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/partido/js/partido.js"></script>
<div class="partido">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-title-torneo" style="margin-left: 0; margin-top: 15px">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="title text-center"><strong>PARTIDO: <?php echo $_smarty_tpl->tpl_vars['match_info']->value->local->name;?>
 VS <?php echo $_smarty_tpl->tpl_vars['match_info']->value->visitant->name;?>
</strong></p>
            </div>
        </div>
        <?php if (($_smarty_tpl->tpl_vars['match_info']->value->tournament->type=="Eliminación directa")){?>
        <div class="alert alert-danger fade in text-left">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <p><strong>¡Tenga en cuenta! </strong> Este es un partido que pertenece a un torneo por Eliminación directa, por lo tanto, no pueden existir empates, tiene que haber un ganador unánime por cada partido. Si es necesario, es precisa la definición por penales.</p>
        </div>
        <?php }?>
    <div class="text-center">
        <button type="button" class="btn btn_blue_light" id="btn_info_config" style="margin-top: 10px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/jornadas.png"/>
            &nbsp;&nbsp; INFORMACIÓN
        </button>
        <button type="button" class="btn btn-default" id="btn_guardar_partido" style="border: 3px solid #4b657d;margin-top: 10px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/ganado.png"/>
            &nbsp;&nbsp; GUARDAR PARTIDO
        </button>
    </div>
    <div class="clear"><br></div>
    <div class="pestanas_partido">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="_equipo_local">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorelocal<0)){?>
                <button type="button" class="btn-goles-logic efect-hover btn-para-left" id="btn_add_local_contra" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="local" score="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorelocal;?>
" style="position: absolute;left: 0;" title="Sumar goles en contra">
                    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Sumar goles en contra</span>
                    <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GC</span>
                    <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
                    <?php if ($_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant>=10){?>
                    <div class="contador-partido" style="display: none"><?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontralocal;?>
</div>
                    <?php }else{ ?>
                    <div class="contador-partido" style="display: none">&nbsp;<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontralocal;?>
&nbsp;</div>
                    <?php }?>
                </button>
                <button type="button" class="btn-goles-logic efect-hover restaurar_marcador" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="local" style="position: absolute;left: 0;top: 38px;" title="Restaurar marcador">
                    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-repeat"></span>&nbsp;Restaurar marcador</span>
                    <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-repeat"></span>&nbsp;RM</span>
                </button>
        <?php }else{ ?>               
        <!-- <button type="button" class="btn-goles-logic efect-hover btn-para-left" id="btn_add_local_favor" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="local" style="position: absolute;left: 0;" title="Sumar goles a favor">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Goles a favor</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GF</span> -->
            <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
            <!-- <?php if ($_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant>=10){?>
            <div class="contador-partido" style="display: none"><?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorlocal;?>
</div>
            <?php }else{ ?>
            <div class="contador-partido" style="display: none">&nbsp;<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorlocal;?>
&nbsp;</div>
            <?php }?>
        </button> -->
        <?php }?>
            </div>
            <p class="number" id="marcador_local">
                <?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorelocal<0)){?>
                W
                <input type="text" id="input-local" value="W" style="display: none;">
                <?php }elseif(isset($_smarty_tpl->tpl_vars['match_info']->value->scorelocal)){?>
                <?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorelocal;?>

                <input type="text" id="input-local" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorelocal;?>
" style="display: none;">
                <?php }else{ ?>
                0
                <input type="text" id="input-local" value="0" style="display: none;" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
">
                <?php }?>
            </p>
            <p><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['match_info']->value->local->name, 'UTF-8');?>
</p>
        </br>
        <button type="button" class="btn btn-sm btn_blue_light" id="btn_add_local">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/camiseta.png"/>
            AGREGAR A LOCAL
        </button>
    </br>
    <div class="capsula" id="resumen_local">
        <h4 class="text-verde">RESUMEN LOCAL</h4>
        <br>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/template_resumen_local.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="_equipo_visitante">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant<0)){?>
        <button type="button" class="btn-goles-logic efect-hover btn-para-right" id="btn_add_visitant_contra" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="visitante" score="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorevisitant;?>
" style="position: absolute;right: 0;" title="Sumar goles en contra">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Sumar goles en contra</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GC</span>
            <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
            <?php if ($_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant>=10){?>
            <div class="contador-partido cont-right" style="display: none"><?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant;?>
</div>
            <?php }else{ ?>
            <div class="contador-partido cont-right" style="display: none">&nbsp;<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant;?>
&nbsp;</div>
            <?php }?>
        </button>
        <button type="button" class="btn-goles-logic efect-hover restaurar_marcador" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="visitante" style="position: absolute;right: 0;top: 38px;" title="Restaurar marcador">
            <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-repeat"></span>&nbsp;Restaurar marcador</span>
            <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-repeat"></span>&nbsp;RM</span>
        </button>
    <?php }else{ ?>    
   <!--  <button type="button" class="btn-goles-logic efect-hover btn-para-right" id="btn_add_visitant_favor" code-match="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
" soy="visitante" style="position: absolute;right: 0;" title="Sumar goles a favor">
    <span class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;Goles a favor</span>
        <span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;GF</span> -->
        <!-- if smarty solo para que el circulo se vea bien con 2 cifras y con una -->
<!--         <?php if ($_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant>=10){?>
        <div class="contador-partido cont-right" style="display: none"><?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorvisitant;?>
</div>
        <?php }else{ ?>
        <div class="contador-partido cont-right" style="display: none">&nbsp;<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorvisitant;?>
&nbsp;</div>
        <?php }?>
    </button> -->
    <?php }?>
    </div>
    <p class="number" id="marcador_visitante">
        <?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant<0)){?>
        W
        <input type="text" id="input-visitante" value="W" style="display: none;">
        <?php }elseif(isset($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant)){?>
        <?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorevisitant;?>

        <input type="text" id="input-visitante" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorevisitant;?>
" style="display: none;">
        <?php }else{ ?>
        0
        <input type="text" id="input-visitante" value="0" style="display: none;" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
">
        <?php }?>
    </p>
    <p><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['match_info']->value->visitant->name, 'UTF-8');?>
</p>
</br>
<button type="button" class="btn btn-default" id="btn_add_visitante" style="border: 3px solid #4b657d;">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/icons/camiseta.png"/>
    AGREGAR A VISITANTE
</button>
</br>
<div class="capsula" id="resumen_visitante">
    <h4 class="text-verde">RESUMEN VISITANTE</h4>
    <br>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/template_resumen_visitant.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</div>
</div>
</br>
</div>
<input type="hidden" id="_match" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->codmatch;?>
"/>
<input type="hidden" id="date_realizacion" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->date;?>
"/>
<input type="hidden" id="_num_statistic_local" value="<?php echo $_smarty_tpl->tpl_vars['num_statistic_local']->value-1;?>
"/>
<input type="hidden" id="_num_statistic_visitant" value="<?php echo $_smarty_tpl->tpl_vars['num_statistic_visitant']->value-1;?>
"/>
<input type="hidden" id="_scorelocal" value="
<?php if (isset($_smarty_tpl->tpl_vars['match_info']->value->scorelocal)){?>
<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorelocal;?>

<?php }else{ ?>
0
<?php }?>"/>
<input type="hidden" id="_scorevisitant" value="
<?php if (isset($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant)){?>
<?php echo $_smarty_tpl->tpl_vars['match_info']->value->scorevisitant;?>

<?php }else{ ?>
0
<?php }?>"/>
<div class="clear"></br></div>
</div>
</div>
<!-- popup de goles en contra -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/partido/sections/popup_gol_en_contra.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- popup de goles a favor -->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/partido/sections/popup_gol_a_favor.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="div-goles-favor-contra" style="display: none">
    fl<input type="text" class="goles-favor-local" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorlocal;?>
">
    cl<input type="text" class="goles-contra-local" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontralocal;?>
">
    
    fv<input type="text" class="goles-favor-visitante" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golesfavorvisitant;?>
">
    cv<input type="text" class="goles-contra-visitante" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->golescontravisitant;?>
">
</div>
<!--  display none -->
<div class="display_none">
    <span id="popup_config_info_body">
        <!--div class="info_partido">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Torneo: </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['match_info']->value->tournament->name;?>
</td>
                    </tr>
                    <tr>
                        <td>Tipo torneo: </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['match_info']->value->tournament->type;?>
</td>
                    </tr>
                    <tr>
                        <td>Número de equipos en el torneo: </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['match_info']->value->tournament->numberparticipants;?>
</td>
                    </tr>
                    <tr>
                        <td>Fecha Programada: </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['match_info']->value->date;?>
</td>
                    </tr>
                    <tr>
                        <td>Hora: </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['match_info']->value->hour;?>
</td>
                    </tr>
                    <tr>
                        <td>Fecha Realización: </td>
                        <td>
                            <div class="input-group date" id="contend_fecha_realizacion" data-date-format="dd MM yyyy" data-link-field="date_realizacion" data-link-format="yyyy-mm-dd">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['match_info']->value->date;?>
" name="date" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lugar: </td>
                        <td>
            <?php if (isset($_smarty_tpl->tpl_vars['match_info']->value->location)){?><p><strong>Lugar</strong> <?php echo $_smarty_tpl->tpl_vars['match_info']->value->location;?>
</p><?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['match_info']->value->descriptionplace)){?><p><strong>Descripción del lugar:</strong> <?php echo $_smarty_tpl->tpl_vars['match_info']->value->descriptionplace;?>
</p><?php }?>
            </td>
            </tr>
            </tbody>
            </table>
        </div-->
    </span>
    <span id="popup_config_info_footer">
        <!--button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Aceptar</button-->
    </span>
    <span id="popup_local_body">
        <!--div class="add_local pop_add">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas text-center">
                <h4 class="text-verde"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['match_info']->value->local->name, 'UTF-8');?>
</h4>
                <br>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <div class="input-group">
                    <input type="text" maxlength="3" class="form-control add_minuto" value="0" onkeypress="validate.validateInsertNumeric()">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn_add" type="button">
                            <span class="glyphicon glyphicon-time"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <select class="form-control selectpicker add_type_statistic">
            <?php  $_smarty_tpl->tpl_vars['type_statistic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type_statistic']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['types_statistics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type_statistic']->key => $_smarty_tpl->tpl_vars['type_statistic']->value){
$_smarty_tpl->tpl_vars['type_statistic']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['type_statistic']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->codtypestatistic;?>
" icon="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->icon;?>
" data-content='<span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->icon;?>
"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->name;?>
' title="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->description;?>
"><?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->name;?>
</option>
            <?php } ?>
            </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
            <select class="form-control selectpicker add_player">
            <option value="1" data-content='<span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;Sin asignar'>Sin asignar</option>
            <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_info']->value->local->players; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['player']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-content='<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
'><?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
</option>
            <?php } ?>
            </select>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas">
            <textarea class="form-control add_description" rows="3" placeholder="Descripción"></textarea>
            </div>
            </div>
            <div class="clear"></div-->
            </span>
            <span id="popup_local_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_save_local">Guardar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="update_resumen_local_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_update_resumen_local">Actualizar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="popup_visitant_body">
        <!--div class="add_visitant pop_add">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas text-center">
                <h4 class="text-verde"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['match_info']->value->visitant->name, 'UTF-8');?>
</h4>
                <br>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <div class="input-group">
                    <input type="text" maxlength="3" class="form-control add_minuto" value="0" onkeypress="validate.validateInsertNumeric()">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn_add" type="button">
                            <span class="glyphicon glyphicon-time"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
                <select class="form-control selectpicker add_type_statistic">
            <?php  $_smarty_tpl->tpl_vars['type_statistic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type_statistic']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['types_statistics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type_statistic']->key => $_smarty_tpl->tpl_vars['type_statistic']->value){
$_smarty_tpl->tpl_vars['type_statistic']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['type_statistic']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->codtypestatistic;?>
" icon="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->icon;?>
" data-content='<span class="glyphicon"><img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->icon;?>
"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->name;?>
' title="<?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->description;?>
"><?php echo $_smarty_tpl->tpl_vars['type_statistic']->value->name;?>
</option>
            <?php } ?>
            </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mis_colmunas">
            <select class="form-control selectpicker add_player">
            <option value="1" data-content='<span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;Sin asignar'>Sin asignar</option>
            <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_info']->value->visitant->players; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['player']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['player']->value->coduser;?>
" data-content='<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
'><?php echo $_smarty_tpl->tpl_vars['player']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->lastname;?>
</option>
            <?php } ?>
            </select>
            </div>
            <div class="clear"></br></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mis_colmunas">
            <textarea class="form-control add_description" rows="3" placeholder="Descripción"></textarea>
            </div>
            </div>
            <div class="clear"></div-->
            </span>
            <span id="popup_visitant_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_save_visitant">Guardar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
    <span id="update_resumen_visitant_footer">
        <!--div class="text-center">
            <div id="_msg_add"></div>
            <button type="button" class="btn btn-green btn_footer" id="btn_update_resumen_visitant">Actualizar</button>
            <button type="button" class="btn btn-green btn_footer" data-dismiss="modal" aria-hidden="true" id="btn_cancel_info_config">Cancelar</button>
        </div-->
    </span>
</div><?php }} ?>