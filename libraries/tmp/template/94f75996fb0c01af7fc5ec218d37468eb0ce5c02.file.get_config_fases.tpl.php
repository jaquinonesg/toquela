<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 19:16:49
         compiled from "/var/www/toquela/modules/torneos/views/calendario/sections/get_config_fases.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2574027065626d9717ccdb4-33811481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94f75996fb0c01af7fc5ec218d37468eb0ce5c02' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/calendario/sections/get_config_fases.tpl',
      1 => 1445129466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2574027065626d9717ccdb4-33811481',
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
  'unifunc' => 'content_5626d971824fa1_89700790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626d971824fa1_89700790')) {function content_5626d971824fa1_89700790($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['fase']->value->type==1){?>
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