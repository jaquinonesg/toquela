<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:31:20
         compiled from "C:\xampp\htdocs\html\toquela\views\_templates\paginator_person.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1135756304f98037705-34806379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d42e108014da8e7d588d70c1876fc8d65f1121' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\_templates\\paginator_person.tpl',
      1 => 1445039386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1135756304f98037705-34806379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'num_paginas' => 0,
    'clase_css_pag' => 0,
    'index' => 0,
    'pagina_select' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f980c02a5_65980785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f980c02a5_65980785')) {function content_56304f980c02a5_65980785($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['num_paginas']->value>0){?>
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