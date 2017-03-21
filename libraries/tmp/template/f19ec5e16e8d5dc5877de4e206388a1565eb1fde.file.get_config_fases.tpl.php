<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 09:54:15
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\calendario\sections\get_config_fases.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126735554b717e4f145-16088273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f19ec5e16e8d5dc5877de4e206388a1565eb1fde' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\calendario\\sections\\get_config_fases.tpl',
      1 => 1416847424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126735554b717e4f145-16088273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fase' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b717f17279_16798625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b717f17279_16798625')) {function content_5554b717f17279_16798625($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['fase']->value->type==1){?>
    <p>Fase: <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
, Total grupos: <?php echo $_smarty_tpl->tpl_vars['fase']->value->numrounds;?>
, Total partidos: <?php echo $_smarty_tpl->tpl_vars['fase']->value->nummatches;?>
</p>
    <br>
    <button class="btn btn-danger btn_eliminar_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">Eliminar fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
    &nbsp;&nbsp;
    <button class="btn btn-success btn_actualizar_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
">Guardar fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
    <div class="acor" style="margin-top: 5px;">
        <?php echo $_smarty_tpl->tpl_vars['fase']->value->html;?>
 
    </div>
<?php }elseif($_smarty_tpl->tpl_vars['fase']->value->type==2){?>
    <p>Total partidos: <?php echo $_smarty_tpl->tpl_vars['fase']->value->nummatches;?>
</p>
    <button class="btn btn-danger btn_eliminar_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
">Eliminar fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
    &nbsp;&nbsp;
    <button class="btn btn-success btn_actualizar_fase" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
">Guardar fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
    <br>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['fase']->value->html;?>
 
    </div>
<?php }?><?php }} ?>