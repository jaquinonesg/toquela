<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:16:46
         compiled from "C:\xampp\htdocs\toquela\views\_templates\paginator_person.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171375553d66ebad9d5-89093116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbc5cc3a8af88a1c3d0426f4688a8dde65f2e938' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\paginator_person.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171375553d66ebad9d5-89093116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5553d66ec01b82_60221758',
  'variables' => 
  array (
    'num_paginas' => 0,
    'clase_css_pag' => 0,
    'index' => 0,
    'pagina_select' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5553d66ec01b82_60221758')) {function content_5553d66ec01b82_60221758($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['num_paginas']->value>0){?>
    <ul class="pagination <?php echo $_smarty_tpl->tpl_vars['clase_css_pag']->value;?>
" numpags="<?php echo $_smarty_tpl->tpl_vars['num_paginas']->value;?>
">
        <li class="pag_option" style="cursor: pointer;" id="_pag_back" index="back"><a>«</a></li>
            <?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int)ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? $_smarty_tpl->tpl_vars['num_paginas']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['num_paginas']->value)+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0){
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++){
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration == 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration == $_smarty_tpl->tpl_vars['index']->total;?>
                <?php if ($_smarty_tpl->tpl_vars['index']->value==$_smarty_tpl->tpl_vars['pagina_select']->value){?>
                <li class="pag_active active" style="cursor: pointer;" id="_pag_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><a <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?> href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                <?php }else{ ?>
                <li class="pag_option" style="cursor: pointer;" id="_pag_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><a <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?> href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                <?php }?>
            <?php }} ?>
        <li class="pag_option" style="cursor: pointer;" id="_pag_next" index="next"><a>»</a></li>
    </ul>
<?php }?><?php }} ?>