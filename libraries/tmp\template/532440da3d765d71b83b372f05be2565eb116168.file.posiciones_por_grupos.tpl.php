<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 11:57:08
         compiled from "/var/www/toquela/modules/torneos/views/clasificacion/sections/posiciones_por_grupos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1503719336562ba8476d6db6-36267247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '532440da3d765d71b83b372f05be2565eb116168' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/clasificacion/sections/posiciones_por_grupos.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1503719336562ba8476d6db6-36267247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562ba84774a022_71293384',
  'variables' => 
  array (
    '_params' => 0,
    'grupos' => 0,
    'i' => 0,
    'grupo' => 0,
    'e' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562ba84774a022_71293384')) {function content_562ba84774a022_71293384($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/clasificacion/css/clasificacion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
    .table tbody > tr > td{
        color: #1A2E3E;
    }
</style>
<span class="clasificacion">
    <?php  $_smarty_tpl->tpl_vars['grupo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grupo']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grupo']->key => $_smarty_tpl->tpl_vars['grupo']->value){
$_smarty_tpl->tpl_vars['grupo']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['grupo']->key;
?>
    <div style="border-bottom:3px solid #ddd;margin-bottom: 20px;">
        <table class="table">
            <tr>
                <th colspan="13" class="text-center" style="border-radius: 30px 30px 0px 0px;-webkit-border-radius: 30px 30px 0px 0px;-moz-border-radius: 30px 30px 0px 0px;border-top: 0px;">Grupo <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</th>
            </tr>
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
 $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['grupo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
 $_smarty_tpl->tpl_vars['e']->value = $_smarty_tpl->tpl_vars['team']->key;
?>
            <tr>
                <td class="text-center" style="background: rgb(255, 255, 255);background: -moz-linear-gradient(-93deg, rgb(255, 255, 255) -35%, rgba(176, 176, 176, 1) 100%, rgb(255, 255, 255) 100%);background: -webkit-gradient(linear, left bottom, right top, color-stop(-35%,rgb(255, 255, 255)), color-stop(100%,rgba(176, 176, 176, 1)), color-stop(100%,rgb(255, 255, 255)));background: -webkit-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -o-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: -ms-linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);background: linear-gradient(-93deg, rgb(255, 255, 255) -35%,rgba(176, 176, 176, 1) 100%,rgb(255, 255, 255) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#efe07a',GradientType=1);"><?php echo $_smarty_tpl->tpl_vars['e']->value+1;?>
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
    </div>
    <?php } ?>
    <span><?php }} ?>