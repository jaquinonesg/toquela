<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 19:05:14
         compiled from "/var/www/toquela/modules/torneos/views/participantes/participantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4484374025626d6ba2b31d2-39816036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '235fff341b1ca452031f66473fd62a152d65e2f4' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/participantes/participantes.tpl',
      1 => 1445129466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4484374025626d6ba2b31d2-39816036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'var' => 0,
    'teams' => 0,
    'team' => 0,
    'flag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626d6ba34abc2_20346597',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626d6ba34abc2_20346597')) {function content_5626d6ba34abc2_20346597($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/participantes/js/participantes.js"></script>
<div class="participantes">
   <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(3, null, 0);?> 
   <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
         <span class="glyphicon icon-users" style="font-size: 26px;"></span>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
         <p class="title text-center"><strong>ASIGNAR EQUIPOS</strong></p>
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="asignar_equipos">
         <button type="button" class="btn btn_blue_light btn_asignar_equipos_torneo" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" data-target="#modal-asignar-equipos">Agregar Equipos</button>
         <div><br></div>
         <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/participantes/sections/popup_asig_equipos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

         <form class="form-horizontal text-verde" role="form">
            <?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int)ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['tournament']->value->numberparticipants+1 - (1) : 1-($_smarty_tpl->tpl_vars['tournament']->value->numberparticipants)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0){
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++){
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
            <div class="form-group">
               <label for="_equipo_<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" class="col-xs-12 col-sm-12 col-md-2 col-lg-2 control-label"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
) </label>
               <?php $_smarty_tpl->tpl_vars['flag'] = new Smarty_variable(true, null, 0);?>
               <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
               <?php if ($_smarty_tpl->tpl_vars['team']->value->number==$_smarty_tpl->tpl_vars['var']->value){?>
               <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                  <div class="input-group">
                     <input type="text" class="form-control autocomplete_team" value="<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
" id="_equipo_<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" data-number="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" placeholder="Nombre del equipo"/>
                     <span class="input-group-addon"><button type="button" class="close remove_team" data-code="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" data-tournament="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" aria-hidden="true">&times;</button></span>
                  </div>
               </div>
               <?php $_smarty_tpl->tpl_vars['flag'] = new Smarty_variable(false, null, 0);?>
               <?php }?>
               <?php } ?>
               <?php if ($_smarty_tpl->tpl_vars['flag']->value){?>
               <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                  <input type="text" class="form-control autocomplete_team" id="_equipo_<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" data-number="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" placeholder="Nombre del equipo"/>
               </div>
               <?php }?>
            </div>
            <?php }} ?>
            </br>
            <button type="button" class="btn btn_blue_light" id="save_teams" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">GUARDAR</button>
         </form>
      </div>
      <!-- equipos inscritos -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pestana" id="equipos-inscritos">
         <div id="container-info-team">
         </div>
      </div>
      <div class="clear"></br></div>
   </div>
</div>
<div class="displaye_nones" style="display: none;">
   <input id="codigo_torneo" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
</div><?php }} ?>