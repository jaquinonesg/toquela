<?php /* Smarty version Smarty-3.1.8, created on 2015-12-01 18:12:24
         compiled from "/var/www/toquela/views/_templates/listar_partidos_acordion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1777510699565e2958cc8970-48410003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a84c7a576f2f8ea97c44faeaefc33c9f7fa5f5b' => 
    array (
      0 => '/var/www/toquela/views/_templates/listar_partidos_acordion.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1777510699565e2958cc8970-48410003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'matches' => 0,
    'match' => 0,
    'onlyteam' => 0,
    'codteam' => 0,
    'coduser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_565e2958d51dc9_90045173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e2958d51dc9_90045173')) {function content_565e2958d51dc9_90045173($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['matches']->value)){?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Local</th>
                <th></th>
                <th>Visitante</th>
                <th class="tabla-acciones">Estadisticas</th>
            </tr>
        </thead>
        <tbody>   
            <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
            <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['matches']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['match']->key;
?>
                <tr class="tabla-acciones">
                    <td><?php echo $_smarty_tpl->tpl_vars['match']->value->namelocal;?>
&nbsp;&nbsp;<span class="img-thumbnail" style="float: right;">&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['match']->value->scorelocal<0){?>W<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['match']->value->scorelocal;?>
<?php }?>&nbsp;&nbsp;</span></td>
                    <td class="text-center"><span class="glyphicon glyphicon-resize-horizontal"></span></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['match']->value->namevisitant;?>
&nbsp;&nbsp;<span class="img-thumbnail" style="float: right;">&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0){?>W<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['match']->value->scorevisitant;?>
<?php }?>&nbsp;&nbsp;</span></td>
                    <td class="text-center">
                        <?php if ($_smarty_tpl->tpl_vars['onlyteam']->value){?>
                            <button class="btn btn-primary btn-statistic-index" partido="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" equipo="<?php echo $_smarty_tpl->tpl_vars['codteam']->value;?>
">&nbsp;Estadísticas en este partido&nbsp;</button>
                        <?php }else{ ?>
                            <button class="btn btn-primary btn-statistic-index" partido="<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" usuario="<?php echo $_smarty_tpl->tpl_vars['coduser']->value;?>
">&nbsp;Mis estadísticas en este partido&nbsp;</button>
                        <?php }?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    <p class="text-center">No se han configurado partidos para este equipo.</p>
<?php }?><?php }} ?>