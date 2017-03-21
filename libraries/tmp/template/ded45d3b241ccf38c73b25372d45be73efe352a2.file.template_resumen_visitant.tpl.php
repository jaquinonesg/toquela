<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 09:43:23
         compiled from "C:\xampp\htdocs\toquela\views\_templates\template_resumen_visitant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255655554b48b7ec1c6-43243734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ded45d3b241ccf38c73b25372d45be73efe352a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\template_resumen_visitant.tpl',
      1 => 1417121462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255655554b48b7ec1c6-43243734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'statistics_visitant' => 0,
    'init' => 0,
    'count' => 0,
    'solo_format' => 0,
    'auxcont' => 0,
    'match_info' => 0,
    'statis' => 0,
    'esconder_statistic' => 0,
    '_params' => 0,
    'isPartidoCalendar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b48ba59236_40256226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b48ba59236_40256226')) {function content_5554b48ba59236_40256226($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['statis'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statis']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['statistics_visitant']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statis']->key => $_smarty_tpl->tpl_vars['statis']->value){
$_smarty_tpl->tpl_vars['statis']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['statis']->key;
?>
<?php $_smarty_tpl->tpl_vars['auxcont'] = new Smarty_variable(($_smarty_tpl->tpl_vars['init']->value+$_smarty_tpl->tpl_vars['count']->value), null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['solo_format']->value){?>
<span id="_resu_visitant_contend_<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
">
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['esconder_statistic'] = new Smarty_variable('', null, 0);?>
<?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant>=0)&&$_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==19){?>
    <?php $_smarty_tpl->tpl_vars['esconder_statistic'] = new Smarty_variable('esconder_statistic', null, 0);?>
<?php }?>
    <div class="formato_statistic <?php echo $_smarty_tpl->tpl_vars['esconder_statistic']->value;?>
 btn col-xs-12 col-sm-12 col-ms-12 col-lg-12" data-toggle="popover" title="" data-placement="top" data-content="<p><strong>Minuto: </strong><?php echo $_smarty_tpl->tpl_vars['statis']->value->minute;?>
</p><p><strong>Jugador: </strong><?php echo $_smarty_tpl->tpl_vars['statis']->value->player->name;?>
 <?php echo $_smarty_tpl->tpl_vars['statis']->value->player->lastname;?>
</p><p><strong>Descripción: </strong><?php echo $_smarty_tpl->tpl_vars['statis']->value->description;?>
</p>" role="button" data-original-title="<?php echo $_smarty_tpl->tpl_vars['statis']->value->type->name;?>
"
        id="_resu_visi_<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" minute="<?php echo $_smarty_tpl->tpl_vars['statis']->value->minute;?>
" date="<?php echo $_smarty_tpl->tpl_vars['statis']->value->date;?>
" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
" player="<?php echo $_smarty_tpl->tpl_vars['statis']->value->coduser;?>
" partido="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codmatch;?>
" description="<?php echo $_smarty_tpl->tpl_vars['statis']->value->description;?>
">
        <span class="resu">
        <span>
        <img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/<?php echo $_smarty_tpl->tpl_vars['statis']->value->type->icon;?>
">
        </span>
        &nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['statis']->value->type->name;?>
</span>
        </span>
        <?php if ($_smarty_tpl->tpl_vars['isPartidoCalendar']->value===true){?>
        <span class="actions_resumen">
            <?php if ($_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==5||$_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==6||$_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==20){?>
            <!-- lógica para el estado de las tarjeta amarillas, rojas y azules -->
            <button type="button" data-toggle="popover" data-container="body" data-toggle="popover" data-placement="left" data-content="<?php if (!isset($_smarty_tpl->tpl_vars['statis']->value->estado)||$_smarty_tpl->tpl_vars['statis']->value->estado==0){?>No ha sido pagada<?php }else{ ?>Pagada<?php }?>" class="btn_pagar" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typeEstado="<?php if (!isset($_smarty_tpl->tpl_vars['statis']->value->estado)||$_smarty_tpl->tpl_vars['statis']->value->estado==0){?>nopagado<?php }else{ ?>pagado<?php }?>" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
">
            <?php if (!isset($_smarty_tpl->tpl_vars['statis']->value->estado)||$_smarty_tpl->tpl_vars['statis']->value->estado==0){?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/icons/bolsadedinero.png" style="width: 25px;height:25px;margin-top: -18%;">
            <?php }else{ ?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/icons/bolsadedinero_pagado.png" style="width: 25px;height:25px;margin-top: -18%;">
            <?php }?>
            </button>
            <?php }?>
            <button type="button" class="btn_delete_resumen" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
">
            <span class="glyphicon glyphicon-trash"></span>
            </button>
            <button type="button" class="btn_update_resumen" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
">
            <span class="glyphicon glyphicon-new-window"></span>
            </button>
            <?php if ($_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==19){?>
            <input type="hidden" class="pierdeW" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" value="1"/>
            <?php }?>
        </span>
        <?php }?>
    </div>
    <?php if (($_smarty_tpl->tpl_vars['match_info']->value->scorevisitant==0)&&$_smarty_tpl->tpl_vars['statis']->value->codtypestatistic==19){?>
    <!-- si pasa acá es que la estadistica por w no se debe cargar si pasa esto-->
    <input type="text" class="score_cero" islocal="<?php echo $_smarty_tpl->tpl_vars['statis']->value->islocal;?>
" index="<?php echo $_smarty_tpl->tpl_vars['auxcont']->value;?>
" statistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codstatistics;?>
" typestatistic="<?php echo $_smarty_tpl->tpl_vars['statis']->value->codtypestatistic;?>
" style="display: none;">
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['solo_format']->value){?>
</span>
<?php }?>
<?php } ?><?php }} ?>